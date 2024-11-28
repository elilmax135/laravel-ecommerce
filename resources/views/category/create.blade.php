@extends('layout')
@section('content')

<link rel="stylesheet"  href="{{asset('ecweb/css/table.css')}}">

<link rel="stylesheet"  href="{{asset('ecweb/css/input.css')}}">
<div >
    <div>
        <!-- Back Button -->
        <a href="{{ url()->previous() }}" class="back-btn">Back</a>
    </div>

    <div >
        <h1>welcome</h1>

        <table>
            <thead>

        <form action="{{ url('category') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <tr><th>  <label>Name</label></br></th>

           <th> <label>status</label></br></th></tr>



          <tr><td>  <input type="text" name="name" id="name" ></br></td>
          <td>  <input type="boolean" name="boolean" id="boolean" ></br></td></tr>

       <tr><td colspan="2">     <input type="submit" value="Save" class="submit-btn"></br></td></tr>
        </form>
        </table>
  </div>


@endsection
