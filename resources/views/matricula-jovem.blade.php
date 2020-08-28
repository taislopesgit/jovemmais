@extends('adminlte::page') @section('title', 'AdminLTE') @section('content_header')
<section class="content-header">
  <h2>Jovem+</h2>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Perfil</li>
  </ol>
</section>
<section class="content">

    @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif

  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#pessoal" data-toggle="tab" aria-expanded="true">
            <i class="fa fa-user-plus"></i>&nbsp;&nbsp;Matricular jovem
            </a>
          </li>
          <li class="">
            <a href="#data" data-toggle="tab" aria-expanded="false"></a>
          </li>
          <li class="">
            <a href="#horario" data-toggle="tab" aria-expanded="false"></a>
          </li>
          <li class="">
            <a href="#treinamento" data-toggle="tab" aria-expanded="false"></a>
          </li>
        </ul>
        <div class= "tab-content">
          <div class="tab-pane active" id="pessoal">
            <div class="row">
              <div class="col-md-12">
                  <form method="post" action="{{ route('matricula-salva') }}">
                  {{ csrf_field() }}
                  <div class="form-group col-md-3">
                    <label>Jovem</label>
                    <select id="id_jovem" class="form-control" name="id_jovem">
                      @foreach($jovem as $id)
                      <option value="{{$id->id_jovem}}">{{$id->nome}}</option  required>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Cliente</label>
                    <select id="id_cliente" class="form-control" name="id_cliente">
                      @foreach($cliente as $cliente)
                      <option value="{{$cliente->id_cliente}}">{{$cliente->nome_fantasia}}</option  required>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Grupo</label>
                    <select id="id_grupo" class="form-control" name="id_grupo">
                      @foreach($grupo as $grupo)
                      <option value="{{$grupo->id_grupo}}">{{$grupo->nome}}</option  required>
                      @endforeach
                    </select>
                  </div><!--
                  <div class="form-group col-md-2" >
                    <label>Registro Folha</label>
                    <input type="text" class="form-control" name="registro_folha"  required>
                  </div>-->
                  <div class="form-group col-md-2" >
                    <label>Centro de custo</label>
                    <input type="text" class="form-control" name="centro_custo" required>
                  </div>
                  <br>
                  <a href="#data" data-toggle="tab" aria-expanded="true" class="next round">&#8250;</a>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="data">
              <div class="row">
                <div class="form-group  col-md-6" >
                  <label>Data de Início</label>
                  <input type="date" class="form-control" name="data_inicio" required>
                </div>
                <div class="form-group  col-md-6" >
                  <label>Data Fim</label>
                  <input type="date" class="form-control" name="data_fim" required>
                </div>
                <div class="form-group  col-md-12" >
                  <a href="#pessoal" data-toggle="tab" aria-expanded="true" class="previous round">&#8249;</a>
                  <a href="#horario" data-toggle="tab" aria-expanded="true" class="next round">&#8250;</a>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="horario">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group  col-md-4" >
                    <label>Entrada Prática </label>
                    <input type="time" class="form-control" name="hora_inicio_pratica" required>
                  </div>
                  <div class="form-group  col-md-4" >
                    <label>Intervalo Prática </label>
                    <input type="time" class="form-control" name="hora_intervalo_pratica" required>
                  </div>
                  <div class="form-group  col-md-4" >
                    <label>Saída Prática</label>
                    <input type="time" class="form-control" name="hora_fim_pratica" required>
                  </div>
                  <div class="form-group  col-md-12" >
                    <a href="#data" data-toggle="tab" aria-expanded="true" class="previous round">&#8249;</a>
                    <a href="#treinamento" data-toggle="tab" aria-expanded="true" class="next round">&#8250;</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="treinamento">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group  col-md-4" >
                    <label>Entrada Treinamento </label>
                    <input type="time" class="form-control" name="hora_inicio_treinamento" required>
                  </div>
                  <div class="form-group  col-md-3" >
                    <label>Intervalo Treinamento </label>
                    <input type="time" class="form-control" name="hora_intervalo_treinamento" required>
                  </div>
                  <div class="form-group  col-md-4" >
                    <label>Saída Treinamento</label>
                    <input type="time" class="form-control" name="hora_fim_treinamento" required>
                  </div>
                <div class="form-group col-md-1" >
                  <label>Criado por</label>
                    <select id="criado_por" class="form-control" name="criado_por" >
                    @foreach($usuario as $usuario)
                      <option value="{{$usuario->name}}">{{$usuario->name}}</option>
                    @endforeach
                    </select>
                  </div>
                <div class="form-group col-md-12">
                  <a href="#horario" data-toggle="tab" aria-expanded="true" class="previous round">&#8249;</a>
                  <button class="btn btn-success" type="submit">Cadastrar</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
  color: #fff5ee;
  }
  a:hover {
  background-color: #ddd;
  color: black;
  }
  .previous {
  background-color: #335be7;
  color: white;
  }
  .next {
  background-color: #4CAF50;
  color: white;
  }
  .round {
  border-radius: 50%;
  }
  .icon {
  border-radius: 50%;
  }
</style>

@stop
