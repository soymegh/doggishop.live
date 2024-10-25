@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class=" col-md-12 border rounded-5 mt-5 ">
                <div class="row mt-3 mb-3  ml-1 mr-3">
                    <div class="col">
                        <h2>Crear una regla de descuentos</h2>
                    </div>
                    <div class="col text-right  ">
                    <a href="{{ route('discounts.index') }}" class="btn btn-primary rounded-circle" title="Regresar a Blogs">
                        <i class=" py-3 fa-solid fa-rotate-left fa-xl"></i>
                    </a>
                    </div>
                </div>
                <form class="mb-4 mx-4" method="POST" action="{{ route('discounts.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label ">Razón del descuento: </label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label ">Descripción:</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{ old('description')}} ">
                    </div>
                    <div class="form-group row">
                        <label for="discount" class="col-md-4 col-form-label ">Porcentaje del descuento</label>
                        <input type="number" min="2" max="100" name="discount" id="discount" class="form-control" value="{{ old('discount') }}">
                    </div>
                    <div class="form-group row ">
                        <div class="col col-6 p-0">
                            <label for="pets" class="px-3">Aplicar a Mascotas ? </label>
                            <select name="pets" id="pets" class="form-control">
                                <option value="0" @if(old('pets') == 0) selected @endif>No</option>
                                <option value="1" @if(old('pets') == 1) selected @endif>Si</option>
                            </select>
                        </div>
                        <div class="col col-6">
                            <label for="products">Aplicar a productos ? </label>
                            <select name="products" id="products" class="form-control">
                                <option value="0" @if(old('products') == 0) selected @endif>No</option>
                                <option value="1" @if(old('products') == 1) selected @endif>Si</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="start_time" class="col-md-4 col-form-label ">Start Date</label>
                        <input type="date" name="start_time" id="start_time" class="form-control" value="{{ old('start_time') }}">
                    </div>
                    <div class="form-group row">
                        <label for="end_time" class="col-md-4 col-form-label ">End Date</label>
                        <input type="date" name="end_time" id="end_time" class="form-control" value="{{ old('end_time') }}">
                    </div>
                    <button type="submit" class="btn btn-success rounded-pill pl-4 pr-4 fw-bold">Guardar</button>
                    
                </form>

            </div>
                
        </div>
          
    </div>
@endsection
