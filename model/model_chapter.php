<?php

class model_chapter extends model
{

    public static function create( data_chapter $chapter )
    {

        $sql = '
            INSERT INTO `chapter`
                ( parent_id, story_id, user_id, level, title, body )
            VALUES
                ( :parent_id, :story_id, :user_id, :level, :title, :body )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':parent_id', $chapter->parent_id )
            ->bindint   ( ':story_id',  $chapter->story_id )
            ->bindInt   ( ':user_id',   $chapter->user_id )
            ->bindint   ( ':level', 	$chapter->level )
            ->bindString( ':title',     $chapter->title )
            ->bindString( ':body',      self::processBodyToSave( $chapter->body ) );

        $success = $query->execute();

        if( $success )
        {
            $id = db::lastInsertId();
            return self::getById( $id );
        }
        else
        {
            message::addError(
                'There has been an error, please try again. If the problem persists please contact support.',
                var_export( $query->getErrors(), 1 )
            );
            return null;
        }

    }

    public static function update( data_chapter $chapter )
    {

        $sql = '
            UPDATE `chapter`
			SET parent_id = :parent_id,
				story_id  = :story_id,
				user_id	  = :user_id,
				level     = :level,
				title	  = :title,
				body	  = :body
			WHERE id = :id
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':parent_id', $chapter->parent_id )
            ->bindInt   ( ':story_id', 	$chapter->story_id )
            ->bindInt   ( ':user_id',   $chapter->user_id )
            ->bindInt   ( ':level', 	$chapter->level )
            ->bindString( ':title',     $chapter->title )
            ->bindString( ':body',      self::processBodyToSave( $chapter->body ) )
            ->bindInt   ( ':id',        $chapter->id );

        $success = $query->execute();

        if( $success )
        {
            return self::getById( $chapter->id );
        }
        else
        {
            message::addError(
                'There has been an error, please try again. If the problem persists please contact support.',
                var_export( $query->getErrors(), 1 )
            );
            return null;
        }

    }

    public static function getById( $id )
    {

        $result = cache_chapter::retrieve( $id );

        if( empty( $result ) )
        {

            $sql = 'SELECT * FROM `chapter` where id = :id';

            $query = db::prepare( $sql );
            $query
				->bindInt( ':id', $id )
				->execute();

            $result = new data_chapter( $query->fetch() );

            cache_chapter::save( $id, $result, 0 );

        }

        return $result;

    }

    public static function getPopular( $number=3, $days=7 )
    {

        $result = cache_chapter::retrieve( 'popular-' .$days . '-' . $number );

        if( empty( $result ) )
        {

            $ids = model_view::getPopularChapterIds( $number, $days );

            $result = new data_array();

            foreach( $ids->getData() as $item )
            {
                $result->add( self::getById( $item['chapter_id'] ) );
            }

            cache_chapter::save( 'popular-' .$days . '-' . $number, $result, 600 );

        }

        return $result;

    }

	public static function getBranches( $parent_id )
	{
		
		$sql = '
			SELECT *
			FROM `chapter`
			WHERE parent_id = :parent_id
			ORDER BY created ASC
		';
		
		$query = db::prepare( $sql );
		$query
			->bindInt( ':parent_id', $parent_id )
			->execute();

		$result = new data_array();
		
		while( $row = $query->fetch() )
		{
			$result->add( new data_chapter( $row ) );
		}
		
		return $result;
		
	}

    private static function processBodyToSave( $text )
	{
		
		$r = chr(0x0D);
		$n = chr(0x0A);
		
		$text = strip_tags( $text );
		$text = str_replace( $r, $n, $text );
		$text = str_replace( $n, '</p><p>', $text );
		$text = str_replace( '<p></p>', '', $text );
		
		return '<p>' . $text . '</p>';
		
	}

}