<?php

class handler_homepage extends handler
{

    function run()
    {

        // get data from the models

        $page = new layout_homepage(  );
        $page->render();

    }

}