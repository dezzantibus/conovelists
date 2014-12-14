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

}
