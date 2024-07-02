
{{-- apresentação dos erros de validação --}}
 @if (count($errors) != 0)
         <div class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
             {{-- titulo da caixa de erro --}}
             @if(count($errors) == 1)
                <p class="titulo-erro">Erro:</p>
             @else
                 <p class="titulo-erro">Erros:</p>
             @endif

             {{-- apresentar os erros (concatenação) --}}
              <ul>
                  @foreach($errors->all() as $erro)

                        @if($erro == "O campo password é obrigatório.")
                          <li class="desc-erro">{{ "O campo senha é obrigatório" }}</li>
                         @elseif($erro == "O campo password confirmation é obrigatório.")
                          <li class="desc-erro">{{ "O campo confirmar senha é obrigatório." }}</li>
                        @elseif($erro == "Password deve estar entre 6 e 15 caracteres.")
                          <li class="desc-erro">{{ "Senha deve estar entre 6 e 15 caracteres." }}</li>
                        @elseif($erro == "Password confirmation e password devem ser iguais.")
                          <li class="desc-erro">{{ "Confirmação de senha e senha devem ser iguais." }}</li>
                      @elseif($erro == "Cnpj ou cpf deve ter no mínimo 14 para cnpj caracteres.")
                          <li class="desc-erro">{{ "CNPJ deve ter 14 caracteres ." }}</li>
                       @elseif($erro == "Cnpj ou cpf deve ter no mínimo 11 para cpf caracteres.")
                          <li class="desc-erro">{{ "CPF deve ter 11 caracteres ." }}</li>
                      @else
                        <li class="desc-erro">{{ $erro }}</li>

                        @endif
                  @endforeach
             </ul>

       </div>
@endif
{{-- apresentação dos erros de comunicação com a bd --}}
@if(isset($erros_bd))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach($erros_bd as $erro)

                   <li class="desc-erro">{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- apresentação dos erros de comunicação com a bd --}}
@if(session()->has('erros') || session('erros'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p class="titulo-erro">Erro:</p>
        <ul>
            <li class="desc-erro">{{ session()->get('erros') }}</li>
        </ul>
    </div>
@endif