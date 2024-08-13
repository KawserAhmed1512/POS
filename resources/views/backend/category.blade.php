@extends('backend.master')

@section('content')

<h1> Item Category </h1>
<a class="btn btn-primary" href="{{route('category.form')}}">Create category</a>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">category name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>



@foreach ($allcategory as $cat)




    <tr>
      <th scope="row">{{$cat->id}}</th>
      <td>{{$cat->name}}</td>
   
      <td>{{$cat->status}}</td>


      
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