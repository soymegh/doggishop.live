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
                    <a href=" @if ($pet->breed) #
                                @else
                                 {{route($show, $pet->id)}}
                                @endif " 
                                
                        @if ($pet->breed)
                        data-bs-toggle="modal" data-bs-target="#viewPet{{$pet->id}}"
                        @endif
                                
                                class="btn p-0 animal border-mid">
                        <div class="card-img-top m-0 border-mid" style="height: 150px; background-image: url('{{ asset('images/'.$folder.'/' . $pet->img_url ?? " ") }}'); background-size: cover;"></div>
                        
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $pet->breed ?? $pet->name ?? " "}}</h5>
                            <p class="card-text">{{ $pet->description }}</p>
                            <p class="card-text">
                                
                            </p>
                            
                            @if ($pet->price_discounted) {{"Precio: "}}
                            <del class="text-danger fw-semibold">${{ $pet->price }}</del>
                            <span class="text-success fw-semibold">${{ $pet->new_price }}</span>
                            
                            @elseif ($pet->price) {{"Precio: $".$pet->price }}
                            
                            @endif 
                            
                            

                            
                        </div>
                    </a>
                    {{-- <img src="{{ asset('images/pet/' . $pet->img_url) }}" class="" alt="{{ $pet->name }}"> --}}
                    
                </div>
            </div>
            @if ($pet->breed)<x-picture-modal :element="$pet"/>@endif
            
        @endforeach
        
        </div>
        
    </div>
</div>