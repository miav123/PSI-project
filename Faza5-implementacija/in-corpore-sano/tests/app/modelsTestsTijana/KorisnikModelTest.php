<?php

namespace App;

use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\CIUnitTestCase;

class KorisnikModelTest extends CIUnitTestCase
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
        
        $user = new \App\Models\KorisnikModel();
        $userDb = $user->where("id_kor", "1")->findAll()[0];
        $this->assertEquals($userDb['kor_ime'], "admin");
        
    }
}
