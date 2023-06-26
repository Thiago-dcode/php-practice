<?php

class Database
{
    private $db;
    private $statement;

    public function __construct($config, $user = "root", $password = null)
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->db = new PDO($dsn, $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = null)
    {


        $this->statement = $this->db->prepare($query);
        $this->statement->execute($params);

        return $this;
    }
    public function all()
    {

        $data =  $this->statement->fetchAll();
        return $data;
    }
    public function one()
    {

        $data =  $this->statement->fetch();
        return $data;
    }
    public function allOrFail()
    {

        $data =  $this->statement->fetchAll();
        if (!$data) abort(Response::NOT_FOUND);
        return $data;
    }
    public function oneOrFail()
    {

        $data =  $this->statement->fetch();
        if (!$data) abort(Response::NOT_FOUND);
        return $data;
    }
}
