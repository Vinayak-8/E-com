@extends('layouts.admin')

@section('content')

@include('sweetalert::alert')

<div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4>Product 
                            <a class="btn btn-primary mt-2 mt-xl-0 float-end" href="{{url('admin/dashboard')}}">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('admin/uploadproduct') }}" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3" >                                
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="{{old('name')}}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" class="form-control"  >
                                            @if ($errors->has('name'))
                                                <span class="invalid feedback text-red-600 " role="alert">
                                                    <strong>{{ $errors->first('name') }}.</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="col-md-6 mb-3" >                                
                                            <label for="">Image</label>
                                            <input type="file" name="image" value="{{old('image')}}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" class="form-control">
                                            @if ($errors->has('image'))
                                                <span class="invalid feedback text-red-600 " role="alert">
                                                    <strong>{{ $errors->first('image') }}.</strong>
                                                </span>
                                            @endif
                                           
                                    </div>
                                    <div class="col-md-6 mb-3" >                                
                                            <label for="">Original Price</label>
                                            <input type="text" name="original_price" value="{{old('original_price')}}"  class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" class="form-control" >
                                            @if ($errors->has('original_price'))
                                                <span class="invalid feedback text-red-600 " role="alert">
                                                    <strong>{{ $errors->first('original_price') }}.</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="col-md-6 mb-3" >                                
                                            <label for="">Our Price</label>
                                            <input type="text" name="our_price" value="{{old('our_price')}}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" class="form-control" >
                                            @if ($errors->has('our_price'))
                                                <span class="invalid feedback text-red-600 " role="alert">
                                                    <strong>{{ $errors->first('our_price') }}.</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div  class="flex justify-end mt-1 btn btn-success  ">
                                        <button  type="submit" class="btn btn-success ">
                                            Add Product
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>               
            </div>
</div>
@endsection