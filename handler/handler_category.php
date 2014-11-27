<?php

class handler_category extends handler
{

    public function run()
    {

        $category_url = $_GET['route'];

        /** @var data_category $category */
        $category = model_category::getByUrlName( $category_url );

        /** @var data_array $stories */
        $stories = model_story::getByCategory( $category->id );

        $page = new layout_category( $category, $stories );
        $page->render();

    }

}