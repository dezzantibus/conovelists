<?php

class model_story extends model
{


    public $id;

    public $category_id;

    public $first_chapter_id;

    public $title;

    public $brief;


    static function create( data_story $story )
    {

        $sql = '
            INSERT INTO `story`
                ( category_id, first_chapter_id, brief )
            VALUES
                ( :category_id, :first_chapter_id, :brief )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':category_id',      $story->category_id )
            ->bindint   ( ':first_chapter_id', $story->first_chapter_id )
            ->bindString( ':brief',            $story->brief);

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


    static function getById( $id )
    {

        $row = cache_story::retrieve( $id );

        if( empty( $row ) )
        {

            $sql = 'SELECT * FROM `story` where id = :id';

            $query = db::prepare( $sql );
            $query->bindInt( ':id', $id );

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
                ->bindInt( ':items',       data_category::STORIES_PER_PAGE );

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

}