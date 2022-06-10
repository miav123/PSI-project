<?php

namespace App;

use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
//use Config\App;
//use Config\Services;
//use Tests\Support\Libraries\ConfigReader;

class MyAccountControllerTest extends CIUnitTestCase
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
        
        $result = $this->withURI('http://localhost:8080/user/my-account')
            ->controller(\App\Controllers\User\Myaccountcontroller::class)
            ->execute('myAccountUser');

        $this->assertTrue($result->isOK());
        
    }
    
    public function testIndex1() {
        $_SESSION['id'] = 7;
        $_SESSION['username'] = "naruto";  
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['role'] = 'user';
        
        $result = $this->withURI('http://localhost:8080/user/my-account')
            ->controller(\App\Controllers\User\Myaccountcontroller::class)
            ->execute('changeWeight');

        $this->assertTrue($result->isOK());
        
    }
    
    public function changeUsername() {
        $_SESSION['id'] = 7;
        $_SESSION['username'] = "naruto";  
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['role'] = 'user';
        
        $result = $this->withURI('http://localhost:8080/user/my-account')
            ->controller(\App\Controllers\User\Myaccountcontroller::class)
            ->execute("changeUsername");

        $this->assertTrue($result->isOK());
        
    }
    public function testIndex2() {
        $_SESSION['id'] = 7;
        $_SESSION['username'] = "naruto";  
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['role'] = 'user';
        
        $result = $this->withURI('http://localhost:8080/user/my-account')
            ->controller(\App\Controllers\User\Myaccountcontroller::class)
            ->execute('changeHeight');

        $this->assertTrue($result->isOK());
        
    }
    
}
