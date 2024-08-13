@extends('backend.master')

@section('content')

<h1> Category Form </h1>
<form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">


@csrf 



  <div class="form-group">
    <label for="name">Enter Category Name</label>
    <input name="name"type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter category name">
    
  </div>



  <div class="form-group" style="margin-top: 10px;">
    <label for="name">Upload Image</label>
    <input name="image"type="file" class="form-control" id="name" placeholder="Enter category Name">
  </div>




  <button type="submit" class="btn btn-primary">Submit</button>


@endsection