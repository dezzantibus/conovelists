

<?php

class layout_form_password extends layout
{

    private $name;

    private $label;

    private $value;

    private $placeholder;

    private $class;

    private $errorMessage;

    function __construct( $name, $label, $value=null, $placeholder=null, $class=null, $errorMessage=null )
    {
        $this->name         = $name;
        $this->label        = $label;
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

                '<input name="', $this->name, '" class="form-control input-lg requiredField', $this->class, '" type="password" ';

                if( !is_null( $this->placeholder ) )
                {
                    echo ' placeholder="', $this->placeholder, '"';
                }

                if( !is_null( $this->errorMessage ) )
                {
                    echo ' data-error-empty="', $this->errorMessage, '"';
                }

                if( !is_null( $this->value ) )
                {
                    echo ' value="', $this->value, '"';
                }

                echo
                '>',

            '</div>',
        '</div>';
    }

}