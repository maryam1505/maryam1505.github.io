@extends('layouts.master')
@section('content')
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="section-title">
                    <h4 class="mb-3">{{ $place['place_name'] }}</h4>
                    <p class="badge bg-success text-white">
                        {{ $place->city->city_name }}</p>
                    <p>{{ $place['description'] }}</p>
                    <!-- Display additional place details as needed -->
                    <div class="categories__text"><a class="mb-2" href="#">History</a></div>
                    <p>{{ $place['history'] }}</p>
                </div>
            </div>


            <div class="col-lg-6 col-md-6">
                <div class="contact__map">

                    <p>{!! $place['location'] !!}</p>
                </div>
            </div>

            <div class="container-fluid ExploreTour pt-5">
                <div class="mx-auto text-center mb-3" style="max-width: 900px;">
                    <div class="container pt-5">
                        <div class="section-title">
                            <span>Explore Place</span>
                            <h4>Popular Places</h4>
                        </div>
                    </div>
                </div>
                <div class="destination">
                    <div class="tab-class">
                        <div class="tab-content">
                            <div class="tab-pane fade show p-0 active">
                                <div class="row g-4">
                                    <div class="col-xl-8">
                                        <div class="row g-4">
                                            @foreach($placesInSameCity as $relatedPlace)
                                            <div class="col-lg-6 cursor-pointer travel-place">
                                                <div class="destination-img">
                                                    <img class="img-fluid rounded w-100"
                                                        src="{{ asset('storage/' . $relatedPlace->image) }}" alt="">
                                                    <div class="destination-overlay p-4">
                                                        <h4 class="text-white mb-2 mt-3" style="color: #ffffff;">
                                                            {{ $relatedPlace->place_name }}
                                                            <p class="badge bg-success text-white">
                                                                {{ $relatedPlace->city->city_name }}</p>
                                                            <!-- Display city name -->
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach



                                        </div>
                                    </div>
                                    <div class="col-xl-4 cursor-pointer travel-place">
                                        <div class="destination-img h-100">

                                            <img class="img-fluid rounded w-100 h-100"
                                                src="{{ asset('storage/' . $relatedPlace->image) }}"
                                                style="object-fit: cover; min-height: 300px;" alt="">
                                            <div class="destination-overlay p-4">
                                                <h4 class="text-white mb-2 mt-3" style="color: #ffffff;">
                                                    {{ $relatedPlace->place_name }}
                                                    <p class="badge bg-success text-white">
                                                        {{ $relatedPlace->city->city_name }}</p>
                                                    <h4 class="text-white mb-2 mt-3"> {{ $relatedPlace->place_name }}
                                                    </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 cursor-pointer travel-place">
                                        <div class="destination-img">
                                            <img class="img-fluid rounded w-100"
                                                src="{{ asset('storage/' . $relatedPlace->image) }}" alt="">
                                            <div class="destination-overlay p-4">
                                                <h4 class="text-white mb-2 mt-3" style="color: #ffffff;">
                                                    {{ $relatedPlace->place_name }}
                                                    <p class="badge bg-success text-white">
                                                        {{ $relatedPlace->city->city_name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 cursor-pointer travel-place">
                                        <div class="destination-img">
                                            <img class="img-fluid rounded w-100"
                                                src="{{ asset('storage/' . $relatedPlace->image) }}" alt="">
                                            <div class="destination-overlay p-4">
                                                <h4 class="text-white mb-2 mt-3" style="color: #ffffff;">
                                                    {{ $relatedPlace->place_name }}
                                                    <p class="badge bg-success text-white">
                                                        {{ $relatedPlace->city->city_name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 cursor-pointer travel-place">
                                        <div class="destination-img">
                                            <img class="img-fluid rounded w-100"
                                                src="{{ asset('storage/' . $relatedPlace->image) }}" alt="">
                                            <div class="destination-overlay p-4">
                                                <h4 class="text-white mb-2 mt-3" style="color: #ffffff;">
                                                    {{ $relatedPlace->place_name }}
                                                    <p class="badge bg-success text-white">
                                                        {{ $relatedPlace->city->city_name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</section>
@endsection