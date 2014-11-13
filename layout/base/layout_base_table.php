<?php

class layout_base_table extends layout
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

        echo '<table',
            is_null( $this->id )    ? '' : ' id="'    . $this->id . '"',
            is_null( $this->class ) ? '' : ' class="' . $this->class . '"',
        '>';

            $this->header();

            $this->body();

        echo '</table>';

    }

    private function header()
    {

        echo '<tr>';

        $row = array_shift( array_slice( $this->data->getData(), 0, 1 ) );

        foreach( $row as $field => $value )
        {
            echo '<th>', $field , '</th>';
        }

        echo '</tr>';

    }

    private function body()
    {

        foreach( $this->data->getData() as $row )
        {
            echo '<tr>';

            foreach( $row as $value )
            {
                echo '<td>', $value , '</td>';
            }

            echo '</tr>';
        }

    }

}