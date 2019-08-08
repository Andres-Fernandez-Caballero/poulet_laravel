@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    <strong>Felicidades!!!  </strong><span>{{session()->get('success')}}.</span>
</div>
@endif
