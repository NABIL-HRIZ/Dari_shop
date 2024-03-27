<section id="table_room" class="new-arrivals">
    <div class="container">
        <div class="section-header">
            <h2>Table Room</h2>
        </div><!--/.section-header-->
        <div class="new-arrivals-content">
            <div class="row">


                @foreach ($products as $product)
                    
                <div class="col-md-3 col-sm-4">
                    <div class="single-new-arrival">
                        <div class="single-new-arrival-bg">
                            <img src="{{'ProductImage/'.$product->image}}" alt="table images">
                            <div class="single-new-arrival-bg-overlay"></div>
                            <div class="sale bg-1">
                                <p> - {{$product->discount_price}} %</p>
                            </div>
                            <div class="new-arrival-cart">
                                
                                <form action="{{url('add_cart',$product->id)}}" method="POST">
                                    @csrf
                                    <p>
                                        <input type="number" name="quantity"  min="1"  style="width:60px;height:20px;margin-left:20px;color:#000" placeholder="Qnt ? " >
                                        <input type="submit" value="add to cart" style="background-color: transparent;color:#fff:border:none">
                                    </p>
                                </form>
                                <p class="arrival-review pull-right">
                                    <span class="lnr lnr-heart"></span>
                                    <a href="{{url('show_details',$product->id)}}"><span class="lnr lnr-frame-expand"></span></a>
                                </p>
                            </div>
                        </div>
                        <h4 style="margin-top: 20px">{{$product->title}}</h4>
                        <p class="arrival-product-price">MAD {{$product->price}}</p>
                        <p class="arrival-product-price">Quantity {{$product->quantity}}</p>

                    </div>
                </div>

                @endforeach



                

            </div>
        </div>
    </div><!--/.container-->

</section><!--/.new-arrivals-->