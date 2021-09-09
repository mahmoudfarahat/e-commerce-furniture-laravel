
@extends('layouts.master')
@section('title','My Profile')
@section('content')

<div class="container">
    <div class="row mt-3 mb-3 ">
        <div class="col-3">
            <div class="card"  >
                <div class="card-body">
                  <h5 class="card-title">Orders</h5>
                  {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
                  <p class="card-text">{{$ordercount}}</p>
                  {{-- <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a> --}}
                </div>
              </div>
        </div>
        <div class="col-3">
            <div class="card"  >
                <div class="card-body">
                  <h5 class="card-title">Bending Orders</h5>
                  <p class="card-text">6</p>
                </div>
              </div>
        </div>
        <div class="col-3">
            <div class="card"  >
                <div class="card-body">
                  <h5 class="card-title">On Way Orders</h5>
                  <p class="card-text">6</p>
                </div>
              </div>
        </div>
        <div class="col-3">
            <div class="card"  >
                <div class="card-body">
                  <h5 class="card-title">Received Orders</h5>
                  <p class="card-text">6</p>

                </div>
              </div>
        </div>
    </div>

</div>
<div class="container">
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Orders</button>
          <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Product</button>
          <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Customers</button>
          <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="row">
                @foreach ($order as $orders)
                <div class="col-3">
                    <div class="card" >
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <h6 class="card-subtitle mb-2 text-muted">{{$orders->id}}</h6>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          {{-- <a href="#" class="card-link">Card link</a> --}}
                          <a href={{url('customerorders/'.$orders->id)}} class="card-link">Another link</a>
                        </div>
                      </div>
                </div>

                  @endforeach
              </div>

          </div>
          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              <div class="row">
            @foreach ($products as $product)
            <div class="col-3">
                    <div class="card"  >

                    <img src="{{ asset('uploads/products/'.$product->prodpicture)}}"  class="card-img-top"    alt="">

                        <div class="card-body">
                          <h5 class="card-title">{{$product->prodname }}</h5>
                          <div class="d-flex justify-content-between">
                            <p class="card-text">{{$product->prodprice }}$</p>
                            <p class="card-text">Quanity: {{$product->quantity }} </p>

                          </div>

                          <form action="{{url('/product/'.$product->id)}}" method="post">
                            @csrf
                            <a href="{{url('/product/'. $product->id  )}}" class="btn btn-success">Open</a>
                            <a href="{{url('/product/'. $product->id .'/edit/' )}}" class="btn btn-primary">Edit</a>

                            <input type="hidden" name="_method" value="delete">
                          <button   type="submit" class="btn btn-danger">Delete</button>
                          </form>

                        </div>

                </div>
            </div>
            @endforeach
        </div></div>
          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
        </div>
      </div>



</div>



















@endsection
