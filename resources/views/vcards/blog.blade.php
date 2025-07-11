<html lang="en">

<head>
    <link>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>vcard</title>

    {{-- css link --}}
    <link rel="stylesheet" href="{{ asset('assets/css/vcard1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">

    {{-- font-awesome --}}
    <link href="{{ asset('backend/css/all.min.css') }}" rel="stylesheet">

    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body class="
    @if ($blog->vcard->template_id == 1)
            vcard-one-body
    @elseif($blog->vcard->template_id == 2)
            vcard-two-body
    @elseif($blog->vcard->template_id == 3)
            vcard-three-body
    @elseif($blog->vcard->template_id == 4)
            vcard-four-body
    @elseif($blog->vcard->template_id == 5)
            vcard-five-body
    @elseif($blog->vcard->template_id == 6)
            vcard-six-body
    @elseif($blog->vcard->template_id == 7)
            vcard-seven-body
    @elseif($blog->vcard->template_id == 8)
            vcard-eight-body
    @elseif($blog->vcard->template_id == 9)
            vcard-nine-body
    @elseif($blog->vcard->template_id == 10)
            vcard-ten-body
    @elseif($blog->vcard->template_id == 12)
            vcard-twelve-body
    @elseif($blog->vcard->template_id == 13)
            vcard-thirteen-body
    @elseif($blog->vcard->template_id == 14)
            vcard-fourteen-body
    @elseif($blog->vcard->template_id == 15)
            vcard-fifteen-body
    @elseif($blog->vcard->template_id == 16)
            vcard-sixteen-body
    @elseif($blog->vcard->template_id == 17)
            vcard-seventeen-body
    @elseif($blog->vcard->template_id == 18)
            vcard-eighteen-body
    @elseif($blog->vcard->template_id == 19)
            vcard-nineteen-body
    @elseif($blog->vcard->template_id == 20)
            vcard-twenty-body
    @elseif($blog->vcard->template_id == 21)
            vcard-twentyone-body
    @elseif($blog->vcard->template_id == 22)
            vcard-twentytwo-body
    @elseif($blog->vcard->template_id == 23)
            vcard-twentythree-body
    @elseif($blog->vcard->template_id == 24)
            vcard-twentyfour-body
    @elseif($blog->vcard->template_id == 25)
            vcard-twentyfive-body
    @elseif($blog->vcard->template_id == 26)
            vcard-twentysix-body
    @elseif($blog->vcard->template_id == 27)
            vcard-twentyseven-body
    @elseif($blog->vcard->template_id == 28)
            vcard-twentyeight-body
    @elseif($blog->vcard->template_id == 29)
            vcard-twentynine-body
    @elseif($blog->vcard->template_id == 30)
            vcard-thirty-body
    @elseif($blog->vcard->template_id == 31)
            vcard-thirtyone-body
    @elseif($blog->vcard->template_id == 32)
            vcard-thirtytwo-body
    @elseif($blog->vcard->template_id == 33)
            vcard-thirtythree-body
    @elseif($blog->vcard->template_id == 34)
            vcard-thirtyfour-body
    @elseif($blog->vcard->template_id == 35)
            vcard-thirtyfive-body
    @elseif($blog->vcard->template_id == 36)
            vcard-thirtysix-body
    @elseif($blog->vcard->template_id == 37)
            vcard-thirtyseven-body
    @endif">

    <div class="w-100 h-100 position-absolute top-0
    @if ($blog->vcard->template_id == 1)
            vcard-one-effect
    @elseif($blog->vcard->template_id == 2)
            vcard-two-effect
    @elseif($blog->vcard->template_id == 3)
            vcard-three-effect
    @elseif($blog->vcard->template_id == 4)
            vcard-four-effect
    @elseif($blog->vcard->template_id == 5)
            vcard-five-effect
    @elseif($blog->vcard->template_id == 6)
            vcard-six-effect
    @elseif($blog->vcard->template_id == 7)
            vcard-seven-effect
    @elseif($blog->vcard->template_id == 8)
            vcard-eight-effect
    @elseif($blog->vcard->template_id == 9)
            vcard-nine-effect
    @elseif($blog->vcard->template_id == 10)
            vcard-ten-effect
    @elseif($blog->vcard->template_id == 12)
            vcard-twelve-effect
    @elseif($blog->vcard->template_id == 13)
            vcard-thirteen-effect
    @elseif($blog->vcard->template_id == 14)
            vcard-fourteen-effect
    @elseif($blog->vcard->template_id == 15)
            vcard-fifteen-effect
    @elseif($blog->vcard->template_id == 16)
            vcard-sixteen-effect
    @elseif($blog->vcard->template_id == 17)
            vcard-seventeen-effect
    @elseif($blog->vcard->template_id == 18)
            vcard-eighteen-effect
    @elseif($blog->vcard->template_id == 19)
            vcard-nineteen-effect
    @elseif($blog->vcard->template_id == 20)
            vcard-twenty-effect
    @elseif($blog->vcard->template_id == 21)
            vcard-twentyone-effect
    @elseif($blog->vcard->template_id == 22)
            vcard-twentytwo-effect
    @elseif($blog->vcard->template_id == 23)
            vcard-twentythree-effect
    @elseif($blog->vcard->template_id == 24)
            vcard-twentyfour-effect
    @elseif($blog->vcard->template_id == 25)
            vcard-twentyfive-effect
    @elseif($blog->vcard->template_id == 26)
            vcard-twentysix-effect
    @elseif($blog->vcard->template_id == 27)
            vcard-twentyseven-effect
    @elseif($blog->vcard->template_id == 28)
            vcard-twentyeight-effect
    @elseif($blog->vcard->template_id == 29)
            vcard-twentynine-effect
    @elseif($blog->vcard->template_id == 30)
            vcard-thirty-effect
    @elseif($blog->vcard->template_id == 31)
            vcard-thirtyone-effect
    @elseif($blog->vcard->template_id == 32)
            vcard-thirtytwo-effect
    @elseif($blog->vcard->template_id == 33)
            vcard-thirtythree-effect
    @elseif($blog->vcard->template_id == 34)
            vcard-thirtyfour-effect
    @elseif($blog->vcard->template_id == 35)
            vcard-thirtyfive-effect
    @elseif($blog->vcard->template_id == 36)
            vcard-thirtysix-effect
    @elseif($blog->vcard->template_id == 37)
            vcard-thirtyseven-effect
    @endif">
            @if ($blog->vcard->template_id == 12)
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
         @if ($blog->vcard->template_id == 14)
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
        {{-- @dd(getLanguage($blog->vcard)== 'Arabic') --}}
        <div class="main-content w-100 h-auto mx-auto position-relative
    @if ($blog->vcard->template_id == 1) vcard-one-bg
    @elseif($blog->vcard->template_id == 2)
            vcard-two-bg
    @elseif($blog->vcard->template_id == 3)
            vcard-three-bg
    @elseif($blog->vcard->template_id == 4)
            vcard-four-bg
    @elseif($blog->vcard->template_id == 5)
            vcard-five-bg
    @elseif($blog->vcard->template_id == 6)
            vcard-six-bg
    @elseif($blog->vcard->template_id == 7)
            vcard-seven-bg h-auto
    @elseif($blog->vcard->template_id == 8)
            vcard-eight-bg h-auto
    @elseif($blog->vcard->template_id == 9)
            vcard-nine-bg
    @elseif($blog->vcard->template_id == 10)
            vcard-ten-bg
    @elseif($blog->vcard->template_id == 13)
           vcard-thirteen-bg
    @elseif($blog->vcard->template_id == 14)
           vcard-fourteen-bg
    @elseif($blog->vcard->template_id == 12)
            vcard-twelve-bg
    @elseif($blog->vcard->template_id == 15)
            vcard-fifteen-bg
    @elseif($blog->vcard->template_id == 16)
            vcard-sixteen-bg
    @elseif($blog->vcard->template_id == 17)
            vcard-seventeen-bg
    @elseif($blog->vcard->template_id == 21)
            vcard-twentyone-bg
    @elseif($blog->vcard->template_id == 25)
            vcard-twentyfive-bg
    @elseif($blog->vcard->template_id == 22)
            vcard-twentytwo-bg h-auto
    @elseif($blog->vcard->template_id == 20)
            vcard-twenty-bg
    @elseif($blog->vcard->template_id == 18)
    vcard-eighteen-bg
    @elseif($blog->vcard->template_id == 19)
            vcard-nineteen-bg
    @elseif($blog->vcard->template_id == 26)
            vcard-twentysix-bg h-auto
    @elseif($blog->vcard->template_id == 28)
            vcard-twentyeight-bg h-auto
    @elseif($blog->vcard->template_id == 30)
            vcard-thirty-bg h-auto
    @elseif($blog->vcard->template_id == 29)
            vcard-twentynine-bg h-auto
    @elseif($blog->vcard->template_id == 23)
            vcard-twentythree-bg h-auto
    @elseif($blog->vcard->template_id == 24)
            vcard-twentyfour-bg h-auto
    @elseif($blog->vcard->template_id == 31)
            vcard-thirtyone-bg h-auto
    @elseif($blog->vcard->template_id == 32)
            vcard-thirtytwo-bg h-auto
    @elseif($blog->vcard->template_id == 34)
            vcard-thirtyfour-bg h-auto
    @elseif($blog->vcard->template_id == 33)
            vcard-thirtythree-bg h-auto
    @elseif($blog->vcard->template_id == 35)
            vcard-thirtyfive-bg h-auto
    @elseif($blog->vcard->template_id == 36)
            vcard-thirtysix-bg h-auto
    @elseif($blog->vcard->template_id == 37)
            vcard-thirtyseven-bg h-auto
    @elseif($blog->vcard->template_id == 27)
            vcard-twentyseven-bg h-auto @endif">
            <div class="vcard-one-main-section p-3">
                <div class="d-flex justify-content-between align-items-center pb-3" @if (getLanguage($blog->vcard) ==
                    'Arabic') dir="rtl" @endif>
                    <h2 class="blog-title
             @if ($blog->vcard->template_id == 1) vcard-one-title
            @elseif($blog->vcard->template_id == 2)
                        vcard-two-title
@elseif($blog->vcard->template_id == 3)
                        vcard-three-title
@elseif($blog->vcard->template_id == 4)
                        vcard-four-title
@elseif($blog->vcard->template_id == 5)
                        vcard-five-title
@elseif($blog->vcard->template_id == 6)
                        vcard-six-title
@elseif($blog->vcard->template_id == 7)
                        vcard-seven-title
@elseif($blog->vcard->template_id == 8)
                        vcard-eight-title
@elseif($blog->vcard->template_id == 9)
                        vcard-nine-title
@elseif($blog->vcard->template_id == 10)
                        vcard-ten-title
@elseif($blog->vcard->template_id == 13)
                   vcard-thirteen-title
@elseif($blog->vcard->template_id == 14)
                   vcard-fourteen-title
@elseif($blog->vcard->template_id == 12)
                    vcard-twelve-title
@elseif($blog->vcard->template_id == 15)
                        vcard-fifteen-title
@elseif($blog->vcard->template_id == 17)
                vcard-seventeen-title text-dark
@elseif($blog->vcard->template_id == 16)
                        vcard-sixteen-title
@elseif($blog->vcard->template_id == 21)
                        vcard-twentyone-title
@elseif($blog->vcard->template_id == 24)
                        vcard-twentyfour-title
@elseif($blog->vcard->template_id == 25)
                        vcard-twentyfive-title
@elseif($blog->vcard->template_id == 22)
                        vcard-twentytwo-title
@elseif($blog->vcard->template_id == 20)
vcard-twenty-title
@elseif($blog->vcard->template_id == 18)
                        vcard-eighteen-title
@elseif($blog->vcard->template_id == 19)
                        vcard-nineteen-title
@elseif($blog->vcard->template_id == 26)
                        vcard-twentysix-title
@elseif($blog->vcard->template_id == 28)
                        vcard-twentyeight-title
@elseif($blog->vcard->template_id == 30)
                        vcard-thirty-title
@elseif($blog->vcard->template_id == 29)
                        vcard-twentynine-title
@elseif($blog->vcard->template_id == 23)
                        vcard-twentythree-title
@elseif($blog->vcard->template_id == 31)
                        vcard-thirtyone-title
@elseif($blog->vcard->template_id == 32)
                        vcard-thirtytwo-title
@elseif($blog->vcard->template_id == 34)
                        vcard-thirtyfour-title
@elseif($blog->vcard->template_id == 33)
                        vcard-thirtythree-title
@elseif($blog->vcard->template_id == 35)
                        vcard-thirtyfive-title
@elseif($blog->vcard->template_id == 36)
                        vcard-thirtysix-title
@elseif($blog->vcard->template_id == 37)
                        vcard-thirtyseven-title
@elseif($blog->vcard->template_id == 27)
                        vcard-twentyseven-title @endif">
                        {{ $blog->title }}</h2>
                    <div class="blog-hover-btn">
                        <a class="btn d-none d-sm-block
                    @if ($blog->vcard->template_id == 1) vcard-one-back
                    @elseif($blog->vcard->template_id == 2)
                            vcard-two-back
                    @elseif($blog->vcard->template_id == 3)
                            vcard-three-back
                    @elseif($blog->vcard->template_id == 4)
                            vcard-four-back
                    @elseif($blog->vcard->template_id == 5)
                            vcard-five-back
                    @elseif($blog->vcard->template_id == 6)
                            vcard-six-back
                    @elseif($blog->vcard->template_id == 7)
                            vcard-seven-back
                    @elseif($blog->vcard->template_id == 8)
                            vcard-eight-back
                    @elseif($blog->vcard->template_id == 9)
                            vcard-nine-back
                    @elseif($blog->vcard->template_id == 10)
                            vcard-ten-back
                    @elseif($blog->vcard->template_id == 13)
                            vcard-thirteen-back
                    @elseif($blog->vcard->template_id == 14)
                            vcard-fourteen-back
                    @elseif($blog->vcard->template_id == 12)
                            vcard-twelve-back
                    @elseif($blog->vcard->template_id == 15)
                            vcard-fifteen-back
                    @elseif($blog->vcard->template_id == 17)
                            vcard-seventeen-back
                    @elseif($blog->vcard->template_id == 16)
                            vcard-sixteen-back
                    @elseif($blog->vcard->template_id == 21)
                            vcard-twentyone-back
                    @elseif($blog->vcard->template_id == 24)
                            vcard-twentyfour-back
                    @elseif($blog->vcard->template_id == 25)
                            vcard-twentyfive-back
                    @elseif($blog->vcard->template_id == 22)
                            vcard-twentytwo-back" data-button-style="{{ isset($dynamicVcard) ? $dynamicVcard->button_style : 'default' }}
                    @elseif($blog->vcard->template_id == 20)
                            vcard-twenty-back
                    @elseif($blog->vcard->template_id == 18)
                            vcard-eighteen-back
                    @elseif($blog->vcard->template_id == 19)
                            vcard-nineteen-back
                    @elseif($blog->vcard->template_id == 26)
                            vcard-twentysix-back
                    @elseif($blog->vcard->template_id == 28)
                            vcard-twentyeight-back
                    @elseif($blog->vcard->template_id == 30)
                            vcard-thirty-back
                    @elseif($blog->vcard->template_id == 29)
                            vcard-twentynine-back
                    @elseif($blog->vcard->template_id == 23)
                            vcard-twentythree-back
                    @elseif($blog->vcard->template_id == 31)
                            vcard-thirtyone-back
                    @elseif($blog->vcard->template_id == 32)
                            vcard-thirtytwo-back
                    @elseif($blog->vcard->template_id == 34)
                            vcard-thirtyfour-back
                    @elseif($blog->vcard->template_id == 36)
                            vcard-thirtysix-back
                    @elseif($blog->vcard->template_id == 33)
                            vcard-thirtythree-back
                    @elseif($blog->vcard->template_id == 35)
                            vcard-thirtyfive-back
                    @elseif($blog->vcard->template_id == 37)
                            vcard-thirtyseven-back text-white
                    @elseif($blog->vcard->template_id == 27)
                            vcard-twentyseven-back @endif" href="{{ url()->previous() }}" role="button">
                            {{ __('messages.common.back') }}
                        </a>
                    </div>
                </div>

                <div class="img-bx
            @if ($blog->vcard->template_id == 1) vcard-one-img-bx
            @elseif($blog->vcard->template_id == 2)
                    vcard-two-img-bx
            @elseif($blog->vcard->template_id == 3)
                    vcard-three-img-bx
            @elseif($blog->vcard->template_id == 4)
                    vcard-four-img-bx
            @elseif($blog->vcard->template_id == 5)
                    vcard-five-img-bx
            @elseif($blog->vcard->template_id == 6)
                    vcard-six-img-bx
            @elseif($blog->vcard->template_id == 7)
                    vcard-seven-img-bx
            @elseif($blog->vcard->template_id == 8)
                    vcard-eight-img-bx
            @elseif($blog->vcard->template_id == 9)
                    vcard-nine-img-bx
            @elseif($blog->vcard->template_id == 10)
                    vcard-ten-img-bx
            @elseif($blog->vcard->template_id == 13)
                    vcard-thirteen-img-bx
            @elseif($blog->vcard->template_id == 14)
                    vcard-fourteen-img-bx
            @elseif($blog->vcard->template_id == 12)
                    vcard-twelve-img-bx
            @elseif($blog->vcard->template_id == 13)
                    vcard-thirteen-img-bx
            @elseif($blog->vcard->template_id == 15)
                    vcard-fifteen-img-bx
            @elseif($blog->vcard->template_id == 17)
                    vcard-seventeen-img-bx
            @elseif($blog->vcard->template_id == 16)
                     vcard-sixteen-img-bx
            @elseif($blog->vcard->template_id == 21)
                     vcard-twentyone-img-bx
            @elseif($blog->vcard->template_id == 24)
                     vcard-twentyfour-img-bx
            @elseif($blog->vcard->template_id == 25)
                     vcard-twentyfive-img-bx
            @elseif($blog->vcard->template_id == 22)
                     vcard-twentytwo-img-bx
            @elseif($blog->vcard->template_id == 18)
                     vcard-eighteen-img-bx
            @elseif($blog->vcard->template_id == 19)
                     vcard-nineteen-img-bx
            @elseif($blog->vcard->template_id == 20)
                    vcard-twenty-img-bx
            @elseif($blog->vcard->template_id == 26)
                    vcard-twentysix-img-bx
            @elseif($blog->vcard->template_id == 28)
                    vcard-twentyeight-img-bx
            @elseif($blog->vcard->template_id == 30)
                    vcard-thirty-img-bx
            @elseif($blog->vcard->template_id == 29)
                    vcard-twentynine-img-bx
            @elseif($blog->vcard->template_id == 23)
                    vcard-twentythree-img-bx
            @elseif($blog->vcard->template_id == 31)
                    vcard-thirtyone-img-bx
            @elseif($blog->vcard->template_id == 32)
                    vcard-thirtytwo-img-bx
            @elseif($blog->vcard->template_id == 34)
                    vcard-thirtyfour-img-bx
            @elseif($blog->vcard->template_id == 34)
                    vcard-thirtysix-img-bx
            @elseif($blog->vcard->template_id == 33)
                    vcard-thirtythree-img-bx
            @elseif($blog->vcard->template_id == 35)
                    vcard-thirtyfive-img-bx
            @elseif($blog->vcard->template_id == 37)
                    vcard-thirtyseven-img-bx
            @elseif($blog->vcard->template_id == 27)
                    vcard-twentyseven-img-bx @endif">
                    <img src="{{ $blog->blog_icon }}" />
                </div>
                <div class="details mt-4" @if (getLanguage($blog->vcard->default_language) == 'Arabic') dir="rtl" @endif>
                    <p class="fw-light">{!! $blog->description !!}</p>
                    <div class="blog-hover-btn-mobile fw-light d-flex align-items-center justify-content-center d-sm-none">
                        <a class="btn float-end
                    @if ($blog->vcard->template_id == 1) vcard-one-back
                    @elseif($blog->vcard->template_id == 2)
                            vcard-two-back
                    @elseif($blog->vcard->template_id == 3)
                            vcard-three-back
                    @elseif($blog->vcard->template_id == 4)
                            vcard-four-back
                    @elseif($blog->vcard->template_id == 5)
                            vcard-five-back
                    @elseif($blog->vcard->template_id == 6)
                            vcard-six-back
                    @elseif($blog->vcard->template_id == 7)
                            vcard-seven-back
                    @elseif($blog->vcard->template_id == 8)
                            vcard-eight-back
                    @elseif($blog->vcard->template_id == 9)
                            vcard-nine-back
                    @elseif($blog->vcard->template_id == 10)
                            vcard-ten-back
                    @elseif($blog->vcard->template_id == 13)
                            vcard-thirteen-back
                    @elseif($blog->vcard->template_id == 14)
                            vcard-fourteen-back
                    @elseif($blog->vcard->template_id == 12)
                            vcard-twelve-back
                    @elseif($blog->vcard->template_id == 15)
                            vcard-fifteen-back
                    @elseif($blog->vcard->template_id == 17)
                            vcard-seventeen-back
                    @elseif($blog->vcard->template_id == 16)
                            vcard-sixteen-back
                    @elseif($blog->vcard->template_id == 21)
                            vcard-twentyone-back
                    @elseif($blog->vcard->template_id == 24)
                            vcard-twentyfour-back
                    @elseif($blog->vcard->template_id == 25)
                            vcard-twentyfive-back
                    @elseif($blog->vcard->template_id == 22)
                    vcard-twentytwo-back" data-button-style="{{ isset($dynamicVcard) ? $dynamicVcard->button_style : 'default' }}
                    @elseif($blog->vcard->template_id == 20)
                            vcard-twenty-back
                    @elseif($blog->vcard->template_id == 18)
                            vcard-eighteen-back
                    @elseif($blog->vcard->template_id == 19)
                            vcard-nineteen-back
                    @elseif($blog->vcard->template_id == 26)
                            vcard-twentysix-back
                    @elseif($blog->vcard->template_id == 28)
                            vcard-twentyeight-back
                    @elseif($blog->vcard->template_id == 30)
                            vcard-thirty-back
                    @elseif($blog->vcard->template_id == 29)
                            vcard-twentynine-back
                    @elseif($blog->vcard->template_id == 23)
                            vcard-twentythree-back
                    @elseif($blog->vcard->template_id == 31)
                            vcard-thirtyone-back
                    @elseif($blog->vcard->template_id == 32)
                            vcard-thirtytwo-back
                    @elseif($blog->vcard->template_id == 34)
                            vcard-thirtyfour-back
                    @elseif($blog->vcard->template_id == 34)
                            vcard-thirtysix-back
                    @elseif($blog->vcard->template_id == 33)
                            vcard-thirtythree-back
                    @elseif($blog->vcard->template_id == 35)
                            vcard-thirtyfive-back
                    @elseif($blog->vcard->template_id == 37)
                            vcard-thirtyseven-back text-white
                    @elseif($blog->vcard->template_id == 27)
                            vcard-twentyseven-back @endif" href="{{ url()->previous() }}" role="button">
                            {{ __('messages.common.back') }}
                        </a>
                    </div>
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

            document.documentElement.style.setProperty('--primary-color', primaryColor);
            document.documentElement.style.setProperty('--green-100', backColor);
            document.documentElement.style.setProperty('--green', backSecondColor);
            document.documentElement.style.setProperty('--black', buttonTextColor);
            document.documentElement.style.setProperty('--gray-100', textDescriptionColor);
            document.documentElement.style.setProperty('--white', textLabelColor);

        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            var buttonStyle = @json($dynamicVcard->button_style ?? null);
            applyButtonStyle(buttonStyle);
        });

        function applyButtonStyle(buttonStyle) {
            const buttons = document.querySelectorAll('.vcard-twentytwo-back');
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
