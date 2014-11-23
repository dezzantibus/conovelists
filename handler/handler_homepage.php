<?php

class handler_homepage extends handler
{

    function run()
    {

        /* get data from the models */
//        $menu = model_menu::getMenuData();

        /* display data */
		$page = new layout_homepage();
        $page->render();

    }

}