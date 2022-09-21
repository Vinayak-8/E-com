@extends('layouts.admin')

@section('content')


  <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="me-md-3 me-xl-5">
                    @if(session('message'))
                        <h2>{{ session('message')}}</h2>
                    @endif
                  </div>            
                  
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">                  
                  <a class="btn btn-primary mt-2 mt-xl-0" href="{{url('admin/product')}}">Add Product</a>
                </div>
              </div>
            </div>
          </div>

          
        
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-center">
              <div class="container flex justify-center mt-4 ">
                <div class="container flex justify-center mt-4 ">
                        <table class="table table-border">
                          <thead>
                            <tr >
                              <th scope="col " class="font-semibold text-xl text-gray-800 leading-tight ">id</th>
                              <th scope="col " class="font-semibold text-xl text-gray-800 leading-tight ">Name</th>
                              <th scope="col " class="font-semibold text-xl text-gray-800 leading-tight ">image</th>
                              <th scope="col " class="font-semibold text-xl text-gray-800 leading-tight ">Original Price</th>
                              <th scope="col " class="font-semibold text-xl text-gray-800 leading-tight ">Our Price</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($data as $d)
                            <tr>
                              <td>{{$d->id}}</td>
                              <td>{{$d->name}}</td>
                              <td>
                                <iframe height="200"  width="100" src="{{ asset('/assets/'. $d->image) }}" target='_blank'></iframe>
                              </td>
                              <td>{{$d->original_price}}</td>
                              <td>{{$d->our_price}}</td>
                            </tr>
                            @endforeach
                            
                          </tbody>
                      </table>
                      <div class="d-flex justify-content-end mt-2 p-2">
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
                </div>
              </div>
            </div>
        </div>

       


          
  </div>



@endsection

