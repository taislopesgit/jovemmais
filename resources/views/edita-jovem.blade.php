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
<div class="col-md-8">
   <div class="box box-warning">
      <div class="box-header with-border">
      <br>
<h4 class="box-title">Editar dados</h4>
<br>
<br>          <div class="row">
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
       
            <form action="{{route('edit', $jovem->id_jovem)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $jovem->id }}">
                
                <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>ID</label>
                            <input type="text" class="form-control" name="id" value="{{ $jovem->id_jovem }}">
                        </div>
                        <div class="form-group col-md-8">
                            <label> Nome</label>
                            <input type="text" name="nome"  class="form-control" value="{{ $jovem->nome }}" required>
                            
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
                        
                        <div align="center">
                        <div class="form-group col-md-12">
                        <br> <br>
                        <input type="submit"  class="btn btn-primary btn-lg btn-block" value="Alterar">
                    </div></div>
            </form>
    </div>
    </div>
    </div>
    </div>
    </div>
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
       
            <form action="{{route('edit', $jovem->id_jovem)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $jovem->id }}">
            <h4> Alterar foto </h4>
            <div align="center">
            <img src="https://www.vocacao.org.br/jovemaprendiz/feedback-gestor/images/{{$jovem->id_jovem}}.jpg" alt="Avatar" class="avatar">
            <br> <br>
            <input type="file" name="foto-aprendiz" class="btn btn-default"  accept="image/png, image/jpeg" multiple /> 
            </div>

            </form>
    </div>
</section>

<style>

.avatar {
  background: white;
  vertical-align: middle;
  width: 180px;
  height: 180px;
  border-radius: 50%;
 

}


</style>

@stop


