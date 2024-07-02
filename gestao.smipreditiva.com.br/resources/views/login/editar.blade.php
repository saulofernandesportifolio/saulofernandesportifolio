@extends('layouts.app2')

@section('title', 'Page Title')

@section('sidebar')

    @extends('layouts.sidebar')


@endsection

@section('content')

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Inicio -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Usuários</a>
                </li>
                <li class="breadcrumb-item active">Lista</li>
            </ol>
        @include('login.success')
        @include('login.erros')

        <!-- Conteúdo-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-user"></i>
                    Editar Usuário</div>
                <br>

                <div class="table-responsive aligncenter">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="small">Nome</th>
                            <th class="small">Usuário</th>
                            <th class="small">CPF</th>
                            <th class="small">E-Mail</th>
                            <th class="small">Perfil</th>
                            <th class="small">Editar</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usuario as $oc)
                            <tr align="center">
                                <td class="small">{{ $oc->nome }}</td>
                                <td class="small">{{ $oc->usuario }}</td>
                                <td class="small">{{ $oc->cnpj_cpf }}</td>
                                <td class="small">{{ $oc->email }}</td>
                                <td class="small">@if($oc->perfil == 1){{ 'Administrador' }} @else {{ 'Cliente' }} @endif</td>
                                <td>
                                    <button type="button" class="btn btn-warning-sm" onclick="window.location='{{ url('/editar/alterar_user/'.$oc->id) }}'">
                                        <i class="fas fa-users-cog"></i></button>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                    <div clas="row" align="center">
                        <button type="button" class="btn btn-success-sm" onclick="window.location='{{ url('/home') }}'">
                            <i class="fas fa-undo-alt"></i> Voltar</button>
                    </div>





                <div class="card-body">
                    <div class="card-footer small text-muted"></div>
                </div>
            </div>
        </div>

        @endsection

    </div>


    </body>

    </html>




