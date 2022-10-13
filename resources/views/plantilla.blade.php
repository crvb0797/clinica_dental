<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Clinica Dental</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">

  {{-- DATATABLES --}}
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/responsive.bootstrap.min.css')}}">

  {{-- FULLCALENDAR --}}
  <link rel="stylesheet" href="{{asset('bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/fullcalendar/dist/fullcalendar.print.css')}}" media="print">

  {{-- SELECT2 --}}
<link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">



  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini login-page">

@if (Auth::user())
<div class="wrapper">
  @include('modulos.cabecera')
  @if (auth()->user()->rol == "Secretaria")
      @include('modulos.menuSecretaria')
  @elseif(auth()->user()->rol == "Doctor")
    @include('modulos.menuDoctor')
  @elseif(auth()->user()->rol == "Paciente")
    @include('modulos.menuPaciente')
  @endif
  @yield('content')
</div>
@else
  @yield('contenido')
@endif

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('bower_components/morris.js/morris.min.js')}}""></script>
<!-- Sparkline -->
<script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

{{-- DATATABLES --}}
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/responsive.bootstrap.min.js')}}"></script>

{{-- FULLCALENDAR --}}
<script src="{{asset('bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="{{asset('bower_components/fullcalendar/dist/locale/es.js')}}"></script>
<script src="{{asset('bower_components/moment/moment.js')}}"></script>

{{-- SELECT2 --}}
<script src="{{asset('bower_components/select2/dist/js/select2.js')}}"></script>




{{-- DATATABLE --}}
<script>
  $(".table").DataTable({
    "language":{
      "sSearch": "Buscar:",
      "sEmptyTable": "No hay datos en la tabla",
      "sZeroRecords": "No se encontraron resultados",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total _TOTAL_",
      "sInfoEmpty": "Mostrando resgistros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtando de un total de _MAX_ resgistros)",
      "oPaginate":{
        "sFirst": "Primero",
        "sLast": "Ultimo",
        "sNext": "Siguiente",
        "sPrevious": "Anterior",
      },
      "sLoadingRecords": "cargando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
    }
  });

/* SELECT2 */ 
$('#select2').select2();
</script>



{{-- SWEETALERT2 --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('registrado') == "si")
  <script>
    Swal.fire(
      'El Doctor ha sido registrado',
      '',
      'success'
    )
  </script>

@elseif(session('agregado') == "si")
  <script>
    Swal.fire(
      'El paciente ha sido registrado',
      '',
      'success'
    )
  </script>

@elseif(session('actualizadoP') == "si")
<script>
  Swal.fire(
    'El paciente ha sido actualizado',
    '',
    'success'
  )
</script>
@endif

<script>
  $('.table').on('click', '.EliminarDoctor', function(){
    var Did = $(this).attr('Did');
    Swal.fire({
      title: '¿Desea eliminar este Doctor?',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Elminar',
      confirmButtonColor: '#3085d6'
    }).then((result) => {
      if(result.isConfirmed){
        window.location = "eliminar-doctor/"+Did;
      }
    }) 
  });


  $('.table').on('click', '.EliminarPaciente', function(){
    var Pid = $(this).attr('Pid');
    var Paciente = $(this).attr('Paciente');
    Swal.fire({
      title: '¿Desea eliminar este Paciente '+Paciente+'?',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Elminar',
      confirmButtonColor: '#3085d6'
    }).then((result) => {
      if(result.isConfirmed){
        window.location = "eliminar-paciente/"+Pid;
      }
    }) 
  })
</script>

<?php
  $exp = explode("/", $_SERVER["REQUEST_URI"]);
?>

@if($exp[1] == "citas")  

  <script>
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $('#calendario').fullCalendar({
      defaultView: 'agendaWeek',
      hiddenDays: [0,6],

    events:[
      @foreach($citas as $cita)
        @if(auth()->user()->rol == "Doctor")
          {
            id: '{{$cita->id}}',
            title: '{{$cita->PAC->name}}',
            start: '{{$cita->FyHinicio}}',
            end: '{{$cita->FyHfinal}}'
          },

        @elseif(auth()->user()->rol == "Paciente")
          @if($cita->id_paciente == auth()->user()->id)
            {
              id: '{{$cita->id}}',
              title: '{{$cita->PAC->name}}',
              start: '{{$cita->FyHinicio}}',
              end: '{{$cita->FyHfinal}}'
            },
          @else
            {
              id: '{{$cita->id}}',
              title: 'No disponible',
              start: '{{$cita->FyHinicio}}',
              end: '{{$cita->FyHfinal}}'
            },
          @endif
        @endif
      @endforeach
    ],  

      @if($horarios != null)
        scrollTime: "{{$hora->horaInicio}}",
        minTime: "{{$hora->horaInicio}}",
        maxTime: "{{$hora->horaFin}}",
      @else
      scrollTime: null,
        minTime: null,
        maxTime: null,
      @endif


      dayClick:function(date,jsEvent,view){

        var fecha = date.format();
        var hora = ("01:00:00").split(":");
        fecha = fecha.split("T");
        var hora1 = (fecha[1]).split(":");

        HI = parseFloat(hora1[0]);
        HA = parseFloat(hora[0]);


        var horaFinal = HI + HA;

        if(horaFinal < 10 && horaFinal > 0){
          var HF = "0" + horaFinal+":00:00";
        }else{
          var HF = horaFinal+":00:00"
        }

        n = new Date();
        y = n.getFullYear();
        m = n.getMonth()+1;
        d = n.getDate();

        if(m < 10) {
            M = "0"+m;
          if (d < 10) {
            D = "0"+d;
            diaActual = y + "-" + m + "-" + D;
          }else{
            var diaActual = y + "-" + m + "-" + d;
          }
        }else{
          diaActual = y + "-" + m + "-" + d;
        }

        if(diaActual <= fecha[0]){
        $('#CitaModal').modal();
        }

        $("#Fecha").val(fecha[0]);
        $("#Hora").val(hora1[0]+":00:00");
        $("#FyHinicio").val(fecha[0]+ " " +hora1[0]+":00:00");
        $("#FyHfinal").val(fecha[0]+ " " +HF);
      },

      eventClick:function(calEvent,jsEvent,view){
        if ("{{auth()->user()->rol}}" == "Doctor") {
          $('#EventoModal').modal();
        }

        $('#paciente').html(calEvent.title);
        $('#idCita').val(calEvent.id);
      }
    });
  </script>
@endif



</body>
</html>
