<?php namespace Tests\Domain\SGFV\Entities;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Domain\SGFV\Entities\ReservaSala;

class ReservaSalaTest extends TestCase
{
    private $reservaSala;

    protected function setUp()
    {
        parent::setup();

        $this->reservaSala = new ReservaSala();
    }

    public function testAEntidadeReservaSalaDeveSerUmaInstanciaDeBaseModel()
    {
        $this->assertTrue( $this->reservaSala instanceof \Domain\SGFV\Entities\BaseModel );
    }
}