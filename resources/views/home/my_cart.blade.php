<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Navbar Styles */
        #home {
            background-image: url('assets/imgs/home-bg.jpg'); /* Background image */
            font-family: Arial, sans-serif;
            background-color: #343a40; /* Light background */
            color: #343a40; /* Dark text */
        }

        .navbar {
            background-color: #343a40; /* Dark background */
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .navbar .nav-link {
            color: #ffffff; /* White text */
            margin-right: 15px;
            font-weight: bold;
            text-transform: uppercase;
            transition: color 0.3s ease; /* Smooth hover effect */
        }

        .navbar .nav-link:hover {
            color: #ff3366; /* Highlight color on hover */
        }

        .navbar .brand-txt {
            color: #ff3366; /* Brand text color */
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .navbar .btn {
            background-color: #ff3366; /* Button background */
            color: white;
            border: none;
            padding: 5px 15px;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease; /* Smooth hover effect */
        }

        .navbar .btn:hover {
            background-color: #e62e5c; /* Darker shade on hover */
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1); /* Toggler border */
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%28255, 255, 255, 0.5%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        /* Table Styles */
        table {
        margin: 40px auto;
        border: 1px solid #343a40; /* Dark border */
        padding: 40px;
            background-color: #343a40; /* Same as navbar background */
            color: #ffffff; /* White text */
            border: 1px solid #ffffff; /* White border */
        }

        table th {
            background-color: #ff3366; /* Highlight color for table headers */
            color: #ffffff; /* White text */
            text-transform: uppercase;
            font-weight: bold;
        }

        table td {
            color: #ffffff; /* White text for table cells */
        }

        table tr:hover {
            background-color: #e62e5c; /* Slightly darker hover effect */
        }

        .btn-danger {
            background-color: #ff3366; /* Match button color with navbar */
            border: none;
        }

        .btn-danger:hover {
            background-color: #e62e5c; /* Darker shade on hover */
        }
        .cart-section {
    margin-top: 100px; /* Adjust the value as needed */
}
.div_center{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 50px;



}

label{
    color: white;
    display: inline-block;
    width: 200px;

} .div_deg{
    padding:20px;
}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- Navbar -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallary">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#book-table">Book-Table</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="assets/imgs/file.png" class="brand-img" alt="">
                <span class="brand-txt">Mazloum Resturant</span>
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Blog<span class="sr-only">(current)</span></a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('my_cart', Auth::id()) }}">Cart</a>
                        </li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="submit" class="btn btn-primary ml-xl-4" value="Logout">
                        </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </nav>

    <!-- Cart Section -->
    <div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
        <h1 class="text-center">My Cart</h1>
        <table class="table table-bordered">
      
                <tr>
                    <th>Food Title</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
          

            <?php 
            $total_price = 0;
            
            
            ?>



            
                @foreach ($cart as $data)
                    <tr>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->quantity }}</td>
                        <td><img src="{{ asset('food_img/' . $data->image) }}" alt="" width="100"></td>
                        <td>{{ $data->price }}</td>
                        <td><a onclick="return confirm('Are you sure to remove this ?')" href="{{ url('remove_cart', $data->id) }}" class="btn btn-danger">Remove</a></td>
                    </tr>
                    <?php

                    $total_price= $total_price + $data->price;
                    
                    
                    ?>
                @endforeach
           
        </table>

        <h3>Total price for the cart is:{{ $total_price }}</h3>


    </div>

    <div class="div_center">
        <form action="{{ url('confirm_order') }}" method="post">
            @csrf
            <div>
                <label for="">Name</label>
                <input type="text" name="name" value="{{Auth()->user()->name}}">
        
        
        
        <div class="div_deg">
                <label  for="">Email</label>
                <input  type="text" name="email" value="{{Auth()->user()->email}}">
        
        
        </div>
        <div  class="div_deg">
                <label for="">phone</label>
                <input type="number" name="phone" value="{{Auth()->user()->phone}}">
        
        
        </div>

        <div  class="div_deg">
                <label for="">Address</label>
                <input type="text" name="address" value="{{Auth()->user()->address}}">
                </div>

                <div  class="div_deg">
                    <input class="btn btn-info" type="submit" value="Confirm Order">
                </div>
               
        
        

                




        </form>
        </div>
    </div>

</body>
</html>