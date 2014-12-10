<?php

class sitemaps
{

    static private $text;

    static public function generate()
    {

        $categories = model_category::getList();

        /** @var $category data_category */
        foreach( $categories->getData() as $category )
        {
            self::categoryIndex( $category );
            self::monthSiteMap( $category );
        }

    }

    static private function categoryIndex( data_category $category )
    {

        self::$text = '<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $sql = '
            SELECT DATE_FORMAT( ch.created, "%M-%Y" ) AS storyMonth
                MAX( ch.created ) AS lastChapter
            FROM story st
                INNER JOIN chapter ch
                    ON st.id = ch.story_id
            WHERE st.category_id = :category_id
            GROUP BY storyMonth
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt( ':category_id', $category->id )
            ->execute();

        while( $row = $query->fetch() )
        {
            self::$text .= '<sitemap>';
            self::$text .= '<loc>http://www.conovelists.com/sitemaps/sm-' . $category->url . '-' . $row['storyMonth'] . '.xml</loc>';
            self::$text .= '<lastmod>' . date( 'c', $row['lastChapter'] ) .  '</lastmod>';
            self::$text .= '</sitemap>';
        }

        self::$text .= '</sitemapindex>';

        self::saveFile( 'sitemaps/si-' . $category->url . '.xml' );

    }

    static private function monthSiteMap( data_category $category )
    {

        self::$text = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> ';

        $sql = '
            SELECT ch.*, st.first_chapter_id, st.title AS story_title
            FROM story st
                INNER JOIN chapter ch
                    ON st.id = ch.story_id
            WHERE st.category_id = :category_id
                AND ch.created > :beginning_of_month
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt( ':category_id',        $category->id )
            ->bindInt( ':beginning_of_month', strtotime( 'first day of this month' ) )
            ->execute();

        while( $row = $query->fetch() )
        {

            $chapter                  = new data_chapter( $row );
            $chapter->story           = new data_story();
            $chapter->story->title    = $row['story_title'];
            $chapter->story->category = $category;

            self::$text .= '<url>';
            self::$text .= '<loc>http://www.conovelists.com' . $chapter->getLink() . '</loc>';
            self::$text .= '</url>';

        }

        self::$text .= '</urlset>';

        self::saveFile( 'sitemaps/sm-' . $category->url . '-' . date( 'F-Y' ) . '.xml' );


    }

    static private function saveFile( $file )
    {
        $fp = fopen( __DIR__ . '/../' . $file, 'w');
        fwrite( $fp, utf8_encode( self::$text ) );
        self::$text = '';
    }

}

