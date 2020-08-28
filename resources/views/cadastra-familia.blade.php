@extends('adminlte::page') @section('title', 'AdminLTE') @section('content_header')
<section class="content-header">
  <h2>Jovem+</h2>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Perfil</li>
  </ol>
</section>

<section class="content">

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

<div class="row">
  <div class="col-md-12">
    <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active">
        <a href="#pessoal" data-toggle="tab" aria-expanded="true">
          <i class="fa fa-user-plus"></i>&nbsp;&nbsp;Cadastrar Familiares
        </a>
      </li>
      <li class="">
        <a href="#contato" data-toggle="tab" aria-expanded="false"></a>
      </li>
      <li class="">
        <a href="#trabalhista" data-toggle="tab" aria-expanded="false"></a>
      </li>
      <li class="">
        <a href="#emprego" data-toggle="tab" aria-expanded="false"></a>
      </li>
    </ul>
    <div class= "tab-content">
     <!--pessoal-->
      <div class="tab-pane active" id="pessoal">
        <div class="row">
          <div class="col-md-12">
            <form method="post" action="{{ route('salva-familia') }}">
            {{ csrf_field() }}
              <div class="form-group col-md-3">
                <label>Jovem</label>
                  <select id="id_jovem" class="form-control" name="id_jovem">
                    @foreach($idJovem as $jovem)
                    <option value="{{$jovem->id_jovem}}">{{$jovem->nome}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group col-md-2">
                <label>Parentesco</label>
                  <select id="id_parentesco" class="form-control" name="id_parentesco">
                    @foreach($idParentesco as $parente)
                    <option value="{{$parente->id_parentesco}}">{{$parente->nome}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group col-md-3" >
                <label>Nome</label>
                <input type="text" class="form-control" name="nome">
              </div>
              <div class="form-group col-md-2" >
                <label>Data de Nascimento</label>
                <input type="date" class="form-control" name="data_nascimento">
              </div>
              <div class="form-group col-md-2">
                <label >Sexo</label>
                  <select id="sexo" class="form-control" name="sexo">
                    <option value="feminino">Feminino</option>
                    <option value="masculino">Masculino</option>
                  </select>
              </div>
              <div class="form-group  col-md-2" >
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
              <div class="form-group  col-md-2">
                <label>Deficiente</label>
                  <select id="deficiente" class="form-control" name="deficiente">
                    <option value="sim">Sim</option>
                    <option value="não">Não</option>
                  </select>
              </div>
              <div class="form-group col-md-2">
                <label>Tipo de deficiência </label>
                <input type="text" class="form-control" name="deficiencia_tipo">
              </div>
              <div class="form-group col-md-2" >
                <label>Lateralidade</label>
                <input type="text" class="form-control" name="lateralidade">
              </div>
              <div class="form-group  col-md-2" >
                <label>Estado Cívil</label>
                <select id="estado_civil" class="form-control" name="estado_civil">
                  <option value="solteiro">Solteiro (a)</option>
                  <option value="casado">Casado (a)</option>
                  <option value="divorciado">Divorciado (a)</option>
                  <option value="separado">Separado(a)</option>
                </select>
              </div>
              <div class="form-group col-md-1">
                <label>Nacionalidade</label>
                <input type="text" class="form-control" name="nacionalidade">
              </div>
              <div class="form-group col-md-1">
                <label>Naturalidade</label>
                <input type="text" class="form-control" name="naturalidade">
              </div>
              <br>
              <a href="#contato" data-toggle="tab" aria-expanded="true" class="next round">&#8250;</a>
          </div>
        </div>
      </div>
     <!--contato-->
              <div class="tab-pane" id="contato">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group col-md-6">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Telefone</label>
                      <input type="text" class="form-control" name="telefone">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Celular</label>
                      <input type="text" class="form-control" name="celular">
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
                    <div class="form-group col-md-2">
                      <label>Registro de identidade</label>
                      <input type="text" class="form-control" name="rg">
                     </div>
                    <div class="form-group col-md-2">
                      <label>Orgão de expedição</label>
                      <input type="text" class="form-control" name="rg_orgao_expedidor">
                    </div>
                    <div class="form-group col-md-2">
                      <label>Data de expedição</label>
                      <input type="date" class="form-control" name="rg_data_expedicao">
                    </div>
                    <div class="form-group col-md-2">
                      <label>CPF</label>
                      <input type="text" class="form-control" name="cpf">
                    </div>
                    <div class="form-group col-md-2">
                      <label>Reservista</label>
                      <input type="text" class="form-control" name="reservista">
                    </div>
                    <div class="form-group col-md-2">
                      <label>Carteira de Trabalho</label>
                      <input type="text" class="form-control" name="carteira_trabalho">
                    </div>
                    <div class="form-group col-md-2 ">
                      <label>Série</label>
                      <input type="text" class="form-control" name="carteira_trabalho_serie">
                    </div>
                    <div class="form-group col-md-2">
                      <label>Data de expedição</label>
                      <input type="date" class="form-control" name="carteira_trabalho_data_expedicao">
                    </div>
                    <div class="form-group col-md-2">
                      <label>PIS</label>
                      <input type="text" class="form-control" name="nis_pis_pasep">
                    </div>
                    <div class="form-group col-md-2">
                      <label>Cadastro único</label>
                      <input type="text" class="form-control" name="cadunico">
                    </div>
                    <div class="form-group col-md-2">
                      <label>Titulo Eleitoral</label>
                      <input type="text" class="form-control" name="titulo_eleitoral">
                    </div>
                    <div class="form-group col-md-2">
                      <label>Zona</label>
                      <input type="text" class="form-control" name="titulo_eleitoral_zona">
                    </div>
                    <div class="form-group col-md-2">
                      <label>Seção</label>
                      <input type="text" class="form-control" name="titulo_eleitoral_secao">
                    </div>
                    <div class="form-group col-md-2">
                      <label>Data Expedição</label>
                      <input type="date" class="form-control" name="titulo_eleitoral_data_expedicao">
                    </div>
                    <div class="form-group col-md-12">
                    <a href="#contato" data-toggle="tab" aria-expanded="true" class="previous round">&#8249;</a>
                    <a href="#emprego" data-toggle="tab" aria-expanded="true" class="next round">&#8250;</a>
                    </div>
                  </div>
                </div>
              </div>
    <!--emprego-->
                <div class="tab-pane" id="emprego">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group col-md-4">
                        <label>Está trabalhando?</label>
                          <select class="form-control" name="status_emprego">
                            <option value="sim">Sim</option>
                            <option value="não">Não</option>
                          </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label>Situação trabalhista</label>
                        <input type="text" class="form-control" name="status_emprego_registro">
                      </div>
                      <div class="form-group col-md-5">
                        <label>Por que não trabalha?</label>
                        <input type="text" class="form-control" name="porque_nao_trabalha">
                      </div>
                      <div class="form-group col-md-1" >
                      <label>Criado por</label>
                        <select id="criado_por" class="form-control" name="criado_por">
                        @foreach($idUsuario as $usuario)
                          <option value="{{$usuario->name}}">{{$usuario->name}}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-12">
                      <a href="#trabalhista" data-toggle="tab" aria-expanded="true" class="previous round">&#8249;</a>
                      <button class="btn btn-success" type="submit">Cadastrar</button>
                      </div>
                </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
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
