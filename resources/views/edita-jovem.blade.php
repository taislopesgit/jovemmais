@extends('adminlte::page') @section('title', 'AdminLTE') @section('content_header')

<section class="content-header">
  <h2>Jovem</h2>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Perfil</li>
  </ol>
</section>

<!--dadosJovens-->
<section class="content">
  <div class="row">
      <div class="col-md-8">
      <div class="box box-warning">
      <div class="box-header with-border">
    <h4 class="box-title">Jovem</h4><br><br>
      <form action="{{route('update', $jovem->id_jovem)}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group col-md-4">
            <label>ID</label>
            <input type="text" class="form-control" name="id" value="{{ $jovem->id_jovem }}">
        </div>
        <div class="form-group col-md-8">
          <label> Nome</label>
          <input type="text" name="nome"  class="form-control" value="{{ $jovem->nome }}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Data de Nascimento</label>
          <input type="text" name="data_nascimento"  class="form-control" value="{{ $jovem->data_nascimento }}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Sexo</label>
          <input type="text" name="sexo"  class="form-control" value="{{ $jovem->sexo }}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Raça</label>
          <input type="text" name="raca"  class="form-control" value="{{ $jovem->raca }}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Estado Civil</label>
          <input type="text" name="estado_civil"  class="form-control" value="{{ $jovem->estado_civil }}" required>
        </div>
        <div class="form-group col-md-6">
          <label>Email</label>
          <input type="text" name="email"  class="form-control" value="{{$jovem->email}}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Celular</label>
          <input type="text" name="celular"  class="form-control" value="{{$jovem->celular}}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Telefone</label>
          <input type="text" name="telefone"  class="form-control" value="{{$jovem->telefone}}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Endereço</label>
          <input type="text" name="endereco"  class="form-control" value="{{$jovem->endereco}}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Número</label>
          <input type="text" name="endereco"  class="form-control" value="{{$jovem->numero}}" required>
        </div>
        <div class="form-group col-md-3">
          <label>CEP</label>
          <input type="text" name="cep"  class="form-control" value="{{$jovem->cep}}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Bairro</label>
          <input type="text" name="bairro"  class="form-control" value="{{$jovem->bairro}}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Registro de Identidade</label>
          <input type="text" name="rg"  class="form-control" value="{{$jovem->rg}}" required>
        </div>
        <div class="form-group col-md-3">
          <label>CPF</label>
          <input type="text" name="cpf"  class="form-control" value="{{$jovem->cpf}}" required>
        </div>
        <div class="form-group col-md-6">
          <label>NIS/PIS</label>
          <input type="text" name="nis_pis_pasep"  class="form-control" value="{{$jovem->nis_pis_pasep}}" required>
        </div>
        <div class="form-group col-md-6">
          <label>Carteira de Trabalho</label>
          <input type="text" name="carteira_trbalho"  class="form-control" value="{{$jovem->carteira_trbalho}}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Série</label>
          <input type="text" name="carteira_trbalho_serie"  class="form-control" value="{{$jovem->carteira_trbalho_serie}}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Expedição</label>
          <input type="text" name="carteira_trbalho_expedicao"  class="form-control" value="{{$jovem->carteira_trbalho_expedicao}}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Titulo Eleitoral</label>
          <input type="text" name="titulo_eleitoral"  class="form-control" value="{{$jovem->titulo_eleitoral}}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Zona</label>
          <input type="text" name="titulo_eleitoral_zona"  class="form-control" value="{{$jovem->titulo_eleitoral_zona}}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Seção</label>
          <input type="text" name="titulo_eleitoral_secao"  class="form-control" value="{{$jovem->titulo_eleitoral_secao}}" required>
        </div>
        <div class="form-group col-md-3">
          <label>Expedição</label>
          <input type="text" name="titulo_eleitoral_expedicao"  class="form-control" value="{{$jovem->titulo_expedicao}}" required>
        </div>
        <br>
        <div class="form-group col-md-12">
          <input type="submit"  class="btn btn-primary btn-lg btn-block" value="Alterar">
        </div>
      </form>
    </div>
    </div>
  </div>

<!--fotoJovem-->
<div class="row">
  <div class="col-md-4">
    <div class="box box-warning">
    <div class="box-header with-border">
    @if($errors->all())
      <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
          <li>
          {{ $error }}
          </li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{route('update', $jovem->id_jovem)}}" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="id" value="{{ $jovem->id }}">
      <h4> Alterar foto </h4>
      <div align="center">
        <img src="https://www.vocacao.org.br/jovemaprendiz/feedback-gestor/images/{{$jovem->id_jovem}}.jpg" alt="Foto_jovem" class="avatar">
        <br> <br>
        <input type="file" name="foto-aprendiz" class="btn btn-default"  accept="image/png, image/jpeg" multiple />
    </form>
    </div>
    </div>
  </div>
</div>
<!--FamiliaJovem
<div class="col-md-4">
  <div class="box box-warning">
  <div class="box-header with-border">
  <h4 class="box-title">Família</h4><br><br>
    <form action="{{route('update', $jovem->id_jovem)}}" method="patch" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group col-md-4">
          <label>#Parentesco</label>
          <input type="text" class="form-control" name="id_parentesco" value="">,
      </div>
      <div class="form-group col-md-8">
        <label>Parentesco</label>
        <input type="text" name="nome"  class="form-control" value="" required>
      </div>
      <div class="form-group col-md-12">
        <label>Nome</label>
        <input type="text" name="data_nascimento"  class="form-control" value="" required>
      </div>
      <div class="form-group col-md-6">
        <label>Celular</label>
        <input type="text" name="sexo"  class="form-control" value="" required>
      </div>
      <div class="form-group col-md-6">
        <label>Telefone</label>
        <input type="text" name="sexo"  class="form-control" value="" required>
      </div>
      <div class="form-group col-md-12">
        <label>Email</label>
        <input type="text" name="raca"  class="form-control" value="" required>
      </div>
      <div class="form-group col-md-12">
        <input type="submit"  class="btn btn-primary btn-lg btn-block" value="Alterar">
      </div>
      </form>
    </div>
    </div>-->


</section>

<style>
  .avatar {
   background: white;
   vertical-align: middle;
   width: 140px;
   height: 140px;
   border-radius: 50%;
  }
</style>

@stop
