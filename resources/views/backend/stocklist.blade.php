@extends('backend.master')

@section('content')


<nav class="navbar navbar-light bg-light">
  <form action=""class="form-inline">
    <input name="search_key" value="{{request()->search_key}}" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>



<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Product Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Category Name</th>


      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($allStock as $stock)

    <tr>
      <th scope="row">{{$stock->id}}</th>

  <td>
    <img src="{{url('/uploads/'.$stock->image)}}" alt=""width="60">
  </td>
      
     
      <td>{{$stock->name}}</td>
      <td>{{$stock->price}}</td>
        <td>
    {{$stock->category->name}}
  </td>
  


  <td>
        <a class="btn btn-success" href="">View</a>
      <a class="btn btn-info" href="">Edit</a>
      <a class="btn btn-danger" href="">Delete</a>
    </td>
      
    
      
      
    </tr>
   

@endforeach



  </tbody>
</table>





@endsection