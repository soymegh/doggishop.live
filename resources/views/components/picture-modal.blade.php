<!-- Modal -->
<style>
    .light{
        margin-top: 15px;
        font-size: small;
        color:grey;
    }
</style>

@php
$type ='';
$folder ='';
if ($element->breed):
$type ='Pet';
$folder='pet';
else:
$type = 'Prod';
$folder='product';
endif
@endphp


<div class="modal fade" id="{{'view'.$type.$element->id}}" tabindex="-1" aria-labelledby="viewPostLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="viewPostLabel">{{$element->breed ?? $element->name}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col col-lg col-sm-12">
                @if ($element->img_url != null or $element->picture!=null)
                <img  height="350" width="350" class="border-mid" src="{{ asset('images/'.$folder.'/' . $element->img_url??$element->picture) }}" alt="{{ $element->img_url??$element->picture }}" height="250px" >
                @else
                    <img height="350"class="border-mid" src="{{ asset('images/sinfoto.png') }}" alt="{{ $element->img_url ??$element->picture}}">
                @endif
                </div>
                
                <div class="col col-lg col-sm-12">
                    @if ($type=='Pet')
                    <h3>{{$element->breed}}</h3>
                    <b>Sexo: </b>{{$element->gender}} <br class="my-2">
                    <b>Edad ingresado: </b>{{$element->age}} <br class="my-2">
                    <b>Fecha de ingreso: </b>{{$element->created_at}} <br class="my-2">
                    @else
                    <b>Descripción: </b>{{$element->description}} <br class="my-2">
                    <b>Presentación: </b>{{$element->size}} <br class="my-2">

                    @if ($element->stock<10)
                    <b style="color: red;">Quedan: {{$element->stock}} </b><br class="my-2">
                    @endif
                    
                    @endif
                    
                    
                    <b>Precio: </b>
                    @if ($element->price_discounted)
                    <del class="text-danger fw-semibold">${{ $element->price }}</del>
                    <span class="text-success fw-semibold">${{ $element->new_price }}</span>
                    @else
                    <span class="text-primary fw-semibold">${{ $element->price }}</span>
                    @endif
                </div>
                <p class="light">{{$element->name}}</p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>