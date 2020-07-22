@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')


<section class="content-header">
    <h2>
        Jovem+
    </h2>
    <br>
    <ol class="breadcrumb">
        <li><a href="/inicial"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Perfil</li>
    </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
          <div class="box box-warning">
            <div class="box-header with-border">

                <div id='calendar'></div>
                 <div id='external-events-list'>
                  </div>
                   
         </div>
            </div>
                 </div>
</section>
  

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

<script> 

document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;

   /* iniciar calendario
    -----------------------------------------------------------------*/
    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
      locale:'pt-br',
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
     
      navLinks: true,
      eventLimit: true,
      selectable: true,
      editable: true,
      droppable: true, //inserir evento no calendario
      

      eventDrop: function(event) {
            alert('eventDrop');
      },
      eventClick: function(event) {
        alert('ao clicR');
    
        },
        eventReisze: function(event) {
            alert('aumentar qtd dia');

        },
      events:  '',
      



    });
    calendar.render();

  });

  </script>
@stop