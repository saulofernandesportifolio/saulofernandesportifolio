@extends('adminlte::page')

@section('title', 'Histórico de Transações')

@section('content_header')
    <h1>Histórico</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Histórico</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <form action="{{ route('historic.search') }}" method="POST" class="form form-inline">
                {!! csrf_field() !!}
                <input type="date" name="date1" class="form-control">
                <input type="date" name="date2" class="form-control">
                <select name="type" class="form-control">
                    <option value="">Selecione o tipo</option>
                    <option value="ENTRADA">ENTRADA</option>
                    <option value="SAIDA">SAIDA</option>
                    <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                </select>

                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </form>
        </div>
        <div class="box-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Valor</th>
                        <th>Tipo</th>
                        <th>Data</th>
                        <th>Remetente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($historics as $historic)
                    <tr>
                        <td>{{ $historic->id }}</td>
                        <td>{{ number_format($historic->montante ? $historic->montante : 0, '2', ',', '.') }}</td>
                        <td>{{ $historic->type }}</td>
                        <td>{{ $historic->data }}</td>
                        <td>
                        @if (empty($historic->nomecli))
                           {{ $empresa }}
                        @else
                        {{ $historic->nomecli }}
                        @endif
                        </td>
                    </tr>
                    @endforeach
                   <tr>
                       <th>Total</th>
                       @foreach($total as $tl)
                       <th colspan="4">{{ number_format($tl->total_geral ? $tl->total_geral : 0, '2', ',', '.') }}</th>
                       @endforeach
                   </tr>
                </tbody>

            </table>
            {{ $historics->links() }}
        </div>
    </div>
@stop