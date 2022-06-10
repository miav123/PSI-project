<?php

namespace App;

use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
//use Config\App;
//use Config\Services;
//use Tests\Support\Libraries\ConfigReader;

class RankControllerTest extends CIUnitTestCase
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
        
        $result = $this->withURI('http://localhost:8080/user/rank')
            ->controller(\App\Controllers\User\Rankcontroller::class)
            ->execute('allRegUsers');
        $this->assertTrue($result->isOK());
        
    }
    
    
}
