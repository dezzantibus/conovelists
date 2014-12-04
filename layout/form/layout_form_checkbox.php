<?php

class layout_form_checkbox extends layout
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
        $this->list        = $list;
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
		'</div>',
		'<div class="btn-group" data-toggle="buttons">';

			foreach( $this->list->getData() as $item )
			{

				echo
				'<label class="btn btn-primary ';
				
				if( $this->value == $item['value'] )
				{
					echo ' active';
				}

				echo
				'">',
				'<input name="', $this->name, '" class="form-control input-lg requiredField', $this->class, '" type="checkbox" value="', $item['value'], '"';

				if( !is_null( $this->placeholder ) )
				{
					echo ' placeholder="', $this->placeholder, '"';
				}

				if( !is_null( $this->errorMessage ) )
				{
					echo ' data-error-empty="', $this->errorMessage, '"';
				}

				if( $this->value == $item['value'] )
				{
					echo ' checked="checked"';
				}

				echo
				'>', $item['label'], '</label>';

			}

        echo            
        '</div>';
    }

}
