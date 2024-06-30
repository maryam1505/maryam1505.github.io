@extends('layouts.master')
@section('content')
<section class="banner set-bg" data-setbg="{{asset('template2/img/carousel-3.jpg')}}">
    <div class="banner__layer">
        <div class="background-caption">
            <div class="p-3 banner__text" style="max-width: 900px;">
                <span>Explore The Pakistan</span>
                <h1>Let's Travel The Pakistan Together!</h1>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="#explore">Explore Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Navbar & Hero End -->

<!-- Destination Start -->
<div class="container-fluid destination pt-5">
    <div class="container pt-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <div class="section-title">
                <span>Destination</span>
                <h4>Popular Destination</h4>
            </div>
        </div>
        <div class="tab-class text-center header__menu">
            <ul class="nav nav-pills justify-content-center mb-5" id="travel-tab">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#tab-1">
                        All
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#tab-2">
                        Rawalpindi </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#tab-3">
                        Islamabad </a>
                </li>

            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach($cities as $city)
                        @foreach($city->touristPlaces as $place)
                        <a class="col-lg-6 cursor-pointer travel-place"
                            href="{{ url('explore_place/' . $place->place_id) }}">
                            <div class="destination-img">
                                <img class="img-fluid rounded w-100" src="{{ asset('storage/' . $place->image) }}"
                                    alt="">
                                <div class="destination-overlay p-4">
                                    <h4 class="text-white mb-2 mt-3" style="color: #ffffff;">{{ $place->place_name }}
                                    </h4>

                                    <!-- Display event information if available -->
                                    @php
                                    $events = $place->events;
                                    @endphp
                                    @if($events->isNotEmpty())
                                    <ul class="list-unstyled">
                                        @foreach($events as $event)
                                        <li>
                                            <span class="badge bg-success text-white">{{ $event->event_name }} -
                                                {{ $event->event_date }}</span>
                                            <!-- Countdown timer -->
                                            &nbsp;&nbsp;&nbsp;
                                            <span id="countdown-{{ $event->event_id }}"
                                                class="badge bg-info text-white"></span>
                                            <!-- Countdown timer for the event -->
                                            <span id="countdown-{{ $event->event_id }}"></span>
                                            <script>
                                            var eventDate {
                                                {
                                                    $event - > event_id
                                                }
                                            } = new Date("{{ $event->event_date }}").getTime();
                                            var countdownElement {
                                                {
                                                    $event - > event_id
                                                }
                                            } = document.getElementById('countdown-{{ $event->event_id }}');

                                            var countdownInterval {
                                                {
                                                    $event - > event_id
                                                }
                                            } = setInterval(function() {
                                                var now = new Date().getTime();
                                                var distance = eventDate {
                                                    {
                                                        $event - > event_id
                                                    }
                                                } - now;

                                                if (distance > 0) {
                                                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) /
                                                        (1000 * 60 * 60));
                                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (
                                                        1000 * 60));
                                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                                    countdownElement {
                                                        {
                                                            $event - > event_id
                                                        }
                                                    }.innerHTML = days + "d " + hours + "h " + minutes + "m " +
                                                        seconds + "s";
                                                } else {
                                                    clearInterval(countdownInterval {
                                                        {
                                                            $event - > event_id
                                                        }
                                                    });
                                                    countdownElement {
                                                        {
                                                            $event - > event_id
                                                        }
                                                    }.innerHTML = "Event has started!";
                                                }
                                            }, 1000);
                                            </script>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @else
                                    <span class="badge bg-danger text-white">No events happening</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @endforeach
                    </div>
                </div>

                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach($cities as $city)
                        @if($city->city_name === 'Rawalpindi')
                        @foreach($city->touristPlaces as $place)
                        <a class="col-lg-6 cursor-pointer travel-place"
                            href="{{ route('explore.place', ['id' => $place->place_id]) }}">
                            <div class="destination-img">
                                <img class="img-fluid rounded w-100" src="{{ asset('storage/' . $place->image) }}"
                                    alt="">
                                <div class="destination-overlay p-4">
                                    <h4 class="text-white mb-2 mt-3">{{ $place->place_name }}</h4>
                                    @php
                                    $events = $place->events;
                                    @endphp
                                    @if($events->isNotEmpty())
                                    <p>Events:</p>
                                    <ul class="list-unstyled">
                                        @foreach($events as $event)
                                        <li>
                                            <span class="badge bg-success text-white">{{ $event->event_name }} -
                                                {{ $event->event_date }}</span> <!-- Countdown timer -->
                                            <span id="countdown-{{ $event->event_id }}"></span>
                                            <script>
                                            var eventDate {
                                                {
                                                    $event - > event_id
                                                }
                                            } = new Date("{{ $event->event_date }}").getTime();
                                            var countdownElement {
                                                {
                                                    $event - > event_id
                                                }
                                            } = document.getElementById('countdown-{{ $event->event_id }}');

                                            var countdownInterval {
                                                {
                                                    $event - > event_id
                                                }
                                            } = setInterval(function() {
                                                var now = new Date().getTime();
                                                var distance = eventDate {
                                                    {
                                                        $event - > event_id
                                                    }
                                                } - now;

                                                if (distance > 0) {
                                                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) /
                                                        (1000 * 60 * 60));
                                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (
                                                        1000 * 60));
                                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                                    countdownElement {
                                                        {
                                                            $event - > event_id
                                                        }
                                                    }.innerHTML = days + "d " + hours + "h " + minutes + "m " +
                                                        seconds + "s";
                                                } else {
                                                    clearInterval(countdownInterval {
                                                        {
                                                            $event - > event_id
                                                        }
                                                    });
                                                    countdownElement {
                                                        {
                                                            $event - > event_id
                                                        }
                                                    }.innerHTML = "Event has started!";
                                                }
                                            }, 1000);
                                            </script>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @else
                                    <span class="badge bg-danger text-white">No events happening</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @endif
                        @endforeach
                    </div>
                </div>


                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach($cities as $city)
                        @if($city->city_name === 'Islamabad')
                        @foreach($city->touristPlaces as $place)
                        <a class="col-lg-6 cursor-pointer travel-place"
                            href="{{ route('explore.place', ['id' => $place->place_id]) }}">
                            <div class="destination-img">
                                <img class="img-fluid rounded w-100" src="{{ asset('storage/' . $place->image) }}"
                                    alt="">
                                <div class="destination-overlay p-4">
                                    <h4 class="text-white mb-2 mt-3">{{ $place->place_name }}</h4>

                                    @php
                                    $events = $place->events;
                                    @endphp
                                    @if($events->isNotEmpty())
                                    <ul class="list-unstyled">
                                        @foreach($events as $event)
                                        <li>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="badge bg-success text-white">{{ $event->event_name }} -
                                                    {{ $event->event_date }}</span>
                                                <!-- Countdown timer -->
                                                &nbsp;&nbsp;&nbsp;
                                                <span id="countdown-{{ $event->event_id }}"
                                                    class="badge bg-info text-white"></span>
                                            </div>
                                            <script>
                                            // Calculate countdown time
                                            var eventDate = new Date('{{ $event->event_date }}').getTime();
                                            var now = new Date().getTime();
                                            var timeRemaining = eventDate - now;

                                            // Update countdown every second
                                            var countdown = setInterval(function() {
                                                timeRemaining -= 1000;
                                                var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                                                var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) /
                                                    (1000 * 60 * 60));
                                                var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (
                                                    1000 * 60));
                                                var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                                                document.getElementById('countdown-{{ $event->event_id }}')
                                                    .innerHTML = days + "d " + hours + "h " + minutes + "m " +
                                                    seconds + "s ";

                                                // Clear countdown when time is up
                                                if (timeRemaining < 0) {
                                                    clearInterval(countdown);
                                                    document.getElementById('countdown-{{ $event->event_id }}')
                                                        .innerHTML = "Event has started!";
                                                }
                                            }, 1000);
                                            </script>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @else
                                    <span class="badge bg-danger text-white">No events happening</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Explore Tour Start -->
<div class="container-fluid ExploreTour pt-5" id="explore">
    <div class="container pt-5">
        <div class="mx-auto text-center mb-3" style="max-width: 900px;">
            <div class="section-title">
                <span>Explore Tour</span>
                <h4>The Nothern Pakistan</h4>
            </div>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum tempore nam, architecto
                doloremque velit explicabo? Voluptate sunt eveniet fuga eligendi! Expedita laudantium fugiat corrupti
                eum cum repellat a laborum quasi.
            </p>
        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d425292.8128541647!2d72.75644270054283!3d33.61567899586028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfbfd07891722f%3A0x6059515c3bdb02b6!2sIslamabad%2C%20Islamabad%20Capital%20Territory%2C%20Pakistan!5e0!3m2!1sen!2s!4v1715152700306!5m2!1sen!2s"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        {{-- <div class="tab-class text-center header__menu">
            <ul class="travel-nav travel-nav-pills mb-3">
                <li class="travel-nav-item">
                    <a class="d-flex mx-3 py-2 active" data-bs-toggle="pill" href="#NationalTab-1">
                        <span class="text-dark" style="width: 250px;">Islamabad</span>
                    </a>
                </li>
                <li class="travel-nav-item">
                    <a class="d-flex py-2 mx-3" data-bs-toggle="pill" href="#InternationalTab-2">
                        <span class="text-dark" style="width: 250px;">Rawalpindi</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="NationalTab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="national-item">
                                <img src="{{asset('template2/img/explore-tour-1.jpg')}}" class="img-fluid w-100
        rounded" alt="Image">
        <div class="national-content">
            <div class="national-info">
                <h5 class="text-white text-uppercase mb-2">Weekend Tour</h5>
                <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
            </div>
        </div>
        <div class="national-plus-icon">
            <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-4">
    <div class="national-item">
        <img src="{{asset('template2/img/explore-tour-2.jpg')}}" class="img-fluid w-100 rounded" alt="Image">
        <div class="national-content">
            <div class="national-info">
                <h5 class="text-white text-uppercase mb-2">Holiday Tour</h5>
                <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
            </div>
        </div>
        <div class="national-plus-icon">
            <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-4">
    <div class="national-item">
        <img src="{{asset('template2/img/explore-tour-3.jpg')}}" class="img-fluid w-100 rounded" alt="Image">
        <div class="national-content">
            <div class="national-info">
                <h5 class="text-white text-uppercase mb-2">Road Trip</h5>
                <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
            </div>
        </div>
        <div class="tour-offer bg-info">15% Off</div>
        <div class="national-plus-icon">
            <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-4">
    <div class="national-item">
        <img src="{{asset('template2/img/explore-tour-4.jpg')}}" class="img-fluid w-100 rounded" alt="Image">
        <div class="national-content">
            <div class="national-info">
                <h5 class="text-white text-uppercase mb-2">Historical Trip</h5>
                <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
            </div>
        </div>
        <div class="national-plus-icon">
            <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-4">
    <div class="national-item">
        <img src="{{asset('template2/img/explore-tour-5.jpg')}}" class="img-fluid w-100 rounded" alt="Image">
        <div class="national-content">
            <div class="national-info">
                <h5 class="text-white text-uppercase mb-2">Family Tour</h5>
                <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
            </div>
        </div>
        <div class="tour-offer bg-warning">50% Off</div>
        <div class="national-plus-icon">
            <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-4">
    <div class="national-item">
        <img src="{{asset('template2/img/explore-tour-6.jpg')}}" class="img-fluid w-100 rounded" alt="Image">
        <div class="national-content">
            <div class="national-info">
                <h5 class="text-white text-uppercase mb-2">Beach Tour</h5>
                <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
            </div>
        </div>
        <div class="national-plus-icon">
            <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
        </div>
    </div>
</div>
</div>
</div>
<div id="InternationalTab-2" class="tab-pane fade show p-0">
    <div class="InternationalTour-carousel owl-carousel">
        <div class="international-item">
            <img src="{{asset('template2/img/explore-tour-1.jpg')}}" class="img-fluid w-100 rounded" alt="Image">
            <div class="international-content">
                <div class="international-info">
                    <h5 class="text-white text-uppercase mb-2">Australia</h5>
                    <a href="#" class="btn-hover text-white me-4"><i class="fas fa-map-marker-alt me-1"></i> 8
                        Cities</a>
                    <a href="#" class="btn-hover text-white"><i class="fa fa-eye ms-2"></i> <span>143+ Tour
                            Places</span></a>
                </div>
            </div>
            <div class="tour-offer bg-success">30% Off</div>
            <div class="international-plus-icon">
                <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
            </div>
        </div>
        <div class="international-item">
            <img src="{{asset('template2/img/explore-tour-2.jpg')}}" class="img-fluid w-100 rounded" alt="Image">
            <div class="international-content">
                <div class="international-info">
                    <h5 class="text-white text-uppercase mb-2">Germany</h5>
                    <a href="#" class="btn-hover text-white me-4"><i class="fas fa-map-marker-alt me-1"></i> 12
                        Cities</a>
                    <a href="#" class="btn-hover text-white"><i class="fa fa-eye ms-2"></i> <span>21+ Tour
                            Places</span></a>
                </div>
            </div>
            <div class="international-plus-icon">
                <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
            </div>
        </div>
        <div class="international-item">
            <img src="{{asset('template2/img/explore-tour-3.jpg')}}" class="img-fluid w-100 rounded" alt="Image">
            <div class="international-content">
                <div class="tour-offer bg-warning">45% Off</div>
                <div class="international-info">
                    <h5 class="text-white text-uppercase mb-2">Spain</h5>
                    <a href="#" class="btn-hover text-white me-4"><i class="fas fa-map-marker-alt me-1"></i> 9
                        Cities</a>
                    <a href="#" class="btn-hover text-white"><i class="fa fa-eye ms-2"></i> <span>133+ Tour
                            Places</span></a>
                </div>
            </div>
            <div class="international-plus-icon">
                <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
            </div>
        </div>
        <div class="international-item">
            <img src="{{asset('template2/img/explore-tour-4.jpg')}}" class="img-fluid w-100 rounded" alt="Image">
            <div class="international-content">
                <div class="international-info">
                    <h5 class="text-white text-uppercase mb-2">Japan</h5>
                    <a href="#" class="btn-hover text-white me-4"><i class="fas fa-map-marker-alt me-1"></i> 8
                        Cities</a>
                    <a href="#" class="btn-hover text-white"><i class="fa fa-eye ms-2"></i> <span>137+ Tour
                            Places</span></a>
                </div>
            </div>
            <div class="international-plus-icon">
                <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
            </div>
        </div>
        <div class="international-item">
            <img src="{{asset('template2/img/explore-tour-5.jpg')}}" class="img-fluid w-100 rounded" alt="Image">
            <div class="international-content">
                <div class="tour-offer bg-info">70% Off</div>
                <div class="international-info">
                    <h5 class="text-white text-uppercase mb-2">London</h5>
                    <a href="#" class="btn-hover text-white me-4"><i class="fas fa-map-marker-alt me-1"></i> 17
                        Cities</a>
                    <a href="#" class="btn-hover text-white"><i class="fa fa-eye ms-2"></i> <span>26+ Tour
                            Places</span></a>
                </div>
            </div>
            <div class="international-plus-icon">
                <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
            </div>
        </div>
    </div>
</div>
</div>
</div> --}}
</div>
</div>
<!-- Explore Tour Start -->


<!-- Tour Booking Start -->
<div class="container-fluid booking pt-5">

    {{-- <div class="container pt-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 cursor-pointer travel-place">
                <h5 class="section-booking-title pe-3">Booking</h5>
                <h1 class="text-white mb-4">Online Booking</h1>
                <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur maxime ullam esse fuga blanditiis accusantium pariatur quis sapiente, veniam doloribus praesentium? Repudiandae iste voluptatem fugiat doloribus quasi quo iure officia.
                </p>
                <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur maxime ullam esse fuga blanditiis accusantium pariatur quis sapiente, veniam doloribus praesentium? Repudiandae iste voluptatem fugiat doloribus quasi quo iure officia.
                </p>
                <a href="#" class="btn btn-light text-primary rounded-pill py-3 px-5 mt-2">Read More</a>
            </div>
            <div class="col-lg-6 cursor-pointer travel-place">
                <h1 class="text-white mb-3">Book A Tour Deals</h1>
                <p class="text-white mb-4">Get <span class="text-warning">50% Off</span> On Your First Adventure Trip With Travela. Get More Deal Offers Here.</p>
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-white border-0" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control bg-white border-0" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating date" id="date3" data-target-input="nearest">
                                <input type="text" class="form-control bg-white border-0" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                <label for="datetime">Date & Time</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select bg-white border-0" id="select1">
                                    <option value="1">Destination 1</option>
                                    <option value="2">Destination 2</option>
                                    <option value="3">Destination 3</option>
                                </select>
                                <label for="select1">Destination</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select bg-white border-0" id="SelectPerson">
                                    <option value="1">Persons 1</option>
                                    <option value="2">Persons 2</option>
                                    <option value="3">Persons 3</option>
                                </select>
                                <label for="SelectPerson">Persons</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select bg-white border-0" id="CategoriesSelect">
                                    <option value="1">Kids</option>
                                    <option value="2">1</option>
                                    <option value="3">2</option>
                                    <option value="3">3</option>
                                </select>
                                <label for="CategoriesSelect">Categories</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control bg-white border-0" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                <label for="message">Special Request</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary text-white w-100 py-3" type="submit">Book Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
</div>
<!-- Tour Booking End -->
@endsection