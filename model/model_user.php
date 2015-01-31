<?php

class model_user extends model
{

    public static function create
    (
        $first_name,
        $last_name,
        $email,
        $username,
        $pass,
        $date_of_birth,
        $gender
    )
    {

        $sql = '
            INSERT INTO `user`
                (
                first_name, last_name, email, username,
                pass, date_of_birth, gender
                )
            VALUES
                (
                :first_name, :last_name, :email, :username,
                :pass, :date_of_birth, :gender
                )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindString( ':first_name',    $first_name )
            ->bindString( ':last_name',     $last_name )
            ->bindString( ':email',         $email )
            ->bindString( ':username',      $username )
            ->bindString( ':pass',          self::hashPassword( $pass ) )
            ->bindDate  ( ':date_of_birth', $date_of_birth )
            ->bindInt   ( ':gender',        $gender );

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

    public static function update( data_user $user )
    {

        $sql = '
            UPDATE `user`
            SET first_name    = :first_name,
                last_name     = :last_name,
                email         = :email,
                date_of_birth = :date_of_birth,
                gender        = :gender,
                facebook      = :facebook,
                twitter       = :twitter,
                google        = :google
            WHERE id = :id
        ';

        $query = db::prepare( $sql );
        $query
            ->bindString( ':first_name',    $user->first_name )
            ->bindString( ':last_name',     $user->last_name )
            ->bindString( ':email',         $user->email )
            ->bindDate  ( ':date_of_birth', $user->username )
            ->bindInt   ( ':gender',        $user->gender )
            ->bindString( ':facebook',      $user->facebook )
            ->bindString( ':twitter',       $user->twitter )
            ->bindString( ':google',        $user->google )
            ->bindInt   ( ':id',            $user->id );

        $success = $query->execute();

        if( !empty( $user->pass ) )
        {
            $sql = '
                UPDATE `user`
                SET pass = :pass
                WHERE id = :id
            ';

            $query = db::prepare( $sql );
            $query
                ->bindString( ':pass', self::hashPassword( $user->pass ) )
                ->bindInt   ( ':id',   $user->id );

            $success = $success && $query->execute();

        }

        if( $success )
        {
            return self::getById( $user->id );
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
        return self::getByField( $id, 'id' );
    }

    public static function getByUsername( $username )
    {
        return self::getByField( $username, 'username' );
    }

    private static function getByField( $value, $field )
    {

        $row = cache_user::retrieve( $field . '-' . $value );

        if( empty( $row ) )
        {

            $sql = 'SELECT * FROM `user` where ' . $field . ' = :value';

            $query = db::prepare( $sql );
            $query
                ->bindInt( ':value', $value )
                ->execute();

            $row = $query->fetch();

            cache_user::save( $field . '-' . $value, $row, 0 );

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
	
	public static function uniqueEntityExists( $value, $field )
	{
		
		$sql = '
			SELECT * 
			FROM user 
			WHERE ' . $field . ' = :value
		';
		
		$query = db::prepare( $sql );
		$query
			->bindString( ':value', $value )
			->execute();
		
		$row = $query->fetch();
		
		if( empty( $row ) )
		{
			return false;
		}
		
		return true;
	
	}

    public static function getByChapterId( $chapter_id )
    {

        $row = cache_user::retrieve( 'chapter_id-' . $chapter_id );

        if( empty( $row ) )
        {

            $sql = '
                SELECT us.*
                FROM `user` us
                    INNER JOIN chapter ch
                        ON ch.user_id = us.id
                WHERE ch.id = :chapter_id
            ';

            $query = db::prepare( $sql );
            $query
                ->bindInt( ':chapter_id', $chapter_id )
                ->execute();

            $row = $query->fetch();

            cache_user::save( 'chapter_id-' . $chapter_id, $row, 0 );

        }

        return new data_user( $row );

    }

	private static function hashPassword( $password )
	{
		return hash( 'sha256', 'zante-' . $password . '-zante' );
	}

}















