@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
<section class="content-header">
   <h2>
      Jovem+
   </h2>
   <ol class="breadcrumb">
      <li><a href="inicial"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Perfil</li>
   </ol>
</section>
@stop
@section('content')

<div class="row">
<div class="col-md-12">
<div class="box">
    <div class="box-header with-border">
        <a class="accordion-toggle pull-right collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
        <i class="fa fa-arrow-alt-circle-up"></i>
        </a>
        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <h4 class="box-title">Nova ocorrência</h4>
            <div class="panel-body">
            <form action=""  method="post">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>ID Jovem</label>
                            <input type="search"  name="id" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label>ID Ocorrência</label><select class="form-control" name="id_ocorrencia">
                            <option selected></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Tipo</label>
                        <select class="form-control" name="tipo_ocorrencia">
                            <option selected></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Descrição</label>
                        <input name="descricao" type="textsubmit" class="form-control">
                    </div>

                    <div class="form-group col-md-3">
                        <input type="submit"  class="btn btn-primary" value="Registrar">
                    </div>  
                    </form>
                    </div>
            </div>
        </div>
        </div>
        </div>
        <div class="col-md-12">
   <div class="box box-warning">
      <div class="box-header with-border">
              <h3 class="box-title">Relação Ocorrências</h3>
              <br> <br>
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th class="align-middle text-center">Perfil</th>
                    <th class="align-middle text-center">ID Jovem</th>
                    <th class="align-middle text-center">ID Ocorrência</th>
                    <th class="align-middle text-center">Tipo</th>
                    <th class="align-middle text-center">Descrição</th>
                    <th class="align-middle text-center">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <td class="align-middle text-center"><img src=https://image.freepik.com/vetores-gratis/perfil-de-avatar-de-homem-no-icone-redondo_24640-14044.jpg alt="Avatar" class="avatar"></td>
                  <td class="align-middle text-center">3102</td>
                  <td class="align-middle text-center">13</td>
                  <td class="align-middle text-center">Crachá</td>
                  <td class="align-middle text-center">Esquecimento frenquente de crachá</td>
                    <td class="align-middle text-center"><span class="label label-success">Concluida</span></td> 
                    <td class="align-middle text-center">
                      <div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                   </td>                    
                  </tr>
                  </tbody>
                </table>
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