@if ($errors->any() || session('erros'))
   <!--<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>-->

    <div class="modal modal-danger fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Mensagem:</h4>
                </div>
                <div class="modal-body">
                    @if(empty(session('erros')))
                    @foreach ($errors->all() as $error)
                    <h4 class="modal-title" id="myModalLabel">{{ $error }}</h4>
                    @endforeach
                    @else
                        <h4 class="modal-title" id="myModalLabel">{{ session('erros') }}</h4>
                    @endif

                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-info" data-dismiss="modal">Corrigir Cadastro</button>-->
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if (session('success'))
   <!--<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

    </div>-->
   <!-- Modal -->
   <div class="modal modal-success fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title" id="myModalLabel">Mensagem</h4>
               </div>
               <div class="modal-body">
                   <h4 class="modal-title" id="myModalLabel">{{ session('success') }}</h4>
               </div>
               <div class="modal-footer">
                   <!--<button type="button" class="btn btn-info" data-dismiss="modal">Corrigir Cadastro</button>-->
                   <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
               </div>
           </div>
       </div>
   </div>
@endif

@if (session('error'))
   <!--<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ session('error') }}
    </div>-->

    <div class="modal modal-warning fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Mensagem</h4>
                </div>
                <div class="modal-body">

                        <h4 class="modal-title" id="myModalLabel">{{ session('error') }}</h4>

                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-info" data-dismiss="modal">Corrigir Cadastro</button>-->
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@endif
