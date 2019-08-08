@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="m-4 alert alert-danger" role="alert">
            <p><strong>Error!!! </strong><span>{{$error}}</span> <a href="{{route('web.index')}}"
                                                                    class="pink-text">Volver al inicio.</a>
            </p>
        </div>
    @endforeach
@endif
