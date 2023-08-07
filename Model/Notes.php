<?php



namespace Model;

class Notes extends Model
{
    private Model $model;

    public function __construct()
    {
        parent::__construct('notes');
        
    }
}
