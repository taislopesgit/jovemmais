@extends('adminlte::page') @section('title', 'AdminLTE') @section('content_header')
<section class="content-header">
  <h2>
    Jovem+
  </h2>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Perfil</li>
  </ol>
</section>
<section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-warning">
    <div class="box-header with-border">
      @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
      @if(session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
      @endif
      <!--cadastrarOcorrencias-->
      <h4 class="box-title">Cadastrar ocorrência</h4>
      <br> <br>
      <form method="post" action="{{ route('salvar-ocorrencia') }}">
        {{ csrf_field() }}
        
        <div class="form-group col-md-4" >
        <label>Tipo de ocorrência</label>
          <select id="id_tipo_ocorrencia" class="form-control" name="id_tipo_ocorrencia">
          @foreach($nomeTipoOcorrencia as $nome)
            <option value="{{$nome->id_tipo_ocorrencia}}">{{$nome->nome}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-4" >
        <label>Nome do Jovem</label>
          <select id="id_jovem" class="form-control" name="id_jovem">
          @foreach($nomeDoJovem as $jovem)
            <option value="{{$jovem->id_jovem}}">{{$jovem->nome}}</option>
          @endforeach
          </select>
        </div>
        <div class="form-group col-md-4" >
        <label>Matrícula</label>
          <select id="id_matricula" class="form-control" name="id_matricula">
          @foreach($idMatricula as $matricula)
            <option value="{{$matricula->id_matricula}}">{{$matricula->id_matricula}}</option>
          @endforeach
          </select>
        </div>
        <div class="form-group  col-md-4" >
          <label >Responsável</label>
          <input type="text" class="form-control" name="responsavel">
        </div>
        <div class="form-group col-md-4" >
        <label>Criado por</label>
          <select id="criado_por" class="form-control" name="criado_por">
          @foreach($idUsuario as $usuario)
            <option value="{{$usuario->name}}">{{$usuario->name}}</option>
          @endforeach
          </select>
        </div>
        <div class="form-group col-md-4">
          <label >Data do acontecimento</label>
          <input type="date" class="form-control" name="data_prevista">
        </div>
        <div class="form-group col-md-12">
          <label >Descrição</label>
          <textarea class="form-control" rows="3" name="descricao"></textarea>
        </div>
        <div class="form-group col-md-12">
          <button class="btn btn-primary" type="submit">Cadastrar</button>
        <div>
      </form>
      </div>
      </div>
    </div>
  </div>

</section>
<style>
  .avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  }
</style>
@stop
