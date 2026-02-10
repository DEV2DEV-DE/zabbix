<?php

      function formatJSON($data) {
          $json = json_decode($data, true);
          $result = '';
          $result .= '<table class="json-table"><tr>';
          foreach (array_keys($json[0]) as $column) {
              $result .= '<th>' . $column . '</th>';
          }
          $result .= '</tr>';
          foreach ($json as $rows) {
              $result .= '<tr>';
              foreach ($rows as $key => $value) {
                  $result .= '<td>' . $value . '</td>';
              }
              $result .= '</tr>';
          }
          $result .= '</table>';
          return $result;
      }

       /**
        * Json table widget view.
        *
        * @var CView $this
        * @var array $data
        */

       (new CWidgetView($data))
           ->addItem([
               new CJsScript($data['value'] !== null ? formatJSON($data['value']['value']) : _('No data'))
           ])
           ->show();
