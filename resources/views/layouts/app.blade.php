<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/logo.png')}}">

        <title>{{ config('app.name', 'Meri Bachat') }}</title>

        <link href="{{asset('assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">
        <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
        
        <link href="{{asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/extra-libs/calendar/calendar.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet">
        
        
        <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/jquery-minicolors/jquery.minicolors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quill/dist/quill.snow.css')}}">




        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net"> 
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    --}}

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>

        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">


        
            @include('layouts.navigation')
          
                        @include('layouts.sidebar') 

                        <div class="page-wrapper">
                            <div class="container-fluid">
                                
                                @include('layouts.flashmsg') 

                            @if(isset($slot))
                                {{ $slot }}
                            @else
              
                                @yield('app')
                            @endif
                            
                        </div>
                        </div>
        </div>
    
        <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
        <script src="{{asset('assets/extra-libs/sparkline/sparkline.js')}}"></script>
        <!--Wave Effects -->
        <script src="{{asset('dist/js/waves.js')}}"></script>
        <!--Menu sidebar -->
        <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
        <!--Custom JavaScript -->
        <script src="{{asset('dist/js/custom.min.js')}}"></script>
        <!--This page JavaScript -->
         <script src="{{asset('dist/js/pages/dashboards/dashboard1.js')}}"></script> 
        <!-- Charts js Files -->
        <script src="{{asset('assets/libs/flot/excanvas.js')}}"></script>
        <script src="{{asset('assets/libs/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('assets/libs/flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('assets/libs/flot/jquery.flot.time.js')}}"></script>
        <script src="{{asset('assets/libs/flot/jquery.flot.stack.js')}}"></script>
        <script src="{{asset('assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
        <script src="{{asset('assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('dist/js/pages/chart/chart-page-init.js')}}"></script>
        
        
        
        
    <script src="{{asset('dist/js/jquery.ui.touch-punch-improved.js')}}"></script>
    <script src="{{asset('dist/js/jquery-ui.min.js')}}"></script>
  
    <!-- this page js -->
    <script src="{{asset('assets/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('dist/js/pages/calendar/cal-init.js')}}"></script>
    <script src="{{asset('assets/libs/toastr/build/toastr.min.js')}}"></script>
    <script>
      /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

    </script>
    
    
        <!-- This Page JS -->
    <script src="{{asset('assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('dist/js/pages/mask/mask.init.js')}}"></script>
    <script src="{{asset('assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-minicolors/jquery.minicolors.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/libs/quill/dist/quill.min.js')}}"></script>
        
        
        
        
    
    </body>
    
    </html>
