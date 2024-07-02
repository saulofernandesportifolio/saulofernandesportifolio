@extends('layouts.app')

@section('content')

    <div class="container col-xs-12">

        <div class="row">
            <div class="col-md-26 col-md-offset-0">
               <div class="body">
                  @include('login.success')
                  @include('login.erros')
               </div>
            </div>

        </div>
    </div>

@endsection