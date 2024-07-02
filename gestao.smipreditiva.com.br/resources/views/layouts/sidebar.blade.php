<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#" > <image class="imagem" src="{{ url('img/smi_logo.png') }}" height="50" width="120"></image>   Painel Gerencial</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>




    <!-- Navbar -->
    @if(Session::get('perfil') == 1 )
    <ul class="navbar-nav ml-auto ml-md-12">

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ url('/alterarsenha') }}">Alterar Senha</a>
                <a class="dropdown-item" href="{{ url('/registrar') }}">Registrar Usuário</a>
                <a class="dropdown-item" href="{{ url('/editar') }}">Editar Usuário</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/logout') }}" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>
        @endif

    @if(Session::get('perfil') == 2 )
        <ul class="navbar-nav ml-auto ml-md-12">

            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ url('/alterarsenha') }}">Alterar Senha</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/logout') }}" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
        </ul>
    @endif

</nav>

<div id="wrapper">



    @if(Session::get('perfil') == 1 )

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('/home') }}">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-clipboard-list"></i>
                <span>Formulários</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Formularios</h6>
                <a class="dropdown-item" href="{{ url('/ocorrencia') }}">Analise de Vibração</a>
                <a class="dropdown-item" href="{{ url('/lubrificacao') }}">Lubrificação de maquinas</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Consultas:</h6>
                <a class="dropdown-item" href="{{ url('/ocorrencia/consulta') }}">Analise de Vibração</a>
                <a class="dropdown-item" href="{{ url('/ocorrencia/consultafeed/') }}">Feedbacks</a>
                <a class="dropdown-item" href="{{ url('/lubrificacao/lista') }}">Lubrificação de maquinas</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-chart-bar"></i>
                <span>Relatórios</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="{{ url('/ocorrencia/dash') }}">Resumo de Ocorrências</a>
                <a class="dropdown-item" href="#">Feedbacks</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cogs"></i>
                <span>Cadastros</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="{{ url('/cliente/lista') }}">Clientes</a>
                <a class="dropdown-item" href="{{ url('cliente/equipamentos') }}">Equipamentos</a>
                <a class="dropdown-item" href="{{ url('/lubrificacao/lubrificantes/lista') }}">Lubrificantes</a>
                <a class="dropdown-item" href="{{ url('/lubrificacao/pontos/lista') }}">Ponto de Lubrificação</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-coins"></i>
                <span>Back-end</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="{{ url('adm/importar') }}">Massivo Equipamentos</a>
            </div>
        </li>


    </ul>
        @endif

    @if(Session::get('perfil') == 2 )

            <ul class="sidebar navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/cliente/home') }}">
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Formulários</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <h6 class="dropdown-header">Feedback</h6>
                        <a class="dropdown-item" href="{{ url('/cliente/analise/abertas') }}">Análise de Vibração</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Consultas:</h6>
                        <a class="dropdown-item" href="{{ url('/cliente/analise/consulta') }}">Analise de Vibração</a>
                        <a class="dropdown-item" href="{{ url('/cliente/analise/feed') }}">Feedbacks</a>
                        <a class="dropdown-item" href="{{ url('/cliente/lubrificacao/lista') }}">Lubrificação de Maquinas</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-chart-bar"></i>
                        <span>Relatórios</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <a class="dropdown-item" href="{{ url('/cliente/analise/dash') }}">Resumo de Ocorrências</a>
                        <a class="dropdown-item" href="#">Feedbacks</a>
                    </div>
                </li>




            </ul>
        @endif
        @if(Session::get('perfil') == 3 )

            <ul class="sidebar navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/cliente/conta/home') }}">
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Formulários</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <h6 class="dropdown-header">Feedback</h6>
                        <a class="dropdown-item" href="{{ url('/cliente/conta/analise/abertas') }}">Análise de Vibração</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Consultas:</h6>
                        <a class="dropdown-item" href="{{ url('/cliente/conta/analise/consulta') }}">Analise de Vibração</a>
                        <a class="dropdown-item" href="{{ url('/cliente/conta/analise/feed') }}">Feedbacks</a>
                        <a class="dropdown-item" href="{{ url('/cliente/conta/lubrificacao/lista') }}">Lubrificação de Maquinas</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-chart-bar"></i>
                        <span>Relatórios</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <a class="dropdown-item" href="{{ url('/cliente/conta/analise/dash') }}">Resumo de Ocorrências</a>
                        <a class="dropdown-item" href="#">Feedbacks</a>
                    </div>
                </li>




            </ul>
@endif