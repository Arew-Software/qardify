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
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/ecommerce.css') }}" />
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
                                                    src="{{ asset(\App\Models\User::FLAG[$language->iso_code]) }} "
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
                            <div
                                class="position-absolute cart-count d-flex align-items-center justify-content-center product-count-badge">

                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M27.0834 11.6668C27.0834 11.9984 26.9517 12.3163 26.7172 12.5507C26.4828 12.7851 26.1649 12.9168 25.8334 12.9168C25.5018 12.9168 25.1839 12.7851 24.9495 12.5507C24.7151 12.3163 24.5834 11.9984 24.5834 11.6668V9.16683C24.5834 7.95125 24.1005 6.78546 23.2409 5.92592C22.3814 5.06638 21.2156 4.5835 20 4.5835C18.7844 4.5835 17.6187 5.06638 16.7591 5.92592C15.8996 6.78546 15.4167 7.95125 15.4167 9.16683V11.6668C15.4167 11.9984 15.285 12.3163 15.0506 12.5507C14.8161 12.7851 14.4982 12.9168 14.1667 12.9168C13.8352 12.9168 13.5172 12.7851 13.2828 12.5507C13.0484 12.3163 12.9167 11.9984 12.9167 11.6668V9.16683C12.9167 7.28821 13.663 5.48654 14.9913 4.15816C16.3197 2.82977 18.1214 2.0835 20 2.0835C21.8786 2.0835 23.6803 2.82977 25.0087 4.15816C26.3371 5.48654 27.0834 7.28821 27.0834 9.16683V11.6668Z"
                                    fill="black" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M32.2367 13.917L33.57 33.917C33.6035 34.4292 33.5316 34.9428 33.3588 35.4262C33.186 35.9095 32.9159 36.3523 32.5653 36.7272C32.2146 37.102 31.7908 37.401 31.3201 37.6057C30.8493 37.8103 30.3416 37.9163 29.8283 37.917H10.1717C9.65823 37.9167 9.1503 37.8111 8.67933 37.6066C8.20836 37.4022 7.78437 37.1032 7.43362 36.7282C7.08287 36.3532 6.81282 35.9103 6.64019 35.4267C6.46756 34.9432 6.39603 34.4293 6.43001 33.917L7.76334 13.917C7.82676 12.9678 8.24855 12.0782 8.94327 11.4284C9.63799 10.7785 10.5537 10.417 11.505 10.417H28.495C29.4463 10.417 30.362 10.7785 31.0568 11.4284C31.7515 12.0782 32.1733 12.9678 32.2367 13.917ZM24.1433 17.797C23.7707 18.5803 23.1837 19.2418 22.4504 19.7051C21.717 20.1683 20.8674 20.4141 20 20.4141C19.1326 20.4141 18.283 20.1683 17.5497 19.7051C16.8163 19.2418 16.2293 18.5803 15.8567 17.797C15.7862 17.6487 15.6872 17.5158 15.5654 17.4057C15.4435 17.2957 15.3012 17.2108 15.1465 17.1557C14.9918 17.1007 14.8278 17.0767 14.6638 17.0851C14.4998 17.0934 14.3391 17.134 14.1908 17.2045C14.0426 17.275 13.9096 17.374 13.7996 17.4958C13.6896 17.6177 13.6046 17.76 13.5496 17.9147C13.4946 18.0694 13.4706 18.2334 13.4789 18.3974C13.4873 18.5613 13.5279 18.722 13.5983 18.8703C14.1724 20.0824 15.0788 21.1066 16.212 21.8238C17.3453 22.541 18.6589 22.9218 20 22.9218C21.3412 22.9218 22.6547 22.541 23.788 21.8238C24.9213 21.1066 25.8276 20.0824 26.4017 18.8703C26.4722 18.722 26.5127 18.5613 26.5211 18.3974C26.5295 18.2334 26.5055 18.0694 26.4504 17.9147C26.3954 17.76 26.3105 17.6177 26.2004 17.4958C26.0904 17.374 25.9575 17.275 25.8092 17.2045C25.6609 17.134 25.5002 17.0934 25.3362 17.0851C25.1722 17.0767 25.0082 17.1007 24.8536 17.1557C24.6989 17.2108 24.5565 17.2957 24.4347 17.4057C24.3128 17.5158 24.2138 17.6487 24.1433 17.797Z"
                                    fill="black" />
                            </svg>
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
                    <h2 class="position-relative mb-0">
                        {{ __('messages.whatsapp_stores_templates.choos_your_category') }}</h2>
                </div>
                <div class="category-slider">
                    @foreach ($whatsappStore->categories as $category)
                        <a href="{{ route('whatsapp.store.products', ['alias' => $whatsappStore->url_alias, 'category' => $category->id]) }}"
                            style="color: #212529">
                            <div>
                                <div class="category-box bg-white mx-auto">
                                    <div class="category-img h-100 w-100 mb-20 mx-auto">
                                        <img src="{{ $category->image_url }}" alt="images"
                                            class="h-100 w-100 object-fit-cover rounded" loading="lazy" />
                                    </div>
                                    <p class="fs-20 fw-5 text-center lh-sm mb-0 text-black text-break">
                                        {{ $category->name }}</p>
                                </div>
                            </div>
                        </a>
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
                    <h2 class="position-relative">{{ __('messages.whatsapp_stores_templates.choose_your_product') }}
                    </h2>
                </div>
                <div class="row mb-20">
                    @foreach ($whatsappStore->products()->latest()->take(8)->get() as $product)
                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-28">
                            <div class="product-card d-flex flex-column h-100">
                                <a href="{{ route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}"
                                    class="d-flex text-black flex-column h-100">
                                    <div class="product-img w-100 h-100 mx-auto">
                                        <img src="{{ $product->images_url[0] ?? '' }}" alt="product"
                                            class="w-100 h-100 object-fit-cover product-image" loading="lazy" />
                                    </div>
                                </a>
                                <div class="product-details h-100" style="flex-grow:1;">
                                    <div class="d-flex flex-column h-100 justify-content-between">
                                        <a href="{{ route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}"
                                            class="d-flex text-black flex-column h-100">
                                            <div>
                                                <h5 class="fs-24 fw-6 mb-1 product-name">{{ $product->name }}</h5>
                                                <p class="fs-20 fw-5 mb-2 text-gray-200 lh-sm product-category">
                                                    {{ $product->category->name }}
                                                </p>
                                            </div>
                                        </a>
                                        <div class="d-flex gap-2 align-items-center justify-content-between">
                                            <a href="{{ route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}"
                                                class="d-flex text-black flex-column h-100">
                                                <p class="fs-30 fw-6 lh-sm mb-0">
                                                    <span class="currency_icon">
                                                        {{ $product->currency->currency_icon }}</span>
                                                    <span class="selling_price">{{ $product->selling_price }}</span>
                                                    @if ($product->net_price)
                                                        <del class="fs-20 fw-5 text-gray-200 text-nowrap">{{ $product->currency->currency_icon }}
                                                            {{ $product->net_price }}</del>
                                                    @endif
                                                </p>
                                                <input type="hidden" value="{{ $product->available_stock }}"
                                                class="available-stock">
                                            </a>
                                            <button data-id="{{ $product->id }}"
                                                class="@if($product->available_stock == 0) disabled @endif btn btn-primary d-flex justify-content-center align-items-center addToCartBtn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    viewBox="0 0 30 30" fill="none">
                                                    <path
                                                        d="M23.6158 19.0898L24.4896 14.3458C24.5087 14.246 24.503 14.1431 24.4731 14.046C24.4432 13.9489 24.39 13.8606 24.3181 13.7888C24.2462 13.7171 24.1578 13.664 24.0606 13.6343C23.9635 13.6046 23.8605 13.5991 23.7608 13.6184C23.3462 13.7058 22.9237 13.7499 22.5 13.75C20.9414 13.75 19.4389 13.1676 18.2875 12.1171C17.136 11.0666 16.4185 9.62377 16.2758 8.07164C16.2626 7.91607 16.1917 7.77107 16.0769 7.66525C15.9621 7.55943 15.8118 7.50047 15.6557 7.5H6.8555L6.76503 7.09289C6.67249 6.67657 6.44076 6.30424 6.10809 6.03737C5.77541 5.7705 5.36169 5.62504 4.9352 5.625H3.15823C2.84686 5.625 2.55835 5.8377 2.50831 6.14502C2.49311 6.23471 2.49765 6.32663 2.52162 6.41438C2.54559 6.50214 2.58842 6.5836 2.64711 6.65311C2.7058 6.72261 2.77894 6.77847 2.86144 6.8168C2.94394 6.85513 3.03381 6.87501 3.12477 6.87504H4.93473C5.0771 6.87439 5.21538 6.92261 5.32647 7.01165C5.43756 7.10069 5.51474 7.22515 5.54511 7.36424L8.93428 22.6162C8.43929 22.7715 8.00475 23.0767 7.69073 23.4897C7.37672 23.9026 7.19874 24.4029 7.18139 24.9214C7.16404 25.4399 7.30818 25.951 7.59389 26.384C7.8796 26.8171 8.29276 27.1506 8.77627 27.3387C9.25978 27.5267 9.78976 27.5599 10.293 27.4337C10.7962 27.3075 11.2477 27.028 11.5852 26.634C11.9227 26.2401 12.1295 25.751 12.177 25.2343C12.2245 24.7177 12.1103 24.1991 11.8503 23.7502H19.7123C19.4374 24.2267 19.3275 24.7805 19.3996 25.3258C19.4716 25.8711 19.7216 26.3774 20.1107 26.7662C20.4998 27.1549 21.0064 27.4044 21.5517 27.4759C22.0971 27.5474 22.6508 27.437 23.127 27.1617C23.6032 26.8864 23.9753 26.4617 24.1855 25.9534C24.3957 25.4451 24.4323 24.8817 24.2896 24.3505C24.147 23.8192 23.833 23.35 23.3964 23.0154C22.9598 22.6808 22.425 22.4996 21.875 22.5H10.189L9.77229 20.625H21.7719C22.2102 20.625 22.6347 20.4714 22.9715 20.191C23.3084 19.9105 23.5363 19.5209 23.6158 19.0898ZM9.68751 25.9375C9.50209 25.9375 9.32083 25.8825 9.16666 25.7795C9.01249 25.6765 8.89233 25.5301 8.82137 25.3588C8.75041 25.1875 8.73185 24.999 8.76802 24.8171C8.80419 24.6353 8.89348 24.4682 9.02459 24.3371C9.15571 24.206 9.32275 24.1167 9.50461 24.0805C9.68647 24.0444 9.87497 24.0629 10.0463 24.1339C10.2176 24.2048 10.364 24.325 10.467 24.4792C10.57 24.6333 10.625 24.8146 10.625 25C10.625 25.2487 10.5262 25.4871 10.3504 25.6629C10.1746 25.8387 9.93615 25.9375 9.68751 25.9375ZM22.8125 25C22.8125 25.1854 22.7575 25.3667 22.6545 25.5209C22.5515 25.675 22.4051 25.7952 22.2338 25.8662C22.0625 25.9371 21.874 25.9557 21.6921 25.9195C21.5103 25.8833 21.3432 25.794 21.2121 25.6629C21.081 25.5318 20.9917 25.3648 20.9555 25.1829C20.9193 25.0011 20.9379 24.8126 21.0089 24.6413C21.0798 24.4699 21.2 24.3235 21.3542 24.2205C21.5083 24.1175 21.6896 24.0625 21.875 24.0625C22.1236 24.0625 22.3621 24.1613 22.5379 24.3371C22.7137 24.5129 22.8125 24.7514 22.8125 25Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M22.5 2.5C21.5111 2.5 20.5444 2.79324 19.7221 3.34265C18.8999 3.89205 18.259 4.67294 17.8806 5.58657C17.5022 6.5002 17.4031 7.50553 17.5961 8.47543C17.789 9.44533 18.2652 10.3362 18.9645 11.0355C19.6637 11.7348 20.5546 12.211 21.5245 12.4039C22.4944 12.5968 23.4998 12.4978 24.4134 12.1194C25.327 11.7409 26.1079 11.1001 26.6573 10.2778C27.2067 9.45558 27.5 8.48888 27.5 7.49998C27.4999 6.17391 26.9732 4.90215 26.0355 3.96448C25.0978 3.0268 23.8261 2.50002 22.5 2.5ZM24.6875 8.125H23.125V9.68752C23.1258 9.7701 23.1102 9.85203 23.0792 9.92856C23.0481 10.0051 23.0022 10.0747 22.9441 10.1334C22.886 10.1921 22.8168 10.2386 22.7406 10.2704C22.6644 10.3022 22.5826 10.3186 22.5 10.3186C22.4174 10.3186 22.3357 10.3022 22.2594 10.2704C22.1832 10.2386 22.114 10.1921 22.0559 10.1334C21.9978 10.0747 21.9519 10.0051 21.9208 9.92856C21.8898 9.85203 21.8742 9.7701 21.875 9.68752V8.125H20.3125C20.2299 8.1258 20.148 8.11022 20.0715 8.07917C19.9949 8.04812 19.9253 8.00221 19.8666 7.9441C19.808 7.88598 19.7614 7.81682 19.7296 7.74059C19.6978 7.66437 19.6814 7.5826 19.6814 7.50001C19.6814 7.41742 19.6978 7.33565 19.7296 7.25943C19.7614 7.1832 19.808 7.11403 19.8666 7.05592C19.9253 6.9978 19.9949 6.9519 20.0715 6.92085C20.148 6.8898 20.2299 6.87422 20.3125 6.87502H21.875V5.3125C21.8742 5.22992 21.8898 5.14799 21.9208 5.07146C21.9519 4.99493 21.9978 4.92532 22.0559 4.86664C22.114 4.80796 22.1832 4.76138 22.2594 4.72959C22.3357 4.6978 22.4174 4.68143 22.5 4.68143C22.5826 4.68143 22.6644 4.6978 22.7406 4.72959C22.8168 4.76138 22.886 4.80796 22.9441 4.86664C23.0022 4.92532 23.0481 4.99493 23.0792 5.07146C23.1102 5.14799 23.1258 5.22992 23.125 5.3125V6.87502H24.6875C24.8522 6.87661 25.0097 6.94316 25.1256 7.0602C25.2415 7.17723 25.3065 7.33529 25.3065 7.50001C25.3065 7.66473 25.2415 7.82279 25.1256 7.93982C25.0097 8.05686 24.8522 8.12341 24.6875 8.125H24.6875Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </button>
                                        </div>
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
                            <span
                                class="arrow-box rounded-circle bg-white d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                    viewBox="0 0 26 26" fill="none">
                                    <g clip-path="url(#clip0_237_335)">
                                        <path
                                            d="M1.47655 12.0234H22.1581L18.7321 8.61406C18.3498 8.23359 18.3484 7.61528 18.7288 7.233C19.1093 6.85068 19.7277 6.84926 20.1099 7.22968L25.2127 12.3078L25.2136 12.3087C25.5949 12.6892 25.5961 13.3095 25.2137 13.6913L25.2128 13.6922L20.11 18.7703C19.7278 19.1507 19.1095 19.1494 18.7289 18.767C18.3485 18.3847 18.3499 17.7664 18.7322 17.3859L22.1581 13.9766H1.47655C0.937189 13.9766 0.499983 13.5394 0.499983 13C0.499983 12.4606 0.937189 12.0234 1.47655 12.0234Z"
                                            fill="black" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_237_335">
                                            <rect width="25" height="25" fill="white"
                                                transform="matrix(-1 0 0 1 25.5 0.5)" />
                                        </clipPath>
                                    </defs>
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
            slidesToShow: 5,
            rtl: isRtl,
            slidesToScroll: 1,
            // autoplay: true,
            prevArrow: '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none"><path d="M2.61048 5.99881L2.52357 5.91829L2.61048 6.01208L6.74799 10.4776C6.74801 10.4776 6.74802 10.4777 6.74804 10.4777C6.89859 10.6459 6.98199 10.8714 6.98011 11.1056C6.97822 11.3398 6.89118 11.5637 6.73792 11.7291C6.58468 11.8945 6.37755 11.9882 6.16119 11.9902C5.94487 11.9922 5.7363 11.9025 5.58044 11.7401C5.58042 11.74 5.58039 11.74 5.58037 11.74L0.851898 6.63663C0.696935 6.46933 0.609765 6.24231 0.609765 6.00545C0.609765 5.76859 0.696935 5.54156 0.851899 5.37426L5.58049 0.270777C5.73548 0.103552 5.94549 0.00976553 6.1643 0.00976555C6.3831 0.00976557 6.59311 0.103552 6.7481 0.270777L6.7481 0.270775C6.90306 0.438075 6.99023 0.665102 6.99023 0.901961C6.99023 1.13882 6.90306 1.36585 6.7481 1.53315L2.61048 5.99881Z" stroke="#141414" stroke-width="0.0195312"/></svg></button>',
            nextArrow: '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none"><path d="M4.38952 6.00119L4.47643 6.08171L4.38952 5.98792L0.252014 1.52238C0.251996 1.52236 0.251977 1.52234 0.251959 1.52232C0.101415 1.35406 0.0180061 1.12857 0.0198916 0.894392C0.0217773 0.660185 0.108825 0.43628 0.262083 0.270871C0.415319 0.105486 0.622448 0.0118285 0.838806 0.0098001C1.05513 0.00776977 1.2637 0.097502 1.41956 0.259938C1.41958 0.25996 1.41961 0.259983 1.41963 0.260006L6.1481 5.36337C6.30307 5.53067 6.39024 5.75769 6.39024 5.99455C6.39024 6.23141 6.30307 6.45844 6.1481 6.62574L1.41951 11.7292C1.26452 11.8964 1.05451 11.9902 0.835705 11.9902C0.616899 11.9902 0.406885 11.8964 0.251898 11.7292L0.2519 11.7292C0.0969359 11.5619 0.00976574 11.3349 0.00976578 11.098C0.00976582 10.8612 0.096936 10.6342 0.2519 10.4669L4.38952 6.00119Z" stroke="#2650D7" stroke-width="0.0195312"/></svg></button>',
            responsive: [{
                    breakpoint: 1399,
                    settings: {
                        slidesToShow: 6,
                    },
                },
                {
                    breakpoint: 991,
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
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 460,
                    settings: {
                        slidesToShow: 2,
                        dots: true,
                        arrows: false,
                    },
                },
                {
                    breakpoint: 360,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                        arrows: false,
                    },
                },
            ],
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
                ).innerHTML =
                `<img src="${selectedFlag}" class="flag" alt="flag" loading="lazy" loading="lazy"> ${selectedText}`;
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
