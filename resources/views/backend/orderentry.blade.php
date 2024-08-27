@extends('backend.admin')

@section('content')
<nav class="navbar navbar-light bg-light">
  <form action="" class="form-inline">
    <input name="search_key" value="{{request()->search_key}}" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
<div class="container">

<div class="row">
            <!-- Product Section -->
            <div class="col-md-8">
                <div class="row">
                  
    <p>"
    {{ $products->count() }} items found for"
</p>
                @foreach ($products as $product )

                    <!-- Product Card 1 -->
                    <div class="col-md-3">
                        <div class="card product-card">
                            <img src="{{url('/uploads/'.$product->image)}}" class="card-img-top" alt="Product 1">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <p class="card-text">{{$product->price}} BDT</p>
                                <a href="{{route('Add.to.cart',$product->id)}}" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    <!-- Repeat Product Card 2 through 5 here with appropriate image, title, and price -->
                    
                    <!-- Add more product cards as needed -->
                </div>
            </div>

            <!-- Cart Summary Section -->
            <div class="col-md-4">
                <div class="cart-summary">

                    <h4>Cart Summary</h4>
                    
                    <p><strong>Item :</strong>
                    @if(session()->has('basket'))
                    {{count(session()->get('basket'))}}item(s) 
                    @else
                    0item(s) @endif
                  </p>
                  <table class="table">
  <thead>
    <tr>
    <th scope="col">SL</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  @if(session()->has('basket'))
  
  @php 
  $i=0;
  @endphp

    @foreach($myCart as $key=>$product)
    <tr>
      <th scope="row">{{++$i}}</th>
      <td>{{$product['product_name']}}</td>
      <td>{{$product['quantity']}}</td>
      <td>{{$product['subtotal']}}</td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
                    
                    <!-- Add more items dynamically -->
                    <hr>
                    <p><strong>SubTotal:</strong> 
                    @if(session()->has('basket'))
                    {{array_sum(array_column(session()->get('basket'),'subtotal'))}} BDT
                    @else
                    BDT @endif


                  </p>



                  <form action="{{route('order.place')}}" method="post">
                    @csrf
                  <div class="form-group">
                    <lebel for="name">Enter Customer Name</lebel>
                    <input name="receiver_name"type="text" class="form-control" id="name" aria-describedby="emailHelp">
                   </div>

                   <div class="form-group">
                    <lebel for="name">Enter Customer email Address</lebel>
                    <input name="receiver_email"type="text" class="form-control" id="name" aria-describedby="emailHelp">
                   </div>

                  <div class="form-group">
                    <lebel for="name">Enter Customer Address</lebel>
                    <input name="address"type="text" class="form-control" id="name" aria-describedby="emailHelp">
                   </div>

                   <div class="form-group">
                    <lebel for="name">Enter Customer mobile number</lebel>
                    <input name="receiver_mobile"type="text" class="form-control" id="name" aria-describedby="emailHelp">
                  </div>


                  <div class="form-check">
  <input class="form-check-input" type="radio" name="paymentMethod" value="cod" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Cash on Delivery
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="paymentMethod" value="cash" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Cash
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="paymentMethod" value="Bkash" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Bkash
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="paymentMethod" value="Nagad" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Nagad
  </label>
</div>


<div class="form-check">
  <input class="form-check-input" type="radio" name="paymentMethod" value="Rocket" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Rocket
  </label>
</div>





                    <button type="submit" class="btn btn-success">Place Order</button>
                    </form>




                </div>
            </div>
        </div>
</div>

@endsection