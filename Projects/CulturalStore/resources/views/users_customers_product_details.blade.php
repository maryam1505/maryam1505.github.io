@extends('layouts.master')
@section('content')

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
        @endif

        @if(session('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
        @endif

        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__pic">

                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-hash="product-1" class="product__big__img"
                                src="{{ asset('storage/' . $product['ProductImage']) }} " alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3>{{ $product->ProductName }} </h3>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product__details__price">$ {{ $product->Price }} </div>
                    <p> {{ $product->Description }} </p>
                    <div class="product__details__button">
                        <div class="quantity">
                            <span>Quantity: </span>
                            <div class="input-group quantity-input-group">
                                <button class="btn btn-outline-secondary" type="button" id="decreaseBtn">-</button>
                                <input type="number" class="form-control"  id="quantityInput" value="1" min="1"
                                    max="{{ $product->Stock }}">
                                <button class="btn btn-outline-secondary" type="button" id="increaseBtn">+</button>
                            </div>
                        </div>

                        <style>
                        .quantity {
                            display: flex;
                            align-items: center;
                            margin-top: 10px;
                        }

                        .quantity-input-group {
                            display: flex;
                            align-items: center;
                            width: 120px;
                            margin-left: 10px;
                        }

                        .quantity-input-group input {
                            text-align: center;
                            padding: 5px;
                        }

                        .quantity-input-group button {
                            width: 30px;
                            height: 30px;
                            padding: 0;
                            border: 1px solid #ddd;
                            background-color: #fff;
                        }

                        .quantity-input-group button:hover {
                            background-color: #f1f1f1;
                        }

                        .cart-btn.disabled {
                            pointer-events: none;
                            opacity: 0.5;
                        }
                        </style>

                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const quantityInput = document.getElementById('quantityInput');
                            const increaseBtn = document.getElementById('increaseBtn');
                            const decreaseBtn = document.getElementById('decreaseBtn');
                            const maxStock = {
                                {
                                    $product - > Stock
                                }
                            };

                            increaseBtn.addEventListener('click', function() {
                                let currentValue = parseInt(quantityInput.value);
                                if (currentValue < maxStock) {
                                    quantityInput.value = currentValue + 1;
                                }
                            });

                            decreaseBtn.addEventListener('click', function() {
                                let currentValue = parseInt(quantityInput.value);
                                if (currentValue > 1) {
                                    quantityInput.value = currentValue - 1;
                                }
                            });

                            quantityInput.addEventListener('input', function() {
                                let currentValue = parseInt(quantityInput.value);
                                if (currentValue > maxStock) {
                                    quantityInput.value = maxStock;
                                } else if (currentValue < 1) {
                                    quantityInput.value = 1;
                                }
                            });
                        });
                        </script>



                        <form action="{{ route('add.to.cart') }}" method="POST"
                            id="addToCartForm{{ $product->ProductID }}">
                            @csrf
                            <input type="hidden" name="pro_id" value="{{ $product->ProductID }}">
                            <input type="hidden" name="name" value="{{ $product->ProductName }}">
                            <input type="hidden" name="price" value="{{ $product->Price }}">
                            <input type="hidden" name="qty" value="1">
                            <input type="hidden" name="image" value="{{ $product->ProductImage }}">

                            @if(session()->has('LoggedUserInfo'))
                            <a href="#"
                                class="cart-btn {{ in_array($product->ProductID, $cartItems) ? 'disabled' : '' }}"
                                onclick="if (!this.classList.contains('disabled')) { document.getElementById('addToCartForm{{ $product->ProductID }}').submit(); }">
                                <span class="icon_bag_alt"></span> Add to cart
                            </a>
                            @if(in_array($product->ProductID, $cartItems))
                            <p class="text-danger">Already in cart</p>
                            @endif
                            @else
                            <a href="#" class="cart-btn disabled">
                                <span class="icon_bag_alt"></span> Add to cart
                            </a>
                            <p class="text-danger">You must be logged in to add to cart</p>
                            @endif
                        </form>


                    </div>
                    <div class="product__details__widget">
                        <ul>
                            <li>
                                <span>Availability:</span>
                                @if($product->ProductStatus == 'Sale')
                                <p class="badge badge-success" style="color:white;">{{ $product->ProductStatus }}</p>
                                @elseif($product->ProductStatus == 'Out of Stock')
                                <p class="badge badge-danger" style="color:white;">{{ $product->ProductStatus }}</p>
                                @elseif($product->ProductStatus == 'New')
                                <p class="badge badge-warning" style="color:white;">{{ $product->ProductStatus }}</p>
                                @endif
                            </li>




                            <li>
                                <span>Promotions:</span>
                                <p>Free shipping</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
        <hr>
        <b><br><br></b>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="related__title">
                    <h5>RELATED PRODUCTS</h5>
                </div>
            </div>
            @foreach($relatedProducts  as $product)

<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="product__item">
        <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/' . $product->ProductImage) }}"
            style="background-image: url(&quot;{{ asset('storage/' . $product->ProductImage) }}&quot;);">
            <ul class="product__hover">
                <li><a href="{{ asset('storage/' . $product->ProductImage) }}" class="image-popup"><span
                            class="arrow_expand"></span></a></li>
                <li>
                    <form id="likeForm{{ $product->ProductID }}"
                        action="{{ route('product.like', ['id' => $product->ProductID]) }}" method="POST">
                        @csrf
                        <a href="#" class="like-button" onclick="submitLikeForm({{ $product->ProductID }})">
                            <span class="icon_heart_alt"></span>
                        </a>
                    </form>
                </li>

                <script>
                function submitLikeForm(productId) {
                    // Submit the form with the corresponding product ID
                    document.getElementById('likeForm' + productId).submit();
                }
                </script>

                <li> <a href="{{ route('productdetails', ['id' => $product->ProductID]) }}" class="product-details-link">
                    <span class="fas fa-eye"></span>
                </a></li>
            </ul>
        </div>
        <div class="product__item__text">
            <h6><a href="#">{{ $product->ProductName}}</a></h6>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <div class="product__price">{{ $product->Price}}</div>
        </div>
    </div>
</div>

@endforeach
           
        </div>
    </div>
</section>
@endsection