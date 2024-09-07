

<div class="container">

<!-- print area suru -->

    <div class="card" id="printArea">
        <div class="card-header">
            Invoice
            <strong>{{$placeorder->created_at}}</strong>
            <span class="float-right"> <strong>Status:</strong> {{$placeorder->status}}</span>

        </div>
        <div class="card-body">
        <img src="{{url('/logo.png')}}" alt="" style="width: 100px;">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3">From:</h6>
                    <div>
                        <strong>SK Traders</strong>
                    </div>
                    <div></div>
                    <div>Narayanganj,Dhaka</div>
                    <div>Email:kawserahmed1512@gmail.com</div>
                    <div>Phone:01771064713</div>
                </div>

                <div class="col-sm-6">
                    <h6 class="mb-3">To:</h6>
                    <div>
                        <strong>{{$placeorder->receiver_name}}</strong>
                    </div>
                 
                    <div>{{$placeorder->receiver_address}}</div>
                    <div>Email: {{ $placeorder->receiver_email }}</div>
                    <div>Phone: {{$placeorder->receiver_mobile}}</div>
                </div>



            </div>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Item</th>
                          

                            <th class="right">Product Name</th>
                            <th class="center">Qty</th>
                            <th class="right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>


                    @foreach ($placeorder->selldetails as $key=> $item)
                        
                        <tr>
                            <td class="center">{{$key+1}}</td>
                            <td class="center"><img style="width: 50px;" src="{{url('/uploads/'.$item->product->image)}}" alt=""></td>
                            <td class="left strong">{{$item->product->name}}</td>
                            <td class="right">{{$item->product_unit_price}}</td>
                            <td class="center">{{$item->product_quantity}}</td>
                            <td class="right">{{$item->subtotal}}</td>
                        </tr>

                        @endforeach
                       
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">

                </div>

                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                    
                          
                            <tr>
                                <td class="left">
                                    <strong>Total</strong>
                                </td>
                                <td class="right">
                                    <strong>{{$placeorder->total_amount}}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                  

                </div>

            </div>

        </div>
    </div>

    <!-- print area sesh -->
</div>



