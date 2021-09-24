@extends('layouts.master')
@section('title', 'Make an Order')
@section('content')





    <div class="container">
        <h2 class="mt-3">My Orders</h2>
        <br>

        <div class="row mb-3">
            <div class="col-6">
                <div class="card">
                    <div class="card-body d-flex justify-content-between ">
                        <h5 class="card-title">On process </h5>
                        <h5>{{ $finishedOrderCount }}</h5>

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
                        <h5>{{ $finishedOrderCount }}</h5>

                    </div>
                </div>

            </div>

            <div class="col-6 ">
                <div class="card">
                    <div class="card-body d-flex justify-content-between ">
                        <h5 class="card-title">Canceled</h5>
                        <h5>{{ $finishedOrderCount }}</h5>

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
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active  btn-lg" style="width: 150px ; " id="v-pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                    aria-selected="true">On Process</button>
                <button class="nav-link btn-lg" id="v-pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                    aria-selected="false">On Delivery</button>
                <button class="nav-link btn-lg" id="v-pills-messages-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                    aria-selected="false">Delivered</button>
                <button class="nav-link btn-lg" id="v-pills-settings-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
                    aria-selected="false">Canceled</button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="row   g-4">
                        @foreach ($order as $orderw)

                            <div class="col-10  mb-3">
                                <div class="card h-100">

                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Order #: {{ $orderw->id }} </h5>

                                        <input type="hidden" name="order_id" value="dd">


                                        <div class="mx-3">
                                            <h6>Order Status:</h6>
                                            <h6>Order Date: {{ $orderw->created_at }}</h6>
                                            <h6>Order Price: {{ $orderw->total }}</h6>

                                        </div>
                                    </div>

                                    <div class="card-footer  d-flex justify-content-between" >
                                        <small class="text-muted"> <a href="{{ url('singleorder/' . $orderw->id) }}"
                                                class="   ">Order Details</a></small>
                                    <small><a href="" class="   " data-bs-toggle="modal"
                                      data-bs-target="#exampleModal_{{ $orderw->id }}">Delete</a> 
                                      </small>
                                    </div>
                                </div>
                            </div>




                            <div class="modal fade" id="exampleModal_{{ $orderw->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete your order?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <form action="{{ url('singleorder/' . $orderw->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                        @endforeach


                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="row   g-4">
                        @foreach ($order as $orderw)

                            <div class="col-10  mb-3">
                                <div class="card h-100">

                                    <div class="card-body">
                                        <h5 class="card-title">Order #: {{ $orderw->id }} </h5>


                                        <div class="mx-3">
                                            <h6>Order Status:</h6>
                                            <h6>Order Price:</h6>
                                            <h6>Order Price:</h6>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <small class="text-muted">Last updated {{ $orderw->created_at }}</small>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="row   g-4">
                        @foreach ($order as $orderw)

                            <div class="col-10  mb-3">
                                <div class="card h-100">

                                    <div class="card-body">
                                        <h5 class="card-title">Order #: {{ $orderw->id }} </h5>


                                        <div class="mx-3">
                                            <h6>Order Status:</h6>
                                            <h6>Order Date: {{ $orderw->created_at }}</h6>
                                            <h6>Order Price: {{ $orderw->total }}</h6>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <small class="text-muted">Last updated </small>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="row   g-4">
                        @foreach ($order as $orderw)

                            <div class="col-10  mb-3">
                                <div class="card h-100">

                                    <div class="card-body">
                                        <h5 class="card-title">Order #: {{ $orderw->id }} </h5>


                                        <div class="mx-3">
                                            <h6>Order Status:</h6>
                                            <h6>Order Price:</h6>
                                            <h6>Order Price:</h6>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <small class="text-muted">Last updated {{ $orderw->created_at }}</small>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>






    </div>














@endsection
