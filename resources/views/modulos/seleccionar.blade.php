@extends('plantilla')

@section('contenido')
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Encuentra a tu desntista ideal desde la comodidad de tu casa">
        <meta name="author" content="Universidad Mariano Galvez de Guatemala">
        <title>Clinica Dental San Juan Apostol</title>


        <!-- GOOGLE WEB FONT -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet">

        <!-- BASE CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vendors.css') }}" rel="stylesheet">
        <link href="{{ asset('css/icon_fonts/css/all_icons_min.css') }}" rel="stylesheet">

    </head>

    <body>

        <div class="layer"></div>
        <!-- Mobile menu overlay mask -->

        <div id="preloader">
            <div data-loader="circle-side"></div>
        </div>
        <!-- End Preload -->

        <header class="header_sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div id="logo_home">
                            <h1><a href="/" title="Findoctor">Clinica Dental San Juan Apostol</a></h1>
                        </div>
                    </div>
                    <nav class="col-lg-9 col-6">
                        <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu
                                mobile</span></a>
                        <ul id="top_access">
                            <li><a href="{{ route('login') }}"><i class="pe-7s-user"></i></a></li>
                        </ul>
                        <!-- /main-menu -->
                    </nav>
                </div>
            </div>
            <!-- /container -->
        </header>
        <!-- /header -->

        <main>
            <div class="hero_home version_1">
                <div class="content">
                    <h3>Encuentra a tu dentista ideal!</h3>
                    <p>
                        Has tu cita de forma totalmente gratuita con el dentista de tu preferencia
                    </p>
                </div>
            </div>
            <!-- /Hero -->

            <div class="container margin_120_95">
                <div class="main_title">
                    <h2>Descubre las citas <strong>online</strong>!</h2>
                    <p>Ten tu propia cuenta dentro de la plataforma y lleva el control de tus citas dentro del historial de
                        tu perfil</p>
                </div>
                <div class="row add_bottom_30">
                    <div class="col-lg-4">
                        <div class="box_feat" id="icon_1">
                            <span></span>
                            <h3>Encuentra a tu dentista</h3>
                            <p>Encuentra a un dentista de tu preferencia</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box_feat" id="icon_2">
                            <span></span>
                            <h3>Revisa sus horarios</h3>
                            <p>Revisa los horarios de los doctores y programa tu cita</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box_feat" id="icon_3">
                            <h3>Agenda tu cita</h3>
                            <p>Agenda tu cita con tan solo 1 clic</p>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->

            <div class="bg_color_1">
                <div class="container margin_120_95">
                    <div class="main_title">
                        <h2>Nuestros productos y servicios</h2>
                        <p>Estos son las promociones del mes, de la semana o del día se actualizan todos los días</p>
                    </div>
                    <div id="reccomended" class="owl-carousel owl-theme">
                        @foreach ($posts as $post)
                            <div class="item">
                                <a href="detail-page.html">
                                    <div class="title">
                                    </div>
									
									@if ($post->image)
										<img src="{{Storage::url($post->image->url)}}" alt="{{$post->name}}">
									@else
										<img src="http://via.placeholder.com/350x500.jpg" alt="...">
									@endif
                                </a>
                            </div>
                        @endforeach

                    </div>
                    <!-- /carousel -->
                </div>
                <!-- /container -->
            </div>
            <!-- /white_bg -->
        </main>
        <!-- /main content -->

        <footer>
            <div class="container margin_60_35">
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div id="copy">© 2022 Clinica Dental San Juan Apostol</div>
                    </div>
                </div>
            </div>
        </footer>
        <!--/footer-->

        <div id="toTop"></div>
        <!-- Back to top button -->

        <!-- COMMON SCRIPTS -->
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('js/common_scripts.min.js') }}"></script>
        <script src="{{ asset('js/functions.js') }}"></script>

    </body>

    </html>
@endsection
