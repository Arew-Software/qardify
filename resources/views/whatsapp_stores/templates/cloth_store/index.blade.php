<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>{{ $whatsappStore->store_name }} | {{ getAppName() }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ $whatsappStore->logo_url }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('pwa/1.json') }}">

    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/cloth_store.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/custom.css') }}" />
</head>

<body>
    <div class="main-content mx-auto w-100 overflow-hidden d-flex flex-column justify-content-between {{ getLocalLanguage() == 'ar' ? 'rtl' : '' }}"
        @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif>
        <div>
            <nav class="navbar navbar-expand-lg px-50 position-relative">
                <div class="container-fluid p-0">
                    <div class="d-flex align-items-center gap-3">
                        <a class="navbar-brand p-0 m-0" href="{{ request()->url() }}">
                            <img src="{{ $whatsappStore->logo_url }}" alt="logo"
                                class="w-100 h-100 object-fit-cover" />
                        </a>
                        <span class="fw-5 fs-18"><a
                                href="{{ route('whatsapp.store.show', $whatsappStore->url_alias) }}"
                                style="color: #212529 ">{{ $whatsappStore->store_name }}</a></span>
                    </div>

                    <div class="d-flex align-items-center gap-lg-4 gap-sm-3 gap-2">
                        <div class="language-dropdown position-relative">
                            <button class="dropdown-btn position-relative" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                @if (array_key_exists(getLocalLanguage() ?? 'en', \App\Models\User::FLAG))
                                    <img class="flag" alt="flag"
                                        src="{{ asset(\App\Models\User::FLAG[getLocalLanguage() ?? 'en']) }}" />
                                @endif
                                {{ strtoupper(getLocalLanguage() ?? 'EN') }}
                            </button>
                            <svg class="dropdown-arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="8"
                                viewBox="0 0 18 10" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.615983 0.366227C0.381644 0.600637 0.25 0.918522 0.25 1.24998C0.25 1.58143 0.381644 1.89932 0.615983 2.13373L8.11598 9.63373C8.35039 9.86807 8.66828 9.99971 8.99973 9.99971C9.33119 9.99971 9.64907 9.86807 9.88348 9.63373L17.3835 2.13373C17.6112 1.89797 17.7372 1.58222 17.7343 1.25448C17.7315 0.92673 17.6 0.613214 17.3683 0.381454C17.1365 0.149694 16.823 0.0182329 16.4952 0.0153849C16.1675 0.0125369 15.8517 0.13853 15.616 0.366227L8.99973 6.98248L2.38348 0.366227C2.14907 0.131889 1.83119 0.000244141 1.49973 0.000244141C1.16828 0.000244141 0.850393 0.131889 0.615983 0.366227Z"
                                    fill="black" />
                            </svg>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach (getAllLanguageWithFullData() as $language)
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)" id="languageName"
                                            data-name="{{ $language->iso_code }}">

                                            @if (array_key_exists($language->iso_code, \App\Models\User::FLAG))
                                                <img class="flag" alt="flag"
                                                    src="{{ asset(\App\Models\User::FLAG[$language->iso_code]) }}" />
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
                        </div>

                        <button
                            class="add-to-cart-btn d-flex align-items-center justify-content-center position-relative"
                            id="addToCartViewBtn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.0048 9.03985C20.0048 9.27694 19.9106 9.50433 19.7429 9.67198C19.5753 9.83964 19.3479 9.93382 19.1108 9.93382C18.8737 9.93382 18.6463 9.83964 18.4787 9.67198C18.311 9.50433 18.2168 9.27694 18.2168 9.03985V7.2519C18.2168 6.38254 17.8715 5.54879 17.2567 4.93406C16.642 4.31934 15.8083 3.97399 14.9389 3.97399C14.0696 3.97399 13.2358 4.31934 12.6211 4.93406C12.0063 5.54879 11.661 6.38254 11.661 7.2519V9.03985C11.661 9.27694 11.5668 9.50433 11.3992 9.67198C11.2315 9.83964 11.0041 9.93382 10.767 9.93382C10.5299 9.93382 10.3025 9.83964 10.1349 9.67198C9.96723 9.50433 9.87305 9.27694 9.87305 9.03985V7.2519C9.87305 5.90835 10.4068 4.61982 11.3568 3.66979C12.3068 2.71976 13.5954 2.18604 14.9389 2.18604C16.2825 2.18604 17.571 2.71976 18.521 3.66979C19.471 4.61982 20.0048 5.90835 20.0048 7.2519V9.03985Z"
                                    fill="#292929" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M23.6898 10.6489L24.6434 24.9525C24.6674 25.3188 24.616 25.6862 24.4924 26.0318C24.3688 26.3775 24.1756 26.6942 23.9249 26.9623C23.6741 27.2304 23.371 27.4442 23.0343 27.5905C22.6977 27.7369 22.3346 27.8127 21.9675 27.8132H7.90939C7.54218 27.813 7.17892 27.7375 6.84209 27.5913C6.50526 27.445 6.20204 27.2312 5.95119 26.963C5.70034 26.6948 5.5072 26.378 5.38374 26.0322C5.26028 25.6864 5.20912 25.3189 5.23342 24.9525L6.187 10.6489C6.23235 9.97006 6.534 9.33384 7.03086 8.86907C7.52771 8.40431 8.18262 8.14575 8.86296 8.14575H21.0139C21.6942 8.14575 22.3491 8.40431 22.846 8.86907C23.3428 9.33384 23.6445 9.97006 23.6898 10.6489ZM17.9017 13.4238C17.6351 13.984 17.2153 14.4571 16.6909 14.7884C16.1664 15.1197 15.5588 15.2955 14.9384 15.2955C14.3181 15.2955 13.7105 15.1197 13.186 14.7884C12.6615 14.4571 12.2417 13.984 11.9752 13.4238C11.9248 13.3177 11.854 13.2227 11.7668 13.144C11.6797 13.0653 11.5779 13.0045 11.4673 12.9652C11.3566 12.9258 11.2393 12.9086 11.1221 12.9146C11.0048 12.9206 10.8899 12.9496 10.7838 13C10.6778 13.0504 10.5827 13.1212 10.504 13.2084C10.4253 13.2955 10.3646 13.3973 10.3252 13.508C10.2859 13.6186 10.2687 13.7359 10.2747 13.8532C10.2807 13.9704 10.3097 14.0854 10.3601 14.1914C10.7706 15.0583 11.4188 15.7908 12.2293 16.3037C13.0398 16.8166 13.9793 17.0889 14.9384 17.0889C15.8976 17.0889 16.837 16.8166 17.6475 16.3037C18.458 15.7908 19.1062 15.0583 19.5168 14.1914C19.5672 14.0854 19.5962 13.9704 19.6022 13.8532C19.6082 13.7359 19.591 13.6186 19.5516 13.508C19.5123 13.3973 19.4515 13.2955 19.3728 13.2084C19.2942 13.1212 19.1991 13.0504 19.093 13C18.987 12.9496 18.872 12.9206 18.7548 12.9146C18.6375 12.9086 18.5202 12.9258 18.4096 12.9652C18.2989 13.0045 18.1972 13.0653 18.11 13.144C18.0229 13.2226 17.9521 13.3177 17.9017 13.4238Z"
                                    fill="#292929" />
                            </svg>

                            <div
                                class="position-absolute product-count-badge count-product  badge rounded-pill bg-danger">

                            </div>

                        </button>
                    </div>
                </div>
            </nav>
            <div class="banner-section position-relative">
                <div class="banner-img">
                    <img src="{{ $whatsappStore->cover_url }}" class="w-100 h-100 object-fit-cover" alt="banner" />
                </div>
            </div>
            <div class="category-section px-50 pt-30 position-relative">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-30">
                    <div class="section-heading mb-0">
                        <h2 class="position-relative mb-0">
                            {{ __('messages.whatsapp_stores_templates.choos_your_category') }}</h2>
                    </div>

                </div>
                @if ($whatsappStore->categories->count() > 0)
                    <div class="category-slider">
                        @foreach ($whatsappStore->categories as $category)
                            <a href="{{ route('whatsapp.store.products', ['alias' => $whatsappStore->url_alias, 'category' => $category->id]) }}"
                                style="color: #212529">
                                <div>
                                    <div class="category-box mx-auto">
                                        <div class="category-img h-100 w-100 mb-20 mx-auto">
                                            <img src="{{ $category->image_url ?? '' }}" alt="images"
                                                class="h-100 w-100 object-fit-cover" />
                                        </div>
                                        <p class="fs-20 fw-5 text-center lh-sm mb-0 text-black">{{ $category->name }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
                @if ($whatsappStore->categories->count() == 0)
                    <div class="d-flex justify-content-center mb-5 mt-3">
                        <h3 class="fs-20 fw-6 mb-0">
                            {{ __('messages.whatsapp_stores_templates.category_not_found') }}</h3>
                    </div>
                @endif
            </div>
            <div class="product-section px-50 pt-30 position-relative">
                <div class="section-heading">
                    <h2 class="mb-0">{{ __('messages.whatsapp_stores_templates.choose_your_product') }}</h2>
                </div>
                <div class="mb-50 product-list-section">

                    <div class="row row-gap-4 ">

                        @foreach ($whatsappStore->products()->latest()->take(8)->get() as $product)
                            <div class="col-xl-3 col-lg-4 col-sm-6 product-box-section bg-white">
                                <div class="h-100 flex-column justify-content-between d-flex">
                                    <a href="{{ route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}"
                                        class="d-flex text-black flex-column justify-content-between product-card">
                                        <div class="product-img w-100 h-100 mb-10 mx-auto">
                                            <img src="{{ $product->images_url[0] ?? '' }}" alt="product"
                                                class="w-100 h-100 object-fit-cover product-image" />
                                        </div>
                                        <div class="product-details h-100">
                                            <div class="d-flex flex-column h-100">
                                                <div>
                                                    <div class="d-flex gap-2  mb-10 ">
                                                        <h5 class="fs-20 fw-6 mb-0 w-75 product-name">
                                                            {{ $product->name }}</h5>

                                                    </div>
                                                    <p class="fs-14 fw-5 mb-2 text-gray-200 lh-sm product-category">
                                                        {{ $product->category->name }}</p>
                                                    <p class="fs-18 fw-7 lh-sm mb-10">
                                                        <span class="currency_icon">
                                                            {{ $product->currency->currency_icon }}</span>
                                                        <span
                                                            class="selling_price">{{ $product->selling_price }}</span>
                                                        @if ($product->net_price)
                                                            <del class="fs-14 fw-7 text-gray-200">{{ $product->currency->currency_icon }}
                                                                {{ $product->net_price }}</del>
                                                        @endif
                                                    </p>
                                                    <input type="hidden" value="{{ $product->available_stock }}"
                                                        class="available-stock">
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                    <div class="d-flex justify-content-center">
                                        <button
                                            class="@if ($product->available_stock == 0) disabled @endif btn btn-primary d-flex gap-2 align-items-center fs-14 fw-6 addToCartBtn addToCartButton add-to-cart-min-w-142px"
                                            data-id="{{ $product->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                viewBox="0 0 31 30" fill="none">
                                                <path
                                                    d="M10.8571 8.64281C10.8571 6.07855 12.9356 4 15.4999 4C18.0641 4 20.1427 6.07855 20.1427 8.64281C20.1427 8.83225 20.0674 9.01393 19.9335 9.14788C19.7995 9.28184 19.6178 9.35709 19.4284 9.35709C19.239 9.35709 19.0573 9.28184 18.9233 9.14788C18.7894 9.01393 18.7141 8.83225 18.7141 8.64281C18.7141 7.79034 18.3755 6.97278 17.7727 6.36999C17.1699 5.7672 16.3523 5.42856 15.4999 5.42856C14.6474 5.42856 13.8298 5.7672 13.227 6.36999C12.6243 6.97278 12.2856 7.79034 12.2856 8.64281C12.2856 8.83225 12.2104 9.01393 12.0764 9.14788C11.9425 9.28184 11.7608 9.35709 11.5713 9.35709C11.3819 9.35709 11.2002 9.28184 11.0663 9.14788C10.9323 9.01393 10.8571 8.83225 10.8571 8.64281ZM16.2141 15.0713C16.2141 14.8819 16.1389 14.7002 16.0049 14.5662C15.871 14.4323 15.6893 14.357 15.4999 14.357C15.3104 14.357 15.1287 14.4323 14.9948 14.5662C14.8608 14.7002 14.7856 14.8819 14.7856 15.0713V17.2142H12.6428C12.4533 17.2142 12.2716 17.2894 12.1377 17.4234C12.0037 17.5573 11.9285 17.739 11.9285 17.9284C11.9285 18.1179 12.0037 18.2996 12.1377 18.4335C12.2716 18.5675 12.4533 18.6427 12.6428 18.6427H14.7856V20.7855C14.7856 20.975 14.8608 21.1567 14.9948 21.2906C15.1287 21.4246 15.3104 21.4998 15.4999 21.4998C15.6893 21.4998 15.871 21.4246 16.0049 21.2906C16.1389 21.1567 16.2141 20.975 16.2141 20.7855V18.6427H18.357C18.5464 18.6427 18.7281 18.5675 18.8621 18.4335C18.996 18.2996 19.0713 18.1179 19.0713 17.9284C19.0713 17.739 18.996 17.5573 18.8621 17.4234C18.7281 17.2894 18.5464 17.2142 18.357 17.2142H16.2141V15.0713Z"
                                                    fill="currentColor" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.00281 12.6614C7.10921 11.9891 7.45206 11.3768 7.96967 10.9348C8.48728 10.4927 9.14566 10.2499 9.82635 10.25H21.173C21.8538 10.2498 22.5122 10.4926 23.0299 10.9346C23.5476 11.3767 23.8905 11.989 23.9969 12.6614L25.4644 21.947C25.7383 23.682 24.3962 25.2499 22.6405 25.2499H8.35922C6.60352 25.2499 5.2614 23.682 5.53568 21.947L7.00281 12.6614ZM9.82635 11.6786C9.48591 11.6784 9.15661 11.7998 8.89768 12.0208C8.63875 12.2419 8.46719 12.548 8.41386 12.8843L6.94638 22.1699C6.91421 22.3739 6.92667 22.5825 6.9829 22.7813C7.03913 22.9801 7.1378 23.1643 7.27209 23.3213C7.40638 23.4783 7.57312 23.6043 7.7608 23.6906C7.94848 23.7769 8.15264 23.8215 8.35922 23.8213H22.6405C22.8471 23.8214 23.0512 23.7768 23.2389 23.6905C23.4265 23.6041 23.5932 23.4781 23.7275 23.3212C23.8618 23.1642 23.9604 22.98 24.0167 22.7813C24.0729 22.5825 24.0855 22.3739 24.0534 22.1699L22.5859 12.8843C22.5325 12.548 22.3609 12.2417 22.1019 12.0207C21.8429 11.7997 21.5135 11.6784 21.173 11.6786H9.82635Z"
                                                    fill="currentColor" />
                                            </svg>
                                            {{ __('messages.whatsapp_stores_templates.add_to_cart') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($whatsappStore->products->count() == 0)
                            <div class="text-center mb-5 mt-3">
                                <h3 class="fs-20 fw-6 mb-0 text-break">
                                    {{ __('messages.whatsapp_stores_templates.product_not_found') }}</h3>
                            </div>
                        @endif
                    </div>

                </div>


                @if ($whatsappStore->products->count() > 0)
                    <div class="text-center">
                        <a href="{{ route('whatsapp.store.products', $whatsappStore->url_alias) }}"
                            class="btn view-more-btn d-flex align-items-center justify-content-center mx-auto gap-20 fs-16 fw-medium">
                            <span class="text">{{ __('messages.whatsapp_stores_templates.view_more') }}</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 25 25" fill="none">
                                    <g clip-path="url(#clip0_410_200)">
                                        <path
                                            d="M0.976545 11.5234H21.6581L18.2321 8.11406C17.8498 7.73359 17.8484 7.11528 18.2288 6.733C18.6093 6.35068 19.2277 6.34926 19.6099 6.72968L24.7127 11.8078L24.7136 11.8087C25.0949 12.1892 25.0961 12.8095 24.7137 13.1913L24.7128 13.1922L19.61 18.2703C19.2278 18.6507 18.6095 18.6494 18.2289 18.267C17.8485 17.8847 17.8499 17.2664 18.2322 16.8859L21.6581 13.4766H0.976545C0.437189 13.4766 -1.71661e-05 13.0394 -1.71661e-05 12.5C-1.71661e-05 11.9606 0.437189 11.5234 0.976545 11.5234Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clippath id="clip0_410_200">
                                            <rect width="25" height="25" fill="currentColor"
                                                transform="matrix(-1 0 0 1 25 0)" />
                                        </clippath>
                                    </defs>
                                </svg>
                            </span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
        <div>
            @if (isset($enable_pwa) && $enable_pwa == 1 && !isiOSDevice())
                <div class="mt-0">
                    <div class="pwa-support d-flex align-items-center justify-content-center">
                        <div>
                            <h1 class="text-start pwa-heading">{{ __('messages.pwa.add_to_home_screen') }}</h1>
                            <p class="text-start pwa-text text-dark fs-16 fw-5">
                                {{ __('messages.pwa.pwa_description') }} </p>
                            <div class="text-end d-flex">
                                <button id="installPwaBtn"
                                    class="pwa-install-button w-50 mb-1 btn">{{ __('messages.pwa.install') }}
                                </button>
                                <button
                                    class= "pwa-cancel-button w-50  pwa-close btn btn-secondary mb-1 {{ getLocalLanguage() == 'ar' ? 'me-2' : 'ms-2' }}">{{ __('messages.common.cancel') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @include('whatsapp_stores.templates.cloth_store.cart_modal')

            @include('whatsapp_stores.templates.order_modal')
            <footer>
                <div class="text-center fw-5 fs-16 fw-medium text-white">
                    <div class="mb-2">
                        <i class="fas fa-map-marker-alt"></i> {{ $whatsappStore->address }}
                    </div>
                    <div>
                        © Copyright {{ now()->year }} {{ env('APP_NAME') }}. All Rights Reserved.
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

<script>
    let vcardAlias = "{{ $whatsappStore->url_alias }}";
    let languageChange = "{{ url('language') }}";
    let lang = "{{ getLocalLanguage() ?? 'en' }}";
    let isRtl = "{{ getLocalLanguage() == 'ar' ? 'true' : 'false' }}" === "true";
</script>
<script src="{{ asset('messages.js?$mixID') }}"></script>
<script src="{{ asset('assets/js/intl-tel-input/build/intlTelInput.js') }}"></script>
<script src="{{ asset('assets/js/vcard11/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/front-third-party-vcard11.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
<script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ mix('assets/js/whatsapp_store_template.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".category-slider").slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            // autoplay: true,
            rtl: isRtl,
            arrows: true,
            prevArrow: '<button class="slide-arrow category-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none"><path d="M2.61048 5.99881L2.52357 5.91829L2.61048 6.01208L6.74799 10.4776C6.74801 10.4776 6.74802 10.4777 6.74804 10.4777C6.89859 10.6459 6.98199 10.8714 6.98011 11.1056C6.97822 11.3398 6.89118 11.5637 6.73792 11.7291C6.58468 11.8945 6.37755 11.9882 6.16119 11.9902C5.94487 11.9922 5.7363 11.9025 5.58044 11.7401C5.58042 11.74 5.58039 11.74 5.58037 11.74L0.851898 6.63663C0.696935 6.46933 0.609765 6.24231 0.609765 6.00545C0.609765 5.76859 0.696935 5.54156 0.851899 5.37426L5.58049 0.270777C5.73548 0.103552 5.94549 0.00976553 6.1643 0.00976555C6.3831 0.00976557 6.59311 0.103552 6.7481 0.270777L6.7481 0.270775C6.90306 0.438075 6.99023 0.665102 6.99023 0.901961C6.99023 1.13882 6.90306 1.36585 6.7481 1.53315L2.61048 5.99881Z" stroke="#141414" stroke-width="0.0195312"/></svg></button>',
            nextArrow: '<button class="slide-arrow category-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none"><path d="M4.38952 6.00119L4.47643 6.08171L4.38952 5.98792L0.252014 1.52238C0.251996 1.52236 0.251977 1.52234 0.251959 1.52232C0.101415 1.35406 0.0180061 1.12857 0.0198916 0.894392C0.0217773 0.660185 0.108825 0.43628 0.262083 0.270871C0.415319 0.105486 0.622448 0.0118285 0.838806 0.0098001C1.05513 0.00776977 1.2637 0.097502 1.41956 0.259938C1.41958 0.25996 1.41961 0.259983 1.41963 0.260006L6.1481 5.36337C6.30307 5.53067 6.39024 5.75769 6.39024 5.99455C6.39024 6.23141 6.30307 6.45844 6.1481 6.62574L1.41951 11.7292C1.26452 11.8964 1.05451 11.9902 0.835705 11.9902C0.616899 11.9902 0.406885 11.8964 0.251898 11.7292L0.2519 11.7292C0.0969359 11.5619 0.00976574 11.3349 0.00976578 11.098C0.00976582 10.8612 0.096936 10.6342 0.2519 10.4669L4.38952 6.00119Z" stroke="#2650D7" stroke-width="0.0195312"/></svg></button>',
            responsive: [
                {
                breakpoint: 991,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    arrows:false,
                    slidesToShow: 3,
                    dots: true,
                },
            },
            {
                breakpoint: 460,
                settings: {
                    slidesToShow: 2,
                    dots: true,
                    arrows:false,
                },
            }, {
                breakpoint: 360,
                settings: {
                    slidesToShow: 1,
                    dots: true,
                    arrows:false,
                },
            }, ],
        });
    });
</script>
<script>
    document.querySelectorAll(".dropdown-item").forEach((item) => {
        item.addEventListener("click", function() {
            const selectedLang = item.getAttribute("data-lang");
            const selectedFlag = item.querySelector("img").src;
            const selectedText = item.textContent.trim();
            document.getElementById(
                "dropdownMenuButton"
            ).innerHTML = `<img src="${selectedFlag}" class="flag" alt="flag"> ${selectedText}`;
        });
    });
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
</html>
