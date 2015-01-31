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

    public static function getGenderList()
    {

        $genders = new data_array();

        $genders->add( array(
            'value' => self::UNKNOWN,
            'label' => 'Undefined',
        ) );

        $genders->add( array(
            'value' => self::MALE,
            'label' => 'Male',
        ) );

        $genders->add( array(
            'value' => self::FEMALE,
            'label' => 'Female',
        ) );

        return $genders;

    }

    public function uploadFolder()
    {

        $level1 = $this->id % 100;
        if( $level1 < 10 )
        {
            $level1 = '0' . $level1;
        }

        $level2 = (int)( $this->id / 100 ) % 100;
        if( $level2 < 10 )
        {
            $level2 = '0' . $level2;
        }

        $level3 = (int)( $this->id / 10000 ) % 100;
        if( $level3 < 10 )
        {
            $level3 = '0' . $level3;
        }

        $dir = __DIR__ . '/../upload/' . $level1 . '/' . $level2 . '/' . $level3 . '/' . $this->id . '/';

        if( !is_dir( $dir ) )
        {
            mkdir( $dir );
        }

        return $dir;

    }

}
