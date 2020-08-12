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
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active">
            <a href="#pessoal" data-toggle="tab" aria-expanded="true">
                <i class="fa fa-user"></i>&nbsp;&nbsp;Cadastrar Jovem
            </a>
        </li>
        <li class="">
            <a href="#endereco" data-toggle="tab" aria-expanded="false">
                <!--<i class="fas fa-book"></i></i>&nbsp;&nbsp;Endereço-->
            </a>
        </li>
        <li class="">
            <a href="#trabalhista" data-toggle="tab" aria-expanded="false">
                <!--<i class="fa fa-history bg-dark"></i>&nbsp;&nbsp;Trabalhista-->
            </a>
        </li>
      </ul>

    <div class= "tab-content">
      <!--pessoal-->
    <div class="tab-pane active" id="pessoal">
      <div class="row">
          <div class="col-md-12">
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
        <form method="post" action="{{ route('salva-jovem') }}">
              {{ csrf_field() }}
              <div class="form-group col-md-4" >
                <label>Nome do Jovem</label>
                <input type="text" class="form-control" name="nome">
              </div>
              <div class="form-group col-md-4" >
                <label>Email</label>
                <input type="text" class="form-control" name="email">
              </div>
              <div class="form-group col-md-4" >
                <label>Telefone</label>
                <input type="text" class="form-control" name="telefone">
              </div>
              <div class="form-group col-md-4" >
                <label>Celular</label>
                <input type="text" class="form-control" name="celular">
              </div>
              <div class="form-group col-md-4" >
                <label>Data de Nascimento</label>
                <input type="date" class="form-control" name="data_nascimento">
              </div>
              <div class="form-group col-md-4">
                <label >Sexo</label>
                <input type="text" class="form-control" name="sexo">
              </div>
              <div class="form-group  col-md-4" >
                <label>Raça</label>
                <input type="text" class="form-control" name="raca">
              </div>
              <div class="form-group  col-md-4" >
                <label>Deficiente</label>
                <input type="text" class="form-control" name="deficiente">
              </div>
              <div class="form-group col-md-4">
                <label>Tipo de deficiência </label>
                <input type="text" class="form-control" name="deficiencia_tipo">
              </div>
              <div class="form-group col-md-4">
                <label>Estado Civil </label>
                <input type="text" class="form-control" name="estado_civil">
              </div>
              <div class="form-group col-md-4">
                <label>Nacionalidade</label>
                <input type="text" class="form-control" name="nacionalidade">
              </div>
              <div class="form-group col-md-4">
                <label>Naturalidade</label>
                <input type="text" class="form-control" name="naturalidade">
              </div>
              <a href="#endereco" data-toggle="tab" aria-expanded="true" class="next round">&#8250;</a>
          </div>
        </div>
        </div>

      <!--endereco-->
      <div class="tab-pane" id="endereco">

      <div class="row">
  <div class="col-md-12">

        <div class="form-group col-md-6">
          <label>Endereço</label>
          <input type="text" class="form-control" name="endereco">
        </div>
        <div class="form-group col-md-4">
          <label>CEP</label>
          <input type="text" class="form-control" name="cep">
        </div>
        <div class="form-group col-md-1">
          <label>Número</label>
          <input type="text" class="form-control" name="numero">
        </div>
        <div class="form-group col-md-1">
          <label>UF</label>
          <input type="text" class="form-control" name="uf_naturalidade">
        </div>
        <div class="form-group col-md-4">
          <label>Complemento</label>
          <input type="text" class="form-control" name="Complemento">
        </div>
        <div class="form-group col-md-4">
          <label>Bairro</label>
          <input type="text" class="form-control" name="bairro">
        </div>
        <div class="form-group col-md-2">
          <label>Cidade</label>
          <input type="text" class="form-control" name="bairro">
        </div>
        <div class="form-group col-md-2">
          <label>UF</label>
          <input type="text" class="form-control" name="uf">
        </div>
        <a href="#pessoal" data-toggle="tab" aria-expanded="true" class="previous round">&#8249;</a>
    <a href="#trabalhista" data-toggle="tab" aria-expanded="true" class="next round">&#8250;</a>
    </div>
  </div>

      </div>
      <!--trabalhista-->
      <div class="tab-pane" id="trabalhista">
      <div class="row">
       <div class="col-md-12">
      <div class="form-group col-md-3">
          <label>Registro de identidade</label>
          <input type="text" class="form-control" name="rg">
        </div>
        <div class="form-group col-md-3">
          <label>Orgão de expedição</label>
          <input type="text" class="form-control" name="rg_orgao_expedidor">
        </div>
        <div class="form-group col-md-3">
          <label>Data de expedição</label>
          <input type="date" class="form-control" name="rg_data_expedicao">
        </div>
        <div class="form-group col-md-3">
          <label>CPF</label>
          <input type="text" class="form-control" name="cpf">
        </div>
        <div class="form-group col-md-3">
          <label>Reservista</label>
          <input type="text" class="form-control" name="reservista">
        </div>
        <div class="form-group col-md-3">
          <label>Carteira de Trabalho</label>
          <input type="text" class="form-control" name="carteira_trabalho">
        </div>
        <div class="form-group col-md-3 ">
          <label>Série</label>
          <input type="text" class="form-control" name="carteira_trabalho_serie">
        </div>
        <div class="form-group col-md-3">
          <label>Data de expedição</label>
          <input type="date" class="form-control" name="carteira_trabalho_data_expedicao">
        </div>
        <div class="form-group col-md-3">
          <label>PIS</label>
          <input type="text" class="form-control" name="nis_pis_pasep">
        </div>
        <div class="form-group col-md-3">
          <label>Cadastro único</label>
          <input type="text" class="form-control" name="cadunico">
        </div>
        <div class="form-group col-md-3">
          <label>Titulo Eleitoral</label>
          <input type="text" class="form-control" name="titulo_eleitoral">
        </div>
        <div class="form-group col-md-3">
          <label>Zona</label>
          <input type="text" class="form-control" name="titulo_eleitoral_zona">
        </div>
        <div class="form-group col-md-3">
          <label>Seção</label>
          <input type="text" class="form-control" name="titulo_eleitoral_secao">
        </div>
        <div class="form-group col-md-3">
          <label>Data Expedição</label>
          <input type="date" class="form-control" name="titulo_eleitoral_data_expedicao">
        </div>
        <div class="form-group col-md-3">
          <label>Criado por</label>
          <input type="text" class="form-control" name="criado_por">
        </div>
        <div class="form-group col-md-12">
          <button class="btn btn-primary" type="submit">Cadastrar</button>
        <div>
    </div>
    <br>
    <a href="#endereco" data-toggle="tab" aria-expanded="true" class="previous round">&#8249;</a>
</div>
</form>
      </div>
      <!--fimLinha-->
       </div>
        </div>
      </div>
  </div>
</div>

<!--outrosCadastros-->
<div class="row">
  <div class="col-md-3">
    <div class="small-box bg-blue">
      <div class="inner">
        <h4>Dados Familiar</h4>
        <div class="a:link ">
            <a href="{{route('face')}}"><p>Cadastrar</p>
            </a>
        </div>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
    </div>
  </div>
</div>
<!--Familiar-->
<div class="row">
  <div class="col-md-3">
    <div class="small-box bg-green">
      <div class="inner">
        <h4>Dados Escolares</h4>
        <div class="a:link ">
            <a href="{{route('face')}}"><p>Cadastrar</p>
            </a>
        </div>
      </div>
      <div class="icon">
        <i class="fa fa-book"></i>
    </div>
  </div>
  </div>
<!--matricula-->
<div class="row">
  <div class="col-md-3">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h4>Dados Matriculares</h4>
        <div class="a:link ">
            <a href="{{route('face')}}"><p>Cadastrar</p>
            </a>
        </div>
      </div>
      <div class="icon">
        <i class="fa fa-graduation-cap"></i>
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
</style>





@stop
