@extends('layouts.master')
@section('title','Cart')

@section('content')



  <div class="container">

    <h1 href="">Shopping cart</h1>

    <div class="row">


        <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)

              <tr>
                <th scope="row">
                    <div class="d-flex">
                        <div class="col-md-2    ">
                            <img src="{{ asset('uploads/products/'.$product->prodpicture)}}"  class="card-img-top"    alt="">

                        </div>
                        <div class="ms-4">
                            <a  href="{{url('')}}" class="  mb-4 d-block ">{{$product->prodname }}</a>
                            <form action="{{url('/cart/'.$product->id)}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <button  class="text-danger btn">Remove</button>
                                <a  class="text-danger btn" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$product->id}}" >Edit qauntity</a>


                            </form>


                        </div>

                    </div>

                </th>
                <td>
                    <p class="card-text mb-0">${{$product->prodprice }}  </p>

                </td>
                <td>
                    <p class="card-text mb-0"> {{$product->c_quantity }}  </p>


                </td>
                <td>
                    <p class="card-text mb-0"> ${{$product->total}} </p>



                </td>
              </tr>

              <div class="modal fade" id="exampleModal_{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add the product to you cart</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ url('/cart/' . $product->id ) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="put">
{{ $product->id }}
                            <div class="modal-body">
                                <label class="mb-2">Quantity:</label>
                                <input class="form-control" name="quantity" type="number">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>



              @endforeach

            </tbody>

        </table>

        <div class="d-flex justify-content-between mb-3">
            <h2>     Subtotal</h2>
<h2> ${{$total}} </h2>
        </div>

        <a href="{{url('orderCart')}}" class="btn btn-dark">Check Out</a>
    

    </div>


</div>













@endSection
