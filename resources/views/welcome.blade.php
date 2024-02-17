<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>AssistentAuto</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;500&display=swap" rel="stylesheet">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet">

    <link href="{{asset('css/template-roadhelp.css')}}" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="{{asset('/css/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/slick-theme.css')}}"/>

</head>

<body>

<div class="container-fluid">
    <div class="row">

        <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block sidebar collapse p-0">
            <div class="custom-select" style="width:200px;">
                <form action="{{route('language')}}" method="POST">
                    @csrf
                    <select name="language" onchange="this.form.submit()">
                        <option value="uk" {{app()->getLocale() === 'uk' ? 'selected' : ''}}>UK</option>
                        <option value="en" {{app()->getLocale() === 'en' ? 'selected' : ''}}>EN</option>
                    </select>
                </form>
            </div>
            <div class="position-sticky sidebar-sticky d-flex flex-column justify-content-center align-items-center">
                AssistentAuto
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_1">{{__('translations.menu.home')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_2">{{__('translations.menu.about_us')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_3">{{__('translations.menu.services')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4">{{__('translations.menu.pay')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_5">{{__('translations.menu.reviews')}}</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="col-md-8 ms-sm-auto col-lg-9 p-0">
            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <h1 class="text-white mb-lg-3 mb-4"><strong>AssistentAuto</strong></h1>
                            <p class="text-black">{{__('translations.texts.tagline')}}</p>
                            <br>
                            <a class="btn custom-btn custom-border-btn custom-btn-bg-white smoothscroll me-2 mb-2"
                               href="#section_2">{{__('translations.menu.about_us')}}</a>

                            <a class="btn custom-btn smoothscroll mb-2"
                               href="#section_3">{{__('translations.menu.services')}}</a>
                        </div>
                    </div>
                </div>
            </section>


            <section class="about-section section-padding" id="section_2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12 mx-auto">
                            <h2 class="mb-4">Про нас</h2>

                            <div class="border-bottom pb-3 mb-5">
                                <p> {{__('translations.texts.about_us_1')}}</p>
                                <p> {{__('translations.texts.about_us_2')}}</p>
                                <p> {{__('translations.texts.about_us_3')}}</p>
                                <p> {{__('translations.texts.about_us_4')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="featured-section section-padding">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 mx-auto">
                            <h2 class="mb-3">{{__('translations.texts.charity_1')}}</h2>
                            <p>{{__('translations.texts.charity_2')}}</p>
                        </div>
                    </div>
                </div>
            </section>


            <section class="services-section section-padding" id="section_3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <h2 class="mb-5">{{__('translations.menu.services')}}</h2>
                        </div>

                        <div class="col-lg-6 col-12 mb-4">
                            <h4 class="mb-0">{{__('translations.texts.tow_truck')}}</h4>
                            <hr>
                            <div class="services-thumb">
                                <img src="{{asset('images/services/tow_truck.jpg')}}"
                                     class="services-image img-fluid" alt="">

                            </div>
                        </div>

                        <div class="col-lg-6 col-12 mb-4">
                            <h4 class="mb-0">{{__('translations.texts.wheel_replacement')}}</h4>
                            <hr>
                            <div class="services-thumb">
                                <img src="{{asset('images/services/wheel_replacement.jpg')}}"
                                     class="services-image img-fluid" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12 mb-4">
                            <div class="services-thumb">
                                <h4 class="mb-0">{{__('translations.texts.fuel_delivery')}}</h4>
                                <hr>
                                <img src="{{asset('images/services/fuel_delivery.jpg')}}"
                                     class="services-image img-fluid" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12 mb-4">
                            <div class="services-thumb">
                                <h4 class="mb-0">{{__('translations.texts.door_open')}}</h4>
                                <hr>
                                <img src="{{asset('images/services/door_open.jpg')}}"
                                     class="services-image img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="pay-form-section section-padding" id="section_4">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 mx-auto">
                            <form action="#" method="post" class="custom-form booking-form" id="bb-booking-form"
                                  role="form">
                                <div class="text-center mb-5">
                                    <h2 class="mb-1">{{__('translations.texts.join')}}</h2>

                                    <p>{{__('translations.texts.pay_form_text')}}</p>
                                </div>

                                <div class="booking-form-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <input type="text" name="name" id="name" class="form-control"
                                                   placeholder="{{__('translations.texts.name')}}" required>
                                        </div>
                                        <div class="col-lg-12 col-12">
                                            <input type="text" name="surname" id="surname" class="form-control"
                                                   placeholder="{{__('translations.texts.surname')}}" required>
                                        </div>
                                        <div class="col-lg-12 col-12">
                                            <input type="text" name="car_model" id="car_model" class="form-control"
                                                   placeholder="{{__('translations.texts.car_model')}}" required>
                                        </div>
                                        <div class="col-lg-12 col-12">
                                            <input type="text" class="form-control" name="car_number"
                                                   placeholder="{{__('translations.texts.car_number')}}" required>
                                        </div>
                                        <div class="col-lg-12 col-12">
                                            <input type="text" name="email" id="email" class="form-control"
                                                   placeholder="{{__('translations.texts.email')}}" required>
                                        </div>

                                        <div class="col-lg-12 col-12">
                                            <input type="tel" class="form-control" name="phone_number"
                                                   placeholder="{{__('translations.texts.phone_number')}}" required="">
                                        </div>

                                        <div class="col-lg-12 col-12">
                                            <input type="checkbox" name="agreement_cooperation" required>
                                            <label for="agreement_cooperation"
                                                   style="font-size: 0.8rem">{{__('translations.texts.agree')}} <a
                                                    href="{{route('agreementCooperation')}}"
                                                    target="_blank"> {{__('translations.texts.acquainted')}} </a> {{__('translations.texts.terms_cooperation')}}
                                            </label>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                        <button type="submit"
                                                class="form-control">{{__('translations.buttons.pay')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section class="review-section section-padding" id="review-section">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 mx-auto">
                            <form action="#" method="post" class="custom-form booking-form"
                                  id="bb-booking-form"
                                  role="form">
                                <div class="text-center mb-5">
                                    <h2 class="mb-1">{{__('translations.texts.leave_review')}}</h2>

                                    <p>{{__('translations.texts.leave_review_description')}}</p>
                                </div>

                                <div class="booking-form-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <input type="text" name="name" id="review_author_name" class="form-control"
                                                   placeholder="{{__('translations.texts.name') . ' ' . __('translations.texts.required')}}"
                                                   required>
                                        </div>
                                        <div class="col-lg-12 col-12">
                                            <textarea type="text" class="form-control" name="text" id="review_text"
                                                      placeholder="{{__('translations.texts.text') . ' ' .__('translations.texts.required')}}"
                                                      required></textarea>
                                        </div>
                                    </div>
                                    <p style="color: red; display: none" id="review_error"></p>

                                    <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                        <button type="button"
                                                class="form-control"
                                                onclick="createReview()">{{__('translations.buttons.send')}}</button>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            @if(count($reviews))
                <section class="contact-section" id="section_5">
                    <div class="section-padding section-bg">
                        <div class="col-lg-12 col-12">
                            <h2 class="mb-5">{{__('translations.texts.clients_reviews')}}</h2>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-12 mx-auto">
                                    <div class="reviews_block">
                                        @foreach($reviews as $review)
                                            <div style="text-align: center">
                                                <h3>{{$review->name}}</h3>
                                                <p>{{$review->text}}</p>
                                                <h6>{{$review->created_at}}</h6>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            @if($contacts)
                <section class="contact-section" id="section_6">
                    <div class="section-padding">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-6 col-12">
                                    <h5 class="mb-3"><strong>{{__('translations.texts.contact_info')}}</strong></h5>
                                    @if($contacts->phone_number)
                                        <p class="text-white d-flex mb-1">
                                            <a href="tel: 120-240-3600" class="site-footer-link">
                                                {{$contacts->phone_number}}
                                            </a>
                                        </p>
                                    @endif
                                    @if($contacts->email)
                                        <p class="text-white d-flex">
                                            <a href="mailto:info@yourgmail.com" class="site-footer-link">
                                                {{$contacts->email}}
                                            </a>
                                        </p>
                                    @endif
                                </div>
                                @if($contacts->work_time)
                                    <div class="col-lg-5 col-12 contact-block-wrap mt-5 mt-lg-0 pt-4 pt-lg-0 mx-auto">
                                        <div class="contact-block">
                                            <h6 class="mb-0">
                                                <strong>{{__('translations.texts.work_time')}}</strong>

                                                <span class="ms-auto">{{$contacts->work_time}}</span>
                                            </h6>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </div>
</div>


<!-- JAVASCRIPT FILES -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/click-scroll.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/slick/slick.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.reviews_block').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            arrows: true
        });
    });

    async function createReview() {
        document.getElementById('review_error').innerText = "";
        document.getElementById('review_error').style.display = 'none';

        if (!document.getElementById('review_author_name').value || !document.getElementById('review_text').value) {
            document.getElementById('review_error').innerText = "{!!__('translations.texts.not_filled_required_fields')!!}";
            document.getElementById('review_error').style.display = 'block';

            return false;
        }
        let data = {
            name: document.getElementById('review_author_name').value,
            text: document.getElementById('review_text').value
        };
        let response = await fetch('/review',
            {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{!! csrf_token() !!}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'url': '/review',
                },
                body: JSON.stringify(data)
            });
        let message = await response.text();
        let jsonParsedMessage = JSON.parse(message);

        if (response.status === 201) {
            document.getElementById('review-section').innerHTML = '<p style="color: green;" id="review_success">' + jsonParsedMessage.message + '</p>';
        }
        console.log(JSON.parse(message));
    }
</script>
</body>
</html>
