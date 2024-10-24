@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Discount</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('discounts.update', $discount->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label ">Discount Name</label>
                                <input type = "text" name = "name" id="name" class="form-control" value="{{$discount->name}}">
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label ">Description</label>
                                <input type = "text" name = "description" id="description" class="form-control" value="{{$discount->description}}">
                            </div>
                            <div class="form-group row">
                                <label for="discount" class="col-md-4 col-form-label ">Discount</label>
                                <input type = "text" name = "discount" id="discount" class="form-control" value="{{$discount->discount}}">
                            </div>
                            <div class="form-group row">
                                <label for="pets">Pets: </label>
                                <select name="pets" id="pets" class="form-control">
                                    <option value="0" @if($discount->pets == 0) selected @endif>No</option>
                                    <option value="1" @if($discount->pets == 1) selected @endif>Yes</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="products">Products: </label>
                                <select name="products" id="products" class="form-control">
                                    <option value="0" @if($discount->products == 0) selected @endif>No</option>
                                    <option value="1" @if($discount->products == 1) selected @endif>Yes</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label for="start_time" class="col-md-4 col-form-label ">Start Date</label>
                                <input type = "date" name = "start_time" id="start_time" class="form-control" value="{{$discount->start_time}}">
                            </div>
                            <div class="form-group row">
                                <label for="end_time" class="col-md-4 col-form-label ">End Date</label>
                                <input type = "date" name = "end_time" id = "end_time" class="form-control" value="{{$discount->end_time}}">
                            </div>

                            <div class="form-group row">
                                <label for="status">Status: </label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0" @if($discount->status == 0) selected @endif>No</option>
                                    <option value="1" @if($discount->status == 1) selected @endif>Yes</option>
                                </select>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Discount
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

                            