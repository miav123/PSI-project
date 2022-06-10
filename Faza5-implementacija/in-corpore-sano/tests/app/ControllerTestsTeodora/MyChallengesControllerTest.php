<?php

namespace App;

use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
//use Config\App;
//use Config\Services;
//use Tests\Support\Libraries\ConfigReader;

class MyChallengesControllerTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use ControllerTestTrait;
   

    protected function setUp(): void
    {
        parent::setUp();

    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }
    public function testIndex() {
        $_SESSION['id'] = 7;
        $_SESSION['username'] = "naruto";  
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['role'] = 'user';
        
        $result = $this->withURI('http://localhost:8080/user/my-challenges')
            ->controller(\App\Controllers\User\Mychallengescontroller::class)
            ->execute('doneChallenges');

        $this->assertTrue($result->isOK());
        
    }
    
    public function testIndex1() {
        $_SESSION['id'] = 7;
        $_SESSION['username'] = "naruto";  
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['role'] = 'user';
        
        $result = $this->withURI('http://localhost:8080/user/my-challenges')
            ->controller(\App\Controllers\User\Mynechallengescontroller::class)
            ->execute('likechallenge',1);

        $this->assertTrue($result->isOK());
        
    }
}
