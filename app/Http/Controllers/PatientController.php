<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Sexo;
use App\Estadocivil;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Validator;

class PatientController extends Controller {

   public function index() {

      $title = 'Pacientes';

      $paciente = Patient::paginate(15);

      return view('paciente.index', compact('title', 'paciente'));

   }

   public function search(Request $request) {

      $title = 'Pacientes';

      $paciente = Patient::where('nome', 'like', '%'.$request['search'].'%')
         ->orWhere('cpf', 'like', '%'.$request['search'].'%')
         ->orWhere('rg', 'like', '%'.$request['search'].'%')
         ->orWhere('cartaosus', 'like', '%'.$request['search'].'%')
         ->paginate(15);

      return view('paciente.index', compact('title', 'paciente'));

   }

   public function create() {

      $title = 'Cadastro Paciente';

      $sexo = Sexo::all();

      $estadocivil = Estadocivil::all();

      $url = '/patient/register';

      return view('paciente.form', compact('title', 'sexo', 'estadocivil', 'url'));

   }

   public function save(Request $request) {

      $rules = [];

      $rules = [
         'nome'       	=> 'required',
         'datanasc'     => '',
         'id_sexo'      => '',
         'id_estadocivil' => '',
         'naturalidade' => '',
         'ocupacao'     => '',
         'nomemae'      => '',
         'nomepai'      => '',
         'cpf'          => 'unique:patients',
         'rg'           => '',
         'cartaosus'    => '',
         'cep'          => '',
         'logradouro'   => '',
         'complemento'  => '',
         'bairro'       => '',
         'localidade'   => '',
         'uf'           => '',
         'ibge'         => '',
         'numero'       => '',
         
      ];

      $paciente = $request['nome'];

      $retirado = array("-",".",",","/");

      $request['cpf'] = str_replace($retirado, "", $request['cpf']);
      $request['rg'] = str_replace($retirado, "", $request['rg']);
      $request['cartaosus'] = str_replace($retirado, "", $request['cartaosus']);

      if ($request['datanasc'] != '') {
         $datanasc = explode('/', $request['datanasc']);
         $request['datanasc'] = $datanasc[2].'-'.$datanasc[1].'-'.$datanasc[0];
      }
      

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('PatientController@create')
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar cadastrar o paciente, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $unit = Patient::create($request->all());

         return redirect()->action('PatientController@index')
            ->with('class', 'success')
            ->with('msg', 'Cadastro do Paciente "'.$paciente.'" realizado com sucesso!');

      }

   }

   public function delete($id) {

      $paciente = Patient::find($id);

      $pacienteNome = $paciente['nome'];

      $paciente->delete();

      return redirect()->action('PatientController@index')
         ->with('class', 'success')
         ->with('msg', 'Paciente "'.$pacienteNome.'" excluido com sucesso!');

   }

   public function edit($id) {

      $title = 'Editar Cadastro de Paciente';

      //$estados = States::orderBy('nomeestado','asc')->get();

      $sexo = Sexo::all();

      $estadocivil = Estadocivil::all();

      $query = Patient::find($id);

      $url = '/patient/edit';

      return view('paciente.form', compact('title', 'query', 'sexo', 'estadocivil', 'url'));

   }

   public function update(Request $request) {

      
      $rules = [];

      $rules = [
         'nome'         => 'required',
         'datanasc'     => '',
         'id_sexo'      => '',
         'id_estadocivil' => '',
         'naturalidade' => '',
         'ocupacao'     => '',
         'nomemae'      => '',
         'nomepai'      => '',
         'cpf'          => 'unique:patients',
         'rg'           => '',
         'cartaosus'    => '',
         'cep'          => '',
         'logradouro'   => '',
         'complemento'  => '',
         'bairro'       => '',
         'localidade'   => '',
         'uf'           => '',
         'ibge'         => '',
         'numero'       => '',
         
      ];

      $paciente = $request['nome'];

      $retirado = array("-",".",",","/");

      $request['cpf'] = str_replace($retirado, "", $request['cpf']);
      $request['rg'] = str_replace($retirado, "", $request['rg']);
      $request['cartaosus'] = str_replace($retirado, "", $request['cartaosus']);

      $datanasc = explode('/', $request['datanasc']);
      $request['datanasc'] = $datanasc[2].'-'.$datanasc[1].'-'.$datanasc[0];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('PatientController@edit',['id'=>$request['id']])
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar alterar o paciente, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $bank = Patient::find($request['id']);
         $bank->update($request->all());

         return redirect()->action('PatientController@index')
            ->with('class', 'success')
            ->with('msg', 'CAdastro do paciente "'.$paciente.'" alterado com sucesso!');

      }

   }

}
