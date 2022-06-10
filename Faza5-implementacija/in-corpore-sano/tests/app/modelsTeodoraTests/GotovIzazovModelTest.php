<?php

namespace App;

use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\CIUnitTestCase;
//use Config\App;
//use Config\Services;
//use Tests\Support\Libraries\ConfigReader;

class GotovIzazovModelTest extends CIUnitTestCase
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
    public function testIndex() {
        
        $user = new \App\Models\GotoviIzazoviModel();
        $userDb = $user->where("id_izazov", "6")->findAll()[0];
        $this->assertEquals($userDb['id_izazov'], 6);
        
    }
}
