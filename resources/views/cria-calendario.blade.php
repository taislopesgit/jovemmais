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

@if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

<div class="row">
  <div class="col-md-12">
    <div class="box box-warning">
        <div class="box-header with-border">
        <table class="table">

        </div>
     </div>
  </div>

</section>
@stop
