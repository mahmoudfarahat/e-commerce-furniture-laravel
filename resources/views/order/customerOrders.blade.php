@extends('layouts.master')
@section('title','Make an Order')
@section('content')






<div class="container">


    <a href="" class="btn btn-danger">Delete The Order</a>
    <a href="" class="btn btn-success" >Deliver The Order</a>


<table class="table">
  <thead>
    <tr>
      <th scope="col"> <h4>Customer Information:</h4></th>
      <th scope="col"> </th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Name</th>
      <td>{{$customer->name}}</td>

    </tr>
    <tr>
        <th scope="row">Phone</th>
        <td>{{$order->phone}}</td>

      </tr>
    <tr>
      <th scope="row">Country</th>
      <td>{{$order->country}}</td>

    </tr>
    <tr>
        <th scope="row">City</th>
        <td>{{$order->city}}</td>

      </tr>
    <tr>
      <th scope="row">Street</th>
      <td>{{$order->street}}</td>

    </tr>
  </tbody>
</table>




    <h2>Order Information:</h2>

    <div class="row">
        @foreach ($products as $product)
        <div class="col-3">
                <div class="card"  >

                <img src="{{ asset('uploads/products/'.$product->prodpicture)}}"  class="card-img-top"    alt="">

                    <div class="card-body">
                      <h5 class="card-title">{{$product->prodname }}</h5>
                      <div class="d-flex justify-content-between">
                        <p class="card-text">{{$product->prodprice }}$</p>


                      </div>



                    </div>

            </div>
        </div>
        @endforeach
    </div>


</div>



@endsection
