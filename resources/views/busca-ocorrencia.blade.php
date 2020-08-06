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
          <h4 class="box-title">Buscar ocorrência</h4>
            <form action="{{route('busca-ocorrencia')}}"  method="post">
              {{ csrf_field() }}
              <div class="form-row">
                    <div class="form-group col-md-4">
                      <label>#Jovem</label>
                      <input type="search"  name="id_jovem" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                      <label>#Ocorrência</label>
                      <input type="search"  name="id_ocorrencia" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                      <label># Tipo ocorrência</label>
                      <input type="search"  name="id_tipo_ocorrencia" class="form-control">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Responsável</label>
                    <input type="search"  name="responsavel" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Data de criação</label>
                    <input name="criado_em" type="date" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Descrição</label>
                    <input name="data-inicio" type="search" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                  <button class="btn btn-primary" type="submit">Buscar</button>
                  </div>
                  <div>
                  </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <!--resultado-->
  <div class="row">
  <div class="col-md-12">
  <div class="box box-warning">
    <div class="box-header with-border"></div>
      <h4 class="box-title">Resultado busca</h4>
      <br><br>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr class="color">
              <th class="align-middle text-center">Perfil</th>
              <th class="align-middle text-center">ID Jovem</th>
              <th class="align-middle text-center">Tipo</th>
              <th class="align-middle text-center">Descrição</th>
              <th class="align-middle text-center">Responsável</th>
              <th class="align-middle text-center">Criado em</th>
            </tr>
          </thead>
          <tr>
          <tbody>
            @foreach ($ocorre as $ocorrencia)
            <td class="align-middle text-center"><img src="https://www.vocacao.org.br/jovemaprendiz/feedback-gestor/images/{{$ocorrencia->id_jovem}}.jpg" alt="FotoJovem" class="avatar"> </t>
            <td class="align-middle text-center">{{$ocorrencia->id_jovem}}</td>
            <td class="align-middle text-center">{{$ocorrencia->id_tipo_ocorrencia}}</td>
            <td class="align-middle text-center">{{$ocorrencia->descricao}}</td>
            <td class="align-middle text-center">{{$ocorrencia->responsavel}}</td>
            <td class="align-middle text-center">{{date( 'd/m/Y' , strtotime($ocorrencia->criado_em))}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="box-tools">
        @if (isset($filtroOcorrencia))
        {{ $ocorre->appends($filtroOcorrencia)->links() }}
        @else
        {{ $ocorre->links() }}
        @endif
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
