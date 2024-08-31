<div class="container mb-4">
    <div class="">
        <div class="row mt-4">
            <div class="col-6">
                <h2>{{$title}}</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route($index) }}" class="btn p-2 animal border-mid"> {{-- Cambiar por la vista del cliente--}}
                    Ver más
                </a>
            </div>
        </div>
        
        <div class="row mt-4">
        @foreach ($list as $pet)
            <div class="col-12 col-sm-6 col-md-3 pb-3">
                <div class="card border-mid">
                    <a href="{{ route( explode('.',$index)[0] .'.show', $pet->id) }}" class="btn p-0 animal border-mid">
                        <div class="card-img-top m-0 border-mid" style="height: 150px; background-image: url('{{ asset('images/'.$folder.'/' . $pet->img_url ?? " ") }}'); background-size: cover;"></div>
                        
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $pet->breed ?? $pet->name ?? " "}}</h5>
                            <p class="card-text">{{ $pet->description }}</p>
                            <p class="card-text">
                                @if ($pet->price) {{"Precio: $".$pet->price }}@else {{" "}}@endif
                            
                            </p>
                        </div>
                    </a>
                    {{-- <img src="{{ asset('images/pet/' . $pet->img_url) }}" class="" alt="{{ $pet->name }}"> --}}
                    
                </div>
            </div>
        @endforeach
        </div>
        
    </div>
</div>