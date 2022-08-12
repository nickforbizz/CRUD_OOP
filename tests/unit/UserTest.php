<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function setUp():void 
    {
        $this->user = new User();
    }

    public function testGetUserName(): void
    {
        $this->user->setName("Nick");

        $this->assertEquals($this->user->getName(),"Nick");
    }
}