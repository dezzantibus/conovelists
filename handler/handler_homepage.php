<?php

class handler_homepage extends handler
{

    function run()
    {

        // get data from the models
        $menu = model_menu::getMenuData();

        $page = new layout_homepage( $menu );
        $page->render();

    }

}