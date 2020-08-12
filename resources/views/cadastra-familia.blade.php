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
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active">
            <a href="#pessoal" data-toggle="tab" aria-expanded="true">
                <i class="fa fa-users"></i>&nbsp;&nbsp;Cadastrar Familiares
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

        <form method="post" action="{{ route('salva-familia') }}">
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
                <select id="sexo" class="form-control" name="sexo">
                  <option value="feminino">Feminino</option>
                  <option value="masculino">Masculino</option>
                </select>
              </div>
              <div class="form-group  col-md-4" >
                <label>Raça</label>
                <select id="raca" class="form-control" name="raca">
                  <option value="branca">Branca</option>
                  <option value="branco">Branco</option>
                  <option value="preta">Preta</option>
                  <option value="parda">Parda</option>
                  <option value="amarela">Amarela</option>
                  <option value="indigena">Indígena</option>
                </select>
              </div>
              <div class="form-group  col-md-4" >
                <label>Deficiente</label>
                <select id="deficiente" class="form-control" name="deficiente">
                  <option value="sim">Sim</option>
                  <option value="não">Não</option>
                </select>
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



</form>
      </div>
      <!--fimLinha-->
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
