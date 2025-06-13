<!DOCTYPE html>
<html lang="en" >

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
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/beauty-products.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/custom.css') }}" />
</head>

<body>
    <div class="main-content mx-auto w-100 overflow-hidden d-flex flex-column justify-content-between"
        @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif>
        <div class="bg-vector bg-vector-1">
            <img src="{{ asset('assets/img/whatsapp_stores/beauty_products/bg-vector-1.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-2">
            <img src="{{ asset('assets/img/whatsapp_stores/beauty_products/bg-vector-6.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-3">
            <img src="{{ asset('assets/img/whatsapp_stores/beauty_products/bg-vector-3.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-4">
            <img src="{{ asset('assets/img/whatsapp_stores/beauty_products/bg-vector-2.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-5">
            <img src="{{ asset('assets/img/whatsapp_stores/beauty_products/bg-vector-4.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-6">
            <img src="{{ asset('assets/img/whatsapp_stores/beauty_products/bg-vector-5.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div>
            <nav class="navbar navbar-expand-lg px-50 position-relative">
                <div class="container-fluid p-0">
                    <div class="d-flex align-items-center gap-3">
                        <a class="navbar-brand p-0 m-0"
                            href="{{ route('whatsapp.store.show', $whatsappStore->url_alias) }}">
                            <img src="{{ $whatsappStore->logo_url }}" alt="logo"
                                class="w-100 h-100 object-fit-cover" loading="lazy" />
                        </a>
                        <span class="fw-6 fs-18"><a
                                href="{{ route('whatsapp.store.show', $whatsappStore->url_alias) }}"
                                style="color: #212529 ">{{ $whatsappStore->store_name }}</a></span>
                    </div>

                    <div class="d-flex align-items-center gap-lg-4 gap-sm-3 gap-2">
                        <div class="language-dropdown position-relative">
                            <button class="dropdown-btn position-relative" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                @if (array_key_exists(getLocalLanguage() ?? 'en', \App\Models\User::FLAG))
                                    <img class="flag" alt="flag"
                                        src="{{ asset(\App\Models\User::FLAG[getLocalLanguage() ?? 'en']) }}"
                                        loading="lazy" />
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
                                                    src="{{ asset(\App\Models\User::FLAG[$language->iso_code]) }}"
                                                    loading="lazy" />
                                            @else
                                                @if (count($language->media) != 0)
                                                    <img src="{{ $language->image_url }}" class="me-1"
                                                        loading="lazy" />
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
                            <span
                                class="position-absolute  start-100 translate-middle badge rounded-pill bg-danger product-count-badge"
                                style="font-size: 12px; padding: 3px 6px;top: 7px;">
                            </span>
                        </button>

                    </div>
                </div>
            </nav>
            <div class="banner-section position-relative">
                <div class="banner-img">
                    <img src="{{ $whatsappStore->cover_url }}" class="w-100 h-100 object-fit-cover" alt="banner"
                        loading="lazy" />
                </div>
            </div>
            <div class="category-section px-50 pt-30 mb-2 pb-1 position-relative">
                <div class="section-heading">
                    <h2>{{ __('messages.whatsapp_stores_templates.choos_your_category') }}</h2>
                </div>
                <div class="row">
                    @foreach ($whatsappStore->categories as $category)
                        <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                            <a href="{{ route('whatsapp.store.products', ['alias' => $whatsappStore->url_alias, 'category' => $category->id]) }}"
                                style="color: #212529">
                                <div class="category-item">
                                    <div class="category-img">
                                        <img src="{{ $category->image_url }}" alt="category"
                                            class="w-100 h-100 object-fit-cover rounded" loading="lazy" />
                                    </div>
                                    <h3 class="fs-18 fw-6 mb-0 text-break">{{ $category->name }}</h3>
                                </div>
                            </a>

                        </div>
                    @endforeach
                    @if ($whatsappStore->categories->count() == 0)
                        <div class="text-center mb-5 mt-3">
                            <h3 class="fs-20 fw-6 mb-0">
                                {{ __('messages.whatsapp_stores_templates.category_not_found') }}</h3>
                        </div>
                    @endif
                </div>
            </div>
            <div class="product-section px-50 position-relative">
                <div class="section-heading">
                    <h2>{{ __('messages.whatsapp_stores_templates.choose_your_product') }}</h2>
                </div>
                <div class="row mb-40">
                    @foreach ($whatsappStore->products()->latest()->take(8)->get() as $product)
                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                            <div class="product-card h-100 d-flex flex-column ">
                                <a href="{{ route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}"
                                    class="d-block">
                                    <div class="product-img">
                                        <img src="{{ $product->images_url[0] ?? '' }}" alt="product"
                                            class="w-100 h-100 object-fit-cover product-image" loading="lazy" />
                                    </div>
                                </a>
                                <div class="product-details" style="flex-grow: 1;">
                                    <div class="d-flex flex-column h-100 justify-content-between">
                                        <a href="{{ route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}"
                                            class="d-block text-dark">
                                            <div>
                                                <h5 class="fs-20 fw-6 mb-1 product-name">{{ $product->name }}</h5>
                                                <p class="fs-16 fw-5 mb-1 product-category">
                                                    {{ $product->category->name }}
                                                </p>

                                                <p class="fs-18 fw-7">
                                                    <span class="currency_icon">
                                                        {{ $product->currency->currency_icon }}</span>
                                                    <span class="selling_price">{{ $product->selling_price }}</span>
                                                    @if ($product->net_price)
                                                        <del class="fs-14 fw-7 text-gray-200">{{ $product->currency->currency_icon }}
                                                            {{ $product->net_price }}</del>
                                                    @endif
                                                </p>
                                                <input type="hidden" value="{{ $product->available_stock }}"
                                               class="available-stock">
                                            </div>
                                        </a>

                                        <button data-id="{{ $product->id }}"
                                            class="@if($product->available_stock == 0) disabled @endif btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 addToCartBtn ">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                    viewBox="0 0 24 25" fill="none">
                                                    <path
                                                        d="M8.28564 7.41444C8.28564 5.36304 9.94849 3.7002 11.9999 3.7002C14.0513 3.7002 15.7141 5.36304 15.7141 7.41444C15.7141 7.56599 15.6539 7.71134 15.5468 7.8185C15.4396 7.92566 15.2943 7.98587 15.1427 7.98587C14.9912 7.98587 14.8458 7.92566 14.7387 7.8185C14.6315 7.71134 14.5713 7.56599 14.5713 7.41444C14.5713 6.73247 14.3004 6.07842 13.8181 5.59619C13.3359 5.11396 12.6819 4.84304 11.9999 4.84304C11.3179 4.84304 10.6639 5.11396 10.1816 5.59619C9.69941 6.07842 9.42849 6.73247 9.42849 7.41444C9.42849 7.56599 9.36829 7.71134 9.26112 7.8185C9.15396 7.92566 9.00862 7.98587 8.85707 7.98587C8.70552 7.98587 8.56017 7.92566 8.45301 7.8185C8.34585 7.71134 8.28564 7.56599 8.28564 7.41444ZM12.5713 12.5572C12.5713 12.4057 12.5111 12.2604 12.404 12.1532C12.2968 12.046 12.1514 11.9858 11.9999 11.9858C11.8483 11.9858 11.703 12.046 11.5958 12.1532C11.4887 12.2604 11.4285 12.4057 11.4285 12.5572V14.2715H9.7142C9.56265 14.2715 9.41731 14.3317 9.31014 14.4389C9.20298 14.546 9.14278 14.6914 9.14278 14.8429C9.14278 14.9945 9.20298 15.1398 9.31014 15.247C9.41731 15.3542 9.56265 15.4144 9.7142 15.4144H11.4285V17.1286C11.4285 17.2802 11.4887 17.4255 11.5958 17.5327C11.703 17.6399 11.8483 17.7001 11.9999 17.7001C12.1514 17.7001 12.2968 17.6399 12.404 17.5327C12.5111 17.4255 12.5713 17.2802 12.5713 17.1286V15.4144H14.2856C14.4371 15.4144 14.5825 15.3542 14.6896 15.247C14.7968 15.1398 14.857 14.9945 14.857 14.8429C14.857 14.6914 14.7968 14.546 14.6896 14.4389C14.5825 14.3317 14.4371 14.2715 14.2856 14.2715H12.5713V12.5572Z"
                                                        fill="currentColor" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.20225 10.7719C5.28737 10.234 5.56165 9.74422 5.97574 9.39058C6.38982 9.03693 6.91653 8.84268 7.46108 8.84277H16.5384C17.083 8.84261 17.6098 9.03683 18.0239 9.39049C18.4381 9.74414 18.7124 10.234 18.7975 10.7719L19.9715 18.2004C20.1907 19.5884 19.117 20.8427 17.7124 20.8427H6.28738C4.88282 20.8427 3.80912 19.5884 4.02854 18.2004L5.20225 10.7719ZM7.46108 9.98562C7.18873 9.98552 6.92529 10.0826 6.71814 10.2594C6.511 10.4363 6.37375 10.6812 6.33109 10.9502L5.1571 18.3787C5.13137 18.5419 5.14134 18.7088 5.18632 18.8678C5.23131 19.0269 5.31024 19.1742 5.41767 19.2998C5.52511 19.4254 5.65849 19.5262 5.80864 19.5952C5.95878 19.6643 6.12211 19.7 6.28738 19.6998H17.7124C17.8777 19.6999 18.041 19.6642 18.1911 19.5951C18.3412 19.5261 18.4746 19.4253 18.582 19.2997C18.6894 19.1741 18.7684 19.0268 18.8134 18.8678C18.8584 18.7088 18.8684 18.5419 18.8427 18.3787L17.6687 10.9502C17.626 10.6811 17.4887 10.4362 17.2815 10.2593C17.0743 10.0825 16.8108 9.98546 16.5384 9.98562H7.46108Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            {{ __('messages.whatsapp_stores_templates.add_to_cart') }}
                                            <div class="cart">
                                                <svg viewBox="0 0 36 26">
                                                    <polyline points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5">
                                                    </polyline>
                                                    <polyline points="15 13.5 17 15.5 22 10.5"></polyline>
                                                </svg>
                                            </div>
                                        </button>
                                    </div>
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
                @if ($whatsappStore->products->count() > 0)
                    <div class="text-center">
                        <a href="{{ route('whatsapp.store.products', $whatsappStore->url_alias) }}"
                            class="btn view-more-btn d-flex align-items-center justify-content-center mx-auto gap-1">
                            <span class="text">{{ __('messages.whatsapp_stores_templates.view_more') }}</span>
                            <span class="ps-2 pe-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 30 30" fill="none">
                                    <path
                                        d="M29.3079 15.6116H0.692533C0.352148 15.6116 0.0771484 15.3366 0.0771484 14.9962C0.0771484 14.6558 0.352148 14.3808 0.692533 14.3808H27.8214L24.0868 10.6462C23.8464 10.4058 23.8464 10.0154 24.0868 9.77502C24.3271 9.53463 24.7175 9.53463 24.9579 9.77502L29.7445 14.5616C29.9214 14.7385 29.9733 15.0019 29.8771 15.2327C29.781 15.4616 29.556 15.6116 29.3079 15.6116Z"
                                        fill="currentColor" />
                                    <path
                                        d="M24.5153 20.4039C24.3576 20.4039 24.1999 20.3443 24.0807 20.2231C23.8403 19.9828 23.8403 19.5924 24.0807 19.352L28.873 14.5597C29.1134 14.3193 29.5038 14.3193 29.7441 14.5597C29.9845 14.8001 29.9845 15.1905 29.7441 15.4308L24.9518 20.2231C24.8307 20.3443 24.673 20.4039 24.5153 20.4039Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
        {{-- Pwa support --}}
        @if (isset($enable_pwa) && $enable_pwa == 1 && !isiOSDevice())
            <div class="mt-0">
                <div class="pwa-support d-flex align-items-center justify-content-center">
                    <div>
                        <h1 class="text-start pwa-heading">{{ __('messages.pwa.add_to_home_screen') }}</h1>
                        <p class="text-start pwa-text text-dark fs-16 fw-5">{{ __('messages.pwa.pwa_description') }} </p>
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
        @include('whatsapp_stores.templates.order_modal')
        @include('whatsapp_stores.templates.cart_modal')
        <footer class="position-relative">
            <div class="text-center fw-5 fs-16">
                <div class="mb-2">
                    <i class="fas fa-map-marker-alt"></i> {{ $whatsappStore->address }}
                </div>
                <div>
                    © Copyright {{ now()->year }} {{ env('APP_NAME') }}. All Rights Reserved.
                </div>
            </div>

        </footer>
    </div>
</body>
<script>
    let vcardAlias = "{{ $whatsappStore->url_alias }}";
    let languageChange = "{{ url('language') }}";
    let lang = "{{ getLocalLanguage() ?? 'en' }}";
</script>
<script src="{{ asset('messages.js?$mixID') }}"></script>
<script src="{{ asset('assets/js/intl-tel-input/build/intlTelInput.js') }}"></script>
<script src="{{ asset('assets/js/vcard11/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/front-third-party-vcard11.js') }}"></script>
<script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/whatsapp_store_template.js') }}"></script>
<script>
    document.querySelectorAll(".dropdown-item").forEach((item) => {
        item.addEventListener("click", function() {
            const selectedLang = item.getAttribute("data-lang");
            const selectedFlag = item.querySelector("img").src;
            const selectedText = item.textContent.trim();
            document.getElementById(
                    "dropdownMenuButton"
                ).innerHTML =
                `<img src="${selectedFlag}" class="flag" alt="flag"  loading="lazy"> ${selectedText}`;
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
