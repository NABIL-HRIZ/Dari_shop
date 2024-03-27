

<div>

    <div style="display: flex;justify-content:space-between;align-items:center">
        
        <img src="assets/images/blog/b2.jpg" alt="feature image" style="width: 200px">
        <img src="assets/images/blog/b3.jpg" alt="feature image" style="width: 200px;margin-left:250px">
       
    </div>
    <div>
        <h1 style="font-size:80px;color:rgb(132, 132, 193);text-align:center">ORDER DETAILS</h1>

        <br>
        <div style="border: 2px solid black;padding:20px">
            <h3>Customer ID : {{$data->id}}</h3>
            <h3>Customer Name : {{$data->customer_name}}</h3>
            <h3>Customer Phone : {{$data->customer_phone}}</h3>
            <h3>Customer Email : {{$data->customer_email}}</h1>
            <h3>Customer Address : {{$data->customer_address}}</h3>
            <h3>Product Title : {{$data->product_title}}</h3>
            <h3>Product Quantity : {{$data->product_quantity}}</h3>
            <h3>Product Total Price : {{$data->product_price * $data->product_quantity}} MAD</h3>
            <h3>Payment Status : {{$data->payment_status}}</h3>
            <h3>Delivery Status : {{$data->delivery_status}}</h3>
            <br>
            <img src="{{'ProductImage/'.$data->product_image}}" alt=""  style="width:500px;height:300px">
        </div>
       



        <div style="text-align: center;background-color:rgba(0,0,0,0.1);padding:20px;margin-top: 20px">
        <h3>Thanks For Your Order</h3>
        <h3>Date: {{$data->created_at}}</h3>
        <h3>Signature</h3>
        
        </div>


    </div>
</div>