<?php

class data_user extends data
{

    const UNKNOWN = 0;

    const MALE = 1;

    const FEMALE = 2;

    public $id;

    public $first_name;

    public $last_name;

    public $username;

    public $email;

    public $pass;

    public $date_of_birth;

    public $gender;

    public $catchphrase;

    public $created;

    public $avatar;

    public $facebook;

    public $twitter;

    public $google;

    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['id'] ) )            $this->id            = $data['id'];
            if( isset( $data['first_name'] ) )    $this->first_name    = $data['first_name'];
            if( isset( $data['last_name'] ) )     $this->last_name     = $data['last_name'];
            if( isset( $data['username'] ) )      $this->username      = $data['username'];
            if( isset( $data['email'] ) )         $this->email         = $data['email'];
            if( isset( $data['pass'] ) )          $this->pass          = $data['pass'];
            if( isset( $data['date_of_birth'] ) ) $this->date_of_birth = $data['date_of_birth'];
            if( isset( $data['gender'] ) )        $this->gender        = $data['gender'];
            if( isset( $data['catchphrase'] ) )   $this->catchphrase   = $data['catchphrase'];
            if( isset( $data['created'] ) )       $this->created       = $data['created'];
            if( isset( $data['avatar'] ) )        $this->avatar        = $data['avatar'];
            if( isset( $data['facebook'] ) )      $this->facebook      = $data['facebook'];
            if( isset( $data['twitter'] ) )       $this->twitter       = $data['twitter'];
            if( isset( $data['google'] ) )        $this->google        = $data['google'];
        }

    }

    public function getGender()
    {
        switch( $this->gender )
        {

            case self::UNKNOWN: return 'Not specified';
            case self::MALE:    return 'Male';
            case self::FEMALE:  return 'Female';

        }
    }

    public function getAvatar()
    {
        if( empty( $this->avatar ) )
        {
            switch( $this->gender )
            {
                case data_user::MALE:    return '/upload/default_m.png';
                case data_user::FEMALE:  return '/upload/default_f.png';
                case data_user::UNKNOWN: return '/upload/default_x.png';
            }
        }

        return '/upload/' . $this->avatar;
    }

}
