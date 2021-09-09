@extends('layouts.master')
@section('title','Import Data')

@section('content')

<form class="m-5" action="{{url('importoo')}}" method="POST" enctype="multipart/form-data" >

    @csrf

<input type="file" name="file"  class="form-control">


<button type="submit">Submit</button>

</form>
@endSection
