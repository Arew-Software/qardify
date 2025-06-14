<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    @if (checkFeature('seo'))
        @if ($vcard->meta_description)
            <meta name="description" content="{{ $vcard->meta_description }}">
        @endif
        @if ($vcard->meta_keyword)
            <meta name="keywords" content="{{ $vcard->meta_keyword }}">
        @endif
    @else
        <meta name="description" content="{{ strip_tags($vcard->description) }}">
        <meta name="keywords" content="">
    @endif
    <meta property="og:image" content="{{ $vcard->cover_url }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (checkFeature('seo') && $vcard->site_title && $vcard->home_title)
        <title>{{ $vcard->home_title }} | {{ $vcard->site_title }}</title>
    @else
        <title>{{ getAppName() }}</title>
    @endif

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-vcard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/vcard15.css') }}">
    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    @if (checkFeature('custom-fonts') && $vcard->font_family)
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family={{ $vcard->font_family }}">
    @endif
    @if ($vcard->font_family || $vcard->font_size || $vcard->custom_css)
        <style>
            @if (checkFeature('custom-fonts'))
                @if ($vcard->font_family)
                    body {
                        font-family: {{ $vcard->font_family }};
                    }

                @endif
                @if ($vcard->font_size)
                    div>h4 {
                        font-size: {{ $vcard->font_size }}px !important;
                    }
                @endif
            @endif

            @if (isset(checkFeature('advanced')->custom_css))
                {!! $vcard->custom_css !!}
            @endif
        </style>
    @endif
</head>

<body>
    <div class="container p-0 product-details-page h-100">
        <div class="vcard-fifteen bg-white main-content mx-auto w-100 overflow-hidden">

            <div class="py-3 mt-0">
                <div class="d-flex align-items-center justify-content-between gap-3 mb-4 px-4" @if (getLanguage($vcard->default_language) == 'Arabic') dir="rtl" @endif>
                    <div>
                        <h4 class="vcard-fifteen-heading">{{ __('messages.vcard.products') }}</h4>
                    </div>
                    <div class="text-center" style="z-index: 1;">
                        <a class="product-btn text-white text-decoration-none"
                            href="{{ $vcardUrl }}"
                            role="button">{{ __('messages.common.back') }}</a>
                    </div>
                </div>
                <div class="container">
                    <div class="g-4 product-slider overflow-hidden">
                        @foreach ($products as $product)
                            <div class="d-flex justify-content-center mb-4">
                                <div class="card-wrapper">
                                <a @if ($product->product_url) href="{{ $product->product_url }}" @endif
                                    target="_blank" class="text-decoration-none fs-6">
                                    <div class="card product-card p-4 border-0 w-100 h-100">
                                        <div class="product-profile {{ $product->media->count() < 2 ? 'd-flex justify-content-center' : '' }} product-img-slider overflow-hidden">
                                            @foreach ($product->media as $media)
                                                <img src="{{ $media->getUrl() }}" alt="{{ $product->name }}"
                                                    class="text-center mt-4 p-2 object-fit-contain" height="208px"
                                                    loading="lazy">
                                            @endforeach
                                        </div>
                                        <div class="product-desc card-body px-0">
                                            <div class="d-flex justify-content-between"
                                                @if (getLanguage($vcard->default_language) == 'Arabic') dir="rtl" @endif>
                                                <div class="product-title">
                                                    <h3 class="text-primary fs-16">{{ $product->name }}</h3>
                                                </div>
                                                <div class="product-amount">
                                                    @if ($product->currency_id && $product->price)
                                                        <span
                                                            class="product-amount  product-price-{{ $product->id }}">{{ $product->currency->currency_icon }}{{ getSuperAdminSettingValue('hide_decimal_values') == 1 ? number_format($product->price, 0) : number_format($product->price, 2) }}</span>
                                                    @elseif($product->price)
                                                        <span
                                                            class="product-amount  product-price-{{ $product->id }}">{{ getUserCurrencyIcon($vcard->user->id) }}{{ $product->price }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <p class="fs-14 text-primary-light mb-0">
                                                {{ $product->description }}
                                            </p>
                                        </div>
                                </a>

                                @if (!empty($product->price))
                                    <div class="mb-2 text-center">
                                        <button class="btn btn-gradient rounded-2 py-2 buy-product"
                                            data-id="{{ $product->id }}">{{ __('messages.subscription.buy_now') }}</button>
                                    </div>
                                @endif
                            </div>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('vcardTemplates.product-buy')
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="{{ asset('assets/js/front-third-party.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>
    <script>
        @if (checkFeature('seo') && $vcard->google_analytics)
            {!! $vcard->google_analytics !!}
        @endif

        @if (isset(checkFeature('advanced')->custom_js) && $vcard->custom_js)
            {!! $vcard->custom_js !!}
        @endif
    </script>
    @php
        $setting = \App\Models\UserSetting::where('user_id', $vcard->tenant->user->id)
            ->where('key', 'stripe_key')
            ->first();
    @endphp

    <script>
        let stripe = '';
        @if (!empty($setting) && !empty($setting->value))
            stripe = Stripe('{{ $setting->value }}');
        @endif
        let isEdit = false;
        let password = "{{ isset(checkFeature('advanced')->password) && !empty($vcard->password) }}";
        let passwordUrl = "{{ route('vcard.password', $vcard->id) }}";
        let enquiryUrl = "{{ route('enquiry.store', ['vcard' => $vcard->id, 'alias' => $vcard->url_alias]) }}";
        let appointmentUrl = "{{ route('appointment.store', ['vcard' => $vcard->id, 'alias' => $vcard->url_alias]) }}";
        let paypalUrl = "{{ route('paypal.init') }}";
        let slotUrl = "{{ route('appointment-session-time', $vcard->url_alias) }}";
        let appUrl = "{{ config('app.url') }}";
        let vcardId = {{ $vcard->id }};
        let vcardAlias = "{{ $vcard->url_alias }}";
        let languageChange = "{{ url('language') }}";
        let lang = "{{ checkLanguageSession($vcard->url_alias) }}";
    </script>
    <script>
        let options = {
            'key': "{{ getSelectedPaymentGateway('razorpay_key') }}",
            'amount': 0, //  100 refers to 1
            'currency': 'INR',
            'name': "{{ getAppName() }}",
            'order_id': '',
            'description': '',
            'image': '{{ asset(getAppLogo()) }}', // logo here
            'callback_url': "{{ route('product.razorpay.success') }}",
            'prefill': {
                'email': '', // recipient email here
                'name': '', // recipient name here
                'contact': '', // recipient phone here
            },
            'readonly': {
                'name': 'true',
                'email': 'true',
                'contact': 'true',
            },
            'theme': {
                'color': '#0ea6e9',
            },
            'modal': {
                'ondismiss': function() {
                    $('#paymentGatewayModal').modal('hide');
                    displayErrorMessage(Lang.get('js.payment_not_complete'));
                    setTimeout(function() {
                        Turbo.visit(window.location.href);
                    }, 1000);
                },
            },
        };
    </script>
    <script>
        $('.product-img-slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            autoplay: true,
            slidesToScroll: 1,
            arrows: false,
            responsive: [{
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                },
            }, ],
        });
    </script>
    @routes
    <script src="{{ asset('messages.js?$mixID') }}"></script>
    <script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom.js') }}"></script>
    <script src="{{ mix('assets/js/vcards/vcard-view.js') }}"></script>
    <script src="{{ mix('assets/js/lightbox.js') }}"></script>
</body>

</html>
