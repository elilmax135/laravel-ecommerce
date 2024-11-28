@extends('layout')
@section('content')

<link rel="stylesheet"  href="{{asset('ecweb/css/table.css')}}">

<link rel="stylesheet"  href="{{asset('ecweb/css/input.css')}}">
<div>
    <!-- Back Button -->
    <a href="{{ url()->previous() }}" class="back-btn">Back</a>
</div>
<div>

</div>

      <form action="{{ url('category/' .$categories->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$categories->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$categories->name}}" ></br>
        <label>Status</label></br>
        <input type="boolean" name="status" id="status" value="{{$categories->status}}"></br></br>

        <input type="submit" value="Update" class="submit-btn"></br>
    </form>

  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/4.0.0/apexcharts.min.js"></script>
    <!-- custom js  -->
    <script src="{{asset('ecweb/js/ecom.js')}}"> </script>



@stop
