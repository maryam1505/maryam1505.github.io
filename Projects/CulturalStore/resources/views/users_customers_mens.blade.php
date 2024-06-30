@extends('layouts.master')
@section('content')

<div class="container">

    @if (session('success'))
    <div class="alert alert-success fade show" role="alert">
        <strong>Success:</strong> {{ session('success') }}
    </div>
    @endif
    @if (session('warning'))
    <div class="alert alert-warning fade show" role="alert">
        {{ session('warning') }}
    </div>
    @endif
    <br>
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="related__title">
                <h5>Most Wanted </h5>
            </div>
        </div>

        @foreach($products as $product)

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



    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="related__title">
                <h5>Featured Products </h5>
            </div>
        </div>


        @foreach($allProducts as $product)

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

 
@endsection