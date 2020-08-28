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
                <i class="fa fa-user-plus"></i>&nbsp;&nbsp;Cadastrar Jovem
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
        <form method="post" action="{{ route('salva-jovem') }}">
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
              <div class="form-group  col-md-4" >
                <label>Estado Cívil</label>
                <select id="estado_civil" class="form-control" name="estado_civil">
                  <option value="solteiro">Solteiro (a)</option>
                  <option value="casado">Casado (a)</option>
                  <option value="divorciado">Divorciado (a)</option>
                  <option value="separado">Separado(a)</option>
                </select>
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

<!--endereco-->
      <div class="tab-pane" id="endereco">
      <div class="row">
        <div class="col-md-12">
        <div class="form-group col-md-4">
          <label for="cep">CEP</label>
          <input type="text" class="form-control" name="cep" id="cep">
        </div>
        <div class="form-group col-md-6">
          <label for="logradouro">Endereço</label>
          <input type="text" class="form-control" name="endereco" id="logradouro" >
        </div>
        <div class="form-group col-md-1">
          <label for="numero">Número</label>
          <input type="text" class="form-control" name="numero" id="numero" >
        </div>
        <div class="form-group col-md-1">
          <label>UF</label>
          <select id="uf" class="form-control" name="uf_naturalidade">
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
          </select>

        </div>
        <div class="form-group col-md-4">
          <label for="complemento">Complemento</label>
          <input type="text" class="form-control" name="Complemento" id="complemento" >
        </div>
        <div class="form-group col-md-4">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" name="bairro" id="bairro" >
        </div>
        <div class="form-group col-md-4">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" name="cidade" id="cidade">
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
      <div class="form-group col-md-3">
          <label>Registro de identidade</label>
          <input type="text" class="form-control" name="rg">
        </div>
        <div class="form-group col-md-3">
          <label>Orgão de expedição</label>
          <input type="text" class="form-control" name="rg_orgao_expedidor">
        </div>
        <div class="form-group col-md-3">
          <label>Data de expedição</label>
          <input type="date" class="form-control" name="rg_data_expedicao">
        </div>
        <div class="form-group col-md-3">
          <label>CPF</label>
          <input type="text" class="form-control" name="cpf">
        </div>
        <div class="form-group col-md-3">
          <label>Reservista</label>
          <input type="text" class="form-control" name="reservista">
        </div>
        <div class="form-group col-md-3">
          <label>Carteira de Trabalho</label>
          <input type="text" class="form-control" name="carteira_trabalho">
        </div>
        <div class="form-group col-md-3 ">
          <label>Série</label>
          <input type="text" class="form-control" name="carteira_trabalho_serie">
        </div>
        <div class="form-group col-md-3">
          <label>Data de expedição</label>
          <input type="date" class="form-control" name="carteira_trabalho_data_expedicao">
        </div>
        <div class="form-group col-md-3">
          <label>PIS</label>
          <input type="text" class="form-control" name="nis_pis_pasep">
        </div>
        <div class="form-group col-md-3">
          <label>Cadastro único</label>
          <input type="text" class="form-control" name="cadunico">
        </div>
        <div class="form-group col-md-3">
          <label>Titulo Eleitoral</label>
          <input type="text" class="form-control" name="titulo_eleitoral">
        </div>
        <div class="form-group col-md-3">
          <label>Zona</label>
          <input type="text" class="form-control" name="titulo_eleitoral_zona">
        </div>
        <div class="form-group col-md-3">
          <label>Seção</label>
          <input type="text" class="form-control" name="titulo_eleitoral_secao">
        </div>
        <div class="form-group col-md-3">
          <label>Data Expedição</label>
          <input type="date" class="form-control" name="titulo_eleitoral_data_expedicao">
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
          <button class="btn btn-primary" type="submit">Cadastrar</button>
        <div>
    </div>
    <br>
    <a href="#endereco" data-toggle="tab" aria-expanded="true" class="previous round">&#8249;</a>
</div>
</form>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	$("#cep").focusout(function(){
		//Início do Comando AJAX
		$.ajax({
			//O campo URL diz o caminho de onde virá os dados
			//É importante concatenar o valor digitado no CEP
			url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
			//Aqui você deve preencher o tipo de dados que será lido,
			//no caso, estamos lendo JSON.
			dataType: 'json',
			//SUCESS é referente a função que será executada caso
			//ele consiga ler a fonte de dados com sucesso.
			//O parâmetro dentro da função se refere ao nome da variável
			//que você vai dar para ler esse objeto.
			success: function(resposta){
				//Agora basta definir os valores que você deseja preencher
				//automaticamente nos campos acima.
				$("#logradouro").val(resposta.logradouro);
				$("#complemento").val(resposta.complemento);
				$("#bairro").val(resposta.bairro);
				$("#cidade").val(resposta.localidade);
				$("#uf").val(resposta.uf);
				//Vamos incluir para que o Número seja focado automaticamente
				//melhorando a experiência do usuário
				$("#numero").focus();
			}
		});
	});
</script>





@stop
