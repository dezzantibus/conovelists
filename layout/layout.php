<?php

class layout
{

    private $children;

    public function addChild( $child )
    {

        $this->children[] = $child;

    }

    private function renderTop()
    {

    }

    private function renderBottom()
    {

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