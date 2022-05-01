@extends('layouts.admin')
@section('title', 'My Profile')
@section('content')




    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a  href = "{{url("dashboard/orders")}}" class="nav-link " id="home-tab"  data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Orders</a>

            </li>
            <li  class="nav-item" role="presentation">
                <a  href = "{{url("dashboard/products")}}" class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    role="tab" aria-controls="profile" aria-selected="false">Products</a>
            </li>
            <li class="nav-item" role="presentation">
                <a herf = "{{url("")}}"  class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                    role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li>
        </ul>

        @if (Session::has('product_added'))
        <div class="alert-success alert mt-2 mb-1" role="alert">
            {{ Session::get('product_added') }}
        </div>
    @endif
    @if (Session::has('produts_deleted'))
    <div class="alert-danger alert mt-2 mb-1" role="alert">
        {{ Session::get('produts_deleted') }}
    </div>
@endif

                <form action="{{ url('multidelete') }}" method="post">
                    <input type="hidden" name="_method" value="delete">
                    @csrf
                    <div class="d-flex justify-content-end">
                <a href="{{ url('product/create') }}" class="btn btn-primary mt-1 mx-1">Add product</a>

                        <button type="submit" class="btn btn-danger mt-1  ">Delele</button>
                    </div>


                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Price</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($products as $product)
                            <tr >



                                    <th   class="align-middle  " ><input type="checkbox"   name="id[]"  value="{{ $product->id }}"></th>



                                <th  class="align-middle"  scope="row"> {{ $product->id }}</th>
                                <td  class="align-middle" >{{ $product->prodname }}</td>
                                <td  class="align-middle" ><img src="{{ $product->prodpicture }}" class="img-thumbnail" height="100px"
                                        width="100px"></td>
                                <td  class="align-middle" >${{ $product->price }}</td>

                                <td  class="align-middle" >

                                    <a href="{{url('product/'.$product->id)}}" class="btn btn-success ">Edit</a>
                                    {{-- <form action="{{ url('/product/' . $product->id) }}" method="post"    >
                                        @csrf

                                        <input type="hidden" name="_method" value="delete">

                                        <button class="btn btn-danger">Delete</button>


                                </form> --}}
                            </td>
                            </tr>

                        @endforeach


                    </tbody>

                </table>
            </form>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>


    </div>





















@endsection
