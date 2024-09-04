<style>
    .blog:hover {
            background-color: #343a40;
            
            border-radius: 20px;
        }
</style>
@if($admin)
<x-search-bar :route="$route"/>
@endif
<div class="row">
@foreach ($list as $e)
    <div class="col-12 col row  border-top blog">
        <div class=" @if ($admin)col-md-10 @endif">
            {{--{{ route($route.'.show', $e->id) }}--}}
            <a href="#" data-bs-toggle="modal" data-bs-target="#viewPost{{$e->id}}" class="btn p-0" style="width:100%;">
                <div class="card border-0">
                    <div class="card-body ">
                        <div class="row">
                        <div class="col-md-10">
                            <h5 class="card-title text-left">{{ $e->title ??$e->name }}</h5>
                            <div class="row">
                            
                            @if($route == "admin")
                            <b class="card-text text-left col-md-auto">Rol: {{ $e->role }}</b>    
                            @elseif($route =="discounts")
                            <b class="card-text text-left col-md-auto">Descuento de: {{ $e->discount }} %</b>
                            @endif
                            
                                @if(!$e->status)
                                <p class="card-text text-left col-md-auto">{{ $e->email ?? $e->created_at }}</p>
                                @endif
                            </div>
                            
                            @if($route =="discounts")
                            <div class="row pt-2">
                            <i class="card-text text-left col-md-auto">{{ $e->status?'Activa':'Inactiva' }}</i>
                            <p class="card-text text-left col-md-auto">Desde {{date('d-m-Y',strtotime($e->start_time))  }} hasta {{date('d-m-Y',strtotime($e->end_time))  }}</p>    
                            </div>
                            
                            @endif
                        </div>
                        </div>
                        

                    </div>
                </div>
            </a>
        </div>
        
        @if($admin)
        <div class="col-md-2 my-auto">
        <div class="d-flex justify-content-evenly">
            <a href="{{ route($route.'.edit', $e->id) }}" class="btn btn-info rounded-circle py-2"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>
            <form method="POST" class="fm-inline " action="{{ route($route.'.destroy', $e->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger rounded-circle py-2">
                    <i class="fa-regular fa-trash-can fa-lg"></i>
                </button>
            </form>
        </div>
            
            
        </div>
        @endif

        @if($route=='blogs')
        <x-show-modal :element="$e" />
        @endif
    </div>
@endforeach

</div>
