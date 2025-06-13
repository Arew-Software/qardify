<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Agency</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/vcard36.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/new_vcard/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/new_vcard/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-vcard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
</head>

<body>
    <div class="container p-0">
        <div class="main-content mx-auto w-100 position-relative overflow-hidden bg-white">
            <div class="banner-section position-relative">
                <div class="banner-img">
                    <img src="{{ asset('assets/img/vcard36/banner-img.png') }}" class="w-100 h-100 object-fit-cover"
                        alt="banner" />
                </div>
                <div class="travel-img">
                    <img src="{{ asset('assets/img/vcard36/text-img.svg') }}" alt="Cinque Terre"
                        class="w-100 h-100 object-fit-cover" alt="banner">
                </div>
                <!-- <h1>TRAVEL</h1> -->
                <div class="overlay"></div>
                <div class="bg-vector">
                    <img src="{{ asset('assets/img/vcard36/banner-bg-vector.png') }}" alt="vector" />
                </div>
            </div>
            <div class="profile-section px-30">
                <div class="profile-bg text-end">
                    <img src="{{ asset('assets/img/vcard36/profile-bg.png') }}" alt="bg-vector" />
                </div>
                <div class="card mb-30 d-flex flex-sm-row align-items-sm-stretch align-items-center">
                    <div class="card-img mb-sm-0 mb-3">
                        <img src="{{ asset('assets/img/vcard36/profile-img.png') }}" class="w-100 h-100 object-fit-cover" />
                    </div>
                    <div class="card-body p-0 text-sm-start text-center">
                        <div class="profile-name mb-4 pb-1">
                            <h2 class="text-primary-36 mb-2 fw-5 fs-30">Bessie Cooper</h2>
                            <p class="text-warning mb-0 fw-5 fs-18">Travel Agent</p>
                        </div>
                        <div class="social-media-section">
                            <div
                                class="d-flex flex-wrap justify-content-sm-start justify-content-center gap-md-4 gap-3">
                                <a href="" class="social-icon d-flex justify-content-center align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20"
                                        fill="none">
                                        <path
                                            d="M2.75107 11.2889C2.31622 11.2889 1.91697 11.2889 1.51771 11.2889C1.17719 11.2889 0.836672 11.2954 0.496745 11.2863C0.140799 11.2772 0.0245236 11.1596 0.0215574 10.7711C0.0138453 9.753 0.013252 8.73429 0.0221507 7.71622C0.0257101 7.33094 0.150291 7.20882 0.50149 7.20621C1.15999 7.20164 1.81849 7.20491 2.47758 7.20491C2.55826 7.20491 2.63894 7.20491 2.75107 7.20491C2.75107 7.09455 2.74988 6.99986 2.75107 6.90582C2.76649 5.97788 2.73445 5.04601 2.80683 4.12329C2.99014 1.77307 4.61978 0.0947997 6.76257 0.0183961C7.63464 -0.012949 8.50908 0.0046826 9.38174 0.00729469C9.68903 0.00794771 9.81362 0.146388 9.8148 0.48596C9.81895 1.43872 9.81895 2.39213 9.8154 3.34489C9.81421 3.70993 9.69793 3.84249 9.35682 3.85098C8.75764 3.86666 8.15847 3.86666 7.5587 3.8771C6.88656 3.88821 6.60417 4.1775 6.58994 4.90823C6.5757 5.6468 6.58697 6.38667 6.58697 7.15397C6.68841 7.15397 6.76732 7.15397 6.84622 7.15397C7.60853 7.15397 8.37085 7.15266 9.13317 7.15462C9.61369 7.15528 9.72641 7.27805 9.727 7.79785C9.7276 8.76694 9.72878 9.73667 9.72641 10.7058C9.72522 11.1394 9.62141 11.2563 9.22512 11.2582C8.35958 11.2621 7.49404 11.2595 6.58756 11.2595C6.58756 11.3731 6.58756 11.4744 6.58756 11.5749C6.58756 14.1243 6.58756 16.6744 6.58756 19.2238C6.58756 19.9264 6.51993 19.9996 5.87093 19.9996C5.01962 19.9996 4.16891 20.0009 3.31761 19.9989C2.862 19.9983 2.75107 19.8775 2.75107 19.3812C2.75047 16.7906 2.75047 14.2001 2.75047 11.6102C2.75107 11.5142 2.75107 11.4182 2.75107 11.2889Z"
                                            fill="currentColor" />
                                    </svg>
                                </a>
                                <a href="" class="social-icon d-flex justify-content-center align-items-center">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_3172_1287)">
                                            <path
                                                d="M5.72008 0.166672C9.25094 0.166672 12.7658 0.166672 16.2966 0.166672C16.5213 0.198747 16.746 0.230822 16.9546 0.278934C19.4102 0.824209 20.983 2.3157 21.6571 4.73736C21.7374 5.05811 21.7695 5.37886 21.8337 5.71565C21.8337 9.2439 21.8337 12.7561 21.8337 16.2844C21.8176 16.3645 21.8176 16.4287 21.7855 16.5089C21.6411 17.0702 21.5769 17.6636 21.3361 18.1928C20.2608 20.5343 18.3991 21.7692 15.8312 21.8173C12.6213 21.8654 9.39539 21.8333 6.18551 21.8333C4.93366 21.8333 3.7781 21.4965 2.76699 20.7749C1.03366 19.5239 0.183042 17.84 0.166992 15.723C0.166992 12.5637 0.166992 9.40427 0.166992 6.26092C0.166992 5.85998 0.183042 5.44301 0.279338 5.04207C0.825017 2.58833 2.31761 1.01666 4.74107 0.343084C5.06205 0.262897 5.38304 0.230822 5.72008 0.166672ZM2.09292 10.992C2.09292 12.5637 2.09292 14.1193 2.09292 15.691C2.09292 16.1881 2.14107 16.6693 2.31761 17.1504C2.92749 18.8664 4.40403 19.9088 6.26576 19.9088C9.42748 19.9088 12.5892 19.9249 15.7349 19.9088C16.2003 19.9088 16.6979 19.8447 17.1472 19.6843C18.8806 19.107 19.9077 17.5994 19.9077 15.723C19.9077 12.5797 19.9238 9.42031 19.8917 6.27696C19.8917 5.81187 19.8275 5.31471 19.683 4.86566C19.1053 3.13361 17.6127 2.09117 15.7509 2.09117C12.5892 2.09117 9.42748 2.09117 6.24971 2.09117C4.83736 2.09117 3.68181 2.65248 2.83119 3.80718C2.28551 4.54491 2.07687 5.37886 2.07687 6.293C2.09292 7.84863 2.09292 9.42031 2.09292 10.992Z"
                                                fill="currentColor" />
                                            <path
                                                d="M11.0002 16.573C7.93479 16.573 5.41504 14.0551 5.41504 10.992C5.41504 7.92882 7.95084 5.41093 11.0002 5.41093C14.0657 5.42697 16.5694 7.91278 16.5694 10.9759C16.6015 14.0391 14.0817 16.557 11.0002 16.573ZM14.6595 10.992C14.6595 8.9873 13.0224 7.33543 11.0002 7.33543C8.99405 7.33543 7.34097 8.97126 7.34097 10.992C7.34097 12.9967 8.978 14.6485 11.0002 14.6485C13.0064 14.6485 14.6595 13.0127 14.6595 10.992Z"
                                                fill="currentColor" />
                                            <path
                                                d="M16.8101 3.79117C17.5805 3.79117 18.2385 4.43267 18.2224 5.20247C18.2224 5.97227 17.5805 6.59773 16.8101 6.59773C16.0397 6.59773 15.3817 5.95623 15.3977 5.18643C15.4138 4.41663 16.0397 3.79117 16.8101 3.79117Z"
                                                fill="currentColor" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_3172_1287">
                                                <rect width="21.6667" height="21.6667" fill="white"
                                                    transform="translate(0.166992 0.166672)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                                <a href="" class="social-icon d-flex justify-content-center align-items-center">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_3172_1293)">
                                            <path
                                                d="M17.3423 21.8237C17.3423 21.7078 17.3423 21.6016 17.3423 21.5002C17.3423 19.1582 17.3519 16.8163 17.3327 14.4743C17.3279 13.8804 17.2749 13.2816 17.1594 12.7022C16.9331 11.5626 16.2688 11.0266 15.1087 10.9783C14.3626 10.9445 13.6646 11.0893 13.1255 11.6543C12.6682 12.1324 12.4708 12.736 12.3986 13.383C12.3456 13.8707 12.3216 14.3632 12.3216 14.851C12.3119 17.0818 12.3168 19.3079 12.3168 21.5388C12.3168 21.6305 12.3168 21.7271 12.3168 21.8333C10.8149 21.8333 9.34187 21.8333 7.84961 21.8333C7.84961 17.0142 7.84961 12.2 7.84961 7.37603C9.27448 7.37603 10.6897 7.37603 12.1387 7.37603C12.1387 8.02308 12.1387 8.66048 12.1387 9.29787C12.1579 9.3027 12.1724 9.30753 12.1916 9.31236C12.2301 9.26407 12.2686 9.22061 12.3023 9.17233C13.0773 7.93616 14.223 7.27945 15.6334 7.07181C16.6491 6.92212 17.6504 7.00904 18.6324 7.31808C20.0428 7.76233 20.9045 8.74257 21.357 10.1188C21.6891 11.1231 21.8047 12.1613 21.8143 13.214C21.8335 16.0388 21.8287 18.8637 21.8287 21.6885C21.8287 21.7271 21.8239 21.7657 21.8191 21.8333C20.3413 21.8237 18.8635 21.8237 17.3423 21.8237Z"
                                                fill="currentColor" />
                                            <path
                                                d="M0.547852 7.37602C2.04493 7.37602 3.51793 7.37602 5.00057 7.37602C5.00057 12.2 5.00057 17.0094 5.00057 21.8333C3.51312 21.8333 2.04011 21.8333 0.547852 21.8333C0.547852 17.0191 0.547852 12.2048 0.547852 7.37602Z"
                                                fill="currentColor" />
                                            <path
                                                d="M5.35999 2.76938C5.36481 4.218 4.20469 5.38174 2.76057 5.38174C1.32126 5.38174 0.156334 4.21318 0.161148 2.76938C0.170775 1.3304 1.32126 0.1715 2.75576 0.166672C4.19507 0.161843 5.35999 1.32075 5.35999 2.76938Z"
                                                fill="currentColor" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_3172_1293">
                                                <rect width="21.6667" height="21.6667" fill="white"
                                                    transform="translate(0.166992 0.166672)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                                <a href="" class="social-icon d-flex justify-content-center align-items-center">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.166992 21.8325C0.200861 21.7072 0.220215 21.6253 0.244408 21.5434C0.708901 19.8615 1.17339 18.1844 1.62821 16.5026C1.66208 16.3725 1.64273 16.1942 1.57983 16.0785C-0.524909 12.1606 -0.147508 7.54869 2.70235 4.13195C5.29093 1.01399 8.66818 -0.263067 12.6938 0.291129C15.2969 0.652562 17.4452 1.89589 19.1822 3.85244C22.5739 7.68363 22.7143 13.4232 19.5644 17.4953C16.4678 21.5 10.8165 22.806 6.28282 20.5362C5.99251 20.3916 5.74575 20.3675 5.43609 20.4542C3.77649 20.9024 2.1169 21.3265 0.452462 21.7602C0.375046 21.7795 0.292792 21.7988 0.166992 21.8325ZM5.52802 8.49323C5.60543 8.85949 5.65865 9.23537 5.76026 9.59681C5.96832 10.3197 6.40378 10.9221 6.8344 11.5244C8.32465 13.6063 10.2068 15.158 12.7131 15.8809C13.7583 16.1797 14.7405 16.1411 15.6646 15.4906C16.3081 15.0376 16.5162 14.4063 16.5065 13.6738C16.5065 13.5533 16.4097 13.3798 16.3081 13.3268C15.5824 12.9605 14.8469 12.6087 14.1066 12.2714C13.8163 12.1365 13.6808 12.1943 13.4825 12.4497C13.226 12.7726 12.9696 13.0907 12.7083 13.4039C12.5632 13.5822 12.3841 13.6448 12.1519 13.5533C10.5407 12.9172 9.30686 11.8473 8.4311 10.363C8.31497 10.1703 8.32465 10.0112 8.47948 9.84258C8.66818 9.63536 8.84721 9.4185 9.02139 9.19682C9.24396 8.90768 9.29718 8.60889 9.13268 8.2571C8.89559 7.75591 8.70205 7.23545 8.48432 6.72463C8.1553 5.93911 8.1553 5.91984 7.29406 5.94875C7.06181 5.95839 6.78602 6.04513 6.61667 6.19452C5.91993 6.79209 5.56672 7.56315 5.52802 8.49323Z"
                                            fill="currentColor" />
                                    </svg>
                                </a>

                                <a href="" class="social-icon d-flex justify-content-center align-items-center">
                                    <svg width="22" height="19" viewBox="0 0 22 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.57116 14.8052C4.53747 14.5412 3.18819 13.583 2.42555 11.6667C3.08064 11.6667 3.6575 11.6667 4.22459 11.6667C2.16157 10.8551 0.998057 9.43742 0.851397 7.18863C1.47715 7.36462 2.05401 7.53083 2.63088 7.68727C2.66021 7.64816 2.68954 7.60905 2.71888 7.56994C1.85847 6.87575 1.24249 6.01534 1.02739 4.92028C0.812287 3.82521 0.910061 2.76925 1.50648 1.68396C3.97038 4.49007 6.98181 6.12289 10.6874 6.35755C10.6874 5.9469 10.6777 5.59491 10.6874 5.24293C10.7461 3.37545 11.6652 2.01639 13.3371 1.26354C14.9699 0.530233 16.5734 0.72578 17.9814 1.87951C18.3725 2.20216 18.7244 2.27061 19.1644 2.09461C19.8391 1.83062 20.5137 1.56663 21.247 1.29287C20.9341 2.27061 20.2888 2.93547 19.6142 3.65899C20.3181 3.47322 21.0221 3.27768 21.7261 3.09191C21.7554 3.12124 21.7945 3.15057 21.8239 3.1799C21.2666 3.75677 20.7386 4.38252 20.1324 4.90072C19.7999 5.18426 19.6728 5.46781 19.6631 5.88824C19.6044 8.83123 18.7244 11.5004 16.9058 13.8275C14.4615 16.966 11.2154 18.5499 7.21647 18.6282C4.92856 18.677 2.78732 18.198 0.773178 17.1127C0.57763 17.0051 0.382083 16.8878 0.176758 16.7216C2.494 16.8291 4.60591 16.2816 6.57116 14.8052Z"
                                            fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="text-gray-200 profile-desc mb-0 fs-14 text-sm-start text-center">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book.
                </p>
            </div>
            <div class="contact-section pt-60 px-30">
                <div class="contact-bg img-1 text-end">
                    <img src="{{ asset('assets/img/vcard36/contact-bg-1.png') }}" alt="bg-vector" />
                </div>
                <div class="contact-bg img-2 text-start">
                    <img src="{{ asset('assets/img/vcard36/contact-bg-2.png') }}" alt="bg-vector" />
                </div>
                <div class="contact-bg img-3 text-end">
                    <img src="{{ asset('assets/img/vcard36/contact-bg-3.png') }}" alt="bg-vector" />
                </div>
                <div class="section-heading left-heading">
                    <h2 class="mb-0">Contact</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6  mb-sm-0 mb-30">
                        <div class="contact-img">
                            <img src="{{ asset('assets/img/vcard36/contact-img.png') }}" alt="contact" class="w-100" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="contact-box d-flex flex-sm-row flex-column align-items-center gap-3 mb-20">
                            <div class="contact-icon d-flex justify-content-center align-items-center">
                                <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.0229 0.00124986C13.824 0.00124986 16.6195 -0.00374959 19.4206 0.00624932C19.7869 0.00624932 20.1589 0.0412455 20.5139 0.111238C21.1508 0.241224 21.5904 0.601185 21.8666 1.12113C22.1089 1.57608 22.03 1.82605 21.5566 2.09102C20.9423 2.43599 20.3223 2.77595 19.708 3.12091C17.0253 4.63575 14.3425 6.14058 11.671 7.66542C11.1863 7.94539 10.8031 7.93539 10.3184 7.66042C7.06643 5.80562 3.79755 3.97582 0.534299 2.13602C0.466667 2.09602 0.393399 2.06103 0.331403 2.02103C0.0101504 1.82605 -0.0518457 1.67107 0.0608744 1.3461C0.337039 0.546191 1.02463 0.0812412 2.03348 0.0312466C2.43927 0.0112488 2.84506 0.0112488 3.24522 0.00624932C5.83778 0.00624932 8.43034 0.00624932 11.0229 0.00124986Z"
                                        fill="currentColor" />
                                    <path
                                        d="M10.9765 14.995C8.13035 14.995 5.2898 15 2.44362 14.99C2.08855 14.99 1.72221 14.955 1.37841 14.87C0.685182 14.695 0.256845 14.2601 0.0483128 13.6551C-0.0587713 13.3402 0.00322478 13.1852 0.324477 13.0052C2.95086 11.5404 5.57723 10.0755 8.20361 8.61069C8.47978 8.4557 8.77285 8.4557 9.04901 8.60069C9.54498 8.86066 10.0297 9.13063 10.5144 9.4056C10.9145 9.63558 11.0836 9.64058 11.4725 9.4156C11.9854 9.12063 12.5039 8.83566 13.0168 8.54069C13.2929 8.38071 13.5409 8.43071 13.7945 8.57569C14.6343 9.05564 15.4741 9.53059 16.3195 10.0055C18.0441 10.9754 19.7743 11.9353 21.499 12.9052C22.0287 13.2002 22.1133 13.4452 21.854 13.9401C21.499 14.61 20.8564 14.895 20.073 14.98C19.8758 15 19.6785 15 19.4813 15C16.6464 14.995 13.8114 14.995 10.9765 14.995Z"
                                        fill="currentColor" />
                                    <path
                                        d="M0.0429635 11.5204C0.0429635 8.83066 0.0429635 6.18595 0.0429635 3.49624C2.42136 4.8411 4.76594 6.16095 7.14997 7.50581C4.77157 8.85066 2.42699 10.1755 0.0429635 11.5204Z"
                                        fill="currentColor" />
                                    <path
                                        d="M14.871 7.50581C17.2438 6.16596 19.5884 4.8411 21.9667 3.49624C21.9667 6.17595 21.9667 8.81567 21.9667 11.5104C19.594 10.1755 17.2494 8.85067 14.871 7.50581Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="contact-desc">
                                <a href="mailto:jackie@gmail.com" class="text-black fw-5">michael@gmail.com</a>
                            </div>
                        </div>
                        <div class="contact-box d-flex flex-sm-row flex-column align-items-center gap-3 mb-20">
                            <div class="contact-icon d-flex justify-content-center align-items-center">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.03788 8.65636C5.68074 11.8074 8.01407 14.1974 11.0974 15.8383C11.2284 15.9096 11.5379 15.8264 11.6688 15.7075C12.3712 15.0416 13.0617 14.3639 13.7284 13.6623C14.0974 13.2699 14.5022 13.2105 15.0141 13.3056C16.2284 13.5196 17.4545 13.7337 18.6807 13.8763C19.6569 13.9952 20.0022 14.3163 20.0022 15.3151C20.0022 16.3853 20.0022 17.4435 20.0022 18.5137C20.0022 19.6671 19.6331 20.0238 18.4545 20C10.0736 19.8573 2.57359 13.912 0.597401 5.75505C0.252163 4.31629 0.14502 2.80618 0.0140678 1.31986C-0.0692655 0.439952 0.41883 0.0118906 1.29978 0.0118906C2.46645 0 3.63312 0 4.79978 0C5.65693 0 6.01407 0.39239 6.12121 1.24851C6.28788 2.50892 6.51407 3.76932 6.75216 5.01784C6.8474 5.55291 6.75216 5.98098 6.35931 6.36147C5.57359 7.12247 4.81169 7.88347 4.03788 8.65636Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="contact-desc">
                                <a href="tel:+49 95864 12484" class="text-black fw-5">+49 95864 12484</a>
                            </div>
                        </div>
                        <div class="contact-box d-flex flex-sm-row flex-column align-items-center gap-3 mb-20">
                            <div class="contact-icon d-flex justify-content-center align-items-center">
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_3173_1608)">
                                        <path
                                            d="M0.827341 9.35231C1.66572 9.47548 2.47503 9.61343 3.28918 9.7169C4.37956 9.84993 5.46509 9.98788 6.56032 10.0618C7.87847 10.1505 9.20146 10.2145 10.5245 10.2195C12.6277 10.2293 14.7164 10.0618 16.7566 9.5149C16.9553 9.4607 17.154 9.39172 17.343 9.30304C16.9698 9.35231 16.5967 9.42621 16.2235 9.45084C15.0992 9.52475 13.9749 9.59865 12.8506 9.63314C11.1254 9.68734 9.40016 9.59865 7.67493 9.48041C5.58625 9.3326 3.50241 9.1503 1.4428 8.75122C1.24411 8.7118 1.04542 8.6576 0.851572 8.60341C0.764341 8.57877 0.681957 8.5295 0.594727 8.49009C0.594727 8.47038 0.594727 8.44574 0.594727 8.42604C0.681957 8.4014 0.774034 8.36199 0.86611 8.34721C1.68511 8.23881 2.50895 8.15013 3.32795 8.02695C4.83509 7.80524 6.32286 7.47021 7.79124 7.06127C7.92208 7.02678 7.99962 7.04156 8.09654 7.14996C8.5957 7.73134 9.25477 8.03188 9.97684 8.17969C11.3628 8.46545 12.5647 8.11071 13.5388 7.04649C13.6211 6.9578 13.6841 6.85434 13.7617 6.7558C14.193 6.89375 14.6243 7.04156 15.0604 7.17459C16.3786 7.56875 17.7258 7.82495 19.0876 8.02203C19.3153 8.05652 19.548 8.11564 19.766 8.19447C20.3233 8.4014 20.6141 8.79063 20.5947 9.38679C20.5802 9.82529 20.5172 10.2736 20.4154 10.7023C19.8581 13.0377 19.4898 15.4026 19.0876 17.7676C19.0682 17.8957 19.0391 18.0188 19.0197 18.1469C18.9422 18.615 18.6611 18.8761 18.2104 18.95C17.6289 19.0436 17.0474 19.1372 16.4658 19.2062C13.7326 19.5265 10.9945 19.5117 8.25647 19.3097C6.17263 19.152 4.10817 18.881 2.05341 18.482C1.89349 18.4524 1.82565 18.3982 1.8208 18.2208C1.74811 16.4028 1.58818 14.5897 1.34588 12.7815C1.20049 11.7074 1.02119 10.6382 0.856418 9.56909C0.856418 9.50011 0.841879 9.43114 0.827341 9.35231ZM1.78203 15.0528C1.85472 16.0136 1.92741 16.9398 1.99526 17.871C2.06311 17.8858 2.13095 17.9006 2.19395 17.9055C4.50071 18.1962 6.81716 18.4228 9.14331 18.5066C11.3483 18.5904 13.5533 18.5657 15.7534 18.3194C16.3204 18.2553 16.524 18.0779 16.6403 17.5409C16.7372 17.0876 16.8341 16.6393 16.9359 16.1909C17.0716 15.5898 16.8777 15.378 16.2671 15.442C15.2252 15.5455 14.1784 15.6687 13.1317 15.713C9.72485 15.8559 6.3374 15.6046 2.95964 15.2006C2.5768 15.1513 2.18911 15.1021 1.78203 15.0528ZM1.36042 11.5251C1.36042 11.5744 1.35557 11.599 1.36042 11.6236C1.45734 12.3775 1.55426 13.1313 1.64149 13.89C1.65603 14.0083 1.70449 14.0378 1.81111 14.0526C3.67202 14.2349 5.53294 14.4566 7.39385 14.6044C10.0544 14.8114 12.7149 14.8262 15.3706 14.5552C15.7728 14.5158 16.1751 14.4271 16.5724 14.3384C16.8099 14.2842 17.0425 14.1462 17.1152 13.8999C17.28 13.3481 17.4205 12.7913 17.5417 12.2247C17.5853 12.0178 17.469 11.9094 17.2509 11.8946C17.091 11.8848 16.9262 11.8897 16.7663 11.9143C15.5451 12.1065 14.3141 12.2099 13.0784 12.2543C9.56977 12.3824 6.08055 12.1213 2.60103 11.6877C2.1988 11.6335 1.79172 11.5793 1.36042 11.5251Z"
                                            fill="currentColor" />
                                        <path
                                            d="M12.4482 4.14452C11.9879 4.11496 11.6729 3.85383 11.3288 3.64197C11.2367 3.58285 11.2125 3.51387 11.2125 3.40548C11.2076 3.11479 11.2125 2.81917 11.1592 2.5334C11.0332 1.87319 10.6164 1.4544 10.0106 1.21791C9.45817 1.00112 8.87664 0.961705 8.2951 1.00112C8.17879 1.01097 8.06248 1.06024 7.95587 1.11444C7.82018 1.18342 7.7281 1.12922 7.70387 1.01097C7.67479 0.843458 7.67964 0.666087 7.69418 0.493644C7.69902 0.454228 7.7911 0.390178 7.83956 0.395105C8.3581 0.429593 8.88148 0.449301 9.39033 0.53306C9.75863 0.592183 10.1318 0.705503 10.4662 0.868093C11.2512 1.2524 11.6341 1.93232 11.7213 2.79946C11.7407 3.0261 11.7504 3.25767 11.7649 3.47445C12.0072 3.48923 12.2205 3.48923 12.4337 3.52372C13.2139 3.65182 13.621 4.20857 13.5289 5.00674C13.3981 6.13008 12.5403 7.17953 11.4984 7.47514C9.96702 7.90379 8.29025 6.9184 8.17395 5.00181C8.1061 3.88339 8.97356 3.19362 10.0736 3.46953C10.3644 3.54343 10.6358 3.69617 10.9072 3.83412C11.1785 3.97208 11.4305 4.15437 11.7068 4.2874C11.9442 4.41057 12.1962 4.37609 12.4482 4.14452Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_3173_1608">
                                            <rect width="20" height="19.0476" fill="white"
                                                transform="translate(0.599609 0.400024)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="contact-desc">
                                <p class="mb-0 text-black fw-5">4 December 1995</p>
                            </div>
                        </div>
                        <div class="contact-box d-flex flex-sm-row flex-column align-items-center gap-3">
                            <div class="contact-icon d-flex justify-content-center align-items-center">
                                <svg width="18" height="24" viewBox="0 0 18 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1990_518)">
                                        <path
                                            d="M8.99374 19.6847C8.69236 19.3226 8.4028 18.979 8.11915 18.6322C6.58862 16.7439 5.14082 14.7906 3.88803 12.6887C3.32368 11.7446 2.83024 10.7633 2.40772 9.73866C1.63064 7.84726 1.7636 5.98682 2.62046 4.1852C3.72847 1.85732 5.54561 0.470506 8.00392 0.0835592C11.7859 -0.510791 15.3788 2.26904 15.9964 6.19732C16.1973 7.48508 16.0052 8.69236 15.5236 9.87487C14.9859 11.1936 14.2915 12.4194 13.5351 13.605C12.1848 15.7162 10.675 17.6943 9.06761 19.595C9.04988 19.6166 9.0292 19.6414 8.99374 19.6847ZM12.5482 6.80405C12.5512 4.75478 10.9557 3.08627 8.9967 3.08627C7.03478 3.08627 5.4422 4.75169 5.4422 6.80096C5.4422 8.85023 7.03478 10.5187 8.99374 10.5187C10.9527 10.5187 12.5453 8.85642 12.5482 6.80405Z"
                                            fill="currentColor" />
                                        <path
                                            d="M6.23156 17.1619C5.88881 17.2145 5.54902 17.264 5.21219 17.3259C4.19577 17.5086 3.20004 17.7655 2.26045 18.2267C1.89406 18.4094 1.54541 18.6199 1.25881 18.9263C0.797873 19.4216 0.797873 19.9293 1.27062 20.4153C1.67246 20.8301 2.17181 21.0716 2.68888 21.2821C3.69052 21.6845 4.73648 21.9043 5.79722 22.0529C7.25979 22.2603 8.73123 22.3098 10.2056 22.2355C11.8573 22.1519 13.4912 21.9352 15.0661 21.3719C15.5329 21.2047 15.988 21.0066 16.3898 20.697C16.57 20.5577 16.7444 20.3967 16.8832 20.2141C17.1521 19.8612 17.161 19.4681 16.8832 19.1245C16.6941 18.8892 16.4607 18.6756 16.2125 18.5084C15.5182 18.041 14.7381 17.7748 13.9404 17.5829C13.2785 17.425 12.6078 17.3228 11.94 17.1959C11.8809 17.1835 11.8248 17.1743 11.7657 17.165C11.875 16.9235 11.8957 16.9173 12.135 16.9359C13.1219 17.0164 14.1058 17.1278 15.072 17.3538C15.5979 17.4745 16.118 17.62 16.5937 17.8831C16.8921 18.0472 17.1876 18.2391 17.4328 18.4744C18.0622 19.0811 18.1744 19.9231 17.7726 20.7156C17.5569 21.1428 17.2407 21.4802 16.8803 21.7743C16.0943 22.4151 15.1991 22.8392 14.2595 23.1642C12.2828 23.8483 10.247 24.0743 8.17279 23.9814C6.58021 23.9071 5.02309 23.6378 3.51619 23.0744C2.58842 22.7277 1.70496 22.2943 0.948562 21.6133C0.617636 21.3161 0.33694 20.9694 0.159659 20.5453C-0.138766 19.8303 -0.00284963 19.0749 0.520131 18.5208C0.957426 18.0565 1.50995 17.7996 2.08612 17.5983C2.87502 17.3228 3.69052 17.1804 4.51192 17.0752C4.96695 17.0164 5.42197 16.9823 5.87995 16.9328C6.10155 16.9111 6.11928 16.9235 6.23156 17.1619Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1990_518">
                                            <rect width="18" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="contact-desc">
                                <p class="mb-0 text-black fw-5">Berlin - Germany</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="gallery-section pt-60 px-30">
                <div class="gallery-bg img-1">
                    <img src="{{ asset('assets/img/vcard36/gallery-bg-1.png') }}" alt="bg-vector" />
                </div>
                <div class="gallery-bg img-2">
                    <img src="{{ asset('assets/img/vcard36/gallery-bg-2.png') }}" alt="bg-vector" />
                </div>
                <div class="gallery-bg img-3">
                    <img src="{{ asset('assets/img/vcard36/gallery-bg-3.png') }}" alt="bg-vector" />
                </div>
                <div class="section-heading right-heading">
                    <h2 class="mb-0">Gallery</h2>
                </div>
                <div class="gallery-slider">
                    <div class="slide">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/img/vcard36/gallery-img1.png') }}" />
                            <a id="play-video" class="video-play-button" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20"
                                    fill="none">
                                    <path
                                        d="M16 10C16.0006 10.2612 15.9373 10.5181 15.8162 10.7457C15.6951 10.9733 15.5204 11.1639 15.3091 11.299L2.21091 19.7736C1.99008 19.9166 1.73715 19.9947 1.47825 19.9997C1.21935 20.0048 0.963868 19.9367 0.738182 19.8024C0.514645 19.6702 0.328433 19.4775 0.198694 19.2439C0.0689558 19.0104 0.000373507 18.7445 0 18.4736V1.52637C0.000373507 1.2555 0.0689558 0.989628 0.198694 0.756089C0.328433 0.52255 0.514645 0.329774 0.738182 0.197586C0.963868 0.063312 1.21935 -0.00480701 1.47825 0.000263782C1.73715 0.00533457 1.99008 0.0834115 2.21091 0.226431L15.3091 8.70102C15.5204 8.83609 15.6951 9.0267 15.8162 9.25432C15.9373 9.48195 16.0006 9.73883 16 10Z"
                                        fill="#171B1F" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/img/vcard36/gallery-img2.png') }}" />
                        </div>
                    </div>
                    <div class="slide">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/img/vcard36/gallery-img3.png') }}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-services-section pt-60">
                <div class="services-bg text-end">
                    <img src="{{ asset('assets/img/vcard36/services-bg.png') }}" alt="bg-vector" />
                </div>
                <div class="section-heading left-heading px-30">
                    <h2 class="mb-0">Our Services</h2>
                </div>
                <div class="service-slider">
                    <div>
                        <div class="service-card d-flex flex-sm-row flex-column gap-2">
                            <div class="card-img">
                                <img src="{{ asset('assets/img/vcard36/service-img.png') }}" class="w-100" />
                            </div>
                            <div class="card-body p-0">
                                <h3 class="card-title fs-18 text-black mb-1">
                                    Laptop
                                </h3>
                                <p class="mb-0 fs-12 text-gray-200">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type.
                                </p>
                                {{-- <p class="text-primary fs-20 mb-0 fw-5 text-end">$200</p> --}}
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="service-card d-flex flex-sm-row flex-column gap-2">
                            <div class="card-img">
                                <img src="{{ asset('assets/img/vcard36/service-img.png') }}" class="w-100" />
                            </div>
                            <div class="card-body p-0">
                                <h3 class="card-title fs-18 text-black mb-1">
                                    Laptop
                                </h3>
                                <p class="mb-0 fs-12 text-gray-200">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type.
                                </p>
                                {{-- <p class="text-primary fs-20 mb-0 fw-5 text-end">$200</p> --}}
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="service-card d-flex flex-sm-row flex-column gap-2">
                            <div class="card-img">
                                <img src="{{ asset('assets/img/vcard36/service-img.png') }}" class="w-100" />
                            </div>
                            <div class="card-body p-0">
                                <h3 class="card-title fs-18 text-black mb-1">
                                    Laptop
                                </h3>
                                <p class="mb-0 fs-12 text-gray-200">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type.
                                </p>
                                {{-- <p class="text-primary fs-20 mb-0 fw-5 text-end">$200</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="appointment-section pt-30">
                <div class="appointment-bg img-1">
                    <img src="{{ asset('assets/img/vcard36/appointment-bg-1.png') }}" alt="bg-vector" />
                </div>
                <div class="appointment-bg img-2 text-end">
                    <img src="{{ asset('assets/img/vcard36/appointment-bg-2.png') }}" alt="bg-vector" />
                </div>
                <div class="section-heading right-heading px-30">
                    <h2 class="mb-0">Make an Appointment</h2>
                </div>
                <div class="appointment px-30 pt-40 pb-40">
                    <div class="overlay"></div>
                    <div class="position-relative">
                        <form action="">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <input type="text" class="form-control appointment-input"
                                        placeholder="Pick a Date" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <div class="hour-input d-flex justify-content-center align-items-center">
                                        <span class="text-white">8:10 - 20:00</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="hour-input d-flex justify-content-center align-items-center">
                                        <span class="text-white">8:10 - 20:00</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="hour-input d-flex justify-content-center align-items-center">
                                        <span class="text-white">8:10 - 20:00</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="hour-input d-flex justify-content-center align-items-center">
                                        <span class="text-white">8:10 - 20:00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-1 mx-auto text-center">
                                <button class="btn btn-warning">
                                    Make an Appointment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="product-section pt-60 px-30">
                <div class="product-bg img-1">
                    <img src="{{ asset('assets/img/vcard36/product-bg-1.png') }}" alt="bg-vector" />
                </div>
                <div class="product-bg img-2 text-end">
                    <img src="{{ asset('assets/img/vcard36/product-bg-2.png') }}" alt="bg-vector" />
                </div>
                <div class="product-bg img-3 text-end">
                    <img src="{{ asset('assets/img/vcard36/product-bg-3.png') }}" alt="bg-vector" />
                </div>
                <div class="section-heading left-heading">
                    <h2 class="mb-0">Products</h2>
                </div>
                <div class="product-slider">
                    <div>
                        <div class="product-card card">
                            <div class="product-img card-img">
                                <img src="{{ asset('assets/img/vcard36/product-img1.png') }}"
                                    class="w-100 h-100 object-fit-cover" />
                            </div>
                            <div class="product-desc card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="text-black fs-18 fw-5 mb-1">
                                        Lorem Ipsum
                                    </h3>
                                    <p class="amount fs-6 mb-0 fw-5 text-end text-success">$125</p>
                                </div>
                                <div>
                                    <p class="fs-14 text-black mb-0">It is a long established</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="product-card card">
                            <div class="product-img card-img">
                                <img src="{{ asset('assets/img/vcard36/product-img2.png') }}"
                                    class="w-100 h-100 object-fit-cover" />
                            </div>
                            <div class="product-desc card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="text-black fs-18 fw-5 mb-1">
                                        Lorem Ipsum
                                    </h3>
                                    <p class="amount fs-6 mb-0 fw-5 text-end text-success">$125</p>
                                </div>
                                <div>
                                    <p class="fs-14 text-black mb-0">It is a long established</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-section pt-60 px-30">
                <div class="testimonial-bg img-1">
                    <img src="{{ asset('assets/img/vcard36/testimonial-bg-1.png') }}" alt="bg-vector" />
                </div>
                <div class="testimonial-bg img-2 text-end">
                    <img src="{{ asset('assets/img/vcard36/testimonial-bg-2.png') }}" alt="bg-vector" />
                </div>
                <div class="testimonial-bg img-3 text-end">
                    <img src="{{ asset('assets/img/vcard36/testimonial-bg-3.png') }}" alt="bg-vector" />
                </div>
                <div class="testimonial-bg img-4">
                    <img src="{{ asset('assets/img/vcard36/testimonial-bg-4.png') }}" alt="bg-vector" />
                </div>
                <div class="section-heading right-heading">
                    <h2 class="mb-0">Testimonial</h2>
                </div>
                <div class="testimonial-slider">
                    <div>
                        <div class="testimonial-card card">
                            <div class="quote-img quote-left">
                                <img src="{{ asset('assets/img/vcard36/quote-left.png') }}" alt="quote" />
                            </div>
                            <div class="quote-img quote-right">
                                <img src="{{ asset('assets/img/vcard36/quote-right.png') }}" alt="quote" />
                            </div>
                            <div class="card-body p-0">
                                <p class="desc text-gray-200 fs-14 mb-3 text-sm-start text-center">
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's
                                    standard dummy text.
                                </p>
                                <div
                                    class="d-flex align-items-center justify-content-sm-start justify-content-center gap-3">
                                    <div class="card-img testimonial-profile-img">
                                        <img src="{{ asset('assets/img/vcard36/testimonial-profile-img.png') }}"
                                            class="w-100 h-100 object-fit-cover" />
                                    </div>
                                    <div>
                                        <h3 class="text-black fs-16 fw-5 mb-0">Dianne Russell</h3>
                                        <p class="text-success fs-12 mb-0">- Customer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="testimonial-card card">
                            <div class="quote-img quote-left">
                                <img src="{{ asset('assets/img/vcard36/quote-left.png') }}" alt="quote" />
                            </div>
                            <div class="quote-img quote-right">
                                <img src="{{ asset('assets/img/vcard36/quote-right.png') }}" alt="quote" />
                            </div>
                            <div class="card-body p-0">
                                <p class="desc text-gray-200 fs-14 mb-3 text-sm-start text-center">
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's
                                    standard dummy text.
                                </p>
                                <div
                                    class="d-flex align-items-center justify-content-sm-start justify-content-center gap-3">
                                    <div class="card-img testimonial-profile-img">
                                        <img src="{{ asset('assets/img/vcard36/testimonial-profile-img.png') }}"
                                            class="w-100 h-100 object-fit-cover" />
                                    </div>
                                    <div>
                                        <h3 class="text-black fs-16 fw-5 mb-0">Dianne Russell</h3>
                                        <p class="text-success fs-12 mb-0">- Customer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-section pt-60">
                <div class="blog-bg-vector vector-1">
                    <img src="{{ asset('assets/img/vcard36/blog-bg-1.png') }}" alt="bg-vector" />
                </div>
                <div class="blog-bg-vector vector-2 text-end">
                    <img src="{{ asset('assets/img/vcard36/blog-bg-2.png') }}" alt="bg-vector" />
                </div>
                <div class="blog-bg img-1">
                    <img src="{{ asset('assets/img/vcard36/blog-bg1.png') }}" alt="bg" class="w-100" />
                </div>
                <div class="blog-bg img-2">
                    <img src="{{ asset('assets/img/vcard36/blog-bg2.png') }}" alt="bg" class="w-100" />
                </div>
                <div class="section-heading left-heading px-30">
                    <h2 class="mb-0 text-white">Blog</h2>
                </div>
                <div class="blog-slider pb-sm-0 pb-60 px-sm-0 px-30">
                    <div>
                        <div class="blog-card d-flex flex-sm-row flex-column align-items-sm-start align-items-center">
                            <div class="card-img">
                                <img src="{{ asset('assets/img/vcard36/blog-img.png') }}" class="w-100 h-100 object-fit-cover" />
                            </div>
                            <div class="card-body text-sm-start text-center">
                                <h2 class="fs-20 fw-5 text-white">
                                    Lorem Ipsum
                                </h2>
                                <p class="text-white blog-desc fs-14 mb-0">
                                    Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem
                                    Ipsum has been the industry's standard.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="blog-card d-flex flex-sm-row flex-column align-items-sm-start align-items-center">
                            <div class="card-img">
                                <img src="{{ asset('assets/img/vcard36/blog-img.png') }}" class="w-100 h-100 object-fit-cover" />
                            </div>
                            <div class="card-body text-sm-start text-center">
                                <h2 class="fs-20 fw-5 text-white">
                                    Lorem Ipsum
                                </h2>
                                <p class="text-white blog-desc fs-14 mb-0">
                                    Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem
                                    Ipsum has been the industry's standard.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="business-hour-section pt-60 px-30">
                <div class="hour-bg img-1">
                    <img src="{{ asset('assets/img/vcard36/hour-bg-1.png') }}" alt="bg-vector" />
                </div>
                <div class="hour-bg img-2">
                    <img src="{{ asset('assets/img/vcard36/hour-bg-2.png') }}" alt="bg-vector" />
                </div>
                <div class="section-heading right-heading">
                    <h2 class="mb-0 text-white">Business Hours</h2>
                </div>
                <div class="business-hour-card row justify-content-center position-relative">
                    <div class="col-sm-6 mb-3 pe-sm-2">
                        <div class="business-hour">
                            <span class="me-2">Sunday:</span>
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 ps-sm-2">
                        <div class="business-hour">
                            <span class="me-2">Monday:</span>
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 pe-sm-2">
                        <div class="business-hour">
                            <span class="me-2">Tueday:</span>
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 ps-sm-2">
                        <div class="business-hour">
                            <span class="me-2">Wednesday:</span>
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 pe-sm-2">
                        <div class="business-hour">
                            <span class="me-2">Thursday:</span>
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 ps-sm-2">
                        <div class="business-hour">
                            <span class="me-2">Friday:</span>
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="business-hour">
                            <span class="me-2">Saturday:</span>
                            <span>Closed</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="qr-code-section pt-60">
                <div class="qr-bg img-1">
                    <img src="{{ asset('assets/img/vcard36/qr-bg-1.png') }}" alt="bg-vector" />
                </div>
                <div class="qr-bg img-2 text-end">
                    <img src="{{ asset('assets/img/vcard36/qr-bg-2.png') }}" alt="bg-vector" />
                </div>
                <div class="section-heading left-heading px-30">
                    <h2 class="mb-0">QR Code</h2>
                </div>
                <div class="qr-code mx-auto position-relative pt-40 pb-40 px-30">
                    <div class="overlay"></div>
                    <div class="qr-code-img mx-auto position-relative mb-30">
                        <img src="{{ asset('assets/img/vcard36/qr-code-img.png') }}" class="w-100 h-100 object-fit-cover" />
                    </div>
                </div>
            </div>
            <div class="contact-us-section pt-60 px-30">
                <div class="contact-us-bg img-1">
                    <img src="{{ asset('assets/img/vcard36/contact-us-bg-1.png') }}" alt="bg-vector" />
                </div>
                <div class="contact-us-bg img-2 text-end">
                    <img src="{{ asset('assets/img/vcard36/contact-us-bg-2.png') }}" alt="bg-vector" />
                </div>
                <div class="contact-us-bg img-3">
                    <img src="{{ asset('assets/img/vcard36/contact-us-bg-3.png') }}" alt="bg-vector" />
                </div>
                <div class="section-heading right-heading">
                    <h2 class="mb-0">Contact Us</h2>
                </div>
                <div class="contact-form">
                    <form action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Full Name" />
                            </div>
                            <div class="col-sm-6">
                                <input type="tel" class="form-control" placeholder="Phone Number" />
                            </div>
                            <div class="col-12">
                                <input type="email" class="form-control" placeholder="Email Address" />
                            </div>

                            <div class="col-12 mb-30">
                                <textarea class="form-control mb-0 h-100" placeholder="Your Message"
                                    rows="4"></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-warning" type="submit">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="create-vcard-section pt-60 pb-60 mb-5 px-30">
                <div class="create-vcard-bg img-1">
                    <img src="{{ asset('assets/img/vcard36/create-vcard-bg-1.png') }}" alt="bg-vector" />
                </div>
                <div class="create-vcard-bg img-2 text-end">
                    <img src="{{ asset('assets/img/vcard36/create-vcard-bg-2.png') }}" alt="bg-vector" />
                </div>
                <div class="section-heading left-heading">
                    <h2 class="mb-0">Create Your VCard</h2>
                </div>
                <div class="mb-5 pb-4">
                    <div class="vcard-link-card card mb-5 mx-sm-3">

                        <div class="d-flex align-items-center justify-content-center">
                            <a href="https://vcards.infyom.com/marlonbrasil"
                                class="text-white link-text fw-5">https://vcards.infyom.com/marlonbrasil</a>
                            <i class="icon fa-solid fa-arrow-up-right-from-square ms-3 text-warning"></i>
                        </div>
                    </div>

                </div>

            </div>
            <div class="add-to-contact-section">
                <div class="text-center">
                    <button class="btn btn-warning">Add to Contact</button>
                </div>
            </div>
            <div class="vcard-bg">
                <img src="{{ asset('assets/img/vcard36/vcard-bg.png') }}" alt="bg" class="w-100" />
            </div>
        </div>
    </div>
</body>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="{{ asset('assets/js/front-third-party.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>
<script>
    $().ready(function () {
        $(".gallery-slider").slick({
            arrows: true,
            infinite: true,
            dots: false,
            slidesToShow: 1,
            autoplay: false,
            infinite: false,
            prevArrow:
                '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-arrow-left"></i></button>',
            nextArrow:
                '<button class="slide-arrow next-arrow"><i class="fa-solid fa-arrow-right"></button>',
            responsive: [

                {
                    breakpoint: 575,
                    settings: {
                        dots: true,
                        arrows: false,
                    },
                },

            ],
        });
        $(".product-slider").slick({
            arrows: false,
            infinite: true,
            dots: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            prevArrow:
                '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-arrow-left"></i></button>',
            nextArrow:
                '<button class="slide-arrow next-arrow"><i class="fa-solid fa-arrow-right"></i></button>',
            responsive: [
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                    },
                },
            ],
        });
        $(".testimonial-slider").slick({
            arrows: false,
            infinite: true,
            dots: false,
            slidesToShow: 1,
            autoplay: true,
            prevArrow:
                '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-arrow-left"></i></button>',
            nextArrow:
                '<button class="slide-arrow next-arrow"><i class="fa-solid fa-arrow-right"></i></button>',
            responsive: [
                {
                    breakpoint: 575,
                    settings: {
                        arrows: false,
                        dots: true,
                    },
                },
            ],
        });
        $(".blog-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            infinite: true,
            autoplay: true,
            prevArrow:
                '<button class="slide-arrow slick-prev prev-arrow"><i class="fa-solid fa-arrow-left"></i></button>',
            nextArrow:
                '<button class="slide-arrow slick-next next-arrow"><i class="fa-solid fa-arrow-right"></i></button>',
        });
        $(".service-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            infinite: true,
            autoplay: true,
            centerMode: true,
            centerPadding: '80px',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        centerPadding: '60px',
                    },
                },
                {
                    breakpoint: 575,
                    settings: {
                        centerMode: false,
                        centerPadding: '0',
                    },
                },
            ],
        });
    });
</script>

</html>
