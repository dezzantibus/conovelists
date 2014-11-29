<?php

abstract class layout
{

    private $children = array();

    public function addChild( layout $child )
    {

        $this->children[] = $child;

    }

    protected function renderTop()
    {

    }

    protected function renderBottom()
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