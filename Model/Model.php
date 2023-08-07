<?php



namespace Model;

use Core\App;
use Core\Database;

class Model
{

    protected  $db;
    protected $table;

    public function __construct(string $table)
    {
        $this->db = App::resolve(Database::class);
        $this->table = $table;
    }

    public function all()
    {
        return  $this->db->query("select * from $this->table")->allOrFail();
    }

    public function one($id)
    {
        return  $this->db->query("select * from $this->table where id = $id")->oneOrFail();
    }
    public function delete($id)
    {

        $query = "DELETE FROM notes where id = ?";

        return $this->db->query($query, [$id]);
        $this->db->close();
    }
    public function create(array $params)
    {

        $query = "INSERT INTO notes (body, user_id) VALUES (?, ?)";
        var_dump($params);
        return $this->db->query($query, $params)->getLastId();
    }

    public function update($values, $id)
    {

        $query = "UPDATE notes SET body = :body WHERE id = :id";

        $this->db->query($query, [...$values, 'id' => $id]);
        $this->db->close();
        
    }
}
