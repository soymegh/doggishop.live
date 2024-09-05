<form class="mb-4  ml-3 mr-3" action="{{ route($route.'.index') }}" method="GET" enctype="multipart/form-data">
        <div class="row">
            <input class="form-control-lg  col-sm rounded-pill " name="search" type="text" placeholder="Busqueda">
            <button class="btn btn-primary col-sm-auto rounded-pill ml-3" ><i class="fa-solid fa-magnifying-glass fa-lg pr-3"></i>Buscar</button>
        </div>
    </form>