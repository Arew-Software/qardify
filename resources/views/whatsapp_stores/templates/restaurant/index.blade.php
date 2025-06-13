<!DOCTYPE html>
<html lang="en" dir="{{ getLocalLanguage() == 'ar' ? 'rtl' : 'ltr' }}">

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
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/restaurant.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/custom.css') }}" />
</head>

<body>
    <div class="main-content mx-auto w-100 d-flex flex-column justify-content-between position-relative">
        <div>
            <div class="position-relative top-0 header w-100 px-50 z-3">
                <nav class="navbar  navbar-expand-lg w-100" id="header">
                    <div class="container-fluid p-0">
                        <div class="d-flex align-items-center gap-2 gap-sm-3">
                            <a class="navbar-brand p-0 m-0"
                                href="{{ route('whatsapp.store.show', $whatsappStore->url_alias) }}">
                                <img src="{{ $whatsappStore->logo_url }}" alt="logo"
                                    class="w-100 h-100 object-fit-cover" />
                            </a>
                            <span class="fw-semibold fs-18 text-white"><a
                                    href="{{ route('whatsapp.store.show', $whatsappStore->url_alias) }}"
                                    style="color: #FFFFFF ">{{ $whatsappStore->store_name }}</a></span>
                        </div>

                        <div class="d-flex align-items-center gap-lg-4 gap-sm-3 gap-2">
                            <div class="language-dropdown position-relative">
                                <button class="dropdown-btn position-relative text-white" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    @if (array_key_exists(getLocalLanguage() ?? 'en', \App\Models\User::FLAG))
                                        <img class="flag" alt="flag"
                                            src="{{ asset(\App\Models\User::FLAG[getLocalLanguage() ?? 'en']) }}"
                                            loading="lazy" />
                                    @endif
                                    {{ strtoupper(getLocalLanguage() ?? 'EN') }}
                                </button>
                                <svg class="dropdown-arrow" xmlns="http://www.w3.org/2000/svg" width="14"
                                    height="8" viewBox="0 0 18 10" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.615983 0.366227C0.381644 0.600637 0.25 0.918522 0.25 1.24998C0.25 1.58143 0.381644 1.89932 0.615983 2.13373L8.11598 9.63373C8.35039 9.86807 8.66828 9.99971 8.99973 9.99971C9.33119 9.99971 9.64907 9.86807 9.88348 9.63373L17.3835 2.13373C17.6112 1.89797 17.7372 1.58222 17.7343 1.25448C17.7315 0.92673 17.6 0.613214 17.3683 0.381454C17.1365 0.149694 16.823 0.0182329 16.4952 0.0153849C16.1675 0.0125369 15.8517 0.13853 15.616 0.366227L8.99973 6.98248L2.38348 0.366227C2.14907 0.131889 1.83119 0.000244141 1.49973 0.000244141C1.16828 0.000244141 0.850393 0.131889 0.615983 0.366227Z"
                                        fill="white" />
                                </svg>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach (getAllLanguageWithFullData() as $language)
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0)" id="languageName"
                                                data-name="{{ $language->iso_code }}">

                                                @if (array_key_exists($language->iso_code, \App\Models\User::FLAG))
                                                    <img class="flag" alt="flag"
                                                        src="{{ asset(\App\Models\User::FLAG[$language->iso_code]) }} "
                                                        loading="lazy" />
                                                @else
                                                    @if (count($language->media) != 0)
                                                        <img src="{{ $language->image_url }}" class="me-1"
                                                            loading="lazy" />
                                                    @else
                                                        <i class="fa fa-flag fa-xl me-3 text-danger"
                                                            aria-hidden="true"></i>
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
                                <div
                                    class="position-absolute cart-count d-flex align-items-center justify-content-center product-count-badge">
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40"
                                    viewBox="0 0 41 40" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M27.1301 11.6667C27.1301 11.9982 26.9984 12.3161 26.764 12.5505C26.5296 12.785 26.2116 12.9167 25.8801 12.9167C25.5486 12.9167 25.2306 12.785 24.9962 12.5505C24.7618 12.3161 24.6301 11.9982 24.6301 11.6667V9.16666C24.6301 7.95109 24.1472 6.7853 23.2877 5.92576C22.4281 5.06621 21.2623 4.58333 20.0468 4.58333C18.8312 4.58333 17.6654 5.06621 16.8059 5.92576C15.9463 6.7853 15.4634 7.95109 15.4634 9.16666V11.6667C15.4634 11.9982 15.3317 12.3161 15.0973 12.5505C14.8629 12.785 14.545 12.9167 14.2134 12.9167C13.8819 12.9167 13.564 12.785 13.3296 12.5505C13.0951 12.3161 12.9634 11.9982 12.9634 11.6667V9.16666C12.9634 7.28804 13.7097 5.48637 15.0381 4.15799C16.3665 2.82961 18.1682 2.08333 20.0468 2.08333C21.9254 2.08333 23.7271 2.82961 25.0554 4.15799C26.3838 5.48637 27.1301 7.28804 27.1301 9.16666V11.6667Z"
                                        fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M32.2835 13.9167L33.6168 33.9167C33.6503 34.4289 33.5784 34.9425 33.4056 35.4258C33.2328 35.9092 32.9627 36.352 32.6121 36.7268C32.2614 37.1017 31.8376 37.4007 31.3669 37.6053C30.8961 37.81 30.3884 37.9159 29.8751 37.9167H10.2185C9.70502 37.9164 9.19708 37.8108 8.72611 37.6063C8.25514 37.4018 7.83116 37.1028 7.48041 36.7279C7.12966 36.3529 6.85961 35.9099 6.68698 35.4264C6.51435 34.9428 6.44281 34.429 6.4768 33.9167L7.81013 13.9167C7.87355 12.9675 8.29533 12.0779 8.99005 11.428C9.68477 10.7782 10.6005 10.4167 11.5518 10.4167H28.5418C29.4931 10.4167 30.4088 10.7782 31.1035 11.428C31.7983 12.0779 32.22 12.9675 32.2835 13.9167ZM24.1901 17.7967C23.8175 18.5799 23.2305 19.2415 22.4971 19.7047C21.7638 20.1679 20.9142 20.4138 20.0468 20.4138C19.1794 20.4138 18.3298 20.1679 17.5965 19.7047C16.8631 19.2415 16.2761 18.5799 15.9035 17.7967C15.833 17.6484 15.734 17.5154 15.6121 17.4054C15.4903 17.2954 15.3479 17.2104 15.1933 17.1554C15.0386 17.1004 14.8746 17.0764 14.7106 17.0847C14.5466 17.0931 14.3859 17.1337 14.2376 17.2042C14.0893 17.2746 13.9564 17.3736 13.8464 17.4955C13.7363 17.6173 13.6514 17.7597 13.5964 17.9144C13.5414 18.069 13.5173 18.2331 13.5257 18.397C13.5341 18.561 13.5747 18.7217 13.6451 18.87C14.2192 20.0821 15.1255 21.1063 16.2588 21.8235C17.3921 22.5407 18.7056 22.9214 20.0468 22.9214C21.3879 22.9214 22.7015 22.5407 23.8348 21.8235C24.9681 21.1063 25.8744 20.0821 26.4485 18.87C26.5189 18.7217 26.5595 18.561 26.5679 18.397C26.5762 18.2331 26.5522 18.069 26.4972 17.9144C26.4422 17.7597 26.3573 17.6173 26.2472 17.4955C26.1372 17.3736 26.0042 17.2746 25.856 17.2042C25.7077 17.1337 25.547 17.0931 25.383 17.0847C25.219 17.0764 25.055 17.1004 24.9003 17.1554C24.7456 17.2104 24.6033 17.2954 24.4815 17.4054C24.3596 17.5154 24.2606 17.6484 24.1901 17.7967Z"
                                        fill="white" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="hero-img position-relative">
                <div class="position-absolute vector-1 vector">
                    <img src="{{ asset('assets/img/whatsapp_stores/restaurant/hero-vector-1.png') }}" loading="lazy"
                        alt="images" />
                </div>
                <img src="{{ $whatsappStore->cover_url }}" alt="banner-img"
                    class="h-100 w-100 object-fit-cover hero-img-vector" loading="lazy" />

            </div>
            <div class="category-section px-50 pt-40px pb-40px position-relative">
                <div class="text-center">
                    <h2
                        class="text-center text-white fs-28 fw-semibold mb-40 section-heading position-relative d-inline-block">
                        {{ __('messages.whatsapp_stores_templates.choos_your_category') }}</h2>
                </div>
                <div class="category-slider">
                    @foreach ($whatsappStore->categories as $category)
                        <a href="{{ route('whatsapp.store.products', ['alias' => $whatsappStore->url_alias, 'category' => $category->id]) }}"
                            style="color: #FFFFFF">
                            <div>
                                <div class="category-box">
                                    <div class="category-img mx-auto">
                                        <img src="{{ $category->image_url }}" alt="category-img"
                                            class="h-100 w-100 object-fit-cover rounded" loading="lazy" />
                                    </div>
                                    <p class="fw-medium fs-16 text-white text-center">{{ $category->name }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
                @if ($whatsappStore->categories->count() == 0)
                    <div class="text-center mb-5 mt-3">
                        <h3 class="fs-20 fw-6 mb-0 text-white">
                            {{ __('messages.whatsapp_stores_templates.category_not_found') }}</h3>
                    </div>
                @endif
            </div>
            <div class="product-section px-50 position-relative">
                <div class="position-absolute vector-2 vector text-end">
                    <img src="{{ asset('assets/img/whatsapp_stores/restaurant/vector-2.png') }}" alt="images" />
                </div>
                <div class="text-center">
                    <h2
                        class="text-center text-white fs-28 fw-semibold mb-40 section-heading position-relative d-inline-block">
                        {{ __('messages.whatsapp_stores_templates.choose_your_item') }}</h2>
                </div>
                <div class="row row-gap-30px">
                    @foreach ($whatsappStore->products()->latest()->take(8)->get() as $product)
                        <div class="col-lg-3 col-sm-6">
                            <div class="product-card d-flex justify-content-between flex-column h-100">
                                <a class="d-flex justify-content-between flex-column"
                                    href="{{ route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}">
                                    <div>
                                        <div class="product-img">
                                            <img src="{{ $product->images_url[0] ?? '' }}" alt="product-img"
                                                class="h-100 w-100 ovject-fit-cover  product-image" />
                                        </div>
                                        <div class="product-details">
                                            <input type="hidden" value="{{ $product->category->name }}"
                                                class="product-category">
                                            <p class="fs-18 fw-normal text-white text-center mb-0 product-name">
                                                {{ $product->name }}</p>
                                            <p class="text-primary fs-20 fw-semibold text-center mb-4 "> <span
                                                    class="currency_icon">
                                                    {{ $product->currency->currency_icon }}</span>
                                                <span class="selling_price">{{ $product->selling_price }}</span>
                                            </p>
                                        </div>
                                        <input type="hidden" value="{{ $product->available_stock }}"
                                        class="available-stock">
                                    </div>
                                </a>
                                <button
                                    class="@if($product->available_stock == 0) disabled @endif btn btn-primary d-flex justify-content-center align-items-center w-100 mx-auto addToCartBtn"
                                    data-id="{{ $product->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                        viewBox="0 0 28 28" class="me-1">
                                        <path
                                            d="M13.5264 20.4167C13.5262 21.5727 13.8127 22.7108 14.3605 23.7288C14.9082 24.7469 15.6999 25.6132 16.6647 26.25H4.50225C4.08859 26.2504 3.67958 26.1628 3.30243 25.9929C2.92529 25.8229 2.58865 25.5746 2.31493 25.2645C2.04121 24.9544 1.83667 24.5895 1.71494 24.1941C1.59321 23.7988 1.55706 23.3821 1.60892 22.9717L3.35892 8.97167C3.44705 8.26638 3.78969 7.61755 4.32247 7.14708C4.85524 6.6766 5.54148 6.41687 6.25225 6.41667H7.69308V9.91667C7.69308 10.0714 7.75454 10.2197 7.86394 10.3291C7.97333 10.4385 8.12171 10.5 8.27642 10.5C8.43112 10.5 8.5795 10.4385 8.68889 10.3291C8.79829 10.2197 8.85975 10.0714 8.85975 9.91667V6.41667H15.8597V9.91667C15.8597 10.0714 15.9212 10.2197 16.0306 10.3291C16.14 10.4385 16.2884 10.5 16.4431 10.5C16.5978 10.5 16.7462 10.4385 16.8556 10.3291C16.965 10.2197 17.0264 10.0714 17.0264 9.91667V6.41667H18.4672C19.178 6.41687 19.8643 6.6766 20.397 7.14708C20.9298 7.61755 21.2724 8.26638 21.3606 8.97167L21.9322 13.5567C20.9149 13.3503 19.8645 13.3723 18.8567 13.6212C17.8489 13.8702 16.909 14.3397 16.1048 14.9961C15.3006 15.6524 14.6521 16.4791 14.2062 17.4165C13.7603 18.3539 13.5281 19.3786 13.5264 20.4167ZM17.0264 6.41667H15.8597C15.8597 5.48841 15.491 4.59817 14.8346 3.94179C14.1782 3.28542 13.288 2.91667 12.3597 2.91667C11.4315 2.91667 10.5413 3.28542 9.88487 3.94179C9.2285 4.59817 8.85975 5.48841 8.85975 6.41667H7.69308C7.69308 5.17899 8.18475 3.992 9.05992 3.11683C9.93509 2.24167 11.1221 1.75 12.3597 1.75C13.5974 1.75 14.7844 2.24167 15.6596 3.11683C16.5347 3.992 17.0264 5.17899 17.0264 6.41667Z"
                                            fill="currentColor" />
                                        <path
                                            d="M20.5264 14.5834C19.3727 14.5834 18.2449 14.9255 17.2856 15.5665C16.3263 16.2074 15.5786 17.1185 15.1371 18.1844C14.6956 19.2503 14.5801 20.4232 14.8052 21.5547C15.0303 22.6863 15.5858 23.7257 16.4016 24.5415C17.2174 25.3573 18.2568 25.9129 19.3884 26.138C20.5199 26.363 21.6928 26.2475 22.7587 25.806C23.8246 25.3645 24.7357 24.6168 25.3767 23.6575C26.0176 22.6982 26.3598 21.5704 26.3598 20.4167C26.3581 18.8701 25.7429 17.3874 24.6493 16.2938C23.5557 15.2002 22.073 14.5851 20.5264 14.5834ZM22.2764 21H21.1098V22.1667C21.1098 22.3214 21.0483 22.4698 20.9389 22.5792C20.8295 22.6886 20.6811 22.75 20.5264 22.75C20.3717 22.75 20.2233 22.6886 20.1139 22.5792C20.0045 22.4698 19.9431 22.3214 19.9431 22.1667V21H18.7764C18.6217 21 18.4733 20.9386 18.3639 20.8292C18.2545 20.7198 18.1931 20.5714 18.1931 20.4167C18.1931 20.262 18.2545 20.1136 18.3639 20.0042C18.4733 19.8948 18.6217 19.8334 18.7764 19.8334H19.9431V18.6667C19.9431 18.512 20.0045 18.3636 20.1139 18.2542C20.2233 18.1448 20.3717 18.0834 20.5264 18.0834C20.6811 18.0834 20.8295 18.1448 20.9389 18.2542C21.0483 18.3636 21.1098 18.512 21.1098 18.6667V19.8334H22.2764C22.4311 19.8334 22.5795 19.8948 22.6889 20.0042C22.7983 20.1136 22.8598 20.262 22.8598 20.4167C22.8598 20.5714 22.7983 20.7198 22.6889 20.8292C22.5795 20.9386 22.4311 21 22.2764 21Z"
                                            fill="currentColor" />
                                    </svg>
                                    {{ __('messages.whatsapp_stores_templates.add_to_cart') }}
                                </button>
                            </div>
                        </div>
                    @endforeach
                    @if ($whatsappStore->products->count() == 0)
                        <div class="text-center mb-5 mt-3 text-white">
                            <h3 class="fs-20 fw-6 mb-0 text-break">
                                {{ __('messages.whatsapp_stores_templates.item_not_added') }}</h3>
                        </div>
                    @endif
                </div>
            </div>
            @if ($whatsappStore->products->count() > 0)
                <div class="view-more position-relative">
                    <div class="position-absolute vector-3 vector">
                        <img src="{{ asset('assets/img/whatsapp_stores/restaurant/vector-3.png') }}"
                            alt="images" />
                    </div>
                    <a href="{{ route('whatsapp.store.products', $whatsappStore->url_alias) }}"
                        class="d-block w-100 text-end mx-auto view-more-button fs-20 fw-semibold position-relative">
                        <div
                            class="view-arrow rounded-circle h-100 w-100 d-flex justify-content-center align-items-center position-absolute">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="22"
                                viewBox="0 0 26 22" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.7199 0.595177C13.8546 0.423237 14.0185 0.282523 14.2022 0.181083C14.3858 0.0796421 14.5857 0.0194658 14.7903 0.00399616C14.9948 -0.0114735 15.2002 0.0180676 15.3945 0.0909283C15.5888 0.163789 15.7683 0.27854 15.9227 0.428618L25.4659 9.68188C25.6336 9.84473 25.7681 10.0456 25.8602 10.2711C25.9523 10.4965 26 10.7413 26 10.9889C26 11.2365 25.9523 11.4813 25.8602 11.7067C25.7681 11.9322 25.6336 12.1331 25.4659 12.2959L15.9227 21.5492C15.7691 21.7044 15.5892 21.8239 15.3936 21.9008C15.198 21.9777 14.9905 22.0105 14.7834 21.9971C14.5762 21.9837 14.3735 21.9245 14.1872 21.823C14.0009 21.7215 13.8346 21.5796 13.6982 21.4057C13.5618 21.2318 13.4579 21.0294 13.3927 20.8104C13.3275 20.5913 13.3022 20.3599 13.3184 20.1299C13.3345 19.8998 13.3918 19.6756 13.4868 19.4705C13.5819 19.2653 13.7127 19.0833 13.8718 18.9351L20.2783 12.7239H1.56003C1.14628 12.7239 0.749484 12.5411 0.456922 12.2157C0.164359 11.8903 0 11.449 0 10.9889C0 10.5288 0.164359 10.0875 0.456922 9.76208C0.749484 9.4367 1.14628 9.25391 1.56003 9.25391H20.2762L13.8697 3.04266C13.5581 2.74014 13.3672 2.31237 13.3392 1.8534C13.3111 1.39444 13.448 0.94186 13.7199 0.595177Z"
                                    fill="currentColor" />
                            </svg>

                        </div>
                        {{ __('messages.whatsapp_stores_templates.view_more') }}
                    </a>
                </div>
            @endif
        </div>
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
        @include('whatsapp_stores.templates.restaurant.cart_modal')
        <footer class="position-relative">
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
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/front-third-party-vcard11.js') }}"></script>
<script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
<script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/js/whatsapp_store_template.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".category-slider").slick({
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            rtl: isRtl,
            autoplay: true,
            prevArrow: '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20" fill="none"><path d="M8.01843 19.124L0.253456 10.7018C0.16129 10.6016 0.0961597 10.493 0.0580645 10.376C0.0193548 10.259 0 10.1337 0 10C0 9.86631 0.0193548 9.74098 0.0580645 9.62401C0.0961597 9.50704 0.16129 9.39842 0.253456 9.29815L8.01843 0.850923C8.23349 0.616974 8.50231 0.5 8.82489 0.5C9.14747 0.5 9.42396 0.62533 9.65438 0.875989C9.88479 1.12665 10 1.41909 10 1.7533C10 2.08751 9.88479 2.37995 9.65438 2.63061L2.88018 10L9.65438 17.3694C9.86943 17.6033 9.97696 17.8914 9.97696 18.2337C9.97696 18.5766 9.86175 18.8734 9.63134 19.124C9.40092 19.3747 9.1321 19.5 8.82489 19.5C8.51767 19.5 8.24885 19.3747 8.01843 19.124Z" fill="black"/></svg></button>',
            nextArrow: '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20" fill="none"><path d="M1.98157 19.124L9.74654 10.7018C9.83871 10.6016 9.90384 10.493 9.94194 10.376C9.98065 10.259 10 10.1337 10 10C10 9.86631 9.98065 9.74098 9.94194 9.62401C9.90384 9.50704 9.83871 9.39842 9.74654 9.29815L1.98157 0.850923C1.76651 0.616974 1.49769 0.5 1.17511 0.5C0.852534 0.5 0.576037 0.62533 0.345622 0.875989C0.115208 1.12665 0 1.41909 0 1.7533C0 2.08751 0.115208 2.37995 0.345622 2.63061L7.11982 10L0.345622 17.3694C0.130569 17.6033 0.0230408 17.8914 0.0230408 18.2337C0.0230408 18.5766 0.138248 18.8734 0.368663 19.124C0.599078 19.3747 0.867895 19.5 1.17511 19.5C1.48233 19.5 1.75115 19.3747 1.98157 19.124Z" fill="black"/></svg></button>',
            responsive: [{
                    breakpoint: 1399,
                    settings: {
                        slidesToShow: 5,
                    },
                },
                {
                    breakpoint: 860,
                    settings: {
                        slidesToShow: 4,
                    },
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                        arrows: false,
                    },
                },
            ],
        });
    });
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
