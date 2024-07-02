<script>opener.location.reload();</script>

@extends('layouts.app2')

@section('content')

    <div id="content-wrapper">
        <div class="container-fluid">
            <br>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Feedback de Intervenção  -</a>
                </li>
                <li class="breadcrumb-item active"></li>
            </ol>


            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-folder-open"></i> Feedback inserido com sucesso!</div>
                <div class="card-body">
                    Por favor, feche a janela!
                    <div class="card-footer small text-muted"> </div>
                </div>
            </div>
        </div>
        @endsection

    </div>