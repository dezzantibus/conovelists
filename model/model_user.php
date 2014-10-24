<?php

class model_user extends model
{

    static function create( data_user $user )
    {

        $sql = '
            INSERT INTO `user`
                (
                first_name, last_name, email, nick,
                pass, date_of_birth, gender
                )
            VALUES
                (
                :first_name, :last_name, :email, :nick,
                :pass, :date_of_birth, :gender
                )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindString( ':first_name',    $user->first_name )
            ->bindString( ':last_name',     $user->last_name )
            ->bindString( ':email',         $user->email)
            ->bindString( ':nick',          $user->nick )
            ->bindString( ':pass',          $user->pass)
            ->bindDate  ( ':date_of_birth', $user->date_of_birth )
            ->bindInt   ( ':gender',        $user->gender );

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

        $row = cache_user::retrieve( $id );

        if( empty( $row ) )
        {

            $sql = 'SELECT * FROM `user` where id = :id';

            $query = db::prepare( $sql );
            $query->bindInt( ':id', $id );

            $row = $query->fetch();

            cache_user::save( $id, $row, 0 );

        }


        return new data_user( $row );

    }

}