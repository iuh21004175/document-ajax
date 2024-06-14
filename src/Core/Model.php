<?php

namespace App\Core;

class Model
{
    protected  $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "document");
        mysqli_autocommit($this->conn, FALSE);
    }
    public function nodeBeginTransaction()
    {
        mysqli_begin_transaction($this->conn);
    }
    public function nodeCommitTransaction(){
        mysqli_commit($this->conn);
    }
    public function nodeRollbackTransaction(){
        mysqli_rollback($this->conn);
    }
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        mysqli_close($this->conn);
    }
}