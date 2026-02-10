<?php

       namespace Modules\JsonTable\Actions;

       use API,
           CControllerDashboardWidgetView,
           CControllerResponseData;

       class WidgetView extends CControllerDashboardWidgetView {

           protected function doAction(): void {
               $db_items = API::Item()->get([
                   'output' => ['itemid', 'value_type', 'name', 'units'],
                   'itemids' => $this->fields_values['itemid'],
                   'webitems' => true,
                   'filter' => [
                       'value_type' => [ITEM_VALUE_TYPE_TEXT]
                   ]
               ]);

               $value = null;

               if ($db_items) {
                   $item = $db_items[0];

                   $history = API::History()->get([
                       'output' => API_OUTPUT_EXTEND,
                       'itemids' => $item['itemid'],
                       'history' => $item['value_type'],
                       'sortfield' => 'clock',
                       'sortorder' => ZBX_SORT_DOWN,
                       'limit' => 1
                   ]);

                   if ($history) {
                       $value = convertUnitsRaw([
                           'value' => $history[0]['value'],
                           'units' => $item['units']
                       ]);
                   }
               }

               $this->setResponse(new CControllerResponseData([
                   'name' => $this->getInput('name', $this->widget->getName()),
                   'value' => $value,
                   'description' => $this->fields_values['description'],
                   'user' => [
                       'debug_mode' => $this->getDebugMode()
                   ]
               ]));
           }
       }
