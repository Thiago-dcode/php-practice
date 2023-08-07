<?php


namespace Model;

class Users extends Model
{
    private Model $model;

    public function __construct()
    {
        parent::__construct('users');
    }
}
