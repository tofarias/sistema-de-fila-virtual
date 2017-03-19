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

        $validatorRules = [
            'codigo' => 'required'
        ];

        //

        $validatorMessages = [
            'codigo.required' => 'O campo código é de preenchimento obrigatório'
        ];

        $validator = \Validator::make($request,$validatorRules, $validatorMessages);
        $errors = $validator->errors();

        $this->assertTrue( $validator->fails() );
        $this->assertTrue( $errors->has('codigo') );
        $this->assertEquals( 'O campo código é de preenchimento obrigatório', $errors->first('codigo') );
    }

    public function testAoCadastrarSalaSeNaoInformarNomeEntaoDeveFalhar()
    {
        $request = [
            'codigo' => 'ABC01',
            'localizacao' => 'Setor ABC',
            'created_by' => 1
        ];

        //

        $validatorRules = [
            'nome' => 'required'
        ];

        //

        $validatorMessages = [
            'nome.required' => 'O campo nome é de preenchimento obrigatório'
        ];

        $validator = \Validator::make($request,$validatorRules, $validatorMessages);
        $errors = $validator->errors();

        $this->assertTrue( $validator->fails() );
        $this->assertTrue( $errors->has('nome') );
        $this->assertEquals( 'O campo nome é de preenchimento obrigatório', $errors->first('nome') );
    }

    public function testAoCadastrarSalaSeNaoInformarLocalizacaoEntaoDeveFalhar()
    {
        $request = [
            'codigo' => 'ABC01',
            'nome' => 'ABC',
            'created_by' => 1
        ];

        //

        $validatorRules = [
            'localizacao' => 'required'
        ];

        //

        $validatorMessages = [
            'localizacao.required' => 'O campo localização é de preenchimento obrigatório'
        ];

        $validator = \Validator::make($request,$validatorRules, $validatorMessages);
        $errors = $validator->errors();

        $this->assertTrue( $validator->fails() );
        $this->assertTrue( $errors->has('localizacao') );
        $this->assertEquals( 'O campo localização é de preenchimento obrigatório', $errors->first('localizacao') );
    }

    public function testAoCadastrarSalaSeNaoInformarUsuarioEntaoDeveFalhar()
    {
        $request = [
            'codigo' => 'ABC01',
            'nome' => 'ABC',
            'localizacao' => 'predio ABC'
        ];

        //

        $validatorRules = [
            'created_by' => 'required'
        ];

        //

        $validatorMessages = [
            'created_by.required' => 'Um usuário deve ser definido'
        ];

        $validator = \Validator::make($request,$validatorRules, $validatorMessages);
        $errors = $validator->errors();

        $this->assertTrue( $validator->fails() );
        $this->assertTrue( $errors->has('created_by') );
        $this->assertEquals( 'Um usuário deve ser definido', $errors->first('created_by') );
    }
}