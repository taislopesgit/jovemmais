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
<!--cadastrarOcorrencias-->
<section class="content">
  <div class="row">
    <div class="col-md-12">
    <div class="box box-warning">
      <div class="box-header with-border">
      <h4 class="box-title">Cadastrar ocorrência</h4>
      <br><br>
      <form action="{{route('salvar-ocorrencia')}}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="idTipoOcorrencia"># Tipo da Ocorrência</label>
              <select class="form-control" id="id_tipo_ocorrencia">
                <option>Selecione</option>
                @foreach($idTipoOcorrencia as $idTipo )
                <option value="{{$idTipo}}">{{$idTipo}}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group col-md-3">
            <label for="id_jovem">Id Jovem</label>
            <input type="text" class="form-control" id="id_jovem">
          </div>
          <div class="form-group col-md-3">
            <label for="id_jovem">Id Matricula</label>
            <input type="text" class="form-control" id="id_matricula">
          </div>
          <div class="form-group col-md-3">
            <label for="id_jovem">Responsável</label>
            <input type="text" class="form-control" id="id_matricula">
          </div>
          <div class="form-group col-md-12">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" rows="3"></textarea>
          </div>
        <br>
          <div class="form-group col-md-4">
          <button type="submit" class="btn btn-primary">Cadastrar ocorrência</button>
         </div>
      </form>
    </div>
  </div>
  </div>
<!--buscarOcorrencias-->
<div class="row">
<div class="col-md-12">
<div class="box box-warning">
    <div class="box-header with-border">
        <a class="accordion-toggle pull-right collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
        <i class="fa fa-search"></i>Filtrar
        </a>
        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <h4 class="box-title">Buscar ocorrência</h4>
            <div class="panel-body">
                <form action="{{route('cadastrar')}}"  method="post">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>ID Jovem</label>
                            <input type="search"  name="id" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>ID Ocorrência</label>
                            <input type="search"  name="id" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tipo Ocorrência</label>
                            <input type="search"  name="nome" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                            <label>Responsável</label>
                            <input type="search"  name="nome" class="form-control">
                        </div>
                    <div class="form-group col-md-6">
                        <label>Data inicio</label>
                        <input name="data-inicio" type="date" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Data fim</label>
                        <input name="data-fim" type="date" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <input type="submit"  class="btn btn-primary" value="Filtrar">
                    </div>
                    <div>
                    </div>
            </div>
        </div>
    </div>
    </form>
</div>
<!--relacaoOcorrencias-->
  <div class="row">
    <div class="col-md-12">
    <div class="box box-warning">
      <div class="box-header with-border">
      <h4 class="box-title">Relação ocorrências</h4>
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
                  </tr>
                  </thead>
                  <tr>
                  <tbody>
                  @foreach ($dadoOcorrencia as $ocorrencia)
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
                    @if (isset($dadosOcorrencia))
                    {{ $dadoOcorrencia->appends($dadosOcorrencia)->links() }}
                    @else
                    {{ $dadoOcorrencia->links() }}
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
