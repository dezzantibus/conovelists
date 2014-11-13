<?php

class layout_base_list extends layout
{

    private $data;

    private $id;

    private $class;

    function __construct( data_array $data, $class=null, $id=null )
    {
        $this->data  = $data;
        $this->id    = $id;
        $this->class = $class;
    }

    public function render()
    {

        echo '<ul',
            is_null( $this->id )    ? '' : ' id="'    . $this->id . '"',
            is_null( $this->class ) ? '' : ' class="' . $this->class . '"',
        '>';

        foreach( $this->data->getData() as $value )
        {
            echo '<li>', $value, '</li>';
        }

        echo '</ul>';

    }

}