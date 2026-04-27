@extends('layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">
      {{ $title }}
      </h1>
   </div>
</div>

@include('layouts.msg')
@include('layouts.erro')

<div class="row">
	<div class="col-lg-9">
		<form action="{{ url($url) }}" method="post">
		{{ csrf_field() }}
			
			<div class="form-group">
				<div class="col-lg-12">
					<label for="nome">Nome:</label>
					<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome da Unidade" value="@if(isset($query)) {{$query['nome']}} @endif">
				</div>
			</div>
			
			@if(isset($query))<input type="hidden" id="idunidade" name="idunidade" value="{{$query['idunidade']}}"> @endif

			<div class="form-group">
				<div class="col-lg-6">
					<label for="cep">CEP:</label>
					<input type="text" class="form-control" name="cep" id="cep" placeholder="CEP" value="@if(isset($query)) {{$query['cep']}} @endif"/>
				</div>
				
			</div>
			<div class="form-group">
				<div class="col-lg-7">
					<label for="logradouro">Rua:</label>
					<input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Rua..." value="@if(isset($query)) {{$query['logradouro']}} @endif"/>
				</div>
				<div class="col-lg-5">
					<label for="complemento">Complemento</label>
					<input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento" value="@if(isset($query)) {{$query['complemento']}} @endif"/>
				</div>
		    </div>

		    <div class="form-group">
		    	<div class="col-lg-7">
					<label for="bairro">Bairro:</label>
					<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro..." value="@if(isset($query)) {{$query['bairro']}} @endif"/>
				</div>	
		    </div>
		    <div class="form-group">
				<div class="col-lg-6">
					<label for="localidade">Cidade:</label>
					<input type="text" class="form-control" name="localidade" id="localidade" placeholder="Rua..." value="@if(isset($query)) {{$query['localidade']}} @endif"/>
				</div>
				<div class="col-lg-6">
					<label for="uf">Estado</label>
					<input type="text" class="form-control" name="uf" id="uf" placeholder="Estado" value="@if(isset($query)) {{$query['uf']}} @endif"/>
					<input type="hidden" id="ibge" name="ibge" value="@if(isset($query)) {{$query['ibge']}} @endif">
				</div>
		    </div>

		    <div class="form-group">
				<div class="col-lg-6">
				     <label for="numero">Número:</label>
				     <input type="text" class="form-control" name="numero" id="numero" placeholder="Número..." value="@if(isset($query)) {{$query['numero']}} @endif"/>
				</div>		       
		    </div>

			<br />
			<div class="form-group">
				<div class="col-lg-6 col-md-offset-6">
					<input type="submit" class="btn btn-success" value="@if(isset($query)) Alterar @else Cadastrar @endif" />
					<input type="reset" class="btn btn-danger" value="Limpar" />
				</div>
			</div>
			
		</form>
	</div>
</div>

@endsection
