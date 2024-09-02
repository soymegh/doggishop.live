<div class="row my-4">
    <div class="col-md-6">
        <h2>{{$title}}</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('home') }}" title="Regresar a home" class="btn btn-outline-primary rounded-circle"><i class=" py-3 fa-solid fa-home fa-xl"></i></a>
        <a href="{{ route( $route.'.create') }}" title="Crear uno nuevo" class="text-center btn btn-outline-success rounded-circle"><i class="py-3 fa-solid fa-plus fa-xl"></i></a>
    </div>
</div>