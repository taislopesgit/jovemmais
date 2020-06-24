@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')


<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
            <div id='calendar'></div> 

         

      <div id='external-events-list'>
    
      </div>

      
    </div>
    </div>
    </div>
    </div>

    
  

<link href='{{asset('assets/fullcalendar/packages/core/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/fullcalendar/packages/daygrid/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/fullcalendar/packages/timegrid/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/fullcalendar/packages/list/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/fullcalendar/css/style.css')}}' rel='stylesheet' />

<script src='{{asset('assets/fullcalendar/packages/core/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/interaction/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/daygrid/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/timegrid/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/list/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/core/locales/pt-br.js')}}'></script>
<script src='{{asset('assets/fullcalendar/js/calendar.js')}}'></script>

@stop