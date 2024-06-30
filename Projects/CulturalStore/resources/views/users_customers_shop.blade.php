@extends('layouts.master')
@section('content')
<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="shop__sidebar">
                    <div class="sidebar__categories">
                        <div class="section-title">
                            <h4>Categories</h4>
                        </div>

                        <div class="categories__accordion">
                            <div>
                                @foreach($categories as $category)
                                <div class="card">
                                    <div class="card-heading active">
                                        @if($category->CategoryName == 'Women')
                                        <a href="{{ route('womens') }}">{{ $category->CategoryName }}</a>
                                        @elseif($category->CategoryName == 'Men')
                                        <a href="{{ route('mens') }}">{{ $category->CategoryName }}</a>
                                        @elseif($category->CategoryName == 'Jewelry')
                                        <a href="{{ route('womens') }}">{{ $category->CategoryName }}</a>
                                        @else
                                        <a href="#">{{ $category->CategoryName }}</a>
                                        <!-- Default case if no specific route is defined -->
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="row">
                    @foreach($products as $product)

                    <div class="col-lg-4 col-md-6">
                        <div class="product__item sale" data-image="{{ asset('storage/' . $product['ProductImage']) }}">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('storage/' . $product['ProductImage']) }}">
                                <div>@if($product->ProductStatus == 'Sale')
                                    <p class="badge badge-success" style="color:white;">{{ $product->ProductStatus }}
                                    </p>
                                    @elseif($product->ProductStatus == 'Out of Stock')
                                    <p class="badge badge-danger" style="color:white;">{{ $product->ProductStatus }}</p>
                                    @elseif($product->ProductStatus == 'New')
                                    <p class="badge badge-warning" style="color:white;">{{ $product->ProductStatus }}
                                    </p>
                                    @endif
                                </div>
                                <ul class="product__hover">
                                    <li><a href="{{ asset('storage/' . $product['ProductImage']) }}"
                                            class="image-popup"><span class="arrow_expand"></span></a></li>
                                    <li>
                                        <form id="likeForm{{ $product->ProductID }}"
                                            action="{{ route('product.like', ['id' => $product->ProductID]) }}"
                                            method="POST">
                                            @csrf
                                            <a href="#" class="like-button"
                                                onclick="submitLikeForm({{ $product->ProductID }})">
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

                                    <li> <a href="{{ route('productdetails', ['id' => $product->ProductID]) }}"
                                            class="product-details-link">
                                            <span class="fas fa-eye"></span>
                                        </a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{{ $product->ProductName }}</a></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">$ {{ $product->Price }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach


<script></script>




 
                 </div>
            </div>
        </div>
    </div>
    </div>

    @endsection