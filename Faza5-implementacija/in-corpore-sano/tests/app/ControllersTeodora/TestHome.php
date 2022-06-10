<?php

namespace App;

use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\CIUnitTestCase;
//use Config\App;
//use Config\Services;
//use Tests\Support\Libraries\ConfigReader;

class TestHome extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

//    protected function setUp(): void
//    {
//        parent::setUp();
//
//        $this->myClassMethod();
//    }
//
//    protected function tearDown(): void
//    {
//        parent::tearDown();
//
//        $this->anotherClassMethod();
//    }
    
    public function testIndex() {
        
        $result = $this->call('get', 'ser/daily-log');
        
        $result->assertOK();
        
    }
}
