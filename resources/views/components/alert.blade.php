@if(session('message'))
<div class="alert bg-danger">
    {{ session('message') }}
</div>
@endif