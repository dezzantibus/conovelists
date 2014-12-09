<?php

class model_chapter extends model
{

    static function create( data_chapter $chapter )
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
            ->bindString( ':body',      $chapter->body );

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

    static function update( data_chapter $chapter )
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
            ->bindString( ':body',      $chapter->body)
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

    static function getById( $id )
    {

        $row = cache_chapter::retrieve( $id );

        if( empty( $row ) )
        {

            $sql = 'SELECT * FROM `chapter` where id = :id';

            $query = db::prepare( $sql );
            $query
				->bindInt( ':id', $id )
				->execute();

            $row = $query->fetch();

            cache_chapter::save( $id, $row, 0 );

        }

        return new data_chapter( $row );

    }

}