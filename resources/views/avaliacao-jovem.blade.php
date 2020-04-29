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

   <div class="col-md-12">
   <div class="box box-warning">
      <div class="box-header with-border">
              <h3 class="box-title">Ocorrências</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Perfil</th>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    foreach($relatorioJovem as $ocorrencia)
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  
                  <td><img src="https://www.vocacao.org.br/jovemaprendiz/feedback-gestor/images/{{$ocorrencia->id_jovem}}.jpg" alt="Avatar" class="avatar"> /td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td><span class="label label-success">Shipped</span></td> 
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td> @endforeach
                  </tr>
                
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            
            <!-- /.box-footer -->
          </div>
   
</section>




@stop