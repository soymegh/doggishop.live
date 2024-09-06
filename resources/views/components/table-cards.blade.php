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
    <!-- Argumentos: Folder, Route, List Title-->
     
    <x-title-admin :title="$title" :route="$route" />
    
    <x-search-bar :route="$route"/>

    <div class="row mt-4">
        @foreach ($list as $e)
            <div class="col-12 col-md-6 col-lg-3 pb-3">
                <div class="card border-mid animal">
                    
                        @if ($e->img_url != null)
                            <img class="border-mid" src="{{ asset('images/'.$folder .'/' . $e->img_url) }}" alt="{{ $e->img_url }}" height="250px" >
                        @elseif ($e->picture != null)
                            <img class="border-mid" src="{{ asset('images/'.$folder .'/' . $e->picture) }}" alt="{{ $e->picture }}" height="250px" >
                        @elseif ($e->image_event != null)
                            <img class="border-mid" src="{{ asset('images/'.$folder .'/' . $e->image_event) }}" alt="{{ $e->image_event }}" height="250px" >
                        @else
                            <img class="border-mid" src="{{ asset('images/sinfoto.png') }}" alt="{{ $e->img_url }}">
                        @endif    

                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $e->breed ?? $e->name ?? " "}}</h5>
                            <p class="card-text">{{ Str::limit($e->description,100) ?? $e->attendant ??$e->name }}</p>
                            
                            {{-- Para el precio --}}
                            @if ($route =='products')
                                @if ($e->price_discounted) {{"Precio: "}}
                                <del class="text-danger fw-semibold">${{ $e->price }}</del>
                                <span class="text-success fw-semibold">${{ $e->new_price }}</span>
                                
                                @elseif ($e->price) {{"Precio: $".$e->price }}
                                @endif
                            @endif

                            <div class="border-bottom mb-3" ></div>
                            <div class="d-flex justify-content-evenly">
                                
                            @if ($route =='products')
                                <a title="Inventario del producto" href="{{ route('inventary.show', $e->id) }}" class="btn btn-outline-info rounded-pill"> <i class="py-1 fa-solid fa-boxes-stacked"></i> </a>
                            @elseif($route =='pets'|| $route=='providers' )
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