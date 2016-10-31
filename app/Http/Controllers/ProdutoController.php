<?php 

namespace estoque\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Request;
use Validator;

use estoque\Produto;
use estoque\Categoria;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['only'=>['novo', 'adiciona', 'remove']]);
	}

	//método para fazer a pesquisar dos produtos e listar em uma view /produtos
	public function lista(){

		//$produtos = DB::select('select * from produtos');
		$produtos = Produto::all();

		return view('produto.listagem')->with('produtos',$produtos);
		//return view('listagem')->with('produtos', $produtos[0]);
	}


	//método para mostrar os detalhes do produto em uma view /mostra?id=<?= $p->id ?
	public function mostra($id){

		//$id = Request::input('id','0');
		//$resposta = DB::select('select * from produtos where id = ?', [$id]);
		//Usando o método do framework eloquent da classe Modelo Produto
		$produto  = Produto::find($id);
		if(empty($produto)){
			return "Esse produto não existe";
		}else{
			
			return view('produto.detalhes')->with('p', $produto);
		}
	}

	//método para criar uma view para novos itens
	public function novo(){
		return view('produto.formulario')->with('categorias', Categoria::all());;
	}

	//Uma view para adicionar um produto ao banco
	public function adiciona(ProdutosRequest $request){

	/*	$produto = new Produto();
		$produto->nome = Request::input('nome');
		$produto->descricao = Request::input('descricao');
		$produto->valor = Request::input('valor');
		$produto->quantidade = Request::input('quantidade');
		$produto->save(); */

		//DB::insert('insert into produtos values (null, ?, ?, ?,?)',array($nome, $valor, $descricao, $quantidade)); 

		//return view('produto.adicionado')->with('nome', $nome);


		Produto::create($request->all());
		return redirect ()->action('ProdutoController@lista')->withInput(Request::only('nome'));
	}

	public function listaJson(){
		//$produtos = DB::select('select *from produtos');
		$produtos = Produto::all();
		return $produtos;
	}

	public function remove($id){
		$produto = Produto::find($id);
		$produto->delete();
		return redirect()->action('ProdutoController@lista');
	}

	/*public function novo(){
		return view('formulario')
	}*/
}