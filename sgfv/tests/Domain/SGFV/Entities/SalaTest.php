<?php namespace Tests\Domain\SGFV\Entities;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Domain\SGFV\Entities\Sala;

class SalaTest extends TestCase
{
    private $sala;

    protected function setUp()
    {
        parent::setup();

        $this->sala = new Sala();
    }

    public function testAEntidadeSalaDeveExtenderBaseModel()
    {
        $this->assertTrue( $this->sala instanceof \Domain\SGFV\Entities\BaseModel );
    }
}