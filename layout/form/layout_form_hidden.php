<?php

class layout_form_hidden extends layout
{

    private $name;

    private $value;

    function __construct( $name, $value=null )
    {
        $this->name         = $name;
        $this->value        = $value;
    }

    public function render()
    {
        echo
        '<input name="', $this->name, '" type="hidden" value="', $this->value, '">';
    }

}