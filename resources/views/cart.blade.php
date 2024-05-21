@extends('layout')

@section('title', 'Shopping Cart')

@section('content')

<style>
    /* public/css/custom.css */

/* Style for the main content */

h2{
    text-align: center;
    margin-bottom: 4rem;
}
.shopping-cart {
    padding-top: 20px;
    margin-bottom: 5rem;
}

/* Style for the table */
.shopping-cart table {
    width: 90%;
    margin-left: 4rem;
}

/* Style for table headings */
.shopping-cart th {
    text-align: center;
}

.shopping-cart td {
    text-align: center;
}

/* Style for input field */
.shopping-cart input[type="number"] {
    width: 60px;
    text-align: center;
}

/* Style for update button */
.shopping-cart .btn-update {
    margin-right: 5px;
}

/* Style for delete icon */
.shopping-cart .btn-delete {
    color: red;
}

/* Style for the sidebar */
.cart-total {
    padding: 20px;
    background-color: #f8f9fa;
    border: 1px solid #ced4da;
    border-radius: 5px;
}

/* Style for the heading */
.cart-total h2 {
    margin-bottom: 20px;
}

/* Style for the total price */
.cart-total p {
    font-size: 18px;
    font-weight: bold;
}


.image-name-container{
    display: flex;
    align-items: center;
}

.image-holder{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 20px;
}

.details-holder{
    display: flex;
    flex-direction: column;
    justify-content: center;
}




</style>
<div class="row shopping-cart">
    <div class="col-md-8">
        <h2>Shopping Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Iterate through your cart items -->
                @php $totalPrice = 0; $var = 0; @endphp
                
                @foreach ($cartItems as $product)
                <tr>
                    <td>
                        <div class="image-name-container">
                            <img class="image-holder" src="{{ $product->image ? asset('products/' . $product->image) : asset('images/temppic.jpeg') }}" alt="Product Image">
                            <div class="details-holder">
                                <b>{{$product->name}}</b>
                                <p>Price: ৳{{ number_format($product->price, 2) }}</p>
                            </div>
                        </div>
                    </td>
                    <td style="display: flex; flex-direction:column; text-align:center;">
                        <div>
                            <input style="margin-left: 10rem; margin-top:1rem; margin-bottom: 1rem;" type="number" class="form-control" value="{{ $product->quantity }}" min="1" max="10">
                        </div>
                        <div class="inside-of-quantity">
                            <button class="btn btn-primary btn-update">Update</button>
                            <a href="#" class="btn-delete"><i class="fas fa-trash-alt"></i></a>
                        </div>
                        
                    </td>
                    <td>
                        ৳ {{number_format( $var = $product->price * $product->quantity, 2) }}
                        @php $totalPrice += $var; @endphp
                    </td>
                    
                </tr>
                @endforeach
                <!-- Repeat the above row for each product in the cart -->
            </tbody>
        </table>
    </div>
    <div class="col-md-4 cart-total">
        <h2>Cart Total</h2>
        <p>Total Price: ৳ {{$totalPrice}}</p>
        <!-- You can display any other relevant cart information here -->
    </div>
</div>
@endsection