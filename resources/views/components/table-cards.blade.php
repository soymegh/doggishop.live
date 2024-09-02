<style>
     .border-mid {
            border-radius: 50px;
        }

        .animal:hover {
            
            border-color: #ffac45;
        }
    img{
        
        object-fit: cover;
    }
</style>
<div>
    <!-- 
    Argumentos: Folder, Route, List Title
    -->

    <div class="row my-4">
        <div class="col-md-6">
            <h2>{{$title}}</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('home') }}" title="Regresar a home" class="btn btn-outline-primary rounded-circle"><i class=" py-3 fa-solid fa-rotate-left fa-xl"></i></a>
            <a href="{{ route( $route.'.create') }}" title="Crear uno nuevo" class="text-center btn btn-outline-success rounded-circle"><i class="py-3 fa-solid fa-plus fa-xl"></i></a>
        </div>
    </div>

    <div class="row mt-4">
        @foreach ($list as $e)
            <div class="col-12 col-md-6 col-lg-3 pb-3">
                <div class="card border-mid animal">
                    
                        @if ($e->img_url != null)
                            <img class="border-mid" src="{{ asset('images/'.$folder .'/' . $e->img_url) }}" alt="{{ $e->img_url }}" height="250px" >
                        @elseif ($e->picture != null)
                            <img class="border-mid" src="{{ asset('images/'.$folder .'/' . $e->picture) }}" alt="{{ $e->picture }}" height="250px" >
                        @else
                            <img class="border-mid" src="{{ asset('images/sinfoto.png') }}" alt="{{ $e->img_url }}">
                        @endif    

                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $e->breed ?? $e->name ?? " "}}</h5>
                            <p class="card-text">{{ $e->description ?? $e->attendant ??$e->name }}</p>
                            
                            {{-- Para el precio --}}
                            @if ($route =='products')
                                <p class="card-text">
                                    @if ($e->price) {{"Precio: $".$e->price }}@else {{" "}}@endif
                                </p>
                                <p> @if ($e->price_discounted) {{"Descuento: $".$e->price_discounted }}@else {{" "}}@endif
                                </p>
                                <p>  @if ($e->new_price) {{"Nuevo Precio: $".$e->new_price }}@else {{" "}}@endif</p>
                                
                                
                            @endif

                            <div class="border-bottom mb-3" ></div>
                            <div class="d-flex justify-content-evenly">
                                
                            @if ($route =='products')
                                <a title="Inventario del producto" href="{{ route('inventary.show', $e->id) }}" class="btn btn-outline-info rounded-pill"> <i class="py-1 fa-solid fa-boxes-stacked"></i> </a>
                            @elseif($route =='pets')
                            <a href="{{ route($route. '.show', $e->id) }}" title="Visualizar detalles" class="btn btn-outline-info rounded-circle"><i class="fa-regular fa-eye"></i></a>
                            @endif
                            <a href="{{ route($route. '.edit', $e->id) }}" title="Editar registro" class="btn btn-outline-primary rounded-circle"><i class="fa-regular fa-pen-to-square"></i></a>

                            <form action="{{ route( $route.'.destroy', $e->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger rounded-circle"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')" title="Eliminar registro">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                            </div>
                            
                            

                        </div>
                        
                    {{-- <img src="{{ asset('images/pet/' . $pet->img_url) }}" class="" alt="{{ $pet->name }}"> --}}
                    
                </div>
            </div>
        @endforeach
    </div>
</div>