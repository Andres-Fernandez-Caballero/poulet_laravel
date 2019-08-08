@if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        <p><strong>Error!!! </strong><span>{{session()->get('error')}}.</span> <a href="{{route('web.index')}}"
                                                                                  class="pink-text">Volver al
                inicio.</a></p>
    </div>
@endif
