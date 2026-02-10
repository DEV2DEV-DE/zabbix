<?php

       namespace Modules\JsonTable\Includes;

       use Zabbix\Widgets\{
           CWidgetField,
           CWidgetForm
       };

       use Zabbix\Widgets\Fields\{
           CWidgetFieldMultiSelectItem,
           CWidgetFieldTextBox
       };

       /**
        * Json table widget form.
        */
       class WidgetForm extends CWidgetForm {

           public function addFields(): self {
               return $this
                   ->addField(
                       (new CWidgetFieldMultiSelectItem('itemid', _('Item')))
                           ->setFlags(CWidgetField::FLAG_NOT_EMPTY | CWidgetField::FLAG_LABEL_ASTERISK)
                           ->setMultiple(false)
                   )
                   ->addField(
                       new CWidgetFieldTextBox('description', _('Description'))
                   );
           }
       }
