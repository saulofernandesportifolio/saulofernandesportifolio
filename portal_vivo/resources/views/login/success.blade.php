
{{-- apresentação dos erros de comunicação com a bd --}}
@if(session()->has('message') || session('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
         <li class="desc-erro">{{ session()->get('message') }}</li>
        </ul>
    </div>
@endif

