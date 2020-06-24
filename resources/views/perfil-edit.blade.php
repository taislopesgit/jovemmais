@extends('adminlte::page') @section('title', 'AdminLTE') @section('content_header')
<section class="content-header">
    <h2> Jovem+</h2>
    <ol class="breadcrumb">
        <li><a href="inicial"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Perfil</li>
    </ol>
</section>
<section class="content">
<div class="row">
    <div class="col-md-12">
    <div class="row">
            <div class="box-body box-profile">
   <h4> Bem vindo(a), {{$jovem->nome}}</h4>
   <br>
        <div class="box box-solid box-primary">
            <div class="box-header">
            
                <h3 class="box-title">Atualizar dados</h3>
            </div>
            <form action="{{route('atualizar', $jovem->id_jovem)}}"  method="post">
                    {{ csrf_field() }}

               

            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error')}}
            </div>
            @endif

            <div class="box box-solid ">
            <div class="box-header">
                <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>ID</label>
                            <input type="text" class="form-control" name="id" value="{{$jovem->id_jovem}}">
                        </div>
                        <div class="form-group col-md-8">
                            <label> Nome</label>
                            <input type="text" name="nome"  class="form-control" value="{{$jovem->nome}}" required>
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="text" name="email"  class="form-control" value="{{$jovem->email}}" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Celular</label>
                            <input type="text" name="celular"  class="form-control" value="{{$jovem->celular}}"required>
                            
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
                            <input type="text" name="endereco"  class="form-control" value="{{$jovem->numero}}"  required>
                            
                        </div>
                        <div class="form-group col-md-3">
                            <label>CEP</label>
                            <input type="text" name="cep"  class="form-control" value="{{$jovem->cep}}" required>
                            
                        </div>
                        <div class="form-group col-md-3">
                            <label>Bairro</label>
                            <input type="text" name="bairro"  class="form-control" value="{{$jovem->bairro}}"  required>
                        </div>
                        <br>  <br> <br> 
                        <div class="form-group col-md-3">
                        <div>
                        <button type="submit" class="btn btn-primary">Voltar</button>
                            
                        </div> 
                        <div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>  
                        </div>
                    </div>
                    </div>
            </form>
    </div>
    </div>
</section>
<style>
div > div {
    display: inline-block;
}
</style>
@stop