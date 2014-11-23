<?php

class model_bookmark extends model
{

    static function create( data_bookmark $user )
    {


		/*
		
		THIS IS model_user shit
		needs rewriting for bookmark
		
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
		*/

    }


    static function getForUserId( $user_id )
    {

        $result = cache_bookmark::retrieve( $user_id );

        if( empty( $result ) )
        {

            $sql = 'SELECT * FROM `bookmark` where user_id = :user_id';

            $query = db::prepare( $sql );
            $query
				->bindInt( ':user_id', $user_id )
				->execute();

			$result = new data_array();

            while( $row = $query->fetch() )
			{
				$result->add( new data_bookmark( $row ) );
			}

            cache_user::save( $user_id, $result, 0 );

        }

        return $result;

    }

}