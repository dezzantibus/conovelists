<?php

class model_statistics extends model
{

    static public function menu()
    {
    }


    static public function footer()
    {

		$result = new data_statistics();
		
		$result->days	  = 30;
		$result->stories  = self::stories( $result->days );
		$result->chapters = self::chapters( $result->days );
		$result->users    = self::users( $result->days );
		
		return $result;

    }

    static public function tagsForHomepage( data_array $stories )
    {

        $tags = cache_statistics::retrieve( 'tagsHome' );

        if( empty( $tags ) )
        {

            $text = '';

            /** @var $story data_story */
            foreach( $stories->getData() as $story )
            {
                $text .= ' ' . $story->brief;
            }

            $tags = self::processTextForTags( $text );

            cache_statistics::save( 'tagsHome', $tags, constant::HOUR_IN_SECONDS );

        }

        return $tags;

    }

    static public function tagsForCategory( data_array $stories, $category_id )
    {

        $tags = cache_statistics::retrieve( 'tagsChapter-' . $category_id );

        if( empty( $tags ) )
        {

            $text = '';

            /** @var $story data_story */
            foreach( $stories->getData() as $story )
            {
                $text .= ' ' . $story->brief;
            }

            $tags = self::processTextForTags( $text );

            cache_statistics::save( 'tagsChapter-' . $category_id, $tags, constant::HOUR_IN_SECONDS );

        }

        return $tags;

    }

    static public function tagsForChapter( data_chapter $chapter )
    {

        $tags = cache_statistics::retrieve( 'tagsChapter-' . $chapter->id );

        if( empty( $tags ) )
        {

            $text = $chapter->body . ' ' . $chapter->story->brief . ' ' . $chapter->title;

            $tags = self::processTextForTags( $text );

            cache_statistics::save( 'tagsChapter-' . $chapter->id, $tags, constant::WEEK_IN_SECONDS );

        }

        return $tags;

    }

    static private function processTextForTags( $text )
    {

        $tags = array();

        $remove = array( "\n", "\r", '"', "'", ',', '.', '!', ':', ';', '-', '/', '?', '<', '>', '=', '+', '(', ')', '[', ']', '{', '}' );

        $text = strip_tags( $text );

        $text = str_replace( $remove, ' ', $text );

        $array = explode( ' ', $text );

        foreach( $array as $word )
        {

            if( strlen( $word ) > 3 )
            {

                if( isset( $tags[ $word ] ) )
                {
                    $tags[ $word ]++;
                }
                else
                {
                    $tags[ $word ] = 1;
                }

            }

        }

        arsort( $tags, SORT_NUMERIC );

        return new data_array( array_slice( $tags, 0, 10 ) );

    }
	
	static private function stories( $days )
	{
		
        $row = cache_statistics::retrieve( 'stories-' . $days );

        if( empty( $row ) )
        {

            $sql = '
				SELECT COUNT(id) AS number
				FROM `story` 
				WHERE created > NOW() - INTERVAL :days DAY
			';

            $query = db::prepare( $sql );
            $query
				->bindInt( ':days', $days )
				->execute();

            $row = $query->fetch();
			$row = $row['number'];

            cache_statistics::save( 'stories-' . $days, $row, self::cache_time() );

        }

        return $row;
		
	}
	
	static private function chapters( $days )
	{
		
        $row = cache_statistics::retrieve( 'chapters-' . $days );

        if( empty( $row ) )
        {

            $sql = '
				SELECT COUNT(id) AS number
				FROM `chapter` 
				WHERE created > NOW() - INTERVAL :days DAY
					AND parent_id > 0
			';

            $query = db::prepare( $sql );
            $query
				->bindInt( ':days', $days )
				->execute();

            $row = $query->fetch();
			$row = $row['number'];

            cache_statistics::save( 'chapters-' . $days, $row, self::cache_time() );

        }

        return $row;
		
	}
	
	static private function users( $days )
	{
		
        $row = cache_statistics::retrieve( 'users-' . $days );

        if( empty( $row ) )
        {

            $sql = '
				SELECT COUNT(id) AS number
				FROM `user` 
				WHERE created > NOW() - INTERVAL :days DAY
			';

            $query = db::prepare( $sql );
            $query
				->bindInt( ':days', $days )
				->execute();

            $row = $query->fetch();
			$row = $row['number'];

            cache_statistics::save( 'users-' . $days, $row, self::cache_time() );

        }

        return $row;
		
	}
	
	static private function cache_time()
	{
		
		$from = 600;  // 10 minutes
		$to   = 3600; // 1 hour
		
		return rand( 600, 3600 );
		
	}

}















