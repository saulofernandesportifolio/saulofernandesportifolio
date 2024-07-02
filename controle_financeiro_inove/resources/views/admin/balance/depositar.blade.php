@extends('adminlte::page')

@section('title', 'Depositar')

@section('content_header')
    <h1>Efetuar Depósito</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Depositar</a></li>
    </ol>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3></h3>
        </div>
        <div class="box-body">    
            @include('admin.includes.alerts')
            <form action="{{ url('admin/depositar/salvar') }}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                <div class="input-group" class="form-control">
                    <span class="input-group-addon">R$</span>
                    <input type="text" name="valor" class="form-control" placeholder="Valor do depósito somente numeros">
                    <span class="input-group-addon">,00</span>
                </div>
                </div>
                <div class="form-group">
                    <select name="tipo_deposito" class="form-control">
                        <option value="">Selecione o tipo</option>
                        <option value="A vista">A vista</option>
                        <option value="No debito">no debito</option>
                        <option value="No credito">no credito</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="qtd_vezes" class="form-control">
                        <option value="">Quantidade de vezes</option>
                        <option value="Dinheiro">Dinheiro</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                    </select>
                </div>
                <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" name="data" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                </div>
                </div>
                <div class="form-group">
                    <select name="depositante" id="depositante" class="form-control">
                     <option value="">Selecione o Depositante</option>
                     @foreach($depositante as $dep)
                         @if($dep->id != 114)
                         <option value="{{ $dep->id  }}">{{ $dep->nome }}</option>
                         @endif
                     @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <textarea name="observacao" class="form-control" placeholder="Observações"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Depositar</button>
                    <button class="btn btn-warning" type="button" onclick="window.location='{{ url('admin/depositar-filtro') }}'">Voltar</button>

                </div>
            </form>
        </form>
    </div>
@stop


