<style>
    .blog:hover {
            background-color: #343a40;
            
            border-radius: 20px;
        }
</style>
<div class="row">
@foreach ($list as $e)
    <div class="col-12 col row  border-top blog">
        <div class=" @if ($admin)col-md-10 @endif">
            {{--{{ route($route.'.show', $e->id) }}--}}
            <a href="#" data-bs-toggle="modal" data-bs-target="#viewPost" class="btn p-0" style="width:100%;">
                <div class="card border-0">
                    <div class="card-body ">
                        <div class="row">
                        <div class="col-md-10">
                            <h5 class="card-title text-left">{{ $e->title }}</h5>
                            <p class="card-text text-left">{{ $e->created_at }}</p>    
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

        <!-- Modal -->
        <div class="modal fade" id="viewPost" tabindex="-1" aria-labelledby="viewPostLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPostLabel">{{$e->title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{$e->content}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
        </div>

    </div>
@endforeach

</div>
