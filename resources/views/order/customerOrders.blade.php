@extends('layouts.admin')
@section('title','Make an Order')
@section('content')






<div class="container  ">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active link-a " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
           type="button" role="tab" aria-controls="nav-home" aria-selected="true">General</button>
          <button class="nav-link link-a " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
           type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Pilling and Shipping</button>
          <button class="nav-link link-a " id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
          type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Products</button>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row m-4">
                <div class=" row col-md-6 col-sm-12 ">
                    <div class="col-md-5 col-sm-12 fs-5 d-flex justify-content-end align-items-start ">
                        Order status
                    </div>
                    <div class="col-md-5 col-sm-12 text-muted fs-5">

                        {{$order->status}}
                        <div class="d-flex mt-4">
                            <a href="{{url('/cancelOrder/'.$order->id)}}" class="btn btn-danger">Cancel  </a>


                            <a href="{{url('/deliverOrder/'.$order->id)}}"  class="btn btn-primary ms-1">Deliver</a>

                            <a href="{{url('/delivered/'.$order->id)}}" class="btn btn-success ms-1">Complete</a>


                        </div>


                    </div>
                </div>
            </div>
            <div class="row m-4 ">
                <div class=" row col-md-6 col-sm-12">
                    <div class="col-md-5 col-sm-12 fs-5 d-flex justify-content-end align-items-start ">
                        Order Number
                    </div>

                    <div class="col-md-5 col-sm-12 text-muted fs-5  " >

                        {{$order->id}}
                    </div>
                </div>
            </div>
            <hr>
            <div class="row m-4">
                <div class=" row col-md-6 col-sm-12">
                    <div class="col-md-5 col-sm-12 fs-5 d-flex justify-content-end align-items-start ">
                        Customer name
                    </div>
                    <div class="col-md-5 col-sm-12 text-muted fs-5  ">

                        {{$customer->name}}
                    </div>
                </div>
            </div>
            <div class="row m-4">
                <div class=" row col-md-6 col-sm-12">
                    <div class="col-md-5 col-sm-12 fs-5 d-flex justify-content-end align-items-start ">
                       Order Total
                    </div>
                    <div class="col-md-5 col-sm-12 text-muted fs-5  ">

                        {{$order->total}}
                    </div>
                </div>
            </div>
            <hr>
           <div class="row m-4">
                <div class=" row col-md-6 col-sm-12">
                    <div class="col-md-5 col-sm-12 fs-5 d-flex justify-content-end align-items-start ">
                        Payment method
                    </div>
                    <div class="col-md-5 col-sm-12 text-muted fs-5  ">

                        {{$order->payment}}
                    </div>
                </div>
            </div>


            <div class="row m-4">
                <div class=" row col-md-6 col-sm-12">
                    <div class="col-md-5 col-sm-12 fs-5 d-flex justify-content-end align-items-start ">
                     Payment status
                    </div>
                    <div class="col-md-5 col-sm-12 text-muted fs-5  ">

                        bending
                    </div>
                </div>
            </div>
              <div class="row m-4">
                <div class=" row col-md-6 col-sm-12">
                    <div class="col-md-5 col-sm-12 fs-5 d-flex justify-content-end align-items-start ">
                        Created on
                    </div>
                    <div class="col-md-5 col-sm-12 text-muted fs-5  ">

                        {{$order->created_at}}
                    </div>
                </div>
            </div>
            <div class="row m-4">
                <div class=" row col-md-6 col-sm-12">
                    <div class="col-md-5 col-sm-12 fs-5 d-flex justify-content-end align-items-start ">
                        Updated on
                    </div>
                    <div class="col-md-5 col-sm-12 text-muted fs-5  ">

                        {{$order->updated_at}}

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row">
<div class="border col-4 p-3 mt-3">
<h4>Shipping Address</h4>
<br>
<h6>
    {{$order->country}}</h6>
    <h6> {{$order->city}}</h6>
    <h6> {{$order->street}}</h6>

<br>

<h6> Phone: {{$order->phone}}</h6>

</div>
<div class="col-4 mt-3 p-3">
   <h4> Shipping method:</h4>
<br>
      <h6> {{$order->delivery}}  </h6>
</div>

</div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">


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
                                <img src="{{ asset('uploads/products/'.$product->prodpicture)}}"  class=" w-100 h-100"    alt="">

                            </div>
                            <div class="ms-4">
                                <a  href="{{url('')}}"  class="  mb-4 d-block link-a ">{{$product->prodname }}</a>
                                <form action="{{url('/cart/'.$product->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    {{-- <a  class="text-danger btn m-0 p-0" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$product->id}}">Edit qauntity</a> --}}

                                    <button  class="text-danger d-block   btn m-0 p-0">Remove</button>


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

                  {{-- <div class="modal fade" id="exampleModal_{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                </div> --}}



                  @endforeach

                </tbody>

            </table>




      <div class="d-flex justify-content-between mb-3">
        <h2>     Subtotal</h2>
 <h2> ${{$order->total}} </h2>
    </div>


        </div>
      </div>






















</div>

</div>

</div>



@endsection
