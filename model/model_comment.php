<?php

class model_comment extends model
{

	public static function getForChapterId( $chapter_id )
    {

        $result = cache_comment::retrieve( 'chapter-' . $chapter_id );

        if( empty( $result ) )
        {

            $sql = '
				SELECT *
				FROM comment
				WHERE chapter_id = :chapter_id
				ORDER BY created ASC
            ';

            $query = db::prepare( $sql );
            $query
                ->bindInt( ':chapter_id', $chapter_id )
                ->execute();

            $result = new data_array();

            while( $row = $query->fetch() )
            {
                $item           = new data_comment( $row );
                $item->user     = model_user::getId( $item->user_id );
                $result->add( $item );
            }

            cache_story::save( 'chapter-' . $chapter_id, $result, 3600 );

        }

        return $result;

    }


}