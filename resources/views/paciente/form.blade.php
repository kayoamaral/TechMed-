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

			@if(isset($query))
				<div class="form-group">
					<div class="col-lg-12">
						<h3>Código do paciente: {{$query['id']}}</h3>
					</div>
				</div>
			@endif
			
			<div class="form-group">
				<div class="col-lg-12">
					<label for="nome">Nome:</label>
					<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do paciente" value="@if(isset($query)) {{$query['nome']}} @endif">
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-6">
					<label for="cpf">CPF:</label>
					<input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF" value="@if(isset($query)) {{$query['cpf']}} @endif"/>
				</div>
				<div class="col-lg-6">
					<label for="rg">RG:</label>
					<input type="text" class="form-control" name="rg" id="rg" placeholder="RG" value="@if(isset($query)) {{$query['rg']}} @endif"/>
				</div>
				<div class="col-lg-7">
					<label for="cartaosus">Cartão SUS:</label>
					<input type="text" class="form-control" name="cartaosus" id="cartaosus" placeholder="Cartão SUS" value="@if(isset($query)) {{$query['cartaosus']}} @endif"/>
				</div>
		    </div>

		    <div class="form-group">
				<div class="col-lg-6">
					<label for="nomemae">Nome Mãe:</label>
					<input type="text" class="form-control" name="nomemae" id="nomemae" placeholder="Nome Mãe" value="@if(isset($query)) {{$query['nomemae']}} @endif"/>
				</div>
				<div class="col-lg-6">
					<label for="nomepai">Nome Pai:</label>
					<input type="text" class="form-control" name="nomepai" id="nomepai" placeholder="Nome Pai" value="@if(isset($query)) {{$query['nomepai']}} @endif"/>
				</div>
		    </div>

			<div class="form-group">
				<div class="col-lg-4">
					<label for="datanasc">Data Nascimento:</label>
					<input type="text" class="form-control" name="datanasc" id="datanasc" placeholder="Data de Nascimento" value="@if(isset($query)) {{date('d/m/Y', strtotime($query['datanasc']))}} @endif">
				</div>

				<div class="col-lg-4">
					<label for="id_sexo">Sexo:</label>
					<select class="form-control" id="id_sexo" name="id_sexo">
						<option value="0">--- Sexo ---</option>
							@foreach($sexo as $key => $value)
								@if(isset($query) && $query['id_sexo'] == $value->id)
									<option value="{{$value->id}}" selected>{{ $value->nome }}</option>
								@else
									<option value="{{$value->id}}">{{ $value->nome }}</option>
								@endif
							@endforeach
					</select>
				</div>

				<div class="col-lg-4">
					<label for="id_estadocivil">Estado Civil:</label>
					<select class="form-control" id="id_estadocivil" name="id_estadocivil">
						<option value="0">--- Estado Civil ---</option>
							@foreach($estadocivil as $key => $value)
								@if(isset($query) && $query['id_estadocivil'] == $value->id)
									<option value="{{$value->id}}" selected>{{ $value->nome }}</option>
								@else
									<option value="{{$value->id}}">{{ $value->nome }}</option>
								@endif
							@endforeach
					</select>
				</div>

			</div>
			
			@if(isset($query))<input type="hidden" id="id" name="id" value="{{$query['id']}}"> @endif

			

			<div class="form-group">
				<div class="col-lg-6">
					<label for="naturalidade">Naturalidade:</label>
					<input type="text" class="form-control" name="naturalidade" id="naturalidade" placeholder="Naturalidade" value="@if(isset($query)) {{$query['naturalidade']}} @endif"/>
				</div>
				<div class="col-lg-6">
					<label for="ocupacao">Ocupação:</label>
					<input type="text" class="form-control" name="ocupacao" id="ocupacao" placeholder="Ocupação" value="@if(isset($query)) {{$query['ocupacao']}} @endif"/>
				</div>
		    </div>

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
					<input type="text" class="form-control" name="localidade" id="localidade" placeholder="Cidade" value="@if(isset($query)) {{$query['localidade']}} @endif"/>
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
