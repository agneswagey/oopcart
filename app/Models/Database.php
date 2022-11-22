<?php

namespace App\Models;

class Database
{
    private string $host;
    private string $username;
    private string $password;
    private string $dbname;

    protected function getHost(): string
    {
        return $this->host;
    }

    protected function setHost(string $host): void
    {
        $this->host = $host;
    }

    protected function getUsername(): string
    {
        return $this->username;
    }

    protected function setUsername(string $username): void
    {
        $this->username = $username;
    }

    protected function getPassword(): string
    {
        return $this->password;
    }

    protected function setPassword(string $password): void
    {
        $this->password = $password;
    }

    protected function getDbname(): string
    {
        return $this->dbname;
    }

    protected function setDbname(string $dbname): void
    {
        $this->dbname = $dbname;
    }

}