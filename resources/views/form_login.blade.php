@extends('layout.principal')

	@section('conteudo')




	<h1>Login de Usuário</h1>

	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="/login" method="post">

		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

		<div class="form-group">
		<label>Email</label>
		<input name="email" class="form-control" value="{{ old('nome')}}" />
		</div>

		<div class="form-group">
		<label>Senha</label>
		<input  type = "password" name="password" class="form-control" value="{{old('descricao')}}" />
		</div>

		<button type="submit" class="btn btn-primary btn-block">Login</button>
	</form>


	@stop