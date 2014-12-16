<?php

class model_view extends model
{

    public static function logUserView( $user_id, $chapter_id )
    {

        $sql = '
            INSERT INTO `view`
                ( user_id, chapter_id )
            VALUES
                ( :user_id, :chapter_id )
            ON DUPLICATE KEY
            UPDATE created = NOW()
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt( ':user_id',    $user_id )
            ->bindInt( ':chapter_id', $chapter_id )
            ->execute();

    }

    public static function getPopularChapterIds( $number=3, $days=7 )
    {

        $result = cache_view::retrieve( $days . '-' . $number );

        if( empty( $result ) )
        {

            $sql = '
                SELECT COUNT( id ) as views, chapter_id
                FROM `view`
                WHERE created > NOW() - INTERVAL :days DAY
                GROUP BY chapter_id
                ORDER BY views DESC
                LIMIT :number
            ';

            $query = db::prepare( $sql );
            $query
                ->bindInt( ':days',   $days )
                ->bindInt( ':number', $number )
                ->execute();

            $result = new data_array();

            while( $row = $query->fetch() )
            {
                $item           = new data_story( $row );
                $item->user     = model_user::getByChapterId( $item->first_chapter_id );
                $item->category = model_category::getById( $item->category_id );
                $result->add( $item );
            }

            cache_story::save( $days . '-' . $number, $result, 3600 );

        }

        return $result;

    }

}















