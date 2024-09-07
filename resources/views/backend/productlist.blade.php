@extends('backend.master')


@section('content')

<h1>proudct information list</h1>

@section('content')

<a class="btn btn-primary" href="{{route('product.create')}}">Create product</a>

<table class="table">
  <thead>
    <tr>
     
      <th scope="col">#</th>
      <th scope="col">product image</th>
    

      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Category Name</th>


      

      <th scope="col">Action</th>

      


    </tr>
  </thead>
  <tbody>

  @foreach ($allProduct as $key=>$product) 
<tr>
  <th scope="row">{{$key+1}}</th>
  <td>
    <img src="{{url('/uploads/'.$product->image)}}" alt=""width="60">
  </td>

  <td>
    {{$product->name}}
  </td>

  <td>
    {{$product->price}}
  </td>

  <td>
    {{$product->category->name}}
  </td>

 <td>

 <a class="btn btn-Primary" href="">View</a>
 <a href="{{route('product.delete',$product->id)}}"class="btn btn-danger">Delete</a>

 <a href="{{route('product.edit',$product->id)}}"class="btn btn-success">Edit</a>
 </td>

</tr>

@endforeach
  </tbody>
</table>



{{$allProduct->links()}}




@endsection

