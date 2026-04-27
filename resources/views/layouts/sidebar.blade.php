<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
   <ul class="nav navbar-nav side-nav">
        <li class="active">
            <a href="{{ url('/home') }}"><i class="fa fa-fw fa-dashboard"></i> Início</a>
        </li>
        <li>
            <a href="{{ url('/patient') }}"><i class="fa fa-fw fa-address-card-o"></i> Pacientes</a>
        </li>
       
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-wrench"></i> Configurações <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="{{ url('/unit') }}">Unidades</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ url('/user') }}"><i class="fa fa-fw fa-user"></i> Usuários</a>
        </li>
        <li>
            <a href="{{ url('/password/'.session()->get('user')['id']) }}"><i class="fa fa-fw fa-refresh"></i> Trocar Senha</a>
        </li>
   </ul>
</div>
