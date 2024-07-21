<!-- ***** Menu Area Starts ***** -->
<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($foods as $food)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="{{ asset('images/' . $food->image) }}" class="card-img-top" alt="{{ $food->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $food->title }}</h5>
                        <p class="card-text">{{ $food->description }}</p>
                        <p class="price">{{ $food->price }} s.p</p>
                        <form action="{{ route('cart.add', $food->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="food_id" value="{{ $food->id }}">
                            <div class="form-group">
                                <input type="hidden" name="quantity" value="1">

                                <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1">
                            </div> <button type="submit" class="btn btn-primary add-to-cart-btn">Add to Cart <i class="fa fa-cart-plus"></i></button>

                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>

</section>




<!-- ***** Menu Area Ends ***** -->


