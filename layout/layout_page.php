<?php

abstract class layout_page extends layout
{

    protected $title;

    protected $description;

    private function renderTop()
    {

        echo '<!DOCTYPE html>',
                '<html>',
                    '<head>',
                        '<title>', $this->title, '</title>',
                        '<meta name="description" content="', $this->description, '">',
                    '</head>',
                    '<body>';

    }

    private function renderBottom()
    {
        echo '</body></html>';
    }

}