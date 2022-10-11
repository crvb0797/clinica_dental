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
                <a href="{{ url('citas/'.auth()->user()->id) }}">
                    <i class="fa fa-medkit"></i>
                    <span>Citas</span>
                </a>
            </li>

            <li>
                <a href="{{ url('pacientes') }}">
                    <i class="fa fa-users"></i>
                    <span>Pacientes</span>
                </a>
            </li>
        </ul>
    </section>
</aside>