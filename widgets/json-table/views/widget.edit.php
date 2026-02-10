<?php

       /**
        * Json table widget form view.
        *
        * @var CView $this
        * @var array $data
        */

       (new CWidgetFormView($data))
           ->addField(
               new CWidgetFieldMultiSelectItemView($data['fields']['itemid'])
           )
           ->addField(
               new CWidgetFieldTextBoxView($data['fields']['description'])
           )
           ->show();
