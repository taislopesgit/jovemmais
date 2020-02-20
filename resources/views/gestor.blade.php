<<<<<<< HEAD
@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
<section class="content-header">
    <h2>
        Jovem+
    </h2>
    <ol class="breadcrumb">
        <li><a href="/jovem"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Perfil</li>
    </ol>
</section>
@stop
@section('content')
=======
@extends('adminlte::page') @section('title', 'AdminLTE') @section('content_header')
>>>>>>> ed3e3108c46b3ab9969a6adfa7ee778cb1176bee

<section class="content">
   
    @foreach ($gestores as $gestor)
    <h4> Bem vindo(a), {{$gestor->nome}}</h4>
    @endforeach <br>

    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Feedback Jovens</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-wrench"></i></button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-8">
               
               </div>
          </div>
        </div>
      </div>

    <!-- Main row -->
    <div class="row">
              <div class="col-md-3">
                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-yellow">
                  <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
        
                  <div class="info-box-content">
                    <span class="info-box-text">Inventory</span>
                    <span class="info-box-number">5,200</span>
        
                    <div class="progress">
                      <div class="progress-bar" style="width: 50%"></div>
                    </div>
                    <span class="progress-description">
                          50% Increase in 30 Days
                        </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-green">
                  <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
        
                  <div class="info-box-content">
                    <span class="info-box-text">Mentions</span>
                    <span class="info-box-number">92,050</span>
        
                    <div class="progress">
                      <div class="progress-bar" style="width: 20%"></div>
                    </div>
                    <span class="progress-description">
                          20% Increase in 30 Days
                        </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-red">
                  <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
        
                  <div class="info-box-content">
                    <span class="info-box-text">Downloads</span>
                    <span class="info-box-number">114,381</span>
        
                    <div class="progress">
                      <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                          70% Increase in 30 Days
                        </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-aqua">
                  <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
        
                  <div class="info-box-content">
                    <span class="info-box-text">Direct Messages</span>
                    <span class="info-box-number">163,921</span>
        
                    <div class="progress">
                      <div class="progress-bar" style="width: 40%"></div>
                    </div>
                    <span class="progress-description">
                          40% Increase in 30 Days
                        </span>
                  </div>
                  <!-- /.info-box-content -->
                </div> </div>
       

          <div class="col-md-9">
           
        <!-- TABLE: JOVENS -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Jovens responsável</h3>

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
                    <tr>
                        <th class="align-middle text-center">ID</th>
                        <th class="align-middle text-center">Nome</th>
                        <th class="align-middle text-center">Sexo</th>
                        <th class="align-middle text-center">Email</th>
                        <th class="align-middle text-center">Cliente</th>
                        <th class="align-middle text-center">Data de nascimento</th>
                        <th class="align-middle text-center">Data de matrícula</th>
                        <th class="align-middle text-center">Status</th>
                        <th class="align-middle text-center">&nbsp;</th>
                    </tr>
                    @foreach ($gestores as $gestor)
                    <tr>
                        <td class="align-middle text-center">{{$gestor->id_jovem}}</td>
                        <td class="align-middle text-center">{{$gestor->nome}}</td>
                        <td class="align-middle text-center">{{$gestor->sexo}}</td>
                        <td class="align-middle text-center">{{$gestor->email}}</td>
                        <td class="align-middle text-center">{{$gestor->empresa}}</td>
                        <td class="align-middle text-center">
                            {{date( 'd/m/Y' , strtotime($gestor->data_nascimento))}}
                        </td>
                        </td>
                        <td class="align-middle text-center">
                            {{date( 'd/m/Y' , strtotime($gestor->data_inicio))}}
                        </td>
                        <td class="align-middle text-center">
                            @if (
                            !is_null($gestor->data_desligamento)
                            )
                            <small class="label bg-red">Inativo</small>
                            @else
                            <small class="label bg-olive">Ativo</small>
                            @endif
                        </td>
                        
                        <td class="align-middle text-center"> </td>
                        <td class="align-middle text-center">
                            <a href="{{route('show', $gestor->id_jovem)}}" class="text-blue" title="Visualizar" data-toggle="tooltip" data-placement="top">
                            <i class="fa fa-eye">&nbsp;</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </thead>
               
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
         
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->

      
       

       
  </section>

@stop