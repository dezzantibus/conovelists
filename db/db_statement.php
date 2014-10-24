<?php

class db_statement
{

    /** @var  $statement PDOStatement */
    private $statement;

    function __construct( $statement )
    {
        $this->statement = $statement;
    }

    public function bindInt( $param, $value )
    {
        $this->statement->bindValue( $param, $value, PDO::PARAM_INT );
        return $this;
    }

    public function bindFloat( $param, $value )
    {
        $this->statement->bindValue( $param, strval($value), PDO::PARAM_STR );
        return $this;
    }

    public function bindString( $param, $value )
    {
        $this->statement->bindValue( $param, $value, PDO::PARAM_STR );
        return $this;
    }

    public function bindDate( $param, $value )
    {
        $value = date( 'Y-m-d', strtotime( $value ) );
        $this->statement->bindValue( $param, $value, PDO::PARAM_STR );
        return $this;
    }

    public function bindDateTime( $param, $value )
    {
        $value = date( 'Y-m-d H:i:s', strtotime( $value ) );
        $this->statement->bindValue( $param, $value, PDO::PARAM_STR );
        return $this;
    }

    public function bindNull( $param )
    {
        $this->statement->bindValue( $param, null, PDO::PARAM_NULL );
        return $this;
    }

    public function execute()
    {
        $this->statement->execute();
        return $this;
    }

    public function fetch()
    {
        return $this->statement->fetch( PDO::FETCH_ASSOC );
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll( PDO::FETCH_ASSOC );
    }

    public function getErrors()
    {
        return $this->statement->errorInfo();
    }

}