<?php

class model_category extends model
{

    static function create( data_category $category )
    {

        $sql = '
            INSERT INTO `category`
                ( `name`, description, url )
            VALUES
                ( :name, :description, :url )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindString( ':name',        $category->name )
            ->bindString( ':description', $category->description )
            ->bindString( ':url',         $category->url);

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

        $row = cache_category::retrieve( $id );

        if( empty( $row ) )
        {

            $sql = 'SELECT * FROM `category` where id = :id';

            $query = db::prepare( $sql );
            $query->bindInt( ':id', $id );

            $row = $query->fetch();

            cache_category::save( $id, $row, 0 );

        }

        return new data_category( $row );

    }

    static function getByUrlName( $url )
    {
        $row = cache_category::retrieve( $url );

        if( empty( $row ) )
        {

            $sql = 'SELECT * FROM `category` where url = :url';

            $query = db::prepare( $sql );
            $query->bindString( ':url', $url );

            $row = $query->fetch();

            cache_category::save( $url, $row, 0 );

        }

        return new data_category( $row );

    }

}