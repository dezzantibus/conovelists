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

    public static function getById( $id, $no_body=false )
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

        if( $no_body )
        {
            $result->body = null;
        }

        return $result;

    }

    public static function getLatest( $limit=3 )
    {

        $result = cache_chapter::retrieve( 'latest' . $limit );

        if( empty( $result ) )
        {

            $sql = '
                SELECT id, parent_id, story_id, user_id, `level`, title, created
                FROM `chapter`
                ORDER BY created DESC
                LIMIT :limit
            ';

            $query = db::prepare( $sql );
            $query
                ->bindInt( ':limit',   $limit )
                ->execute();

            $result = new data_array();

            while( $row = $query->fetch() )
            {
                $chapter = self::addExtraData( new data_chapter( $row ) );

                $result->add( $chapter );
            }

            cache_chapter::save( 'latest' . $limit, $result, 3600 );

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
                $result->add( self::getById( $item->chapter_id, true ) );
            }

            cache_chapter::save( 'popular-' .$days . '-' . $number, $result, 600 );

        }

        return $result;

    }

	public static function getBranches( $parent_id )
	{

		$sql = '
			SELECT id, parent_id, story_id, user_id, `level`, title, created
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

    public static function getLatestByUserId( $user_id, $limit=5 )
    {

        $result = cache_chapter::retrieve( 'getLatestByUserId-' . $user_id . '.' . $limit );

        if( empty( $result ) )
        {

            $sql = '
                SELECT *
                FROM `chapter`
                WHERE user_id = :user_id
                ORDER BY created DESC
                LIMIT :limit
            ';

            $query = db::prepare( $sql );
            $query
                ->bindInt( ':user_id', $user_id )
                ->bindInt( ':limit',   $limit )
                ->execute();

            $result = new data_array();

            while( $row = $query->fetch() )
            {
                $chapter = self::addExtraData( new data_chapter( $row ) );

                $result->add( $chapter );
            }

            cache_chapter::save( 'getLatestByUserId-' . $user_id . '.' . $limit, $result, 3600 * 24 );

        }

        return $result;

    }

    public static function getPopularByUserId( $user_id, $limit=3 )
    {

        $sql = '
			SELECT c.*, COUNT( v.id ) AS `views`
			FROM `chapter` c
			    INNER JOIN `view` v
			        ON v.chapter_id = c.id
			WHERE c.user_id = :user_id
			    AND v.created > NOW() - INTERVAL 1 MONTH
			ORDER BY `views` DESC
			LIMIT :limit
		';

        $query = db::prepare( $sql );
        $query
            ->bindInt( ':user_id', $user_id )
            ->bindInt( ':limit',   $limit )
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

    private static function addExtraData( data_chapter $chapter )
    {

        $chapter->story = model_story::getById( $chapter->story_id );

        $chapter->story->category = model_category::getById( $chapter->story->category_id );

        $chapter->user  = model_user::getById( $chapter->user_id );

        return $chapter;

    }

}