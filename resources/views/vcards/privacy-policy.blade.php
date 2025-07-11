<html lang="en">

<head>
    <link>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>{{ getAppName() }}</title>
    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">


    {{-- css link --}}
    @if (isset($privacyPolicy))
        @if ($privacyPolicy->vcard->template_id == 1)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard1.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 2)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard2.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 3)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard3.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 4)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard4.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 5)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard5.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 6)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard6.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 7)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard7.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 8)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard8.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 9)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard9.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 10)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard10.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 15)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard15.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 14)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard14.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 12)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard12.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 13)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard13.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 16)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard16.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 17)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard17.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 21)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard21.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 25)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard25.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 22)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard22.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 20)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard20.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 18)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard18.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 19)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard19.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 26)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard26.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 28)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard28.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 31)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard31.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 32)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard32.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 34)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard34.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 33)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard33.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 35)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard35.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 36)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard36.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 37)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard37.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 30)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard30.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 24)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard24.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 23)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard23.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 29)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard29.css') }}">
        @elseif($privacyPolicy->vcard->template_id == 27)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard27.css') }}">
        @endif
    @endif
    @if (isset($termCondition))
        @if ($termCondition->vcard->template_id == 1)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard1.css') }}">
        @elseif($termCondition->vcard->template_id == 2)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard2.css') }}">
        @elseif($termCondition->vcard->template_id == 3)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard3.css') }}">
        @elseif($termCondition->vcard->template_id == 4)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard4.css') }}">
        @elseif($termCondition->vcard->template_id == 5)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard5.css') }}">
        @elseif($termCondition->vcard->template_id == 6)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard6.css') }}">
        @elseif($termCondition->vcard->template_id == 7)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard7.css') }}">
        @elseif($termCondition->vcard->template_id == 8)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard8.css') }}">
        @elseif($termCondition->vcard->template_id == 9)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard9.css') }}">
        @elseif($termCondition->vcard->template_id == 10)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard10.css') }}">
        @elseif($termCondition->vcard->template_id == 12)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard12.css') }}">
        @elseif($termCondition->vcard->template_id == 15)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard15.css') }}">
        @elseif($termCondition->vcard->template_id == 13)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard13.css') }}">
        @elseif($termCondition->vcard->template_id == 14)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard14.css') }}">
        @elseif($termCondition->vcard->template_id == 16)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard16.css') }}">
        @elseif($termCondition->vcard->template_id == 17)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard17.css') }}">
        @elseif($termCondition->vcard->template_id == 21)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard21.css') }}">
        @elseif($termCondition->vcard->template_id == 25)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard25.css') }}">
        @elseif($termCondition->vcard->template_id == 22)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard22.css') }}">
        @elseif($termCondition->vcard->template_id == 20)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard20.css') }}">
        @elseif($termCondition->vcard->template_id == 18)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard18.css') }}">
        @elseif($termCondition->vcard->template_id == 19)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard19.css') }}">
        @elseif($termCondition->vcard->template_id == 26)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard26.css') }}">
        @elseif($termCondition->vcard->template_id == 28)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard28.css') }}">
        @elseif($termCondition->vcard->template_id == 31)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard31.css') }}">
        @elseif($termCondition->vcard->template_id == 32)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard32.css') }}">
        @elseif($termCondition->vcard->template_id == 34)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard34.css') }}">
        @elseif($termCondition->vcard->template_id == 33)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard33.css') }}">
        @elseif($termCondition->vcard->template_id == 35)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard35.css') }}">
        @elseif($termCondition->vcard->template_id == 36)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard36.css') }}">
        @elseif($termCondition->vcard->template_id == 37)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard37.css') }}">
        @elseif($termCondition->vcard->template_id == 30)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard30.css') }}">
        @elseif($termCondition->vcard->template_id == 24)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard24.css') }}">
        @elseif($termCondition->vcard->template_id == 23)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard23.css') }}">
        @elseif($termCondition->vcard->template_id == 29)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard29.css') }}">
        @elseif($termCondition->vcard->template_id == 27)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard27.css') }}">
        @endif
    @endif
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/custom-vcard.css') }}"> --}}
    {{-- slick slider --}}
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">

    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body class="
    @if ($privacyPolicy->vcard->template_id == 1)
            vcard-one-body
    @elseif($privacyPolicy->vcard->template_id == 2)
            vcard-two-body
    @elseif($privacyPolicy->vcard->template_id == 3)
            vcard-three-body
    @elseif($privacyPolicy->vcard->template_id == 4)
            vcard-four-body
    @elseif($privacyPolicy->vcard->template_id == 5)
            vcard-five-body
    @elseif($privacyPolicy->vcard->template_id == 6)
            vcard-six-body
    @elseif($privacyPolicy->vcard->template_id == 7)
            vcard-seven-body
    @elseif($privacyPolicy->vcard->template_id == 8)
            vcard-eight-body
    @elseif($privacyPolicy->vcard->template_id == 9)
            vcard-nine-body
    @elseif($privacyPolicy->vcard->template_id == 10)
            vcard-ten-body
    @elseif($privacyPolicy->vcard->template_id == 12)
            vcard-twelve-body
    @elseif($privacyPolicy->vcard->template_id == 13)
            vcard-thirteen-body
    @elseif($privacyPolicy->vcard->template_id == 14)
            vcard-fourteen-body
    @elseif($privacyPolicy->vcard->template_id == 15)
            vcard-fifteen-body
    @elseif($privacyPolicy->vcard->template_id == 16)
            vcard-sixteen-body
    @elseif($privacyPolicy->vcard->template_id == 17)
            vcard-seventeen-body
    @elseif($privacyPolicy->vcard->template_id == 18)
            vcard-eighteen-body
    @elseif($privacyPolicy->vcard->template_id == 19)
            vcard-nineteen-body
    @elseif($privacyPolicy->vcard->template_id == 20)
            vcard-twenty-body
    @elseif($privacyPolicy->vcard->template_id == 21)
            vcard-twentyone-body
    @elseif($privacyPolicy->vcard->template_id == 22)
            vcard-twentytwo-body
    @elseif($privacyPolicy->vcard->template_id == 23)
            vcard-twentythree-body
    @elseif($privacyPolicy->vcard->template_id == 24)
            vcard-twentyfour-body
    @elseif($privacyPolicy->vcard->template_id == 25)
            vcard-twentyfive-body
    @elseif($privacyPolicy->vcard->template_id == 26)
            vcard-twentysix-body
    @elseif($privacyPolicy->vcard->template_id == 27)
            vcard-twentyseven-body
    @elseif($privacyPolicy->vcard->template_id == 28)
            vcard-twentyeight-body
    @elseif($privacyPolicy->vcard->template_id == 29)
            vcard-twentynine-body
    @elseif($privacyPolicy->vcard->template_id == 30)
            vcard-thirty-body
    @elseif($privacyPolicy->vcard->template_id == 31)
            vcard-thirtyone-body
    @elseif($privacyPolicy->vcard->template_id == 32)
            vcard-thirtytwo-body
    @elseif($privacyPolicy->vcard->template_id == 33)
            vcard-thirtythree-body
    @elseif($privacyPolicy->vcard->template_id == 34)
            vcard-thirtyfour-body
    @elseif($privacyPolicy->vcard->template_id == 35)
            vcard-thirtyfive-body
    @elseif($privacyPolicy->vcard->template_id == 36)
            vcard-thirtysix-body
    @elseif($privacyPolicy->vcard->template_id == 37)
            vcard-thirtyseven-body
    @endif">
    <div
    class="w-100 h-100 position-absolute top-0
    @if ($privacyPolicy->vcard->template_id == 1)
            vcard-one-effect
    @elseif($privacyPolicy->vcard->template_id == 2)
            vcard-two-effect
    @elseif($privacyPolicy->vcard->template_id == 3)
            vcard-three-effect
    @elseif($privacyPolicy->vcard->template_id == 4)
            vcard-four-effect
    @elseif($privacyPolicy->vcard->template_id == 5)
            vcard-five-effect
    @elseif($privacyPolicy->vcard->template_id == 6)
            vcard-six-effect
    @elseif($privacyPolicy->vcard->template_id == 7)
            vcard-seven-effect
    @elseif($privacyPolicy->vcard->template_id == 8)
            vcard-eight-effect
    @elseif($privacyPolicy->vcard->template_id == 9)
            vcard-nine-effect
    @elseif($privacyPolicy->vcard->template_id == 10)
            vcard-ten-effect
    @elseif($privacyPolicy->vcard->template_id == 12)
            vcard-twelve-effect
    @elseif($privacyPolicy->vcard->template_id == 13)
            vcard-thirteen-effect
    @elseif($privacyPolicy->vcard->template_id == 14)
            vcard-fourteen-effect
    @elseif($privacyPolicy->vcard->template_id == 15)
            vcard-fifteen-effect
    @elseif($privacyPolicy->vcard->template_id == 16)
            vcard-sixteen-effect
    @elseif($privacyPolicy->vcard->template_id == 17)
            vcard-seventeen-effect
    @elseif($privacyPolicy->vcard->template_id == 18)
            vcard-eighteen-effect
    @elseif($privacyPolicy->vcard->template_id == 19)
            vcard-nineteen-effect
    @elseif($privacyPolicy->vcard->template_id == 20)
            vcard-twenty-effect
    @elseif($privacyPolicy->vcard->template_id == 21)
            vcard-twentyone-effect
    @elseif($privacyPolicy->vcard->template_id == 22)
            vcard-twentytwo-effect
    @elseif($privacyPolicy->vcard->template_id == 23)
            vcard-twentythree-effect
    @elseif($privacyPolicy->vcard->template_id == 24)
            vcard-twentyfour-effect
    @elseif($privacyPolicy->vcard->template_id == 25)
            vcard-twentyfive-effect
    @elseif($privacyPolicy->vcard->template_id == 26)
            vcard-twentysix-effect
    @elseif($privacyPolicy->vcard->template_id == 27)
            vcard-twentyseven-effect
    @elseif($privacyPolicy->vcard->template_id == 28)
            vcard-twentyeight-effect
    @elseif($privacyPolicy->vcard->template_id == 29)
            vcard-twentynine-effect
    @elseif($privacyPolicy->vcard->template_id == 30)
            vcard-thirty-effect
    @elseif($privacyPolicy->vcard->template_id == 31)
            vcard-thirtyone-effect
    @elseif($privacyPolicy->vcard->template_id == 32)
            vcard-thirtytwo-effect
    @elseif($privacyPolicy->vcard->template_id == 33)
            vcard-thirtythree-effect
    @elseif($privacyPolicy->vcard->template_id == 34)
            vcard-thirtyfour-effect
    @elseif($privacyPolicy->vcard->template_id == 35)
            vcard-thirtyfive-effect
    @elseif($privacyPolicy->vcard->template_id == 36)
            vcard-thirtysix-effect
    @elseif($privacyPolicy->vcard->template_id == 37)
            vcard-thirtyseven-effect
    @endif"
    >
    @if ($privacyPolicy->vcard->template_id == 12)
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
@endif
    @if ($privacyPolicy->vcard->template_id == 14)
<div class="bg-vectors">
    <div class="fireworks">
        @for ($i = 0; $i < 600; $i++)
            <div class="line">
                <div class="spark">
                    <div class="fire"></div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endif
</div>

    <div class="container">
        <div
            class="
        @if (isset($privacyPolicy)) @if ($privacyPolicy->vcard->template_id == 1)
            main-content mx-auto content-blur vcard-one
@elseif($privacyPolicy->vcard->template_id == 2)
            main-content mx-auto content-blur vcard-two
@elseif($privacyPolicy->vcard->template_id == 3)
            main-content mx-auto content-blur vcard-three
@elseif($privacyPolicy->vcard->template_id == 4)
            main-content mx-auto content-blur vcard
@elseif($privacyPolicy->vcard->template_id == 5)
            main-section  main-section-vcard5 mx-auto
@elseif($privacyPolicy->vcard->template_id == 6)
            main-section-vcard6  main-section d-flex justify-content-center
@elseif($privacyPolicy->vcard->template_id == 7)
            main-section-vcard7 main-section d-flex justify-content-center
@elseif($privacyPolicy->vcard->template_id == 8)
            main-content mx-auto content-blur vcard-eight
@elseif($privacyPolicy->vcard->template_id == 9)
            vcard-nine main-content w-100 mx-auto content-blur terms-policies-section
@elseif($privacyPolicy->vcard->template_id == 10)
            vcard-ten main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 12)
            vcard-twelve main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 15)
            vcard-fifteen main-content w-100  mx-auto
@elseif($privacyPolicy->vcard->template_id == 16)
            vcard-sixteen main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 17)
            vcard-seventeen main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 14)
            vcard-fourteen main-content w-100 mx-auto pt-5
@elseif($privacyPolicy->vcard->template_id == 13)
            main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 18)
            vcard-eighteen main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 19)
            vcard-nineteen main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 20)
vcard-twenty main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 22)
vcard22-main main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 21)
vcard-twentyone main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 26)
vcard-twentysix main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 28)
vcard-twentyeight main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 31)
vcard-thirtyone main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 32)
vcard-thirtytwo main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 34)
vcard-thirtyfour main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 36)
vcard-thirtysix main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 33)
vcard-thirtythree main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 35)
vcard-thirtyfive main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 37)
vcard-thirtyseven main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 30)
vcard-thirty main-content w-100 mx-auto text-dark
@elseif($privacyPolicy->vcard->template_id == 24)
vcard-twentyfour main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 23)
vcard-twentythree main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 25)
vcard-twentyfive main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 29)
vcard-twentynine main-content w-100 mx-auto
@elseif($privacyPolicy->vcard->template_id == 27)
vcard-twentyseven main-content w-100 mx-auto @endif
            @endif
@if (isset($termCondition)) @if ($termCondition->vcard->template_id == 1)
            main-content mx-auto content-blur vcard-one
@elseif($termCondition->vcard->template_id == 2)
            main-content mx-auto content-blur vcard-two
@elseif($termCondition->vcard->template_id == 3)
            main-content mx-auto content-blur vcard-three
@elseif($termCondition->vcard->template_id == 4)
            main-content mx-auto content-blur vcard
@elseif($termCondition->vcard->template_id == 5)
            main-section  main-section-vcard5 mx-auto
@elseif($termCondition->vcard->template_id == 6)
            main-section-vcard6  main-section d-flex justify-content-center
@elseif($termCondition->vcard->template_id == 7)
            main-section-vcard7 main-section d-flex justify-content-center
@elseif($termCondition->vcard->template_id == 8)
            main-content mx-auto content-blur vcard-eight
@elseif($termCondition->vcard->template_id == 9)
            vcard-nine main-content w-100 mx-auto content-blur terms-policies-section
@elseif($termCondition->vcard->template_id == 10)
            vcard-ten main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 12)
            vcard-twelve main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 15)
            vcard-fifteen main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 14)
            vcard-fourteen main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 13)
            main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 16)
            vcard-sixteen main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 17)
            vcard-seventeen main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 21)
            vcard-twentyone main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 25)
            vcard-twentyfive main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 22)
vcard22-main main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 20)
            vcard-twenty main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 18)
            vcard-eighteen main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 19)
            vcard-nineteen main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 26)
vcard-twentysix main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 28)
vcard-twentysix main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 31)
vcard-thirtyone main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 32)
vcard-thirtytwo main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 34)
vcard-thirtyfour main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 36)
vcard-thirtysix main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 33)
vcard-thirtythree main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 35)
vcard-thirtyfive main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 37)
vcard-thirtyseven main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 30)
vcard-thirty main-content w-100 mx-auto text-dark
@elseif($termCondition->vcard->template_id == 24)
            vcard-twentyfour main-content w-100 mx-auto

@elseif($termCondition->vcard->template_id == 23)
            vcard-twentythree main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 29)
            vcard-twentynine main-content w-100 mx-auto
@elseif($termCondition->vcard->template_id == 27)
            vcard-twentyseven main-content w-100 mx-auto @endif
    @endif
            ">
            <div
                class="
          @if (isset($privacyPolicy)) @if ($privacyPolicy->vcard->template_id == 1)
                 vcard-one__contact h-100
@elseif($privacyPolicy->vcard->template_id == 2)
                py-5 vcard-two__contact
@elseif($privacyPolicy->vcard->template_id == 3)
                py-5 vcard-three__contact
@elseif($privacyPolicy->vcard->template_id == 4)
                py-5 vcard__contact-us
@elseif($privacyPolicy->vcard->template_id == 5)
                main-bg vcard-five__contact py-5
@elseif($privacyPolicy->vcard->template_id == 6)
                main-bg vcard-six__contact py-5
@elseif($privacyPolicy->vcard->template_id == 7)
                main-bg vcard-seven__contact py-5
@elseif($privacyPolicy->vcard->template_id == 8)
                py-5 vcard-eight__contact
@elseif($privacyPolicy->vcard->template_id == 9)
                main-bg vcard-nine__contact py-5
@elseif($privacyPolicy->vcard->template_id == 10)
                vcard-ten__contact py-5
@elseif($privacyPolicy->vcard->template_id == 13)
                vcard-ten__contact py-5 @endif
        @endif
        @if (isset($termCondition)) @if ($termCondition->vcard->template_id == 1)
                 vcard-one__contact h-100
@elseif($termCondition->vcard->template_id == 2)
                py-5 vcard-two__contact
@elseif($termCondition->vcard->template_id == 3)
                py-5 vcard-three__contact
@elseif($termCondition->vcard->template_id == 4)
                py-5 vcard__contact-us
@elseif($termCondition->vcard->template_id == 5)
                main-bg vcard-five__contact py-5
@elseif($termCondition->vcard->template_id == 6)
                main-bg vcard-six__contact py-5
@elseif($termCondition->vcard->template_id == 7)
                main-bg vcard-seven__contact py-5
@elseif($termCondition->vcard->template_id == 8)
                py-5 vcard-eight__contact
@elseif($termCondition->vcard->template_id == 9)
                main-bg vcard-nine__contact py-5
@elseif($termCondition->vcard->template_id == 10)
                vcard-ten__contact py-5
@elseif($termCondition->vcard->template_id == 13)
                vcard-ten__contact py-5
@elseif($termCondition->vcard->template_id == 18)
                vcard-ten__contact py-5 @endif
        @endif">

                @if (!empty($privacyPolicy->privacy_policy))
                    <div class="container">
                        <h4
                            class="text-center py-4 heading-title
        @if ($privacyPolicy->vcard->template_id == 1) vcard-one-heading
@elseif($privacyPolicy->vcard->template_id == 2)
                            vcard-two-heading
@elseif($privacyPolicy->vcard->template_id == 3)
                            vcard-three-heading
@elseif($privacyPolicy->vcard->template_id == 4)
                            vcard__heading
@elseif($privacyPolicy->vcard->template_id == 5)
                            contact-heading
@elseif($privacyPolicy->vcard->template_id == 6)
                            vcard-six-heading
@elseif($privacyPolicy->vcard->template_id == 7)
                            vcard-seven-heading
@elseif($privacyPolicy->vcard->template_id == 8)
                            vcard-eight-heading
@elseif($privacyPolicy->vcard->template_id == 9)
                            heading-right
@elseif($privacyPolicy->vcard->template_id == 10)
                            vcard-ten-heading
@elseif($privacyPolicy->vcard->template_id == 12)
                            vcard-twelve-heading
@elseif($privacyPolicy->vcard->template_id == 13)
                            vcard-thirteen-heading
@elseif($privacyPolicy->vcard->template_id == 14)
vcard-fourteen-heading
@elseif($privacyPolicy->vcard->template_id == 15)
                            vcard-fifteen-heading
@elseif($privacyPolicy->vcard->template_id == 13)
                            vcard-thirteen-heading
@elseif($privacyPolicy->vcard->template_id == 16)
                            vcard-sixteen-heading pt-5
@elseif($privacyPolicy->vcard->template_id == 17)
                            vcard-seventeen-heading
@elseif($privacyPolicy->vcard->template_id == 21)
                            vcard-twentyone-heading
@elseif($privacyPolicy->vcard->template_id == 25)
                            vcard-twentyfive-heading
@elseif($privacyPolicy->vcard->template_id == 22)
                            vcard-twentytwo-heading
@elseif($privacyPolicy->vcard->template_id == 20)
                            vcard-twenty-heading
@elseif($privacyPolicy->vcard->template_id == 18)
                            vcard-eighteen-heading
@elseif($privacyPolicy->vcard->template_id == 24)
vcard-twentyfour-heading
@elseif($privacyPolicy->vcard->template_id == 19)
vcard-nineteen-heading
@elseif($privacyPolicy->vcard->template_id == 26)
                            vcard-twentysix-heading
@elseif($privacyPolicy->vcard->template_id == 28)
                            vcard-twentyeight-heading
@elseif($privacyPolicy->vcard->template_id == 31)
                            vcard-thirtyone-heading
@elseif($privacyPolicy->vcard->template_id == 32)
                            vcard-thirtytwo-heading
@elseif($privacyPolicy->vcard->template_id == 34)
                            vcard-thirtyfour-heading
@elseif($privacyPolicy->vcard->template_id == 36)
                            vcard-thirtysix-heading
@elseif($privacyPolicy->vcard->template_id == 33)
                            vcard-thirtythree-heading
@elseif($privacyPolicy->vcard->template_id == 35)
                            vcard-thirtyfive-heading
@elseif($privacyPolicy->vcard->template_id == 37)
                            vcard-thirtyseven-heading
@elseif($privacyPolicy->vcard->template_id == 30)
                            vcard-thirty-heading
@elseif($privacyPolicy->vcard->template_id == 23)
                            vcard-twentythree-heading
@elseif($privacyPolicy->vcard->template_id == 29)
                            vcard-twentynine-heading
@elseif($privacyPolicy->vcard->template_id == 27)
                            vcard-twentyseven-heading @endif">
                            {{ __('messages.vcard.privacy_policy') }}</h4>
                        <div class="card px-sm-3 px-2 py-md-5 py-3 m-3 card-back">
                            <div class="px-3">
                                {!! $privacyPolicy->privacy_policy !!}
                            </div>
                        </div>
                    </div>
                @endif
                @if (!empty($termCondition->term_condition))
                    <div class="container">
                        <h4
                            class="text-center py-4 heading-title
                    @if (isset($privacyPolicy)) @if ($privacyPolicy->vcard->template_id == 1)
                            vcard-one-heading
@elseif($privacyPolicy->vcard->template_id == 2)
                            vcard-two-heading
@elseif($privacyPolicy->vcard->template_id == 3)
                            vcard-three-heading
@elseif($privacyPolicy->vcard->template_id == 4)
                            vcard__heading
@elseif($privacyPolicy->vcard->template_id == 5)
                            contact-heading
@elseif($privacyPolicy->vcard->template_id == 6)
                            vcard-six-heading
@elseif($privacyPolicy->vcard->template_id == 7)
                            vcard-seven-heading
@elseif($privacyPolicy->vcard->template_id == 8)
                            vcard-eight-heading
@elseif($privacyPolicy->vcard->template_id == 9)
                            heading-left
@elseif($privacyPolicy->vcard->template_id == 10)
                            vcard-ten-heading
@elseif($privacyPolicy->vcard->template_id == 12)
                            vcard-twelve-heading
@elseif($privacyPolicy->vcard->template_id == 13)
vcard-thirteen-heading
@elseif($termCondition->vcard->template_id == 14)
vcard-fourteen-heading
@elseif($privacyPolicy->vcard->template_id == 15)
                         vcard-fifteen-heading
@elseif($privacyPolicy->vcard->template_id == 13)
                            vcard-thirteen-heading
@elseif($privacyPolicy->vcard->template_id == 16)
                            vcard-sixteen-heading
@elseif($privacyPolicy->vcard->template_id == 17)
                            vcard-seventeen-heading
@elseif($privacyPolicy->vcard->template_id == 21)
                             vcard-twentyone-heading
@elseif($privacyPolicy->vcard->template_id == 25)
                             vcard-twentyfive-heading
@elseif($privacyPolicy->vcard->template_id == 22)
                            vcard-twentytwo-heading
@elseif($privacyPolicy->vcard->template_id == 20)
                            vcard-twenty-heading
@elseif($privacyPolicy->vcard->template_id == 18)
                            vcard-eighteen-heading
@elseif($privacyPolicy->vcard->template_id == 19)
                            vcard-nineteen-heading
@elseif($privacyPolicy->vcard->template_id == 26)
                            vcard-twentysix-heading
@elseif($privacyPolicy->vcard->template_id == 28)
                            vcard-twentyeight-heading
@elseif($privacyPolicy->vcard->template_id == 31)
                            vcard-thirtyone-heading
@elseif($privacyPolicy->vcard->template_id == 32)
                            vcard-thirtytwo-heading
@elseif($privacyPolicy->vcard->template_id == 34)
                            vcard-thirtyfour-heading
@elseif($privacyPolicy->vcard->template_id == 36)
                            vcard-thirtysix-heading
@elseif($privacyPolicy->vcard->template_id == 33)
                            vcard-thirtythree-heading
@elseif($privacyPolicy->vcard->template_id == 35)
                            vcard-thirtyfive-heading
@elseif($privacyPolicy->vcard->template_id == 37)
                            vcard-thirtyseven-heading
@elseif($privacyPolicy->vcard->template_id == 30)
                            vcard-thirty-heading
@elseif($privacyPolicy->vcard->template_id == 24)
vcard-twentyfour-heading
 @elseif($privacyPolicy->vcard->template_id == 23)
                        vcard-twentythree-heading
 @elseif($privacyPolicy->vcard->template_id == 29)
                        vcard-twentynine-heading
 @elseif($privacyPolicy->vcard->template_id == 27)
                        vcard-twentyseven-heading @endif
                    @endif

                    @if (isset($termCondition)) @if ($termCondition->vcard->template_id == 1)
                            vcard-one-heading
@elseif($termCondition->vcard->template_id == 2)
                            vcard-two-heading
@elseif($termCondition->vcard->template_id == 3)
                            vcard-three-heading
@elseif($termCondition->vcard->template_id == 4)
                            vcard__heading
@elseif($termCondition->vcard->template_id == 5)
                            contact-heading
@elseif($termCondition->vcard->template_id == 6)
                            vcard-six-heading
@elseif($termCondition->vcard->template_id == 7)
                            vcard-seven-heading
@elseif($termCondition->vcard->template_id == 8)
                            vcard-eight-heading
@elseif($termCondition->vcard->template_id == 9)
                            heading-left
@elseif($termCondition->vcard->template_id == 10)
                            vcard-ten-heading
@elseif($termCondition->vcard->template_id == 12)
vcard-twelve-heading
@elseif($termCondition->vcard->template_id == 13)
vcard-thirteen-heading
@elseif($termCondition->vcard->template_id == 14)
vcard-fourteen-heading
@elseif($termCondition->vcard->template_id == 15)
                            vcard-fifteen-heading
@elseif($termCondition->vcard->template_id == 13)
                            vcard-thirteen-heading
@elseif($termCondition->vcard->template_id == 16)
                            vcard-sixteen-heading
@elseif($termCondition->vcard->template_id == 17)
                            vcard-seventeen-heading
@elseif($termCondition->vcard->template_id == 21)
                             vcard-twentyone-heading
@elseif($termCondition->vcard->template_id == 25)
                             vcard-twentyfive-heading
@elseif($termCondition->vcard->template_id == 22)
                            vcard-twentytwo-heading
@elseif($termCondition->vcard->template_id == 20)
                            vcard-twenty-heading
@elseif($termCondition->vcard->template_id == 18)
                            vcard-eighteen-heading
@elseif($termCondition->vcard->template_id == 19)
                            vcard-nineteen-heading
@elseif($termCondition->vcard->template_id == 26)
                            vcard-twentysix-heading
@elseif($termCondition->vcard->template_id == 28)
                            vcard-twentyeight-heading
@elseif($termCondition->vcard->template_id == 31)
                            vcard-thirtyone-heading
@elseif($termCondition->vcard->template_id == 32)
                            vcard-thirtytwo-heading
@elseif($termCondition->vcard->template_id == 34)
                            vcard-thirtyfour-heading
@elseif($termCondition->vcard->template_id == 36)
                            vcard-thirtysix-heading
@elseif($termCondition->vcard->template_id == 33)
                            vcard-thirtythree-heading
@elseif($termCondition->vcard->template_id == 35)
                            vcard-thirtyfive-heading
@elseif($termCondition->vcard->template_id == 37)
                            vcard-thirtyseven-heading
@elseif($termCondition->vcard->template_id == 30)
                            vcard-thirty-heading
@elseif($termCondition->vcard->template_id == 24)
                            vcard-twentyfour-heading
@elseif($termCondition->vcard->template_id == 23)
                            vcard-twentythree-heading
@elseif($termCondition->vcard->template_id == 29)
                            vcard-twentynine-heading
@elseif($termCondition->vcard->template_id == 27)
                            vcard-twentyseven-heading @endif
                    @endif
                            ">
                            {!! __('messages.vcard.term_condition') !!}</h4>
                        <div class="card px-sm-3 px-2 py-md-5 py-3 m-3 card-back">
                            <div class="px-3 ">
                                {!! $termCondition->term_condition !!}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="text-center mt-5 pb-5">
                    <a href="{{ $vcardUrl }}" class="text-decoration-none px-4 cursor-pointer terms-policies-btn
             @if (isset($privacyPolicy)) @if ($privacyPolicy->vcard->template_id == 1)
                        vcard-one-btn
@elseif($privacyPolicy->vcard->template_id == 2)
                        vcard-two-btn
@elseif($privacyPolicy->vcard->template_id == 3)
                        vcard-three-btn
@elseif($privacyPolicy->vcard->template_id == 4)
                        vcard-four-btn
@elseif($privacyPolicy->vcard->template_id == 5)
                        vcard-five-btn
@elseif($privacyPolicy->vcard->template_id == 6)
                        vcard-six-btn
@elseif($privacyPolicy->vcard->template_id == 7)
                        vcard-seven-btn text-dark
@elseif($privacyPolicy->vcard->template_id == 8)
                        vcard-eight-btn
@elseif($privacyPolicy->vcard->template_id == 9)
                        vcard-nine-btn
@elseif($privacyPolicy->vcard->template_id == 10)
                        vcard-ten-btn
@elseif($privacyPolicy->vcard->template_id == 12)
                        vcard-twelve-btn
@elseif($privacyPolicy->vcard->template_id == 13)
vcard-thirteen-btn text-dark
@elseif($privacyPolicy->vcard->template_id == 14)
vcard-fourteen-btn
@elseif($privacyPolicy->vcard->template_id == 15)
                        vcard-fifteen-btn
@elseif($privacyPolicy->vcard->template_id == 13)
                        vcard-thirteen-btn text-dark
@elseif($privacyPolicy->vcard->template_id == 16)
                        vcard-sixteen-btn
@elseif($privacyPolicy->vcard->template_id == 17)
                        vcard-seventeen-btn text-white
@elseif($privacyPolicy->vcard->template_id == 21)
                       vcard-twentyone-btn
@elseif($privacyPolicy->vcard->template_id == 25)
                       vcard-twentyfive-btn
@elseif($privacyPolicy->vcard->template_id == 22)
                       vcard-twentytwo-btn text-dark" data-button-style="{{ isset($dynamicVcard) ? $dynamicVcard->button_style : 'default' }}
@elseif($privacyPolicy->vcard->template_id == 20)
                        vcard-twenty-btn text-white
@elseif($privacyPolicy->vcard->template_id == 18)
                        vcard-eighteen-btn
@elseif($privacyPolicy->vcard->template_id == 19)
                        vcard-nineteen-btn text-dark
@elseif($privacyPolicy->vcard->template_id == 26)
                        vcard-twentytsix-btn text-dark
@elseif($privacyPolicy->vcard->template_id == 28)
                        vcard-twentyteight-btn text-light
@elseif($privacyPolicy->vcard->template_id == 31)
                        vcard-thirtyone-btn text-dark
@elseif($privacyPolicy->vcard->template_id == 32)
                        vcard-thirtytwo-btn text-dark
@elseif($privacyPolicy->vcard->template_id == 34)
                        vcard-thirtyfour-btn text-light
@elseif($privacyPolicy->vcard->template_id == 36)
                        vcard-thirtysix-btn text-dark
@elseif($privacyPolicy->vcard->template_id == 33)
                        vcard-thirtythree-btn text-dark
@elseif($privacyPolicy->vcard->template_id == 35)
                        vcard-thirtyfive-btn text-dark
@elseif($privacyPolicy->vcard->template_id == 37)
                        vcard-thirtyseven-btn text-white
@elseif($privacyPolicy->vcard->template_id == 30)
                        vcard-thirty-btn text-dark
@elseif($privacyPolicy->vcard->template_id == 24)
                        vcard-twentyfour-btn text-light
 @elseif($privacyPolicy->vcard->template_id == 23)
                        vcard-twentythree-btn text-dark
 @elseif($privacyPolicy->vcard->template_id == 29)
                        vcard-twentynine-btn text-dark
 @elseif($privacyPolicy->vcard->template_id == 27)
                        vcard-twentyseven-btn text-dark @endif
                @endif
                @if (isset($termCondition)) @if ($termCondition->vcard->template_id == 1)
                        vcard-one-btn
@elseif($termCondition->vcard->template_id == 2)
                        vcard-two-btn
@elseif($termCondition->vcard->template_id == 3)
                        vcard-three-btn
@elseif($termCondition->vcard->template_id == 4)
                        vcard-four-btn
@elseif($termCondition->vcard->template_id == 5)
                        vcard-five-btn
@elseif($termCondition->vcard->template_id == 6)
                        vcard-six-btn
@elseif($termCondition->vcard->template_id == 7)
                        vcard-seven-btn text-dark
@elseif($termCondition->vcard->template_id == 8)
                        vcard-eight-btn
@elseif($termCondition->vcard->template_id == 9)
                        vcard-nine-btn
@elseif($termCondition->vcard->template_id == 10)
                        vcard-ten-btn
@elseif($termCondition->vcard->template_id == 12)
                        vcard-twelve-btn
@elseif($termCondition->vcard->template_id == 13)
vcard-thirteen-btn text-dark
@elseif($termCondition->vcard->template_id == 14)
vcard-fourteen-btn
@elseif($termCondition->vcard->template_id == 15)
vcard-fifteen-btn
@elseif($termCondition->vcard->template_id == 16)
vcard-sixteen-btn
@elseif($termCondition->vcard->template_id == 17)
vcard-seventeen-btn
@elseif($termCondition->vcard->template_id == 21)
vcard-twentyone-btn
@elseif($termCondition->vcard->template_id == 25)
vcard-twentyfive-btn
@elseif($termCondition->vcard->template_id == 22)
vcard-twentytwo-btn" data-button-style="{{ isset($dynamicVcard) ? $dynamicVcard->button_style : 'default' }}
@elseif($termCondition->vcard->template_id == 20)
vcard-twenty-btn
@elseif($termCondition->vcard->template_id == 18)
vcard-eighteen-btn
@elseif($termCondition->vcard->template_id == 19)
vcard-nineteen-btn text-dark
@elseif($termCondition->vcard->template_id == 26)
vcard-twentytsix-btn text-dark
@elseif($termCondition->vcard->template_id == 28)
vcard-twentyeight-btn text-light
@elseif($termCondition->vcard->template_id == 31)
vcard-thirtyone-btn text-dark
@elseif($termCondition->vcard->template_id == 32)
vcard-thirtytwo-btn text-dark
@elseif($termCondition->vcard->template_id == 34)
vcard-thirtyfour-btn text-light
@elseif($termCondition->vcard->template_id == 36)
vcard-thirtysix-btn text-dark
@elseif($termCondition->vcard->template_id == 33)
vcard-thirtythree-btn text-dark
@elseif($termCondition->vcard->template_id == 35)
vcard-thirtyfive-btn text-dark
@elseif($termCondition->vcard->template_id == 37)
vcard-thirtyseven-btn text-white
@elseif($termCondition->vcard->template_id == 30)
vcard-thirty-btn text-dark
@elseif($termCondition->vcard->template_id == 23)
vcard-twentythree-btn text-dark
@elseif($termCondition->vcard->template_id == 29)
vcard-twentynine-btn text-dark
@elseif($termCondition->vcard->template_id == 24)
vcard-twentyfour-btn text-light
@elseif($termCondition->vcard->template_id == 27)
vcard-twentyseven-btn @endif
                @endif
                        ">{{ __('messages.common.back') }}</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var primaryColor = @json($dynamicVcard->primary_color ?? null);
            var backColor = @json($dynamicVcard->back_color ?? null);
            var backSecondColor = @json($dynamicVcard->back_seconds_color ?? null);
            var buttonTextColor = @json($dynamicVcard->button_text_color ?? null);
            var textDescriptionColor = @json($dynamicVcard->text_label_color ?? null);
            var textLabelColor = @json($dynamicVcard->text_description_color ?? null);
            var cardsBackColor = @json($dynamicVcard->cards_back ?? null);

            document.documentElement.style.setProperty('--primary-color', primaryColor);
            document.documentElement.style.setProperty('--green-100', backColor);
            document.documentElement.style.setProperty('--green', backSecondColor);
            document.documentElement.style.setProperty('--black', buttonTextColor);
            document.documentElement.style.setProperty('--gray-100', textDescriptionColor);
            document.documentElement.style.setProperty('--white', textLabelColor);
            document.documentElement.style.setProperty('--light', cardsBackColor);
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            var buttonStyle = @json($dynamicVcard->button_style ?? null);
            applyButtonStyle(buttonStyle);
        });

        function applyButtonStyle(buttonStyle) {
            const buttons = document.querySelectorAll('.vcard-twentytwo-btn');
            if (buttonStyle === 'default' || !buttonStyle) {
                buttonStyle = '1';
            }
            buttons.forEach(button => {
                button.classList.add(`dynamic-btn-${buttonStyle}`);
            });
        }
    </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
        const targets = document.querySelectorAll(".vcard-thirteen-effect");

        if (!tsParticles || targets.length === 0) return;

        targets.forEach((el) => {
          tsParticles.load(el, {
            fpsLimit: 60,
            particles: {
              number: {
                value: 60,
                density: {
                  enable: true,
                  area: 800
                }
              },
              color: { value: "#c9ecec" },
              shape: {
                type: "circle",
                stroke: { width: 0, color: "#000000" },
                polygon: { sides: 5 },
                image: {
                  src: "https://cdn.matteobruni.it/images/particles/github.svg",
                  width: 100,
                  height: 100
                }
              },
              opacity: {
                value: 1,
                animation: { enable: false }
              },
              size: {
                value: 7,
                random: { enable: true, minimumValue: 2 },
                animation: { enable: false }
              },
              lineLinked: {
                enable: false
              },
              move: {
                collisions: true,
                enable: true,
                speed: 0.5,
                out_mode: "bounce"
              }
            },
            interactivity: {
              detect_on: "canvas",
              events: {
                onClick: { enable: true, mode: "push" },
                resize: true
              },
              modes: {
                push: { particles_nb: 4 }
              }
            },
            detectRetina: true
          });
        });
      });
    </script>
</body>

</html>
