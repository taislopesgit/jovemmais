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
<div class="row">
    <div class="box-header with-border">
        </div>
        </div>
   <div class="box box-warning">
      <div class="box-header with-border">
              <div class="table-responsive">
              <table class="table table-striped">
                  <thead>
                  <tr class="color">
                    <th class="align-middle text-center">Perfil</th>
                    <th class="align-middle text-center">ID Jovem</th>
                    <th class="align-middle text-center">Tipo</th>
                    <th class="align-middle text-center">Descrição</th>
                    <th class="align-middle text-center">Responsável</th>
                  </tr>
                  </thead>
                  <tr>
                  <tbody>
                  @foreach ($verOcorrencia as $ocorrencia)
                  <td class="align-middle text-center"> <img src="https://www.vocacao.org.br/jovemaprendiz/feedback-gestor/images/{{$ocorrencia->id_jovem}}.jpg" alt="Avatar" class="avatar"> </t>
                  <td class="align-middle text-center">{{$ocorrencia->id_jovem}}</td>
                  <td class="align-middle text-center">{{$ocorrencia->nome}}</td>
                  <td class="align-middle text-center">{{$ocorrencia->descricao}}</td>
                  <td class="align-middle text-center">{{$ocorrencia->responsavel}}</td>
                  </tr> @endforeach
                  </tbody>
                </table>
              </div>
              <div class="box-tools">
                    @if (isset($ocorrenciaJovem))
                    {{ $verOcorrencia->appends($ocorrenciaJovem)->links() }}
                    @else
                    {{ $verOcorrencia->links() }}
                    @endif
            </div>

</section>

<style>
.avatar {
    vertical-align: middle;
    width: 50px;
    height: 50px;
    border-radius: 50%;
}

.color{
  background-color: #E4E3E3;
}
</style>


@stop
