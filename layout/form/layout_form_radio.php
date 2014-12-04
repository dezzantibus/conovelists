<?php

class layout_form_radio extends layout
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
            '<div class="controls">';

                foreach( $this->list->getData() as $item )
                {

                    echo
                    '<label>',
                    '<input name="', $this->name, '" class="form-control input-lg requiredField', $this->class, '" type="radio" value="', $item['value'], '"';

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
                        echo ' selected="selected"';
                    }

                    echo
                    '>', $item['label'], '</label>';

                }

            echo
            '</div>',
        '</div>';
    }

}