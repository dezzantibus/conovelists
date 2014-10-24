<?php

abstract class layout_page
{

    private $children;

    public function addChild( $child )
    {

        $this->children[] = $child;

    }

    private function renderTop()
    {

        echo '<!DOCTYPE html>',
                '<html>',
                    '<head>',
                        '<title></title>',
                    '</head>',
                    '<body>';

    }

    private function renderBottom()
    {
        echo '</body></html>';
    }

    private function renderChildren()
    {

        /** @var $child layout */
        foreach( $this->children as $child )
        {
            $child->render();
        }

    }

    public function render()
    {
        $this->renderTop();
        $this->renderChildren();
        $this->renderBottom();
    }

}