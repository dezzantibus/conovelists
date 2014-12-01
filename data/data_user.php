<?php

class data_user extends data
{

    const UNKNOWN = 0;

    const MALE = 1;

    const FEMALE = 2;

    public $id;

    public $first_name;

    public $last_name;

    public $email;

    public $pass;

    public $date_of_birth;

    public $gender;

    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['id'] ) )            $this->id            = $data['id'];
            if( isset( $data['first_name'] ) )    $this->first_name    = $data['first_name'];
            if( isset( $data['last_name'] ) )     $this->last_name     = $data['last_name'];
            if( isset( $data['email'] ) )         $this->email         = $data['email'];
            if( isset( $data['pass'] ) )          $this->pass          = $data['pass'];
            if( isset( $data['date_of_birth'] ) ) $this->date_of_birth = $data['date_of_birth'];
            if( isset( $data['gender'] ) )        $this->gender        = $data['date_of_birth'];
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
