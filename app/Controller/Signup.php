<?php

namespace App\Controller;

class Signup extends Connection
{
    private string $email;
    private string $password;
    private string $passwordRepeat;

    public function __construct(string $email, string $password, string $passwordRepeat)
    {
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
    }

    public function signupUser(): bool
    {
        if (!$this->emptyInput())
        {
            echo "Field can not be empty!";
            return false;
        }
        if (!$this->validEmail())
        {
            echo "Email is not valid!";
            return false;
        }
        if (!$this->isPasswordMatch())
        {
            echo "Password is not match!";
            return false;
        }
        if (!$this->isUserExist($this->email))
        {
            echo "Email has already exist!";
            return false;
        }
        return true;
    }

    private function emptyInput(): bool
    {
        if (empty($this->email) || empty($this->password) || empty($this->passwordRepeat))
        {
            return false;
        }
        return true;
    }

    private function validEmail(): bool
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->email))
        {
            return false;
        }
        return true;
    }

    private function isPasswordMatch(): bool
    {
        if ($this->password !== $this->passwordRepeat)
        {
           return false;
        }
        return true;
    }

    protected function isUserExist(string $email): bool
    {
        $stmt = $this->connectDB()->prepare("SELECT user_id FROM users WHERE user_email = ?");
        if (!$stmt->execute(array($email)))
        {
            return false;
        }
        if ($stmt->rowCount() > 0)
        {
            return false;
        }
        return true;
    }

    protected function insertUser(string $firstname, string $lastname, string $email, string $password)
    {
        $stmt = $this->connectDB()->prepare("INSERT INTO users (user_firstname, user_lastname, user_email, user_password) VALUES (?, ?, ?, ?)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if (!$stmt->execute(array($firstname, $lastname, $email, $hashedPassword)))
        {
            return false;
        }

    }


}