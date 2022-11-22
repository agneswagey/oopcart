<?php

namespace App\Controller;

use App\Models\Database;

class Connection extends Database
{
    public function connectDB()
    {
        try
        {
            return new PDO('mysql:host=' . $this->getHost() . ';dbname=' . $this->getDbname(), $this->getUsername(), $this->getPassword());
        }
        catch (\PDOException $e)
        {
            echo "Error: " . $e->getMessage();
            die();
        }
    }
}