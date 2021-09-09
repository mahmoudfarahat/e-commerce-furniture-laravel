
@extends('layouts.master')
@section('title','Sign In')
@section('content')

<div class="container d-flex justify-content-center  ">
    <form  class="signup-form col-lg-4 col-xxl-3 col-md-5 col-sm-7   "   action="{{ url('/customer') }}" method="post">
      <h4>Sign Up as a Customer</h4>
      <hr>
      @csrf
    <div class="mb-3">

  <input placeholder="name" name="name" type="text" class="form-control    @error('name') is-invalid @enderror"       >
  @error('name')
          <div class="text-danger">{{ $message }} </div>
      @enderror
</div>

<div class="mb-3">
  <input placeholder="email" name="email" type="text" class="form-control    @error('email') is-invalid @enderror"    >
  @error('email')
  <div class="text-danger"> {{ $message }}</div>
@enderror
</div>
<div class="mb-3">
  <input placeholder="Password" name="password" type="password" class="form-control    @error('password') is-invalid @enderror"       >
  @error('password')
          <div class="text-danger">{{ $message }} </div>
      @enderror
</div>




        <button type="submit" class="btn btn-danger submit-btn">Sign Up</button>

      </form>

 </div>


 @endsection
