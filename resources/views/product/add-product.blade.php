{{--
@include('shared.header')

@include('shared.nav') --}}
@extends('layouts.admin')
@section('title','Add Products')
@section('content')

<div class="container ">




    <form  action="{{url('/product') }}" method="post"  enctype="multipart/form-data"  class="col-5"  >

        @if (Session::has('product_added'))
        <div class="alert-success alert mt-3" role="alert">
            {{ Session::get('product_added') }}
        </div>
    @endif

        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Product Name</label>
          <input type="text" class="form-control  @error('prodname') is-invalid @enderror  "   name="prodname" >
          @error('prodname')
          <div class="text-danger">{{ $message }} </div>
      @enderror
        </div>
        {{-- <div class="mb-3">
          <label   class="form-label">Product Picture</label>
          <input type="text" class="form-control  @error('prodpicture') is-invalid @enderror " name="prodpicture" >
          @error('prodpicture')
    <div class="text-danger">{{ $message }} </div>
@enderror
        </div> --}}
        <div class="mb-3">
            <label   class="form-label">Product Picture</label>
            <input type="text" name="imglink" class="form-control  @error('file') is-invalid @enderror " >
            @error('file')
      <div class="text-danger">{{ $message }} </div>
  @enderror
          </div>
        <div class="mb-3">
            <label   class="form-label">Product Price</label>
            <input type="text" class="form-control  @error('prodprice') is-invalid @enderror "  name="prodprice" >
            @error('prodprice')
    <div class="text-danger">{{ $message }} </div>
@enderror
          </div>
          <div class="mb-3">
            <label   class="form-label">Quantity</label>
            <input type="number" class="form-control  @error('quantity') is-invalid @enderror "  name="quantity" >
            @error('quantity')
    <div class="text-danger">{{ $message }} </div>
@enderror
          </div>

          <div class="mb-3">
            <label   class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example"  name="category_id" >
                <option disabled  hidden  selected>Open this select menu</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach


              </select>

            {{--
            <input type="number" class="form-control  @error('quantity') is-invalid @enderror "  name="quantity" >
            @error('quantity')
    <div class="text-danger">{{ $message }} </div>
@enderror --}}
          </div>


        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>






{{-- @include('shared.footer') --}}
@endsection
