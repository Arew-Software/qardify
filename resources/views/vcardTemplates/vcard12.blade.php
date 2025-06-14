<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="icon" href="{{ getVcardFavicon($vcard) }}" type="image/png">
    <meta property="og:image" content="{{ $vcard->cover_url }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (checkFeature('seo') && $vcard->site_title && $vcard->home_title)
    <title>{{ $vcard->home_title }} | {{ $vcard->site_title }}</title>
    @else
    <title>{{ $vcard->name }} | {{ getAppName() }}</title>
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('pwa/1.json') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/new_vcard/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/new_vcard/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/new_vcard/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-vcard.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/vcard12.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
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

<body class="bg-primary-100">
    <div class="top-animation">
            @for ($i = 0; $i < 10; $i++)
                <span></span>
            @endfor
            </div>
            <div class="bottom-animation">
            @for ($i = 0; $i < 10; $i++)
                <span></span>
            @endfor
            </div>
    <div class="position-relative z-index-9">
        @if (checkFeature('password'))
        @include('vcards.password')
        @endif
        <div
            class="main-content mx-auto w-100 overflow-hidden bg-gray-200 @if (getLanguage($vcard->default_language) == 'Arabic') rtl @endif">
            {{-- Pwa support --}}
            @if (isset($enable_pwa) && $enable_pwa == 1 && !isiOSDevice())
            <div class="mt-0">
                <div class="pwa-support d-flex align-items-center justify-content-center">
                    <div>
                        <h1 class="text-start pwa-heading">{{ __('messages.pwa.add_to_home_screen') }}</h1>
                        <p class="text-start pwa-text text-dark">{{ __('messages.pwa.pwa_description') }} </p>
                        <div class="text-end d-flex">
                            <button id="installPwaBtn" class="pwa-install-button w-50 mb-1 btn">{{
                                __('messages.pwa.install') }} </button>
                            <button class="pwa-cancel-button w-50 ms-2 pwa-close btn btn-secondary mb-1">{{
                                __('messages.common.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            {{-- support banner --}}
            @if ((isset($managesection) && $managesection['banner']) || empty($managesection))
            @if (isset($banners->title))
            <div class="support-banner d-flex align-items-center justify-content-center">
                <button type="button" class="text-start banner-close"><i class="fa-solid fa-xmark"></i></button>
                <div class="">
                    <h1 class="text-center support_heading">{{ $banners->title }} </h1>
                    <p class="text-center text-dark support_text">{{ $banners->description }}</p>
                    <div class="text-center">
                        <a href="{{ $banners->url }}" class="act-now btn btn-primary" target="_blank"
                            data-turbo="false">{{
                            $banners->banner_button }}</a>
                    </div>
                </div>
            </div>
            @endif
            @endif
            <div class="banner-section position-relative w-100">
                <div class="banner-img @if ($vcard->cover_type == 2) h-auto @endif">
                    @php
                    $coverClass =
                    $vcard->cover_image_type == 0
                    ? 'object-fit-cover w-100 h-100'
                    : 'object-fit-cover w-100 h-100';
                    @endphp
                    @if ($vcard->cover_type == 0)
                    <img src="{{ $vcard->cover_url }}" class="{{ $coverClass }}" loading="lazy" />
                    @elseif($vcard->cover_type == 1)
                    @if (strpos($vcard->cover_url, '.mp4') !== false ||
                    strpos($vcard->cover_url, '.mov') !== false ||
                    strpos($vcard->cover_url, '.avi') !== false)
                    <video class="cover-video {{ $coverClass }}" loop autoplay muted playsinline alt="background video"
                        id="cover-video">
                        <source src="{{ $vcard->cover_url }}" type="video/mp4">
                    </video>
                    @endif
                    @elseif ($vcard->cover_type == 2)
                        <div class="youtube-link-12">
                            <iframe
                                src="https://www.youtube.com/embed/{{ YoutubeID($vcard->youtube_link) }}?autoplay=1&mute=1&loop=1&playlist={{ YoutubeID($vcard->youtube_link) }}&controls=0&modestbranding=1&showinfo=0&rel=0"
                                class="cover-video {{ $coverClass }}" frameborder="0"
                                allow="autoplay; encrypted-media" allowfullscreen>
                            </iframe>
                        </div>
                    @endif
                    <div class="d-flex justify-content-end position-absolute top-0 end-0 mx-3 z-index-9 language-btn">
                        @if ($vcard->language_enable == \App\Models\Vcard::LANGUAGE_ENABLE)
                        <div class="language pt-3">
                            <ul class="text-decoration-none ps-0">
                                <li class="dropdown1 dropdown lang-list">
                                    <a class="dropdown-toggle lang-head text-decoration-none" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        {{ strtoupper(getLanguageIsoCode($vcard->default_language)) }}
                                    </a>
                                    <ul class="dropdown-menu top-dropdown lang-hover-list top-100 mt-0">
                                        @foreach (getAllLanguageWithFullData() as $language)
                                        <li
                                            class="{{ getLanguageIsoCode($vcard->default_language) == $language->iso_code ? 'active' : '' }}">
                                            <a href="javascript:void(0)" id="languageName"
                                                data-name="{{ $language->iso_code }}">
                                                @if (array_key_exists($language->iso_code, \App\Models\User::FLAG))
                                                @foreach (\App\Models\User::FLAG as $imageKey => $imageValue)
                                                @if ($imageKey == $language->iso_code)
                                                <img src="{{ asset($imageValue) }}" class="me-1" />
                                                @endif
                                                @endforeach
                                                @else
                                                @if (count($language->media) != 0)
                                                <img src="{{ $language->image_url }}" class="me-1" />
                                                @else
                                                <i class="fa fa-flag fa-xl me-3 text-danger" aria-hidden="true"></i>
                                                @endif
                                                @endif
                                                {{ strtoupper($language->iso_code) }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>
            {{-- profile --}}
            <div class="position-relative">
                <div class="profile-section px-30 pt-50 position-relative">
                    <div class="position-absolute vector-bg-2 vector-bg text-end">
                        <img src="{{ asset('assets/img/vcard12/vector-2.png') }}" alt="images" />
                    </div>
                    @if (getLanguage($vcard->default_language) != 'Arabic')
                    <div class="card d-flex flex-sm-row align-items-center gap-4 flex-column py-4 px-4">
                        <div class="card-img d-flex justify-content-center align-items-center mx-auto">
                            <img src="{{ $vcard->profile_url }}" class="object-fit-cover" loading="lazy" />
                        </div>
                        <div class="card-body p-0 ">
                            <div class="position-relative text-sm-start text-center">
                                <h2 class="text-white mb-1 profile-main-name">
                                    {{ ucwords($vcard->first_name . ' ' . $vcard->last_name) }}
                                    @if ($vcard->is_verified)
                                    <i class="verification-icon bi-patch-check-fill"></i>
                                    @endif
                                </h2>
                                <p class="fs-16 text-primary mb-0 profile-name">{{ ucwords($vcard->company) }}</p>
                                <p class="fs-14 text-gray-100 mb-0"><span class="profile-designation fw-light">
                                        {{ ucwords($vcard->occupation) }}</span></p>
                                <p class="fs-14 text-gray-100 mb-0">{{ ucwords($vcard->job_title) }}</p>

                            </div>
                            {{-- profile details --}}
                        </div>
                    </div>
                    @endif
                    @if (getLanguage($vcard->default_language) == 'Arabic')
                    <div class="card d-flex align-items-center gap-4 flex-column flex-sm-row-reverse p-4">
                        <div class="card-img d-flex justify-content-center align-items-center mx-auto">
                            <img src="{{ $vcard->profile_url }}" class="w-100 h-100 object-fit-cover" loading="lazy" />
                        </div>
                        <div class="card-body p-0">
                            <div class="position-relative text-sm-start text-center">
                                <h2 class="text-white mb-1 profile-main-name">
                                    {{ ucwords($vcard->first_name . ' ' . $vcard->last_name) }}
                                    @if ($vcard->is_verified)
                                    <i class="verification-icon bi-patch-check-fill"></i>
                                    @endif
                                </h2>
                                <p class="fs-16 text-primary mb-0 profile-name">{{ ucwords($vcard->company) }}</p>
                                <p class="fs-14 text-gray-100 mb-0"><span class="profile-designation fw-light">
                                        {{ ucwords($vcard->occupation) }}</span></p>
                                <p class="fs-14 text-gray-100 mb-0">{{ ucwords($vcard->job_title) }}</p>

                            </div>
                            {{-- profile details --}}
                        </div>
                    </div>
                    @endif
                </div>
                <div class="text-gray-100 fs-14 profile-desc text-center px-30 pt-50">
                    <p class="text-white text-center mb-0">
                        <span class="mt-4 profile-description fs-6"> {!! $vcard->description !!}</span>
                    </p>
                </div>
            </div>
            <div class="social-media d-flex text-light justify-content-center px-30 pt-50 position-relative">
                @if (checkFeature('social_links') && getSocialLink($vcard))
                <div class="social-icons d-flex justify-content-center flex-wrap justify-content-center w-100">
                    @foreach (getSocialLink($vcard) as $value)
                    {!! $value !!}
                    @endforeach
                </div>
                @endif
            </div>
            {{-- custom link section --}}
            <div class="custom-link-section">
                @if (checkFeature('custom-links'))
                <div class="custom-link d-flex flex-wrap justify-content-center pt-50 w-100 gap-2">
                    @foreach ($customLink as $value)
                    @if ($value->show_as_button == 1)
                    <a href="{{ $value->link }}" @if ($value->open_new_tab == 1) target="_blank" @endif
                        style="
                        @if ($value->button_color) background-color: {{ $value->button_color }}; @endif
                        @if ($value->button_type === 'rounded') border-radius: 20px; @endif
                        @if ($value->button_type === 'square') border-radius: 0px; @endif"
                        class="mx-2 d-flex justify-content-center align-items-center text-decoration-none link-text
                        text-white font-primary btn">
                        {{ $value->link_name }}
                    </a>
                    @else
                    <a href="{{ $value->link }}" @if ($value->open_new_tab == 1) target="_blank" @endif
                        class="mx-2 d-flex justify-content-center align-items-center text-decoration-none link-text
                        text-white">
                        {{ $value->link_name }}
                    </a>
                    @endif
                    @endforeach
                </div>
                @endif
            </div>
            {{-- End custom link section --}}
            {{-- event --}}
            @php
            $hasContactData = $vcard->email || $vcard->alternative_email || $vcard->phone ||
            $vcard->alternative_phone || $vcard->dob || $vcard->location;
            @endphp
            @if (((isset($managesection) && $managesection['contact_list']) || empty($managesection)) &&
            $hasContactData)
            <div class="contact-section position-relative px-30 pt-50">
                <div class="section-heading text-center overflow-hidden">
                    <h2 class="text-white mb-0 d-inline-block">
                        {{ __('messages.contact_us.contact') }}
                    </h2>
                </div>
                <div class="chest-expander-img vector-bg" @if (getLanguage($vcard->default_language) == 'Arabic')
                    dir="rtl" @endif>
                    <img src="{{ asset('assets/img/vcard12/chest-expander.png') }}" alt="chest-expander"
                        class="w-100" />
                </div>
                @if (getLanguage($vcard->default_language) != 'Arabic')
                <div class="position-relative">
                    <div class="row row-gap-40px">
                        {{-- Email --}}
                        @if ($vcard->email)
                        <div class="col-sm-6">
                            <div class="contact-box">
                                <div class="contact-icon d-flex align-items-center">
                                    <img src="{{ asset('assets/img/vcard12/email-icon.svg') }}" />
                                </div>
                                <div class="contact-desc text-center">
                                    <a href="mailto:{{ $vcard->email }}"
                                        class="event-name text-center mb-0 text-decoration-none text-white">
                                        {{ $vcard->email }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- Phone --}}
                        @if ($vcard->phone)
                        <div class="col-sm-6">
                            <div class="contact-box">
                                <div class="contact-icon d-flex align-items-center">
                                    <img src="{{ asset('assets/img/vcard12/phone-icon.svg') }}" />
                                </div>
                                <div class="contact-desc text-center">
                                    <a href="tel:+{{ $vcard->region_code }}{{ $vcard->phone }}" class="text-white"
                                        dir="ltr">+{{ $vcard->region_code }}
                                        {{ $vcard->phone }}</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($vcard->alternative_phone)
                        <div class="col-sm-6">
                            <div class="contact-box">
                                <div class="contact-icon d-flex align-items-center">
                                    <img src="{{ asset('assets/img/vcard12/phone-icon.svg') }}" />
                                </div>
                                <div class="contact-desc text-center">
                                    <a href="tel:+{{ $vcard->alternative_region_code }} {{ $vcard->alternative_phone }}"
                                        class="text-white" dir="ltr">
                                        +{{ $vcard->alternative_region_code }}
                                        {{ $vcard->alternative_phone }}</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($vcard->alternative_email)
                        <div class="col-sm-6">
                            <div class="contact-box">
                                <div class="contact-icon d-flex align-items-center">
                                    <img src="{{ asset('assets/img/vcard12/email-icon.svg') }}" />
                                </div>
                                <div class="contact-desc text-center">
                                    <a href="mailto:{{ $vcard->email }}"
                                        class="event-name text-center mb-0 text-decoration-none text-white">{{
                                        $vcard->alternative_email }}</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($vcard->dob)
                        <div class="col-sm-6">
                            <div class="contact-box">
                                <div class="contact-icon d-flex align-items-center">
                                    <img src="{{ asset('assets/img/vcard12/dob-icon.svg') }}" />
                                </div>
                                <div class="contact-desc text-center">
                                    <p class="mb-0 text-white">{{ $vcard->dob }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($vcard->location)
                        <div class="col-sm-6">
                            <div class="contact-box">
                                <div class="contact-icon d-flex align-items-center">
                                    <img src="{{ asset('assets/img/vcard12/location-icon.svg') }}" />
                                </div>
                                <div class="contact-desc text-center">
                                    <p class="text-white mb-0 text-break">{!! ucwords($vcard->location) !!}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @else
                {{-- Arabic Layout --}}
                <div class="position-relative" dir="rtl">
                    <div class="row row-gap-40px">
                        {{-- Same elements but adapted for RTL --}}
                        @if ($vcard->email)
                        <div class="col-sm-6">
                            <div class="contact-box">
                                <div class="contact-icon d-flex align-items-center">
                                    <img src="{{ asset('assets/img/vcard12/email-icon.svg') }}" />
                                </div>
                                <div class="contact-desc text-center mt-1">
                                    <a href="mailto:{{ $vcard->email }}"
                                        class="event-name text-center mb-0 text-decoration-none text-white">{{
                                        $vcard->email }}</a>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($vcard->phone)
                        <div class="col-sm-6">
                            <div class="contact-box">
                                <div class="contact-icon d-flex align-items-center">
                                    <img src="{{ asset('assets/img/vcard12/phone-icon.svg') }}" />
                                </div>
                                <div class="contact-desc text-center mt-1">
                                    <a href="tel:+{{ $vcard->region_code }}{{ $vcard->phone }}" class="text-white"
                                        dir="ltr">+{{ $vcard->region_code }}
                                        {{ $vcard->phone }}</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($vcard->alternative_phone)
                        <div class="col-sm-6">
                            <div class="contact-box">
                                <div class="contact-icon d-flex align-items-center">
                                    <img src="{{ asset('assets/img/vcard12/phone-icon.svg') }}" />
                                </div>
                                <div class="contact-desc text-center mt-1">
                                    <a href="tel:+{{ $vcard->alternative_region_code }} {{ $vcard->alternative_phone }}"
                                        class="text-white" dir="ltr">
                                        +{{ $vcard->alternative_region_code }}
                                        {{ $vcard->alternative_phone }}</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($vcard->alternative_email)
                        <div class="col-sm-6">
                            <div class="contact-box">
                                <div class="contact-icon d-flex align-items-center">
                                    <img src="{{ asset('assets/img/vcard12/email-icon.svg') }}" />
                                </div>
                                <div class="contact-desc text-center mt-1">
                                    <a href="mailto:{{ $vcard->email }}"
                                        class="event-name text-center mb-0 text-decoration-none text-white">{{
                                        $vcard->alternative_email }}</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($vcard->dob)
                        <div class="col-sm-6">
                            <div class="contact-box">
                                <div class="contact-icon d-flex align-items-center">
                                    <img src="{{ asset('assets/img/vcard12/dob-icon.svg') }}" />
                                </div>
                                <div class="contact-desc text-center mt-1">
                                    <p class="mb-0 text-white">{{ $vcard->dob }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($vcard->location)
                        <div class="col-sm-6">
                            <div class="contact-box">
                                <div class="contact-icon d-flex align-items-center">
                                    <img src="{{ asset('assets/img/vcard12/location-icon.svg') }}" />
                                </div>
                                <div class="contact-desc text-center mt-1">
                                    <p class="text-white mb-0 text-break">{!! ucwords($vcard->location) !!}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

            </div>
            @endif
            {{-- service --}}
            @if ((isset($managesection) && $managesection['services']) || empty($managesection))
            @if (checkFeature('services') && $vcard->services->count())
            <div class="our-services-section px-30 pt-50 position-relative">
                <div class="dumbbell-img vector-bg text-end">
                    <img src="{{ asset('assets/img/vcard12/vector-8.png') }}" alt="dumbbell" class="w-100" />
                </div>
                <div class="section-heading text-center overflow-hidden">
                    <h2 class="text-white mb-0 d-inline-block">
                        {{ __('messages.vcard.our_service') }}
                    </h2>
                </div>
                <div class="services">
                    @if ($vcard->services_slider_view)
                    <div class="row services-slider-view">
                        @foreach ($vcard->services as $service)
                        <div>
                            <div class="service-card h-100">
                                <div class="card-img service-card-img">
                                    <a href="{{ $service->service_url ?? 'javascript:void(0)' }}"
                                        class="text-decoration-none img {{ $service->service_url ? 'pe-auto' : 'pe-none' }}"
                                        target="{{ $service->service_url ? '_blank' : '' }}">
                                        <img src="{{ $service->service_icon }}"
                                            class="card-img-top service-new-image scale-hover"
                                            alt="{{ $service->name }}" loading="lazy">
                                    </a>
                                </div>
                                <div class="text-center">
                                    <a href="{{ $service->service_url ?? 'javascript:void(0)' }}"
                                        class="text-decoration-none"
                                        target="{{ $service->service_url ? '_blank' : '' }}">
                                        <h5 class="card-title title-text">
                                            {{ ucwords($service->name) }}</h5>
                                    </a>
                                    <p
                                        class="card-text description-text {{ \Illuminate\Support\Str::length($service->description) > 170 ? 'more' : '' }}">
                                        {!! \Illuminate\Support\Str::limit($service->description, 170, '...') !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="row row-gap-20px">
                        @foreach ($vcard->services as $service)
                        <div class="col-sm-6 mb-sm-0">
                            <div class="service-card card h-100">
                                <div class="card-img mb-4 service-card-img">
                                    <a href="{{ $service->service_url ?? 'javascript:void(0)' }}"
                                        class="text-decoration-none"
                                        target="{{ $service->service_url ? '_blank' : '' }}">
                                        <img src="{{ $service->service_icon }}" alt="physical-fitness"
                                            class="img-fluid h-100" loading="lazy" />
                                    </a>
                                </div>
                                <div class="card-body p-0 text-center">
                                    <h3 class="card-title fs-20 text-white">
                                        {{ ucwords($service->name) }}
                                    </h3>
                                    <p
                                        class="mb-0 fs-14 text-gray-100 {{ \Illuminate\Support\Str::length($service->description) > 170 ? 'more' : '' }}">
                                        {!! \Illuminate\Support\Str::limit($service->description, 170, '...') !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            @endif
            @endif
            {{-- qrcode --}}
            @if (isset($vcard['show_qr_code']) && $vcard['show_qr_code'] == 1)
            <div class="qr-code-section pt-50 px-30 position-relative" @if (getLanguage($vcard->default_language) ==
                'Arabic') dir="rtl" @endif>
                <div class="position-absolute vector-bg-3 vector-bg">
                    <img src="{{ asset('assets/img/vcard12/vector-3.png') }}" alt="images" />
                </div>
                <div class="section-heading text-center overflow-hidden">
                    <h2 class="text-white mb-0 d-inline-block">
                        {{ __('messages.vcard.qr_code') }}
                    </h2>
                </div>
                <div>
                    <div
                        class="d-flex qr-code-box align-items-center mx-auto justify-content-center flex-column flex-sm-row">

                        <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                            <div class="qr-code d-flex justify-content-center text-center align-items-center">
                                <div class="qr-code-img d-flex justify-content-center align-items-center"
                                    id="qr-code-twelve">
                                    @if (isset($customQrCode['applySetting']) && $customQrCode['applySetting'] == 1)
                                    {!! QrCode::color(
                                    $qrcodeColor['qrcodeColor']->red(),
                                    $qrcodeColor['qrcodeColor']->green(),
                                    $qrcodeColor['qrcodeColor']->blue(),
                                    )->backgroundColor(
                                    $qrcodeColor['background_color']->red(),
                                    $qrcodeColor['background_color']->green(),
                                    $qrcodeColor['background_color']->blue(),
                                    )->style($customQrCode['style'])->eye($customQrCode['eye_style'])->size(130)->format('svg')->generate(Request::url())
                                    !!}
                                    @else
                                    {!! QrCode::size(130)->format('svg')->generate(Request::url()) !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-center  @if (getLanguage($vcard->default_language) == 'Arabic') text-sm-end @else text-sm-start @endif">
                            <h4 class="fw-bold mb-3 text-white">Scan to Identify</h4>
                            <div class="text-gray-100">
                                Use your phone's camera to scan the QR code and instantly save our contact details, or
                                tap the "Add to Contacts" button below.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            {{-- gallary --}}
            @if ((isset($managesection) && $managesection['galleries']) || empty($managesection))
            @if (checkFeature('gallery') && $vcard->gallery->count())
            <div class="gallery-section pt-50 position-relative">
                <div class="position-absolute vector-bg-4 vector-bg text-end">
                    <img src="{{ asset('assets/img/vcard12/vector-4.png') }}" alt="images" />
                </div>
                <div class="section-heading text-center mx-30">
                    <h2 class="text-white mb-0 d-inline-block">
                        {{ __('messages.plan.gallery') }}
                    </h2>
                </div>
                <div class="px-30">
                    <div class="gallery-slider px-sm-4">
                        @foreach ($vcard->gallery as $file)
                        @php
                        $infoPath = pathinfo(public_path($file->gallery_image));
                        $extension = $infoPath['extension'];
                        @endphp
                        <div class="gallery-all">
                            <div class="expand-icon pe-none">
                                <i class="fas fa-expand text-black"></i>
                            </div>
                            @if ($file->type == App\Models\Gallery::TYPE_IMAGE)
                            <div class="">
                                <div class="gallery-all position-relative">

                                    <a href="{{ $file->gallery_image }}" data-lightbox="gallery-images"
                                        class="gallery-img"><img src="{{ $file->gallery_image }}" alt="profile"
                                            class="w-100 h-100 object-fit-contain scale-hover" loading="lazy" /></a>
                                </div>
                            </div>
                            @elseif($file->type == App\Models\Gallery::TYPE_FILE)
                            <div class="">
                                <a id="file_url" href="{{ $file->gallery_image }}"
                                    class="gallery-link gallery-file-link" target="_blank" loading="lazy">
                                    <div class="gallery-item gallery-file-item scale-hover" @if ($extension=='pdf' )
                                        style="background-image: url({{ asset('assets/images/pdf-icon.png') }})"> @endif
                                        @if ($extension == 'xls') style="background-image: url({{
                                        asset('assets/images/xls.png') }})"> @endif
                                        @if ($extension == 'csv') style="background-image: url({{
                                        asset('assets/images/csv-file.png') }})"> @endif
                                        @if ($extension == 'xlsx') style="background-image: url({{
                                        asset('assets/images/xlsx.png') }})"> @endif
                                    </div>
                                </a>
                            </div>
                            @elseif($file->type == App\Models\Gallery::TYPE_VIDEO)
                            <div class="d-flex align-items-center video-container">
                                <video width="100%" controls>
                                    <source src="{{ $file->gallery_image }}">
                                </video>
                            </div>
                            @elseif($file->type == App\Models\Gallery::TYPE_AUDIO)
                            <div class="">
                                <div class="audio-container gallery-img">
                                    <img src="{{ asset('assets/img/music.jpeg') }}" alt="Album Cover"
                                        class="audio-image">
                                    <audio controls src="{{ $file->gallery_image }}" class="mt-2">
                                        Your browser does not support the <code>audio</code> element.
                                    </audio>
                                </div>
                            </div>
                            @else
                            <div>
                                <div class="gallery-img">
                                    <iframe id="video" src="https://www.youtube.com/embed/{{ YoutubeID($file->link) }}"
                                        class="w-100 scale-hover" height="200">
                                    </iframe>
                                </div>
                            </div>
                            @endif
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @endif
            {{-- product --}}
            @if ((isset($managesection) && $managesection['products']) || empty($managesection))
            @if (checkFeature('products') && $vcard->products->count())
            <div class="product-section bg-gray pt-50 px-30 position-relative">
                <div class="position-absolute vector-bg-5 vector-bg text-end">
                    <img src="{{ asset('assets/img/vcard12/vector-11.png') }}" alt="images" />
                </div>
                <div class="section-heading text-center overflow-hidden mx-3">
                    <h2 class="text-white mb-0 d-inline-block">
                        {{ __('messages.plan.products') }}
                    </h2>
                </div>
                <div class="product-slider">
                    @foreach ($vcardProducts as $product)
                    <div class="">
                        <a @if ($product->product_url) href="{{ $product->product_url }}" @endif
                            target="_blank" class="text-decoration-none fs-6">
                            <div class="product-card card">
                                <div class="product-img card-img">
                                    <img src="{{ $product->product_icon }}" class="img-fluid h-100 w-100 scale-hover"
                                        loading="lazy" />
                                </div>
                                <div class="product-desc card-body text-center">
                                    <div class="product-title">
                                        <h3 class="text-white">{{ $product->name }}</h3>
                                    </div>
                                    <div class="product-amount text-primary fw-6">
                                        @if ($product->currency_id && $product->price)
                                        {{ $product->currency->currency_icon }}{{
                                        getSuperAdminSettingValue('hide_decimal_values') == 1 ?
                                        number_format($product->price, 0) : number_format($product->price, 2) }}
                                        @elseif($product->price)
                                        {{ getUserCurrencyIcon($vcard->user->id) . ' ' . $product->price }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a class="fs-6 mb-0 text-center d-inline-flex gap-2 align-items-center view-more"
                        href="{{ $vcardProductUrl }}">{{ __('messages.analytics.view_more') }} <i
                            class="fa-solid fa-arrow-right-long right-arrow-animation"></i></a>
                </div>
            </div>
            @endif
            @endif
            {{-- testimonial --}}
            @if ((isset($managesection) && $managesection['testimonials']) || empty($managesection))
            @if (checkFeature('testimonials') && $vcard->testimonials->count())
            <div class="testimonial-section pt-50 px-30 position-relative" @if (getLanguage($vcard->default_language) ==
                'Arabic') dir="rtl" @endif>
                <div class="position-absolute vector-bg-6 vector-bg text-end">
                    <img src="{{ asset('assets/img/vcard12/vector-6.png') }}" alt="images" />
                </div>
                <div class="section-heading text-center mb-40 mx-30 overflow-hidden">
                    <h2 class="text-white mb-0 d-inline-block">
                        {{ __('messages.plan.testimonials') }}
                    </h2>
                </div>
                <div class="position-relative">
                    <div class="testimonial-slider">
                        @foreach ($vcard->testimonials as $testimonial)
                        <div class="">
                            <div class="testimonial-card h-100 bg-black position-relative px-30 pt-4 pb-4">
                                <div class="card-body d-flex flex-column justify-content-between p-0 text-center gap-3">
                                    <div class="quote-img-top">
                                        <img src="{{ asset('assets/img/vcard12/quote-img.png') }}" class="h-100 mx-auto"
                                            loading="lazy" />
                                    </div>
                                    <div class="position-relative">

                                        <p
                                            class="text-gray-100 fw-5 {{ \Illuminate\Support\Str::length($testimonial->description) > 80 ? 'more' : '' }}">
                                            "{!! $testimonial->description !!}"
                                        </p>
                                        <hr class="w-50 mx-auto text-gray-100">
                                        <h5 class="name fw-5 text-white mb-3">
                                            {{ ucwords($testimonial->name) }}
                                        </h5>
                                        <div>
                                            <div class="profile-img">
                                                <img src="{{ $testimonial->image_url }}"
                                                    class="w-100 h-100 object-fit-cover" loading="lazy">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @endif
            {{-- insta feed --}}
            @if ((isset($managesection) && $managesection['insta_embed']) || empty($managesection))
            @if (checkFeature('insta_embed') && $vcard->instagramEmbed->count())
            <div class="pt-50 position-relative">
                <div class="position-absolute vector-bg-12 vector-bg">
                    <img src="{{ asset('assets/img/vcard12/vector-10.png') }}" loading="lazy" class="w-100" />
                </div>
                <div class="section-heading text-center overflow-hidden">
                    <h2 class="text-white mb-0 d-inline-block">
                        {{ __('messages.feature.insta_embed') }}
                    </h2>
                </div>
                <nav class="px-30">
                    <div class="row insta-toggle">
                        <div class="nav nav-tabs px-0 border-0 d-flex justify-content-around" id="nav-tab"
                            role="tablist">
                            <button
                                class="d-flex align-items-center justify-content-center px-2 active postbtn instagram-btn border-0"
                                id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"
                                role="tab" aria-controls="nav-home" aria-selected="true">
                                <svg aria-label="Posts" class="svg-post-icon x1lliihq x1n2onr6 x173jzuc"
                                    fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24">
                                    <title>Posts</title>
                                    <rect fill="none" height="18" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" width="18" x="3" y="3"></rect>
                                    <line fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" x1="9.015" x2="9.015" y1="3" y2="21">
                                    </line>
                                    <line fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" x1="14.985" x2="14.985" y1="3" y2="21">
                                    </line>
                                    <line fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" x1="21" x2="3" y1="9.015" y2="9.015">
                                    </line>
                                    <line fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" x1="21" x2="3" y1="14.985" y2="14.985">
                                    </line>
                                </svg>
                            </button>
                            <button
                                class="d-flex align-items-center justify-content-center px-2 instagram-btn reelsbtn border-0"
                                id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
                                role="tab" aria-controls="nav-profile" aria-selected="false">
                                <svg class="svg-reels-icon" viewBox="0 0 48 48" width="27" height="27">
                                    <path
                                        d="m33,6H15c-.16,0-.31,0-.46.01-.7401.04-1.46.17-2.14.38-3.7,1.11-6.4,4.55-6.4,8.61v18c0,4.96,4.04,9,9,9h18c4.96,0,9-4.04,9-9V15c0-4.96-4.04-9-9-9Zm7,27c0,3.86-3.14,7-7,7H15c-3.86,0-7-3.14-7-7V15c0-3.37,2.39-6.19,5.57-6.85.46-.1.94-.15,1.43-.15h18c3.86,0,7,3.14,7,7v18Z"
                                        fill="currentColor" class="color000 svgShape not-active-svg"></path>
                                    <path
                                        d="M21 16h-2.2l-.66-1-4.57-6.85-.76-1.15h2.39l.66 1 4.67 7 .3.45c.11.17.17.36.17.55zM34 16h-2.2l-.66-1-4.67-7-.66-1h2.39l.66 1 4.67 7 .3.45c.11.17.17.36.17.55z"
                                        fill="currentColor" class="color000 svgShape not-active-svg"></path>
                                    <rect width="36" height="3" x="6" y="15" fill="currentColor"
                                        class="color000 svgShape"></rect>
                                    <path
                                        d="m20,35c-.1753,0-.3506-.0459-.5073-.1382-.3052-.1797-.4927-.5073-.4927-.8618v-10c0-.3545.1875-.6821.4927-.8618.3066-.1797.6831-.1846.9932-.0122l9,5c.3174.1763.5142.5107.5142.874s-.1968.6978-.5142.874l-9,5c-.1514.084-.3188.126-.4858.126Zm1-9.3003v6.6006l5.9409-3.3003-5.9409-3.3003Z"
                                        fill="currentColor" class="color000 svgShape not-active-svg"></path>
                                    <path
                                        d="m6,33c0,4.96,4.04,9,9,9h18c4.96,0,9-4.04,9-9v-16H6v16Zm13-9c0-.35.19-.68.49-.86.31-.18.69-.19,1-.01l9,5c.31.17.51.51.51.87s-.2.7-.51.87l-9,5c-.16.09-.3199.13-.49.13-.18,0-.35-.05-.51-.14-.3-.18-.49-.51-.49-.86v-10Zm23-9c0-4.96-4.04-9-9-9h-5.47l6,9h8.47Zm-10.86,0l-6.01-9h-10.13c-.16,0-.31,0-.46.01l5.99,8.99h10.61ZM12.4,6.39c-3.7,1.11-6.4,4.55-6.4,8.61h12.14l-5.74-8.61Z"
                                        fill="currentColor" class="color000 svgShape active-svg"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </nav>
                <div id="postContent" class="insta-feed mt-4 px-30">
                    <div class="row overflow-hidden row-gap-20px" loading="lazy">
                        <!-- "Post" content -->
                        @foreach ($vcard->InstagramEmbed as $InstagramEmbed)
                        @if ($InstagramEmbed->type == 0)
                        <div class="col-12 col-sm-6 insta-feed-iframe">
                            {!! $InstagramEmbed->embedtag !!}
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="d-none insta-feed mt-4 px-30" id="reelContent">
                    <div class="row overflow-hidden row-gap-20px">
                        <!-- "Reel" content -->
                        @foreach ($vcard->InstagramEmbed as $InstagramEmbed)
                        @if ($InstagramEmbed->type == 1)
                        <div class="col-12 col-sm-6 insta-feed-iframe">
                            {!! $InstagramEmbed->embedtag !!}
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @endif
            {{-- blog --}}
            @if ((isset($managesection) && $managesection['blogs']) || empty($managesection))
            @if (checkFeature('blog') && $vcard->blogs->count())
            <div class="blog-section pt-50 position-relative px-30">
                <div class="position-absolute vector-bg-8 vector-bg text-end">
                    <img src="{{ asset('assets/img/vcard12/vector-9.png') }}" alt="images" class="w-100" />
                </div>
                <div class="section-heading text-center mx-30 overflow-hidden">
                    <h2 class="text-white mb-0 d-inline-block">
                        {{ __('messages.feature.blog') }}
                    </h2>
                </div>
                <div class="blog-slider">
                    @foreach ($vcard->blogs as $blog)
                    <?php
                                $vcardBlogUrl = $isCustomDomainUse ? "https://{$customDomain->domain}/{$vcard->url_alias}/blog/{$blog->id}" : route('vcard.show-blog', [$vcard->url_alias, $blog->id]);
                                ?>
                    <div class="">
                        <div class="blog-card blog-1 card">
                            <div class="card-img blog-card-img">
                                <a href="{{ $vcardBlogUrl }}">
                                    <img src="{{ $blog->blog_icon }}" alt="profile"
                                        class="w-100 h-100 object-fit-cover scale-hover" loading="lazy" />
                                </a>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-end" @if (getLanguage($vcard->
                                default_language) == 'Arabic') dir="rtl" @endif >
                                <a href="{{ $vcardBlogUrl }}">
                                    <h4 class="card-title text-primary fw-5 mb-0">{{ $blog->title }}
                                    </h4>
                                    <p class="text-gray-100 mb-0">
                                        {{ Illuminate\Support\Str::words(strip_tags($blog->description), 100, '...')
                                        }}
                                    </p>
                                </a>
                                <a href="{{ $vcardBlogUrl }}"
                                    class="d-inline-flex gap-2 align-items-center justify-content-end ms-auto text-primary mt-1">
                                    <span>Read More</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @endif

            {{-- buisness hours --}}
            @if ((isset($managesection) && $managesection['business_hours']) || empty($managesection))
            @if ($vcard->businessHours->count())
            @php
            $todayWeekName = strtolower(\Carbon\Carbon::now()->rawFormat('D'));
            @endphp
            <div class="bussiness-hour-section pt-50 px-30 position-relative" @if (getLanguage($vcard->
                default_language) == 'Arabic') dir="rtl" @endif>
                <div class="position-absolute vector-bg-11 vector-bg">
                    <img src="{{ asset('assets/img/vcard12/vector-5.png') }}" alt="images" />
                </div>
                <div class="section-heading text-center overflow-hidden">
                    <h2 class="text-white mb-0 d-inline-block">
                        {{ __('messages.business.business_hours') }}
                    </h2>
                </div>
                <div class="bussiness-hours mt-3 pt-3">
                    <div class="row justify-content-center row-gap-20px">
                        @foreach ($businessDaysTime as $key => $dayTime)
                        <div class="col-sm-6">
                            <div
                                class="d-flex align-items-center gap-3 business-card overflow-hidden position-relative">
                                <div class="time-day-icon d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-clock text-[#f8f9fa]">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10.5 21h-4.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v3">
                                        </path>
                                        <path d="M16 3v4"></path>
                                        <path d="M8 3v4"></path>
                                        <path d="M4 11h10"></path>
                                        <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                        <path d="M18 16.5v1.5l.5 .5"></path>
                                    </svg>
                                </div>
                                <div class="d-flex flex-column gap-1">
                                    <div class="fs-14 text-gray-100 lh-1">{{ __('messages.business.' .
                                        \App\Models\BusinessHour::DAY_OF_WEEK[$key]) . ':' }}</div>
                                    <div class="fs-14 text-white">{!! $dayTime ?? '<span class="text-primary">' .
                                            __('messages.common.closed') . '</span>' !!}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @endif
            {{-- make appointment --}}
            @if ((isset($managesection) && $managesection['appointments']) || empty($managesection))
            @if (checkFeature('appointments') && $vcard->appointmentHours->count())
            <div class="appointment-section pt-50 position-relative">
                <div class="position-absolute vector-bg-appointment vector-bg text-end">
                    <img src="{{ asset('assets/img/vcard12/testimonial-bg.png') }}" alt="images" class="w-100" />
                </div>
                <div class="section-heading text-center overflow-hidden px-30">
                    <h2 class="text-white mb-0 d-inline-block">
                        {{ __('messages.make_appointments') }}
                    </h2>
                </div>
                <hr class="text-gray-100 m-0" />
                <div class="appointment pt-30 pb-30 px-30">

                    <div class="row">
                        <div class="col-12 mx-auto">
                            <div class="position-relative">
                                {{ Form::text('date', null, ['class' => 'form-control date appointment-input
                                text-start', 'placeholder' => __('messages.form.pick_date'), 'id' => 'pickUpDate']) }}
                                <span class="calendar-icon">
                                    <img src="{{ asset('assets/img/vcard12/calendar-icon.svg') }}" />
                                </span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="slotData" class="row">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-53 appointmentAdd d-none">
                                {{ __('messages.make_appointments') }}
                            </button>
                        </div>
                    </div>

                </div>
                <hr class="text-gray-100 m-0" />
            </div>
            @include('vcardTemplates.appointment')
            @endif
            @endif

            {{-- iframe --}}
            @if ((isset($managesection) && $managesection['iframe']) || empty($managesection))
            @if (checkFeature('iframes') && $vcard->iframes->count())
            <div class="iframe-section pt-50 px-30 position-relative">
                <div class="position-absolute vector-bg-10 vector-bg text-end">
                    <img src="{{ asset('assets/img/vcard12/chest-expander.png') }}" alt="images" />
                </div>
                <div class="section-heading text-center mx-30 overflow-hidden">
                    <h2 class="text-white mb-0 d-inline-block">
                        {{ __('messages.vcard.iframe') }}
                    </h2>
                </div>
                <div class="iframe-slider">
                    @foreach ($vcard->iframes as $iframe)
                    <div class="">
                        <div class="iframe-card blog-1 card">
                            <iframe src="{{ $iframe->url }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen width="100%" height="300" loading="lazy">
                            </iframe>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @endif

            {{-- contact us --}}
            @php
            $currentSubs = $vcard
            ->subscriptions()
            ->where('status', \App\Models\Subscription::ACTIVE)
            ->latest()
            ->first();
            @endphp
            @if ($currentSubs && $currentSubs->plan->planFeature->enquiry_form && $vcard->enable_enquiry_form)
            <div class="contact-us-section">
                <div class="section-heading text-center overflow-hidden px-30 pt-50">
                    <h2 class="text-white mb-0 d-inline-block">
                        {{ __('messages.contact_us.inquries') }}
                    </h2>
                </div>
                <div class="contact-after-img vector-bg text-end">
                    <img src="{{ asset('assets/img/vcard12/contact-after-img.png') }}" alt="iamges" class="w-100" />
                </div>
                <div class="px-30">
                    @if (getLanguage($vcard->default_language) != 'Arabic')
                    <div class="contact-form position-relative">
                        <form action="" id="enquiryForm" enctype="multipart/form-data">
                            @csrf
                            <div id="enquiryError" class="alert alert-danger d-none"></div>
                            <div class="row row-gap-20">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="{{ __('messages.form.your_name') }}" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="{{ __('messages.form.your_email') }}" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <input type="tel" name="phone" class="form-control"
                                            placeholder="{{ __('messages.form.phone') }}."
                                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,&quot;&quot;)" />
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <div class="mb-0">
                                        <textarea class="form-control text-area-input h-100" name="message"
                                            placeholder="{{ __('messages.form.type_message') }}" rows="4"></textarea>
                                    </div>
                                </div>
                                @if (isset($inquiry) && $inquiry == 1)
                                <div class="mb-3">
                                    <div class="wrapper-file-input">
                                        <div class="input-box form-control" id="fileInputTrigger">
                                            <h4> <i class="fa-solid fa-upload me-2"></i>{{ __('messages.choose_file') }}
                                            </h4> <input type="file" id="attachment" name="attachment" hidden
                                                multiple />
                                        </div> <small>{{ __('messages.file_supported') }}</small>
                                    </div>
                                    <div class="wrapper-file-section">
                                        <div class="selected-files" id="selectedFilesSection" style="display: none;">
                                            <h5>{{ __('messages.selected_files') }}</h5>
                                            <ul class="file-list" id="fileList"></ul>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if (!empty($vcard->privacy_policy) || !empty($vcard->term_condition))
                                <div class="col-12">
                                    <div class="d-flex gap-2 align-items-center">
                                        <input type="checkbox" name="terms_condition"
                                            class="form-check-input terms-condition" id="termConditionCheckbox"
                                            placeholder>&nbsp;
                                        <label class="form-check-label fs-14" for="privacyPolicyCheckbox">
                                            <span class="text-white">{{ __('messages.vcard.agree_to_our') }}</span>
                                            <a href="{{ $vcardPrivacyAndTerm }}" target="_blank"
                                                class="text-decoration-none fs-14 fw-6 text-primary">{!!
                                                __('messages.vcard.term_and_condition') !!}</a>
                                            <span class="text-white">&</span>
                                            <a href="{{ $vcardPrivacyAndTerm }}" target="_blank"
                                                class="text-decoration-none fs-14 fw-6 text-primary">{{
                                                __('messages.vcard.privacy_policy') }}</a>
                                        </label>
                                    </div>
                                </div>
                                @endif
                                <div class="col-12 text-center mt-4">
                                    <button class="contact-btn btn btn-primary" type="submit">
                                        {{ __('messages.contact_us.send_message') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                    @if (getLanguage($vcard->default_language) == 'Arabic')
                    <div class="contact-form position-relative" dir="rtl">
                        <form action="" id="enquiryForm" enctype="multipart/form-data">
                            @csrf
                            <div id="enquiryError" class="alert alert-danger d-none"></div>
                            <div class="row row-gap-20">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control text-start"
                                            placeholder="{{ __('messages.form.your_name') }}" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control text-start"
                                            placeholder="{{ __('messages.form.your_email') }}" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <input type="tel" name="phone" class="form-control text-start"
                                            placeholder="{{ __('messages.form.phone') }}."
                                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,&quot;&quot;)" />
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <div class="mb-0">
                                        <textarea class="form-control text-area-input h-100 text-start" name="message"
                                            placeholder="{{ __('messages.form.type_message') }}" rows="4"></textarea>
                                    </div>
                                </div>
                                @if (isset($inquiry) && $inquiry == 1)
                                <div class="mb-3">
                                    <div class="wrapper-file-input">
                                        <div class="input-box" id="fileInputTrigger">
                                            <h4> <i class="fa-solid fa-upload me-2"></i>{{ __('messages.choose_file') }}
                                            </h4> <input type="file" id="attachment" name="attachment" hidden
                                                multiple />
                                        </div> <small>{{ __('messages.file_supported') }}</small>
                                    </div>
                                    <div class="wrapper-file-section">
                                        <div class="selected-files" id="selectedFilesSection" style="display: none;">
                                            <h5>{{ __('messages.selected_files') }}</h5>
                                            <ul class="file-list" id="fileList"></ul>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if (!empty($vcard->privacy_policy) || !empty($vcard->term_condition))
                                <div class="col-12">
                                    <div class="d-flex gap-2 align-items-center">
                                        <input type="checkbox" name="terms_condition"
                                            class="form-check-input terms-condition" id="termConditionCheckbox"
                                            placeholder>&nbsp;
                                        <label class="form-check-label" for="privacyPolicyCheckbox">
                                            <span class="text-white">{{ __('messages.vcard.agree_to_our') }}</span>
                                            <a href="{{ $vcardPrivacyAndTerm }}" target="_blank"
                                                class="text-decoration-none fs-6 text-primary">{!!
                                                __('messages.vcard.term_and_condition') !!}</a>
                                            <span class="text-white">&</span>
                                            <a href="{{ $vcardPrivacyAndTerm }}" target="_blank"
                                                class="text-decoration-none fs-6 text-primary">{{
                                                __('messages.vcard.privacy_policy') }}</a>
                                        </label>
                                    </div>
                                </div>
                                @endif
                                <div class="col-12 text-center mt-4">
                                    <button class="contact-btn btn btn-primary" type="submit">
                                        {{ __('messages.contact_us.send_message') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            @endif
            @if ($currentSubs && $currentSubs->plan->planFeature->affiliation && $vcard->enable_affiliation)
            {{-- create vcard --}}
            <div class="create-vcard-section px-30 pt-50 position-relative" @if (getLanguage($vcard->default_language)
                == 'Arabic') dir="rtl" @endif>
                <div class="position-absolute vector-bg-9 vector-bg">
                    <img src="{{ asset('assets/img/vcard12/vector-7.png') }}" alt="images" />
                </div>
                <div class="section-heading text-center overflow-hidden">
                    <h2 class="text-white mb-0 d-inline-block">
                        {{ __('messages.create_vcard') }}
                    </h2>
                </div>
                <div class="vcard-link-card card">
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <a href="{{ route('register', ['referral-code' => $vcard->user->affiliate_code]) }}"
                            class="fw-6 text-primary link-text" target="_blank">{{ route('register', ['referral-code' =>
                            $vcard->user->affiliate_code]) }}
                        </a>
                        <i class="icon fa-solid fa-arrow-up-right-from-square text-primary"></i>
                    </div>
                </div>
            </div>
            @endif
            {{-- map --}}
            @if ((isset($managesection) && $managesection['map']) || empty($managesection))
            @if ($vcard->location_type == 0 && ($vcard->location_url && isset($url[5])))
            <div class="px-30 pt-50">
                <div class="map-border-main">
                    <div class="d-flex gap-2 mt-1 mb-3 align-items-center" @if (getLanguage($vcard->default_language) == 'Arabic') dir="rtl" @endif>
                        <div class="location-map-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" viewBox="0 0 16 21"
                                fill="none">
                                <g clip-path="url(#clip0_94_705)">
                                    <path
                                        d="M8.00262 16.8233C7.41576 16.1353 6.86625 15.5103 6.33274 14.8643C4.97228 13.2046 3.67585 11.4977 2.66751 9.60168C2.25138 8.81912 1.87258 8.01554 1.74454 7.13319C1.56848 5.9147 1.85124 4.76975 2.4221 3.69307C3.61716 1.45042 6.05531 0.184663 8.67485 0.431512C11.1503 0.662604 13.3164 2.45357 14.0473 4.82752C14.5115 6.35063 14.2554 7.7687 13.5565 9.1605C12.6282 10.9935 11.4384 12.6531 10.158 14.255C9.46978 15.1059 8.74954 15.9357 8.00262 16.8233ZM11.145 6.06702C11.129 4.31281 9.7152 2.94202 7.94394 2.96302C6.2367 2.98403 4.8229 4.39685 4.84424 6.06702C4.86558 7.80546 6.26871 9.16575 8.03464 9.1605C9.73654 9.15 11.161 7.73193 11.145 6.06702Z"
                                        fill="#000000" />
                                    <path
                                        d="M5.50584 14.6857C5.02034 14.7698 4.52418 14.838 4.04401 14.9378C3.1904 15.1164 2.34745 15.3422 1.60053 15.8044C1.37646 15.941 1.17372 16.1196 1.003 16.3139C0.757586 16.5975 0.757586 16.9441 1.003 17.2277C1.18439 17.4326 1.40847 17.6217 1.64855 17.7635C2.46482 18.2362 3.37179 18.4672 4.29476 18.6196C7.12237 19.0922 9.94465 19.0922 12.7349 18.378C13.3271 18.2256 13.8873 17.9315 14.4582 17.7004C14.5062 17.6794 14.5489 17.6427 14.5915 17.6112C15.3598 17.0807 15.3705 16.4819 14.6075 15.9357C13.898 15.4263 13.0657 15.1847 12.2227 14.9956C11.6519 14.8696 11.0757 14.7803 10.4088 14.6542C10.5422 14.5807 10.6169 14.4914 10.6916 14.4967C12.068 14.5964 13.4445 14.7015 14.7196 15.274C15.029 15.4105 15.3224 15.6206 15.5625 15.8569C16.0427 16.3244 16.1227 16.9809 15.8186 17.5744C15.6052 17.9998 15.2744 18.3254 14.8903 18.6038C13.8019 19.3811 12.5589 19.796 11.2624 20.0534C8.54685 20.5943 5.85262 20.4998 3.21174 19.6385C2.36345 19.3601 1.54718 19.0082 0.880293 18.4042C0.592197 18.1469 0.330777 17.8265 0.154718 17.4851C-0.160053 16.8601 0.0213404 16.1983 0.554852 15.7309C1.09903 15.2582 1.76059 15.0166 2.45415 14.8906C3.37179 14.7225 4.3001 14.6227 5.22307 14.5019C5.31911 14.4914 5.42581 14.5544 5.53251 14.5859C5.52184 14.6227 5.51117 14.6542 5.50584 14.6857Z"
                                        fill="#000000" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_94_705">
                                        <rect width="16" height="20" fill="white" transform="translate(0 0.399994)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <p class="text-white mb-0 text-break">{!! ucwords($vcard->location) !!}</p>
                    </div>
                    <iframe width="100%" height="300px" src='https://maps.google.de/maps?q={{ $url[5] }}/&output=embed'
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                </div>
            </div>
            @endif
            @if ($vcard->location_type == 1 && !empty($vcard->location_embed_tag))
            <div class="px-30 pt-50">
                <div class="embed-responsive embed-responsive-16by9 overflow-hidden map-border-main">
                    <div class="d-flex gap-2 mt-1 mb-3 align-items-center" @if (getLanguage($vcard->default_language) == 'Arabic') dir="rtl" @endif>
                        <div class="location-map-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" viewBox="0 0 16 21"
                                fill="none">
                                <g clip-path="url(#clip0_94_705)">
                                    <path
                                        d="M8.00262 16.8233C7.41576 16.1353 6.86625 15.5103 6.33274 14.8643C4.97228 13.2046 3.67585 11.4977 2.66751 9.60168C2.25138 8.81912 1.87258 8.01554 1.74454 7.13319C1.56848 5.9147 1.85124 4.76975 2.4221 3.69307C3.61716 1.45042 6.05531 0.184663 8.67485 0.431512C11.1503 0.662604 13.3164 2.45357 14.0473 4.82752C14.5115 6.35063 14.2554 7.7687 13.5565 9.1605C12.6282 10.9935 11.4384 12.6531 10.158 14.255C9.46978 15.1059 8.74954 15.9357 8.00262 16.8233ZM11.145 6.06702C11.129 4.31281 9.7152 2.94202 7.94394 2.96302C6.2367 2.98403 4.8229 4.39685 4.84424 6.06702C4.86558 7.80546 6.26871 9.16575 8.03464 9.1605C9.73654 9.15 11.161 7.73193 11.145 6.06702Z"
                                        fill="#000000" />
                                    <path
                                        d="M5.50584 14.6857C5.02034 14.7698 4.52418 14.838 4.04401 14.9378C3.1904 15.1164 2.34745 15.3422 1.60053 15.8044C1.37646 15.941 1.17372 16.1196 1.003 16.3139C0.757586 16.5975 0.757586 16.9441 1.003 17.2277C1.18439 17.4326 1.40847 17.6217 1.64855 17.7635C2.46482 18.2362 3.37179 18.4672 4.29476 18.6196C7.12237 19.0922 9.94465 19.0922 12.7349 18.378C13.3271 18.2256 13.8873 17.9315 14.4582 17.7004C14.5062 17.6794 14.5489 17.6427 14.5915 17.6112C15.3598 17.0807 15.3705 16.4819 14.6075 15.9357C13.898 15.4263 13.0657 15.1847 12.2227 14.9956C11.6519 14.8696 11.0757 14.7803 10.4088 14.6542C10.5422 14.5807 10.6169 14.4914 10.6916 14.4967C12.068 14.5964 13.4445 14.7015 14.7196 15.274C15.029 15.4105 15.3224 15.6206 15.5625 15.8569C16.0427 16.3244 16.1227 16.9809 15.8186 17.5744C15.6052 17.9998 15.2744 18.3254 14.8903 18.6038C13.8019 19.3811 12.5589 19.796 11.2624 20.0534C8.54685 20.5943 5.85262 20.4998 3.21174 19.6385C2.36345 19.3601 1.54718 19.0082 0.880293 18.4042C0.592197 18.1469 0.330777 17.8265 0.154718 17.4851C-0.160053 16.8601 0.0213404 16.1983 0.554852 15.7309C1.09903 15.2582 1.76059 15.0166 2.45415 14.8906C3.37179 14.7225 4.3001 14.6227 5.22307 14.5019C5.31911 14.4914 5.42581 14.5544 5.53251 14.5859C5.52184 14.6227 5.51117 14.6542 5.50584 14.6857Z"
                                        fill="#000000" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_94_705">
                                        <rect width="16" height="20" fill="white" transform="translate(0 0.399994)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <p class="text-white mb-0 text-break">{!! ucwords($vcard->location) !!}</p>
                    </div>
                    {!! $vcard->location_embed_tag ?? '' !!}
                </div>

            </div>
            @endif
            @endif

            {{-- sticky btn --}}

            <div class="w-100 d-flex justify-content-center sticky-vcard-div sticky-vcard12-div">
                @if ($vcard->enable_contact)
                <div @if (getLanguage($vcard->default_language) == 'Arabic') dir="rtl" @endif>
                    @if ($contactRequest == 1)
                    <a href="{{ Auth::check() ? route('add-contact', $vcard->id) : 'javascript:void(0);' }}" class="add-contact-btn btn-primary gap-2 d-flex justify-content-center align-items-center
                                {{ Auth::check() ? 'auth-contact-btn' : 'ask-contact-detail-form' }}"
                        data-action="{{ Auth::check() ? route('contact-request.store') : 'show-modal' }}">
                        <i class="fas fa-download fa-address-book fs-4"></i>
                        &nbsp;{{ __('messages.setting.add_contact') }}</a>
                    @else
                    <a href="{{ route('add-contact', $vcard->id) }}" class="add-contact-btn btn-primary"><i
                            class="fas fa-download fa-address-book fs-4"></i>
                        &nbsp;{{ __('messages.setting.add_contact') }}</a>
                    @endif
                </div>
                @include('vcardTemplates.contact-request')
                @endif
            </div>
            <div class="btn-section cursor-pointer @if (getLanguage($vcard->default_language) == 'Arabic') rtl @endif">
                <div class="fixed-btn-section ">
                    @if (empty($vcard->hide_stickybar))
                    <div class="@if (getLanguage($vcard->default_language) == 'Arabic') vcard-bars-btn-left @endif">
                        <div class="bars-btn gym-bars-btn ">
                            <img src="{{ asset('assets/img/vcard12/sticky.svg') }}" />
                        </div>
                    </div>
                    @endif
                    <div class="sub-btn d-none">
                        <div
                            class="sub-btn-div @if (getLanguage($vcard->default_language) == 'Arabic') sub-btn-div-left @endif">
                            @if ($vcard->whatsapp_share)
                            <div class="icon-search-container mb-3" data-ic-class="search-trigger">
                                <div class="wp-btn">
                                    <i class="fab text-light  fa-whatsapp fa-2x" id="wpIcon"></i>
                                </div>
                                <input type="number" class="search-input" id="wpNumber" data-ic-class="search-input"
                                    placeholder="{{ __('messages.setting.wp_number') }}" />
                                <div class="share-wp-btn-div">
                                    <a href="javascript:void(0)"
                                        class="vcard12-sticky-btn vcard12-btn-group d-flex justify-content-center align-items-center text-black rounded-0 text-decoration-none py-1 rounded-pill justify-content share-wp-btn">
                                        <i class="fa-solid fa-paper-plane"></i> </a>
                                </div>
                            </div>
                            @endif
                            @if (empty($vcard->hide_stickybar))
                            <div class="{{ isset($vcard->whatsapp_share) ? 'vcard12-btn-group' : 'stickyIcon' }}">
                                <button type="button"
                                    class="vcard12-btn-group vcard12-share  vcard12-sticky-btn mb-3  px-2 py-1"><i
                                        class="fas fa-share-alt pt-1 fs-4"></i></button>
                                @if (!empty($vcard->enable_download_qr_code))
                                <a type="button"
                                    class="vcard12-btn-group vcard12-sticky-btn  d-flex justify-content-center text-black align-items-center  px-2 mb-3 py-2"
                                    id="qr-code-btn" download="qr_code.png"><i class="fa-solid fa-qrcode fs-4"></i></a>
                                @endif
                                {{-- <a type="button"
                                    class="vcard12-btn-group vcard12-sticky-btn  d-flex justify-content-center text-black align-items-center  px-2 mb-3 py-2 d-none"
                                    id="videobtn"><i class="fa-solid fa-video fs-3" style="color: #eceeed;"></i></a>
                                --}}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-evenly made-by-section py-2">
                @if (checkFeature('advanced'))
                @if (checkFeature('advanced')->hide_branding && $vcard->branding == 0)
                @if ($vcard->made_by)
                <a @if (!is_null($vcard->made_by_url)) href="{{ $vcard->made_by_url }}" @endif
                    class="text-center text-decoration-none text-white" target="_blank">
                    <small>{{ __('messages.made_by') }} {{ $vcard->made_by }}</small>
                </a>
                @else
                <div class="text-center">
                    <small class="text-white">{{ __('messages.made_by') }}
                        {{ $setting['app_name'] }}</small>
                </div>
                @endif
                @endif
                @else
                @if ($vcard->made_by)
                <a @if (!is_null($vcard->made_by_url)) href="{{ $vcard->made_by_url }}" @endif
                    class="text-center text-decoration-none text-white " target="_blank">
                    <small>{{ __('messages.made_by') }} {{ $vcard->made_by }}</small>
                </a>
                @else
                <div class="text-center">
                    <small class="text-white">{{ __('messages.made_by') }}
                        {{ $setting['app_name'] }}</small>
                </div>
                @endif
                @endif
                @if (!empty($vcard->privacy_policy) || !empty($vcard->term_condition))
                <div>
                    <a class="text-decoration-none text-white cursor-pointer terms-policies-btn"
                        href="{{ $vcardPrivacyAndTerm }}"><small>{!! __('messages.vcard.term_policy') !!}</small></a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Modal -->
    @if ((isset($managesection) && $managesection['news_latter_popup']) || empty($managesection))
    <div class="modal fade" id="newsLatterModal" tabindex="-1" aria-labelledby="newsLatterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog news-modal modal-dialog-centered">
            <div class="modal-content animate-bottom" id="newsLatter-content">
                <div class="newsmodal-headerpx-0 position-relative">
                    <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"
                        id="closeNewsLatterModal"></button>
                </div>
                <div class="modal-body">
                    <h3 class="content text-start mb-2">{{ __('messages.vcard.subscribe_newslatter') }}</h3>
                    <p class="modal-desc text-start">{{ __('messages.vcard.update_directly') }}</p>
                    <form action="" method="post" id="newsLatterForm">
                        @csrf
                        <input type="hidden" name="vcard_id" value="{{ $vcard->id }}">
                        <div class="mb-1 mt-2 d-flex gap-1 justify-content-center align-items-center email-input">
                            <div class="w-100">
                                <input type="email" class="form-control email-input w-100"
                                    placeholder="{{ __('messages.form.enter_your_email') }}" aria-label="Email"
                                    name="email" id="emailSubscription" aria-describedby="button-addon2">
                            </div>
                            <button class="btn ms-1" type="submit" id="email-send">{{ __('messages.subscribe')
                                }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{-- share modal code --}}
    <div id="vcard12-shareModel" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" @if (getLanguage($vcard->default_language) == 'Arabic') dir="rtl" @endif>
                <div class="">
                    <div class="row align-items-center mt-3">
                        <div class="col-10 text-center">
                            <h5 class="modal-title pl-50">{{ __('messages.vcard.share_my_vcard') }}</h5>
                        </div>
                        <div class="col-2 p-0">
                            <button type="button" aria-label="Close"
                                class="p-3 btn btn-sm btn-icon btn-active-color-danger border-none"
                                data-bs-dismiss="modal">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                            fill="#000000">
                                            <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.5"
                                                transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                x="0" y="7" width="16" height="2" rx="1" />
                                        </g>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                @php
                $shareUrl = $vcardUrl;
                @endphp
                <div class="modal-body">
                    <a href="http://www.facebook.com/sharer.php?u={{ $shareUrl }}" target="_blank"
                        class="text-decoration-none share" title="Facebook">
                        <div class="row">
                            <div class="col-2">
                                <i class="fab fa-facebook fa-2x" style="color: #1B95E0"></i>

                            </div>
                            <div class="col-9 p-1">
                                <p class="align-items-center text-dark">
                                    {{ __('messages.social.Share_on_facebook') }}</p>
                            </div>
                            <div class="col-1 p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow" version="1.0" height="16px"
                                    viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                        fill="#000000" stroke="none">
                                        <path
                                            d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="http://twitter.com/share?url={{ $shareUrl }}&text={{ $vcard->name }}&hashtags=sharebuttons"
                        target="_blank" class="text-decoration-none share" title="Twitter">
                        <div class="row">
                            <div class="col-2">

                                <span><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                    </svg></span>

                            </div>
                            <div class="col-9 p-1">
                                <p class="align-items-center text-dark">
                                    {{ __('messages.social.Share_on_twitter') }}</p>
                            </div>
                            <div class="col-1 p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow" version="1.0" height="16px"
                                    viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                        fill="#000000" stroke="none">
                                        <path
                                            d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}" target="_blank"
                        class="text-decoration-none share" title="Linkedin">
                        <div class="row">
                            <div class="col-2">
                                <i class="fab fa-linkedin fa-2x" style="color: #1B95E0"></i>
                            </div>
                            <div class="col-9 p-1">
                                <p class="align-items-center text-dark">
                                    {{ __('messages.social.Share_on_linkedin') }}</p>
                            </div>
                            <div class="col-1 p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow" version="1.0" height="16px"
                                    viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                        fill="#000000" stroke="none">
                                        <path
                                            d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="mailto:?Subject=&Body={{ $shareUrl }}" target="_blank" class="text-decoration-none share"
                        title="Email">
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-envelope fa-2x" style="color: #191a19  "></i>
                            </div>
                            <div class="col-9 p-1">
                                <p class="align-items-center text-dark">
                                    {{ __('messages.social.Share_on_email') }}</p>
                            </div>
                            <div class="col-1 p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow" version="1.0" height="16px"
                                    viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                        fill="#000000" stroke="none">
                                        <path
                                            d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="http://pinterest.com/pin/create/link/?url={{ $shareUrl }}" target="_blank"
                        class="text-decoration-none share" title="Pinterest">
                        <div class="row">
                            <div class="col-2">
                                <i class="fab fa-pinterest fa-2x" style="color: #bd081c"></i>
                            </div>
                            <div class="col-9 p-1">
                                <p class="align-items-center text-dark">
                                    {{ __('messages.social.Share_on_pinterest') }}</p>
                            </div>
                            <div class="col-1 p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow" version="1.0" height="16px"
                                    viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                        fill="#000000" stroke="none">
                                        <path
                                            d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="http://reddit.com/submit?url={{ $shareUrl }}&title={{ $vcard->name }}" target="_blank"
                        class="text-decoration-none share" title="Reddit">
                        <div class="row">
                            <div class="col-2">
                                <i class="fab fa-reddit fa-2x" style="color: #ff4500"></i>
                            </div>
                            <div class="col-9 p-1">
                                <p class="align-items-center text-dark">
                                    {{ __('messages.social.Share_on_reddit') }}</p>
                            </div>
                            <div class="col-1 p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow" version="1.0" height="16px"
                                    viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                        fill="#000000" stroke="none">
                                        <path
                                            d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="https://wa.me/?text={{ $shareUrl }}" target="_blank" class="text-decoration-none share"
                        title="Whatsapp">
                        <div class="row">
                            <div class="col-2">
                                <i class="fab fa-whatsapp fa-2x" style="color: limegreen"></i>
                            </div>
                            <div class="col-9 p-1">
                                <p class="align-items-center text-dark">
                                    {{ __('messages.social.Share_on_whatsapp') }}</p>
                            </div>
                            <div class="col-1 p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow" version="1.0" height="16px"
                                    viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                        fill="#000000" stroke="none">
                                        <path
                                            d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="https://www.snapchat.com/scan?attachmentUrl={{ $shareUrl }}" target="_blank"
                        class="text-decoration-none share" title="Snapchat">
                        <div class="row">
                            <div class="col-2">
                                <svg width="30px" height="30px" viewBox="147.353 39.286 514.631 514.631" version="1.1"
                                    id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path style="fill:#FFFC00;"
                                            d="M147.553,423.021v0.023c0.308,11.424,0.403,22.914,2.33,34.268 c2.042,12.012,4.961,23.725,10.53,34.627c7.529,14.756,17.869,27.217,30.921,37.396c9.371,7.309,19.608,13.111,30.94,16.771 c16.524,5.33,33.571,7.373,50.867,7.473c10.791,0.068,21.575,0.338,32.37,0.293c78.395-0.33,156.792,0.566,235.189-0.484 c10.403-0.141,20.636-1.41,30.846-3.277c19.569-3.582,36.864-11.932,51.661-25.133c17.245-15.381,28.88-34.205,34.132-56.924 c3.437-14.85,4.297-29.916,4.444-45.035v-3.016c0-1.17-0.445-256.892-0.486-260.272c-0.115-9.285-0.799-18.5-2.54-27.636 c-2.117-11.133-5.108-21.981-10.439-32.053c-5.629-10.641-12.68-20.209-21.401-28.57c-13.359-12.81-28.775-21.869-46.722-26.661 c-16.21-4.327-32.747-5.285-49.405-5.27c-0.027-0.004-0.09-0.173-0.094-0.255H278.56c-0.005,0.086-0.008,0.172-0.014,0.255 c-9.454,0.173-18.922,0.102-28.328,1.268c-10.304,1.281-20.509,3.21-30.262,6.812c-15.362,5.682-28.709,14.532-40.11,26.347 c-12.917,13.386-22.022,28.867-26.853,46.894c-4.31,16.084-5.248,32.488-5.271,49.008">
                                        </path>
                                        <path style="fill:#FFFFFF;"
                                            d="M407.001,473.488c-1.068,0-2.087-0.039-2.862-0.076c-0.615,0.053-1.25,0.076-1.886,0.076 c-22.437,0-37.439-10.607-50.678-19.973c-9.489-6.703-18.438-13.031-28.922-14.775c-5.149-0.854-10.271-1.287-15.22-1.287 c-8.917,0-15.964,1.383-21.109,2.389c-3.166,0.617-5.896,1.148-8.006,1.148c-2.21,0-4.895-0.49-6.014-4.311 c-0.887-3.014-1.523-5.934-2.137-8.746c-1.536-7.027-2.65-11.316-5.281-11.723c-28.141-4.342-44.768-10.738-48.08-18.484 c-0.347-0.814-0.541-1.633-0.584-2.443c-0.129-2.309,1.501-4.334,3.777-4.711c22.348-3.68,42.219-15.492,59.064-35.119 c13.049-15.195,19.457-29.713,20.145-31.316c0.03-0.072,0.065-0.148,0.101-0.217c3.247-6.588,3.893-12.281,1.926-16.916 c-3.626-8.551-15.635-12.361-23.58-14.882c-1.976-0.625-3.845-1.217-5.334-1.808c-7.043-2.782-18.626-8.66-17.083-16.773 c1.124-5.916,8.949-10.036,15.273-10.036c1.756,0,3.312,0.308,4.622,0.923c7.146,3.348,13.575,5.045,19.104,5.045 c6.876,0,10.197-2.618,11-3.362c-0.198-3.668-0.44-7.546-0.674-11.214c0-0.004-0.005-0.048-0.005-0.048 c-1.614-25.675-3.627-57.627,4.546-75.95c24.462-54.847,76.339-59.112,91.651-59.112c0.408,0,6.674-0.062,6.674-0.062 c0.283-0.005,0.59-0.009,0.908-0.009c15.354,0,67.339,4.27,91.816,59.15c8.173,18.335,6.158,50.314,4.539,76.016l-0.076,1.23 c-0.222,3.49-0.427,6.793-0.6,9.995c0.756,0.696,3.795,3.096,9.978,3.339c5.271-0.202,11.328-1.891,17.998-5.014 c2.062-0.968,4.345-1.169,5.895-1.169c2.343,0,4.727,0.456,6.714,1.285l0.106,0.041c5.66,2.009,9.367,6.024,9.447,10.242 c0.071,3.932-2.851,9.809-17.223,15.485c-1.472,0.583-3.35,1.179-5.334,1.808c-7.952,2.524-19.951,6.332-23.577,14.878 c-1.97,4.635-1.322,10.326,1.926,16.912c0.036,0.072,0.067,0.145,0.102,0.221c1,2.344,25.205,57.535,79.209,66.432 c2.275,0.379,3.908,2.406,3.778,4.711c-0.048,0.828-0.248,1.656-0.598,2.465c-3.289,7.703-19.915,14.09-48.064,18.438 c-2.642,0.408-3.755,4.678-5.277,11.668c-0.63,2.887-1.271,5.717-2.146,8.691c-0.819,2.797-2.641,4.164-5.567,4.164h-0.441 c-1.905,0-4.604-0.346-8.008-1.012c-5.95-1.158-12.623-2.236-21.109-2.236c-4.948,0-10.069,0.434-15.224,1.287 c-10.473,1.744-19.421,8.062-28.893,14.758C444.443,462.88,429.436,473.488,407.001,473.488">
                                        </path>
                                        <path style="fill:#020202;"
                                            d="M408.336,124.235c14.455,0,64.231,3.883,87.688,56.472c7.724,17.317,5.744,48.686,4.156,73.885 c-0.248,3.999-0.494,7.875-0.694,11.576l-0.084,1.591l1.062,1.185c0.429,0.476,4.444,4.672,13.374,5.017l0.144,0.008l0.15-0.003 c5.904-0.225,12.554-2.059,19.776-5.442c1.064-0.498,2.48-0.741,3.978-0.741c1.707,0,3.521,0.321,5.017,0.951l0.226,0.09 c3.787,1.327,6.464,3.829,6.505,6.093c0.022,1.28-0.935,5.891-14.359,11.194c-1.312,0.518-3.039,1.069-5.041,1.7 c-8.736,2.774-21.934,6.96-26.376,17.427c-2.501,5.896-1.816,12.854,2.034,20.678c1.584,3.697,26.52,59.865,82.631,69.111 c-0.011,0.266-0.079,0.557-0.229,0.9c-0.951,2.24-6.996,9.979-44.612,15.783c-5.886,0.902-7.328,7.5-9,15.17 c-0.604,2.746-1.218,5.518-2.062,8.381c-0.258,0.865-0.306,0.914-1.233,0.914c-0.128,0-0.278,0-0.442,0 c-1.668,0-4.2-0.346-7.135-0.922c-5.345-1.041-12.647-2.318-21.982-2.318c-5.21,0-10.577,0.453-15.962,1.352 c-11.511,1.914-20.872,8.535-30.786,15.543c-13.314,9.408-27.075,19.143-48.071,19.143c-0.917,0-1.812-0.031-2.709-0.076 l-0.236-0.01l-0.237,0.018c-0.515,0.045-1.034,0.068-1.564,0.068c-20.993,0-34.76-9.732-48.068-19.143 c-9.916-7.008-19.282-13.629-30.791-15.543c-5.38-0.896-10.752-1.352-15.959-1.352c-9.333,0-16.644,1.428-21.978,2.471 c-2.935,0.574-5.476,1.066-7.139,1.066c-1.362,0-1.388-0.08-1.676-1.064c-0.844-2.865-1.461-5.703-2.062-8.445 c-1.676-7.678-3.119-14.312-9.002-15.215c-37.613-5.809-43.659-13.561-44.613-15.795c-0.149-0.352-0.216-0.652-0.231-0.918 c56.11-9.238,81.041-65.408,82.63-69.119c3.857-7.818,4.541-14.775,2.032-20.678c-4.442-10.461-17.638-14.653-26.368-17.422 c-2.007-0.635-3.735-1.187-5.048-1.705c-11.336-4.479-14.823-8.991-14.305-11.725c0.601-3.153,6.067-6.359,10.837-6.359 c1.072,0,2.012,0.173,2.707,0.498c7.747,3.631,14.819,5.472,21.022,5.472c9.751,0,14.091-4.537,14.557-5.055l1.057-1.182 l-0.085-1.583c-0.197-3.699-0.44-7.574-0.696-11.565c-1.583-25.205-3.563-56.553,4.158-73.871 c23.37-52.396,72.903-56.435,87.525-56.435c0.36,0,6.717-0.065,6.717-0.065C407.744,124.239,408.033,124.235,408.336,124.235 M408.336,115.197h-0.017c-0.333,0-0.646,0-0.944,0.004c-2.376,0.024-6.282,0.062-6.633,0.066c-8.566,0-25.705,1.21-44.115,9.336 c-10.526,4.643-19.994,10.921-28.14,18.66c-9.712,9.221-17.624,20.59-23.512,33.796c-8.623,19.336-6.576,51.905-4.932,78.078 l0.006,0.041c0.176,2.803,0.361,5.73,0.53,8.582c-1.265,0.581-3.316,1.194-6.339,1.194c-4.864,0-10.648-1.555-17.187-4.619 c-1.924-0.896-4.12-1.349-6.543-1.349c-3.893,0-7.997,1.146-11.557,3.239c-4.479,2.63-7.373,6.347-8.159,10.468 c-0.518,2.726-0.493,8.114,5.492,13.578c3.292,3.008,8.128,5.782,14.37,8.249c1.638,0.645,3.582,1.261,5.641,1.914 c7.145,2.271,17.959,5.702,20.779,12.339c1.429,3.365,0.814,7.793-1.823,13.145c-0.069,0.146-0.138,0.289-0.201,0.439 c-0.659,1.539-6.807,15.465-19.418,30.152c-7.166,8.352-15.059,15.332-23.447,20.752c-10.238,6.617-21.316,10.943-32.923,12.855 c-4.558,0.748-7.813,4.809-7.559,9.424c0.078,1.33,0.39,2.656,0.931,3.939c0.004,0.008,0.009,0.016,0.013,0.023 c1.843,4.311,6.116,7.973,13.063,11.203c8.489,3.943,21.185,7.26,37.732,9.855c0.836,1.59,1.704,5.586,2.305,8.322 c0.629,2.908,1.285,5.898,2.22,9.074c1.009,3.441,3.626,7.553,10.349,7.553c2.548,0,5.478-0.574,8.871-1.232 c4.969-0.975,11.764-2.305,20.245-2.305c4.702,0,9.575,0.414,14.48,1.229c9.455,1.574,17.606,7.332,27.037,14 c13.804,9.758,29.429,20.803,53.302,20.803c0.651,0,1.304-0.021,1.949-0.066c0.789,0.037,1.767,0.066,2.799,0.066 c23.88,0,39.501-11.049,53.29-20.799l0.022-0.02c9.433-6.66,17.575-12.41,27.027-13.984c4.903-0.814,9.775-1.229,14.479-1.229 c8.102,0,14.517,1.033,20.245,2.15c3.738,0.736,6.643,1.09,8.872,1.09l0.218,0.004h0.226c4.917,0,8.53-2.699,9.909-7.422 c0.916-3.109,1.57-6.029,2.215-8.986c0.562-2.564,1.46-6.674,2.296-8.281c16.558-2.6,29.249-5.91,37.739-9.852 c6.931-3.215,11.199-6.873,13.053-11.166c0.556-1.287,0.881-2.621,0.954-3.979c0.261-4.607-2.999-8.676-7.56-9.424 c-51.585-8.502-74.824-61.506-75.785-63.758c-0.062-0.148-0.132-0.295-0.205-0.438c-2.637-5.354-3.246-9.777-1.816-13.148 c2.814-6.631,13.621-10.062,20.771-12.332c2.07-0.652,4.021-1.272,5.646-1.914c7.039-2.78,12.07-5.796,15.389-9.221 c3.964-4.083,4.736-7.995,4.688-10.555c-0.121-6.194-4.856-11.698-12.388-14.393c-2.544-1.052-5.445-1.607-8.399-1.607 c-2.011,0-4.989,0.276-7.808,1.592c-6.035,2.824-11.441,4.368-16.082,4.588c-2.468-0.125-4.199-0.66-5.32-1.171 c0.141-2.416,0.297-4.898,0.458-7.486l0.067-1.108c1.653-26.19,3.707-58.784-4.92-78.134c-5.913-13.253-13.853-24.651-23.604-33.892 c-8.178-7.744-17.678-14.021-28.242-18.661C434.052,116.402,416.914,115.197,408.336,115.197">
                                        </path>
                                        <rect x="147.553" y="39.443" style="fill:none;" width="514.231" height="514.23">
                                        </rect>
                                    </g>
                                </svg>
                            </div>
                            <div class="col-9 p-1">
                                <p class="align-items-center text-dark">
                                    {{ __('messages.social.Share_on_snapchat') }}</p>
                            </div>
                            <div class="col-1 p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow" version="1.0" height="16px"
                                    viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                        fill="#000000" stroke="none">
                                        <path
                                            d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class="col-12 justify-content-between social-link-modal">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="{{ request()->fullUrl() }}" disabled>
                            <span id="vcardUrlCopy{{ $vcard->id }}" class="d-none" target="_blank">
                                {{ $vcardUrl }} </span>
                            <button class="copy-vcard-clipboard btn btn-dark" title="Copy Link"
                                data-id="{{ $vcard->id }}">
                                <i class="fa-regular fa-copy fa-2x"></i>
                            </button>
                        </div>
                    </div>
                    <div class="text-center">

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
@include('vcardTemplates.template.templates')
<script src="https://js.stripe.com/v3/"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/front-third-party.js') }}"></script>
@if (checkFeature('seo') && $vcard->google_analytics)
{!! $vcard->google_analytics !!}
@endif
@if (isset(checkFeature('advanced')->custom_js) && $vcard->custom_js)
{!! $vcard->custom_js !!}
@endif
@php
$setting = \App\Models\UserSetting::where('user_id', $vcard->tenant->user->id)
->where('key', 'stripe_key')
->first();
@endphp
<script src="https://cdn.jsdelivr.net/npm/interactjs@1.10.11/dist/interact.min.js"></script>
<script>
    let stripe = ''
    @if (!empty($setting) && !empty($setting->value))
        stripe = Stripe('{{ $setting->value }}');
    @endif
    $().ready(function() {
        $(".gallery-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            speed: 300,
            infinite: true,
            autoplaySpeed: 5000,
            /* autoplay: true, */
        });
        $(".product-slider").slick({
            arrows: false,
            infinite: true,
            dots: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            /* autoplay: true, */
            responsive: [{
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                },
            }, ],
        });
        $(".testimonial-slider").slick({
            arrows: false,
            infinite: true,
            dots: true,
            slidesToShow: 1,
            /* autoplay: true, */
            @if (getLanguage($vcard->default_language) == 'Arabic')
                rtl: true,
            @endif
        });
        @if ($vcard->services_slider_view)
            $('.services-slider-view').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 2,
                autoplay: false,
                slidesToScroll: 1,
                arrows: false,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                    },
                }, ],
            });
        @endif
        $(".blog-slider").slick({
            arrows: false,
            infinite: true,
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            /* autoplay: true, */
        });
        $(".iframe-slider").slick({
            arrows: false,
            infinite: true,
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
        });
    });

</script>
<script>
    let isEdit = false
    let password = "{{ isset(checkFeature('advanced')->password) && !empty($vcard->password) }}"
    let passwordUrl = "{{ route('vcard.password', $vcard->id) }}";
    let enquiryUrl = "{{ route('enquiry.store', ['vcard' => $vcard->id, 'alias' => $vcard->url_alias]) }}";
    let appointmentUrl = "{{ route('appointment.store', ['vcard' => $vcard->id, 'alias' => $vcard->url_alias]) }}";
    let slotUrl = "{{ route('appointment-session-time', $vcard->url_alias) }}";
    let appUrl = "{{ config('app.url') }}";
    let vcardId = {{ $vcard->id }};
    let vcardAlias = "{{ $vcard->url_alias }}";
    let languageChange = "{{ url('language') }}";
    let paypalUrl = "{{ route('paypal.init') }}"
    let lang = "{{ checkLanguageSession($vcard->url_alias) }}";
    let userDateFormate = "{{ getSuperAdminSettingValue('datetime_method') ?? 1 }}";
    let userlanguage = "{{ getLanguage($vcard->default_language) }}"
</script>
<script>
    const qrCodeTwelve = document.getElementById("qr-code-twelve");
    const svg = qrCodeTwelve.querySelector("svg");
    const blob = new Blob([svg.outerHTML], {
        type: 'image/svg+xml'
    });
    const url = URL.createObjectURL(blob);
    const image = document.createElement('img');
    image.src = url;
    image.addEventListener('load', () => {
        const canvas = document.createElement('canvas');
        canvas.width = canvas.height = {{ $vcard->qr_code_download_size }};
        const context = canvas.getContext('2d');
        context.drawImage(image, 0, 0, canvas.width, canvas.height);
        const link = document.getElementById('qr-code-btn');
        link.href = canvas.toDataURL();
        URL.revokeObjectURL(url);
    });
</script>
@routes
<script src="{{ asset('messages.js?$mixID') }}"></script>
<script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
<script src="{{ mix('assets/js/vcards/vcard-view.js') }}"></script>
<script src="{{ mix('assets/js/lightbox.js') }}"></script>
<script src="{{ asset('/sw.js') }}"></script>
<script>
    if ("serviceWorker" in navigator) {
        // Register a service worker hosted at the root of the
        // site using the default scope.
        navigator.serviceWorker.register("/sw.js").then(
            (registration) => {
                console.log("Service worker registration succeeded:", registration);
            },
            (error) => {
                console.error(`Service worker registration failed: ${error}`);
            },
        );
    } else {
        console.error("Service workers are not supported.");
    }
</script>
<script>
    let deferredPrompt = null;
    window.addEventListener("beforeinstallprompt", (event) => {
        /* event.preventDefault(); */
        deferredPrompt = event;
        document.getElementById("installPwaBtn").style.display = "block";
    });
    document.getElementById("installPwaBtn").addEventListener("click", async () => {
        if (deferredPrompt) {
            deferredPrompt.prompt();
            await deferredPrompt.userChoice;
            deferredPrompt = null;
        }
    });
</script>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" defer></script>

</html>
