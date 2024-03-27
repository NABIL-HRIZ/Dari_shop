<section id="populer-products" class="populer-products">
    <div class="container">
        <h1 style="font-size:30px;text-align:center;margin-bottom:30px">Populer Product<c/h1>

        <div class="populer-products-content">
            <div class="row mt-10">
              
                @foreach ($popular_product as $popular_product)
                    
               
                <div class="col-md-6">
                    <div class="single-populer-products">
                        <div class="single-inner-populer-products">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="single-inner-populer-product-img">
                                        <img src="{{'ProductImage/'.$popular_product->image}}" alt="populer-products images">
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <div class="single-inner-populer-product-txt">
                                        <h2 style="color: rgb(126, 126, 168)">
                                           
                                              {{$popular_product->title}}
                                           
                                        </h2>
                                        <p>
                                            {{$popular_product->description}}
                                        </p>
                                        <div class="populer-products-price">
                                            <h4>Sales Start from <span style="text-transform: uppercase">MAD  {{$popular_product->price}}</span></h4>
                                        </div>
                                        <form action="{{url('add_cart',$popular_product->id)}}" method="POST">
                                            @csrf
                                            <p>
                                                <input type="number" name="quantity"  min="1"  style="width:200px;height:40px;margin-left:20px;color:#000" placeholder="Qnt ? " >
                                                <input type="submit" value="Add to cart" style="background-color:black;color:#fff;height:40px">
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                
            </div>
        </div>
    </div><!--/.container-->

</section><!--/.populer-products-->