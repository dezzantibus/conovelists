<?php

class layout_form_dropdown extends layout
{

    private $name;

    private $label;

    private $value;

    private $list;

    private $placeholder;

    private $class;

    private $errorMessage;

    function __construct( $name, $label, data_array $list, $value=null, $placeholder=null, $class=null, $errorMessage=null )
    {
        $this->name         = $name;
        $this->label        = $label;
        $this->list         = $list;
        $this->value        = $value;
        $this->placeholder  = $placeholder;
        $this->class        = $class;
        $this->errorMessage = $errorMessage;
    }

    public function render()
    {
		
		 echo
        '<div class="form-group">',
            '<label class="control-label">', $this->label ,'</label>',
            '<div class="controls">',

                '<select name="', $this->name, '" class="form-control input-lg requiredField', $this->class, '">';
                
					foreach( $this->list->getData() as $item )
					{
						echo
						'<option value="' . $item['value'] . '">' . $item['label'] . '</option>';
					}
				
				echo
                '</select>',

            '</div>',
        '</div>';
	
    }

}
