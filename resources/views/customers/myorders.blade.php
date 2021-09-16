@extends('layouts.master')
@section('title', 'Make an Order')
@section('content')







    <div class="container">
        <h2>My Orders</h2>
        <br>

        <div class="row mb-3">
            <div class="col-6">
                <div class="card">
                    <div class="card-body d-flex justify-content-between ">
                        <h5 class="card-title">On process </h5>
                        <h5>{{$finishedOrderCount}}</h5>

                    </div>
                </div>

            </div>
            <div class="col-6 mb-3">
                <div class="card ">
                    <div class="card-body d-flex justify-content-between">
                        <h5 class="card-title">On Delivery</h5>
                        <h5> {{ $onDeliveryOrderCount }}</h5>

                    </div>
                </div>

            </div>
            <div class="col-6 ">
                <div class="card">
                    <div class="card-body d-flex justify-content-between ">
                        <h5 class="card-title">Delivered </h5>
                        <h5>{{$finishedOrderCount}}</h5>

                    </div>
                </div>

            </div>

            <div class="col-6 ">
                <div class="card">
                    <div class="card-body d-flex justify-content-between ">
                        <h5 class="card-title">Canceled</h5>
                        <h5>{{$finishedOrderCount}}</h5>

                    </div>
                </div>

            </div>
        </div>


        <hr>

        {{-- @foreach ($order as $orderw)
        <div class="  mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('uploads/products/' . $product->prodpicture) }}" class="img-fluid rounded-start"alt="">


              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
          @endforeach --}}


          @foreach ($order as $orderw)
          <div class="row row-cols-1 row-cols-md-9 g-4">
            <div class="col">
              <div class="card h-100">

                <div class="card-body">
                  <h5 class="card-title">Order #: {{ $orderw->id }} </h5>
                  {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div> --}}
                <div class="">
                    <h6>Order Status</h6>
                </div>


                <div class="card-footer">
                  <small class="text-muted">Last updated   {{ $orderw->created_at }}</small>
                </div>
              </div>
            </div>
          </div>
          @endforeach



        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    {{-- <th scope="col">Total Price</th> --}}
                    <th scope="col">Data Order</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>

            </thead>
            <tbody>
                @foreach ($order as $orderw)
                    <tr>
                        <th scope="row">{{ $orderw->id }}</th>
                        {{-- <td></td> --}}
                        <td>{{ $orderw->created_at }}</td>
                        <td>{{ $orderw->quantities }}</td>



                    @if    ($orderw->finished == 1 );
                         @php $finished = 'bg-success'; @endphp
                    @else
                    @php $finished = 'bg-danger'; @endphp
                    @endif
                        <td class="{{$finished }}"></td>
                        <td class="  ">
                            <a href="{{url('singleorder/'.$orderw->id)}}" class="btn btn-primary">Open</a>

                            <a  href=""  class="  btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$orderw->id}}">Delete</a>
                        </td>



                    </tr>

                    <div class="modal fade" id="exampleModal_{{$orderw->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete your order?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="{{ url('singleorder/'.$orderw->id ) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>









                @endforeach
            </tbody>
        </table>
    </div>














@endsection
