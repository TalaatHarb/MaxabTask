@if(count($errors)>0)
@foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissable mb-0" role="alert">
        {{$error}}
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidde="true">&times;</span>
        </button>
    </div>
@endforeach
@endif

@if(session('success'))
<div class="alert alert-success alert-dismissable mb-0" role="alert">
    {{session('success')}}
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidde="true">&times;</span>
    </button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissable mb-0" role="alert">
    {{session('error')}}
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidde="true">&times;</span>
    </button>
</div>
@endif