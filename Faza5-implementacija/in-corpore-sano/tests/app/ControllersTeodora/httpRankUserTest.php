<?php

namespace App;

use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\CIUnitTestCase;
//use Config\App;
//use Config\Services;
//use Tests\Support\Libraries\ConfigReader;

class httpRankUserTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected function setUp(): void
    {
        parent::setUp();
     
    }
    protected function tearDown(): void
    {
        parent::tearDown();
    }
    
    public function testCurrentChallenges() {
        $_SESSION['id'] = 7;
        $_SESSION['username'] = "naruto";  
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['role'] = 'user';
        $result = $this->withSession()->get('user/rank');
        $result ->assertSee("mia");
        $result ->assertSee("500");
    }
    
}
