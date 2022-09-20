<header class="main-header">
    <a href="{{ url('inicio') }}" class="logo">
        <span class="logo-mini"><b>C D</b></span>
        <span class="logo-lg"><b>CLÍNICA DENTAL</b></span>
    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{auth()->user()->name}}
                        <span class="hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-primary">Mis datos</a>
                            </div>
    
                            <div class="pull-right">
                                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger btn-danger">Salir</a>
                            </div>

                            <form method="POST" id="logout-form" action="{{route('logout')}}">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>