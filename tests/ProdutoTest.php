<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProdutoTest extends TestCase{
	
	//teste para o link de novo na pasta de produtos 
	 public function testNovo(){
        $this->visit('/produtos')
             ->click('Novo')
             ->seePageIs('/produtos/novo');
    }

    //Teste para o formulario de view de novo
   /* public function testAdicionar(){
    	$this->visit('/produtos/novo')
    		 ->type('pendrive', 'nome')
    		 ->type('8 Gigas', 'descricao')
    		 ->type('40.00', 'valor')
    		 ->type('4', 'quantidade')
    		 ->press('Adicionar')
    		 ->seePageIs('/produtos/');
    }*/
}