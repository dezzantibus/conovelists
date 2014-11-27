<?php

class model_user extends model
{

    public static function create( data_user $user )
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
            ->bindString( ':email',         $user->email )
            ->bindString( ':nick',          $user->nick )
            ->bindString( ':pass',          self::hashPassword( $user->pass ) )
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

    public static function getById( $id )
    {

        $row = cache_user::retrieve( $id );

        if( empty( $row ) )
        {

            $sql = 'SELECT * FROM `user` where id = :id';

            $query = db::prepare( $sql );
            $query
				->bindInt( ':id', $id )
				->execute();

            $row = $query->fetch();

            cache_user::save( $id, $row, 0 );

        }


        return new data_user( $row );

    }
	
	public static function login( $email, $pass )
	{
		
		$sql = '
			SELECT * 
			FROM user 
			WHERE pass = :pass
				AND email = :email
		';
		
		$query = db::prepare( $sql );
		$query
			->bindString( ':email', $email )
			->bindString( ':pass',  self::hashPassword( $pass ) )
			->execute();
		
		$row = $query->fetch();
		
		if( empty( $row ) )
		{
			message::addError( 
				'Login failed. Please check your login data', 
				'Failed login with email ' . $email . ' and password ' . $pass
			);
			return null;
		}
		
		return new data_user( $row );
		
	}
	
	public static function initialise()
	{
		
		/* initialise user in session if it isn't */
		if( !isset( $_SESSION['user'] ) )
		{
			$_SESSION['user'] = 0;
		}
		
		/* check if already logged in */
		if( $_SESSION['user'] instanceof data_user )
		{
			return true;
		}
		
		/* check if user has login cookie */
		if( !isset( $_COOKIE['user_id'] ) )
		{
			return false;
		}
		
		/* get user from cookie */
		$id   = security::decrypt( $_COOKIE['user_id'] );
		if( !is_numeric( $id ) )
		{
			return false;
		}

		/* get user data */
		$user = self::getById( $id );
		
		if( empty( $user->id ) )
		{
			return false;
		}
		
		$_SESSION['user'] = $user;
		return true;
				
	}
	
	private static function hashPassword( $password )
	{

		return hash( 'sha256', 'zante-' . $password . '-zante' );

	}

}















