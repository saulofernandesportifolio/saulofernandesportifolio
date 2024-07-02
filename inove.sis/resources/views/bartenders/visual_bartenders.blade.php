@extends('adminlte::page')

@section('content')

    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Bartenderes - Detalhes/Editar</div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('auth.success')
                    @include('auth.erros')
                         <form  role="form" method="POST" action="{{ url('/updatebartenders') }}">
                            {{ csrf_field() }}

                             <div class="row">

                                <div class="col-md-8">
                                    <div class="form-group">

                                        <label class="small" for="nome">Nome:</label>
                                        @foreach($bartenders as $bart)
                                        <input type="text"  class="form-control" id="nome" name="nome" value="{{ $bart->nome }}" placeholder="Nome do bartenders">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                        <div class="col-md-4">
                                            <label class="small" for="genero">Genero:</label>
                                            <select class="form-control" id="genero" name="genero">
                                                @foreach($bartenders as $bart)
                                                <option value="{{ $bart->genero }}">{{ $bart->genero }}</option>
                                                @endforeach
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
                                         @foreach($bartenders as $bart)
                                         <input onblur="javascript: formatarCampocep(this);" type="text"  class="form-control  cep" id="cep" name="cep" maxlength="9" value="{{ $bart->cep }}">
                                         @endforeach
                                     </div>
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="form-group">
                                     <div class="col-md-5">
                                         <label class="small" for="endereco">Endereço:</label>
                                         @foreach($bartenders as $bart)
                                         <input type="text"  class="form-control" id="endereco" name="endereco" value="{{ $bart->endereco }}">
                                         @endforeach
                                     </div>
                                     <div class="col-md-1">
                                         <label class="small" for="numero">Nº:</label>
                                         @foreach($bartenders as $bart)
                                         <input type="text"  class="form-control" id="numero" name="numero" value="{{ $bart->numero }}">
                                         @endforeach
                                     </div>
                                     <div class="col-md-2">
                                         <label class="small" for="bairro">Bairro:</label>
                                         @foreach($bartenders as $bart)
                                         <input type="text"  class="form-control" id="bairro" name="bairro" value="{{ $bart->bairro }}">
                                         @endforeach
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="form-group">
                                     <div class="col-md-3">
                                         <label class="small" for="cidade">Cidade:</label>
                                         @foreach($bartenders as $bart)
                                         <input type="text"  class="form-control" id="cidade" name="cidade" value="{{ $bart->cidade }}">
                                         @endforeach
                                     </div>

                                     <div class="col-md-3">
                                         <label class="small" for="uf">Uf:</label>
                                         @foreach($bartenders as $bart)
                                         <input type="text"  class="form-control uf" id="uf" name="uf" value="{{ $bart->uf }}">
                                         @endforeach
                                     </div>
                                 </div>
                             </div>

                            <div class="row">
                              <div class="form-group">
                                 <div class="col-md-5">
                                     @foreach($bartenders as $bart)
                                   @if($bart->carro == 'Sim')
                                     <input type="checkbox" class="form-check-input" id="carro" name="carro" value="Sim" checked>
                                   @elseif($bart->carro <> 'Sim')
                                     <input type="checkbox" class="form-check-input" id="carro" name="carro" value="Sim">
                                   @endif
                                       @endforeach
                                    <label class="form-check-label" for="carro">Com carro</label>
                                 </div>
                              </div>
                            </div>

                             <div class="row">
                                 <div class="form-group">

                                     <div class="col-md-3">
                                         <label class="small" for="genero">Tamanho:</label>
                                         <select class="form-control" id="tamanho" name="tamanho">
                                             @foreach($bartenders as $bart)
                                             <option value="{{ $bart->tamanho }}">{{ $bart->tamanho }}</option>
                                             @endforeach
                                             <option @if(old('tamanho') == 'Pequeno') selected @endif value="Pequeno">Pequeno</option>
                                             <option @if(old('tamanho') == 'Medio') selected @endif value="Medio">Médio</option>
                                             <option @if(old('tamanho') == 'Grande') selected @endif value="Grande">Grande</option>
                                         </select>
                                     </div>

                                     <div class="col-md-3">
                                         <label class="small" for="apito">Apito:</label>
                                         <select class="form-control" id="apito" name="apito">
                                             @foreach($bartenders as $bart)
                                                 <option value="{{ $bart->apito }}">{{ $bart->apito }}</option>
                                             @endforeach
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
                                        @foreach($bartenders as $bart)
                                        <input type="text"  class="form-control" id="danca" name="danca" value="{{ $bart->danca }}">
                                        @endforeach
                                    </div>

                                    <div class="col-md-1">
                                        <label class="small" for="cidade">Drinks:</label>
                                        @foreach($bartenders as $bart)
                                        <input type="text"  class="form-control" id="drinks" name="drinks" value="{{ $bart->drinks }}">
                                        @endforeach
                                    </div>

                                    <div class="col-md-1">
                                        <label class="small" for="simpatia">Simpatia:</label>
                                        @foreach($bartenders as $bart)
                                        <input type="text"  class="form-control" id="simpatia" name="simpatia" value="{{ $bart->simpatia }}">
                                        @endforeach
                                    </div>

                                    <div class="col-md-1">
                                        <label class="small" for="beleza">Beleza:</label>
                                        @foreach($bartenders as $bart)
                                        <input type="text"  class="form-control" id="beleza" name="beleza" value="{{ $bart->beleza }}">
                                        @endforeach
                                    </div>

                                    <div class="col-md-1">
                                        <label class="small" for="postura">Postura:</label>
                                        @foreach($bartenders as $bart)
                                        <input type="text"  class="form-control" id="postura" name="postura" value="{{ $bart->postura }}">
                                        @endforeach
                                    </div>

                                </div>

                            </div>
                            <br>
                             <input type="hidden" name="id" value="{{ $bart->id }}">
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
 </div>
@endsection

