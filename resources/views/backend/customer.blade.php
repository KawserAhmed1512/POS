@extends('backend.master')

@section('content')



<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Customer Address</th>
      <th scope="col">Customer Mobile</th>
      <th scope="col">Payment Method</th>
      <th scope="col">Total Amount</th>
      <th scope="col">Order Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>



  @foreach($allcustomer as $key=>$customer)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$customer->receiver_name}}</td>
      <td>{{$customer->receiver_email}}</td>
      <td>{{$customer->receiver_mobile}}</td>
      <td>{{$customer->payment_method}}</td>
      <td>{{$customer->total_amount}}</td>
      <td>{{$customer->status}}</td>
      
      

      
      <td>
        <a href="{{route('invoice',$customer->id)}}" class="btn btn-success" href="">View</a>
     
    </td>
    <td>
        <a href="{{route('cancel.order',$customer->id)}}" class="btn btn-success" href="">Cencel</a>
     
    </td>

    </tr>

    @endforeach
   


  </tbody>
</table>
{{$allcustomer->links()}}





@endsection