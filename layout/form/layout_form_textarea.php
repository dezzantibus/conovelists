<?php

class layout_form_textarea extends layout
{

    private $name;

    private $label;

    private $value;

    private $rows;

    private $placeholder;

    private $class;

    private $errorMessage;

    function __construct( $name, $label, $value=null, $rows=10, $placeholder=null, $class=null, $errorMessage=null )
    {
        $this->name         = $name;
        $this->label        = $label;
        $this->value        = $value;
        $this->rows         = $rows;
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

                '<textarea name="', $this->name, '" class="form-control input-lg requiredField', $this->class, '" rows="', $this->rows, '"';

                if( !is_null( $this->placeholder ) )
                {
                    echo ' placeholder="', $this->placeholder, '"';
                }

                if( !is_null( $this->errorMessage ) )
                {
                    echo ' data-error-empty="', $this->errorMessage, '"';
                }

                echo
                '>', $this->value, '</textarea>',

            '</div>',
        '</div>';
    }

}