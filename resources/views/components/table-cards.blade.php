<style>
     .border-mid {
            border-radius: 50px;
        }

        .animal:hover {
            
            border-color: #ffac45;
        }
    img{
        object-fit: contain;
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
            <a href="{{ route('home') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i>Regresar</a>
            <a href="{{ route( $route.'.create') }}" class="text-center btn btn-outline-success">Nuevo</a>
        </div>
    </div>

    <div class="row mt-4">
        @foreach ($list as $e)
            <div class="col-12 col-md-6 col-lg-3 pb-3">
                <div class="card border-mid animal">
                    
                        @if ($e->img_url != null)
                            <img src="{{ asset('images/'.$folder .'/' . $e->img_url) }}" alt="{{ $e->img_url }}" height="250px" >
                        @else
                            <img src="{{ asset('images/sinfoto.png') }}" alt="{{ $e->img_url }}">
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
                                <a href="{{ route('inventary.show', $e->id) }}" class="btn btn-outline-info rounded-pill"> I </a>
                            @else

                            @endif
                            <a href="{{ route($route. '.edit', $e->id) }}" class="btn btn-outline-primary rounded-pill">E</a>

                            <form action="{{ route( $route.'.destroy', $e->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger rounded-pill"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">D</button>
                            </form>
                            </div>
                            
                            

                        </div>
                        
                    {{-- <img src="{{ asset('images/pet/' . $pet->img_url) }}" class="" alt="{{ $pet->name }}"> --}}
                    
                </div>
            </div>
        @endforeach
    </div>
</div>