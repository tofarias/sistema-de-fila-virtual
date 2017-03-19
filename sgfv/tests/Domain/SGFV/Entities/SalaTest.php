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

    public function testAoCadastrarSalaSeNaoInformarCodigoEntaoDeveFalhar()
    {
        $request = [
            'nome' => 'ABC',
            'localizacao' => 'Setor ABC',
            'created_by' => 1
        ];

        //

        $rules = [
            'codigo' => 'required'
        ];

        //

        $messages = [
            'codigo.required' => 'O campo código é de preenchimento obrigatório'
        ];

        $validator = \Validator::make($request,$rules, $messages);
        $errors = $validator->errors();


        $this->assertTrue( $validator->fails() );
        $this->assertTrue( $errors->has('codigo') );
        $this->assertEquals( 'O campo código é de preenchimento obrigatório', $errors->first('codigo') );
    }
}