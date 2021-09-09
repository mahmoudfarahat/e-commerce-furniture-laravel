{{--
@include('shared.header')

@include('shared.nav') --}}

@extends('layouts.master')
@section('title','Add Products')
@section('content')

<div class="container ">
    <form  action="{{url('/product/'.$product->id) }}" method="post"  enctype="multipart/form-data"  >
        @if(Session::has('post_updated'))
        <div class="alert-success alert" role="alert">
            {{Session::get('post_updated')}}
        </div>
        @endif
        @csrf
        <input type="hidden" name="_method" value="put">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Product Name</label>
          <input value='{{ $product->prodname}}'  type="text" class="form-control  @error('prodname') is-invalid @enderror  "   name="prodname" >
          @error('prodname')
          <div class="text-danger">{{ $message }} </div>
      @enderror
        </div>
        <div class="mb-3">
            <label   class="form-label">Product Picture</label>
            <input type="file" name="prodpicture" class="form-control  @error('file') is-invalid @enderror " >
            @error('file')
      <div class="text-danger">{{ $message }} </div>
  @enderror
          </div>


        <div class="mb-3">
            <label   class="form-label">Product Price</label>
            <input value='{{ $product->prodprice}}'  type="text" class="form-control  @error('prodprice') is-invalid @enderror "  name="prodprice" >
            @error('prodprice')
    <div class="text-danger">{{ $message }} </div>
@enderror
          </div>

          <div class="mb-3">
            <label   class="form-label">Quantity</label>
            <input type="number" value='{{ $product->quantity}}'  class="form-control  @error('quantity') is-invalid @enderror "  name="quantity" >
            @error('quantity')
    <div class="text-danger">{{ $message }} </div>
@enderror
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>






{{-- @include('shared.footer') --}}
@endsection
