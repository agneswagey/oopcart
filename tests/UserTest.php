<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
    public function testGetUserFirstName()
    {
        $user = new \App\Models\User();
        $user->setFirstName('Jevon');

        self::assertEquals('Jevon', $user->getFirstName());
    }

    public function testGetUserLastName()
    {
        $user = new \App\Models\User();
        $user->setLastName('Noel');

        self::assertEquals('Noel', $user->getLastName());
    }

    public function testGetUserFullName()
    {
        $user = new \App\Models\User();
        $user->setFirstName('Jevon');
        $user->setLastName('Noel');
        
        self::assertEquals($user->getFullName(), 'Jevon Noel');
    }
}