document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;

 

  
    /*var items = {!! $pesquisa->toJson() !!};
    const resposta = [];
    const quantidade = [];
 
    var total = 0;
    items.forEach(function(item){
       total = total + item.qtd;
    });
 
    items.forEach(function(item){
       resposta.push(item.resposta);
       quantidade.push(((item.qtd * 100) / total).toFixed(2));
    });
*/


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

