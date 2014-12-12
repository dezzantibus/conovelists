<?php

class model_story extends model
{

    static function create( data_story $story )
    {

        $sql = '
            INSERT INTO `story`
                ( category_id, first_chapter_id, title, brief )
            VALUES
                ( :category_id, :first_chapter_id, :title, :brief )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':category_id',      $story->category_id )
            ->bindint   ( ':first_chapter_id', $story->first_chapter_id )
            ->bindString( ':title',            $story->title )
            ->bindString( ':brief',            $story->brief );

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

    static function update( data_story $story )
    {

        $sql = '
            UPDATE `story`
			SET category_id		 = :category_id,
				first_chapter_id = :first_chapter_id,
				title			 = :title,
				brief			 = :brief
			WHERE id = :id
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':category_id',      $story->category_id )
            ->bindint   ( ':first_chapter_id', $story->first_chapter_id )
            ->bindString( ':title',            $story->title )
            ->bindString( ':brief',            $story->brief)
            ->bindInt   ( ':id',               $story->id );

        $success = $query->execute();

        if( $success )
        {
            return self::getById( $story->id );
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

    static function getById( $id )
    {

        $row = cache_story::retrieve( $id );

        if( empty( $row ) )
        {

            $sql = 'SELECT * FROM `story` where id = :id';

            $query = db::prepare( $sql );
            $query
				->bindInt( ':id', $id )
				->execute();

            $row = $query->fetch();

            cache_story::save( $id, $row, 0 );

        }

        return new data_story( $row );

    }

    static function getByCategory( $category_id, $page=1 )
    {

        $result = cache_story::retrieve( 'category-' . $category_id );

        if( empty( $result ) )
        {

            $offset = ( $page - 1 ) * data_category::STORIES_PER_PAGE;

            $sql = '
                SELECT *
                FROM `story`
                WHERE category_id = :category_id
                LIMIT :offset, :items
            ';

            $query = db::prepare( $sql );
            $query
                ->bindInt( ':category_id', $category_id )
                ->bindInt( ':offset',      $offset )
                ->bindInt( ':items',       data_category::STORIES_PER_PAGE )
				->execute();

            $result = new data_array();

            while( $row = $query->fetch() )
            {
                $result->add( new data_story( $row ) );
            }

            cache_story::save( 'category-' . $category_id, serialize( $result ), 0 );

        }
        else
        {
            $result = unserialize( $result );
        }

        return $result;

    }

    public static function getLatest( $number=data_category::STORIES_PER_PAGE )
    {

        $result = cache_story::retrieve( 'latest' );

        if( empty( $result ) )
        {

            $sql = '
                SELECT *
                FROM `story`
                ORDER BY id DESC
                LIMIT :number
            ';

            $query = db::prepare( $sql );
            $query
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

            cache_story::save( 'latest', $result, 300 );

        }

        return $result;

    }

}