<?php

namespace App\Classes;



class ActiveRecord extends Db{

    /**
     * Model table
     *
     * @var string
     */
    public $table = "";

    public $columns = "";
    public $values = "";

    public $column = "";
    public $value = "";


    public function __construct(){ 
        parent::__construct();        
    } 



    // selecting data
    public function getAll()
    {
        
        $query = "SELECT * from $this->table";
        $query_obj = $this->connection->query($query);
        return $query_obj;
    }


    // selecting data
    public function getById($id)
    {
        $query = "SELECT * FROM $this->table where $id";
        $query_obj = $this->connection->query($query);
        return mysqli_fetch_assoc($query_obj);
    }


    // insert data
    public function insert($data)
    {
        foreach ($data as $this->column => $this->value) {
            $this->columns .= ($this->columns == "") ? "" : ", ";
            $this->columns .= $this->column;

            $this->values .= ($this->values == "") ? "" : ", ";
            $this->values .= $this->value;
        }


        $insert = "INSERT INTO $this->table ($this->columns) VALUES ($this->values)";

        $this->connection->query($insert);
    }




    // update data
    public function update($data, $id)
    {
        foreach ($data as $this->column => $this->value) {
            
            $update = "UPDATE $this->table SET $this->column = '$this->value' WHERE id = $id";
            $this->connection->query($update);
        }

        return true;

    }

    public function delete($id)
    {
        $del_query = "DELETE FROM $this->table WHERE id = $id";
        $this->connection->query($del_query);
    }


    public function escapeStr($str)
    {
        return $this->connection->real_escape_string($str);
    }

}