<?php

namespace App;

use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\CIUnitTestCase;

class RegistrovaniKorisnikModelTest extends CIUnitTestCase
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
        
        $user = new \App\Models\RegistrovaniKorisnikiModel();
        $userDb = $user->where("id_kor", "2")->findAll()[0];
        $this->assertEquals($userDb['id_kor'], 2);
        
    }
}
