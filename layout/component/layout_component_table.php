<?php

class layout_component_table
{

    /** @var  $data data_array */
    private $data;

    private $class;

    /** @var  $labels data_array */
    private $headers;

    public function __construct( data_array $data, $class=null, data_array $headers=null )
    {
        $this->data = $data;
        $this->class = $class;
        $this->headers = $headers;
    }

    public function render()
    {

        echo '<table class="', $this->class, '">';

        $this->renderHeader();

        $this->renderRows();

        echo '</table>';

    }

    private function renderHeader()
    {

        if( is_null( $this->headers ) )
        {

            foreach( $this->data->getData() as $row )
            {

                echo '<tr>';

                foreach( $row as $label => $value )
                {
                    echo '<th>', $label, '</th>';
                }

                echo '</tr>';

                return true;

            }

        }

        if( $this->headers->isEmpty() )
        {
            return true;
        }

        echo '<tr>';

        foreach( $this->headers->getData() as $header )
        {
            echo '<th>', $label, '</th>';
        }

        echo '</tr>';

    }

    private function renderRows()
    {

        foreach( $this->data->getData() as $row )
        {

            echo '<tr>';

            foreach( $row as $value )
            {
                echo '<td>', $value, '</td>';
            }

            echo '</tr>';

        }

    }

}