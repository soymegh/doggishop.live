@extends('layouts.app')

@section('content')
<style>
    .blog:hover {
            background-color: #343a40;
            
            border-radius: 20px;
        }
</style>

<div class="container">
    <div class="row my-4">
    <div class="col-md-6">
        <h2>Registro de facturaciones</h2>
    </div> 
    <div class="col-md-6 text-end">
    <a href="{{ route('bills.report') }}" title="Generar Reporte del Mes" class="btn btn-outline-success rounded-circle p-3"><i class="fa-regular fa-file-pdf fa-xl "></i></a>
    </div>   
    </div>
    
    <div class="row">

@foreach ($bill as $e)
    <div class="col-12 col row  border-top blog">
        <a href="#" data-bs-toggle="modal" data-bs-target="#viewPost{{$e->id}}" class="btn p-0" style="width:100%;">
            <div class="card border-0">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="card-title text-left">{{ $e->bill_date }}</h5>
                            <p class="card-title text-left"><b>Nombre del cliente:</b> {{$user->where('id','==',$e->user_id)->first()->name}}</p>

                            @if (count($shipment->where('bill_id','==',$e->id)) != 0)
                                @php
                                 $envio = $shipment->where('bill_id','==',$e->id)->first()
                                @endphp

                                <p class="card-title text-left"><b>Dirección de envío:</b> {{$departments->where('id','==', $envio->departments_id )->first()->name}}, {{$municipalities->where('id','==', $envio->municipalities_id )->first()->name}}. {{$envio->address}}. </p>
                            @else
                                <p class="card-title text-left text-danger"><b>Pick up en el local</b></p>
                            @endif
                            
                        </div>
                        </div>
                        

                    </div>
                </div>
            </a>
    </div>

    <div class="modal fade" id="{{'viewPost'.$e->id}}" tabindex="-1" aria-labelledby="viewPostLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="card-title text-left">Factura del {{ $e->bill_date }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="card-title text-left"><b>Nombre del cliente:</b> {{$user->where('id','==',$e->user_id)->first()->name}}</p>
                @if (count($shipment->where('bill_id','==',$e->id))!= 0)
                    <p class="card-title text-left"><b>Dirección de envío:</b> {{$departments->where('id','==', $envio->departments_id )->first()->name}}, {{$municipalities->where('id','==', $envio->municipalities_id )->first()->name}}. {{$envio->address}}. </p>
                @else
                <p class="card-title text-left text-danger"><b>Pick up en el local</b></p>
                @endif
                <div class="border-top p-0 m-0"></div>

                @foreach ( $bill_details as $bd)
                    @if ($bd->bill_id == $e->id)
                    <b>{{$products->where('id','==',$bd->product_id)->first()->name}}</b>
                    <p>{{$products->where('id','==',$bd->product_id)->first()->size}}</p>
                    @endif
                @endforeach
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
@endforeach

</div>

</div>
    




    
@endsection


