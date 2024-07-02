@extends('adminlte::page')
@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Cadastro Bartenderes</h3>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('auth.success')
                    @include('auth.erros')
                         <form  role="form" method="POST" action="{{ url('/addbartenders') }}">
                            {{ csrf_field() }}

                             <div class="row">

                                <div class="col-md-8">
                                    <div class="form-group">

                                        <label class="small" for="nome">Nome:</label>
                                        <input type="text"  class="form-control" id="nome" name="nome" value="{{ old('nome') }}" placeholder="Nome do bartenders">
                                    </div>
                                </div>
                                <div class="form-group">
                                      <div class="col-md-4">
                                           <label class="small" for="genero">Genero:</label>
                                           <select class="form-control" id="genero" name="genero">
                                               <option value="0">Selecione</option>
                                               <option @if(old('genero') == 'Homem') selected @endif value="Homem">Homem</option>
                                               <option @if(old('genero') == 'Mulher') selected @endif value="Mulher">Mulher</option>
                                           </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="small" for="cep">Cep:</label>
                                        <input onblur="javascript: formatarCampocep(this);" type="text"  class="form-control  cep" id="cep" name="cep" maxlength="9" value="{{ old('cep') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label class="small" for="endereco">Endereço:</label>
                                        <input type="text"  class="form-control" id="endereco" name="endereco" value="{{ old('endereco') }}">
                                    </div>
                                    <div class="col-md-1">
                                        <label class="small" for="numero">Nº:</label>
                                        <input type="text"  class="form-control" id="numero" name="numero" value="{{ old('numero') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small" for="bairro">Bairro:</label>
                                        <input type="text"  class="form-control" id="bairro" name="bairro" value="{{ old('bairro') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="small" for="cidade">Cidade:</label>
                                        <input type="text"  class="form-control" id="cidade" name="cidade" value="{{ old('cidade') }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="small" for="uf">Uf:</label>
                                        <input type="text"  class="form-control uf" id="uf" name="uf" value="{{ old('uf') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                              <div class="form-group">
                                 <div class="col-md-2">
                                   <input type="checkbox" class="form-check-input" id="carro" name="carro" value="Sim">
                                    <label class="form-check-label" for="carro">Com carro</label>
                                 </div>

                              </div>
                            </div>

                             <div class="row">
                               <div class="form-group">

                                 <div class="col-md-3">
                                   <label class="small" for="genero">Tamanho:</label>
                                   <select class="form-control" id="tamanho" name="tamanho">
                                     <option value="0">Selecione</option>
                                     <option @if(old('tamanho') == 'Pequeno') selected @endif value="Pequeno">Pequeno</option>
                                     <option @if(old('tamanho') == 'Medio') selected @endif value="Medio">Médio</option>
                                     <option @if(old('tamanho') == 'Grande') selected @endif value="Grande">Grande</option>
                                   </select>
                                 </div>

                                   <div class="col-md-3">
                                       <label class="small" for="apito">Apito:</label>
                                       <select class="form-control" id="apito" name="apito">
                                           <option value="0">Selecione</option>
                                           <option @if(old('apito') == '15 Anos') selected @endif value="15 Anos">15 Anos</option>
                                           <option @if(old('apito') == 'Adulto') selected @endif value="Adulto">Adulto</option>
                                           <option @if(old('apito') == 'Adulto e 15 Anos') selected @endif value="Adulto e 15 Anos">Adulto e 15 Anos</option>
                                       </select>
                                   </div>

                               </div>
                             </div>

                            <div class="row" align="left">
                                <div class="form-group">
                                    <div class="col-md-5">
                                      <br>
                                      <h5>Score</h5>
                                      <br>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">

                                    <div class="col-md-1">
                                        <label class="small" for="danca">Dança:</label>
                                        <input type="text"  class="form-control" id="danca" name="danca" value="{{ old('danca') }}">
                                    </div>

                                    <div class="col-md-1">
                                        <label class="small" for="cidade">Drinks:</label>
                                        <input type="text"  class="form-control" id="drinks" name="drinks" value="{{ old('drinks') }}">
                                    </div>

                                    <div class="col-md-1">
                                        <label class="small" for="simpatia">Simpatia:</label>
                                        <input type="text"  class="form-control" id="simpatia" name="simpatia" value="{{ old('simpatia') }}">
                                    </div>

                                    <div class="col-md-1">
                                        <label class="small" for="beleza">Beleza:</label>
                                        <input type="text"  class="form-control" id="beleza" name="beleza" value="{{ old('beleza') }}">
                                    </div>

                                    <div class="col-md-1">
                                        <label class="small" for="postura">Postura:</label>
                                        <input type="text"  class="form-control" id="postura" name="postura" value="{{ old('postura') }}">
                                    </div>

                                </div>


                            </div>
                            <div class="row" align="center">
                                <button type="submit" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-floppy-saved"></i>  Salvar</button>
                                <button type="button" class="btn btn-success" onclick="window.location='{{ url('listabartenders') }}'">
                                    <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

