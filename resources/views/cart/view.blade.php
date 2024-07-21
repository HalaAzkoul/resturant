<!-- resources/views/cart/show.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cart - Klassy Cafe</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-klassy-cafe.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .table {
            margin-top: 20px;
        }

        .img-fluid {
            border-radius: 5px;
        }

        .btn-sm {
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Your Cart</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($carts->isEmpty())
            <p class="text-center">Your cart is empty.</p>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Meal</th>
                            <th scope="col">Description</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                        @foreach ($cart->foods as $food)
                        <tr>
                            <td>
                                <img src="{{ asset('images/' . $food->image) }}" class="img-fluid" style="max-width: 100px;" alt="{{ $food->title }}">
                            </td>
                            <td>{{ $food->title }}</td>
                            <td>{{ $food->description }}</td>
                            <td>
                                <form action="{{ route('cart.update', $food->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $food->pivot->quantity }}" min="1" class="form-control d-inline-block" style="width: 60px;">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                            <td>${{ $food->price }}</td>
                            <td>${{ $food->price * $food->pivot->quantity }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $food->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endforeach

                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- JavaScript and jQuery -->
    <script src="{{ asset('assets/js/jquery-2.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
