<?php

namespace App;

use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\CIUnitTestCase;
//use Config\App;
//use Config\Services;
//use Tests\Support\Libraries\ConfigReader;

class httpUserChallengesTest extends CIUnitTestCase
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
        $result = $this->withSession()->get('user/current-challenges');
        $result ->assertSee("Drink 2l of water every day!"); 
    }
    
     public function testMyChallenges() {
        $_SESSION['id'] = 7;
        $_SESSION['username'] = "naruto";  
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['role'] = 'user';
        $result = $this->withSession()->get('user/my-challenges');
        $result ->assertDontSee("Drink 2l of water every day!"); 
    }
    
     public function doneChallenges() {
        $_SESSION['id'] = 7;
        $_SESSION['username'] = "naruto";  
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['role'] = 'user';
        $result = $this->withSession()->get('user/done-challenges');
        $result ->assertDontSee("Drink 2l of water every day!"); 
    }
}
