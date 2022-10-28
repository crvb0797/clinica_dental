<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ url('inicio') }}">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>


            <li>
                <a href="{{ url('consultorios') }}">
                    <i class="fa fa-medkit"></i>
                    <span>Consultorios</span>
                </a>
            </li>

            <li>
                <a href="{{ url('doctores') }}">
                    <i class="fa fa-user-md"></i>
                    <span>Doctores</span>
                </a>
            </li>

            <li>
                <a href="{{ url('pacientes') }}">
                    <i class="fa fa-users"></i>
                    <span>Pacientes</span>
                </a>
            </li>
            <li>
                <a href="{{ url('secretarias') }}">
                    <i class="fa fa-female"></i>
                    <span>Secretarias</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.posts.index') }}">
                    <i class="fa fa-th-list"></i>
                    <span>Publicaciones</span>
                </a>
            </li>
        </ul>
    </section>
</aside>