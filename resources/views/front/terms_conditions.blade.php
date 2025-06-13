@extends(homePageLayout())
@section('title')
    {!! __('messages.vcard.term_condition') !!}
@endsection
@section('content')
    <section class="@if(getSuperAdminSettingValue('home_page_theme') == 3) mt-5 mb-4 @else top-margin @endif" >
        <div class="container p-t-100 padding-top-0 @if(getSuperAdminSettingValue('home_page_theme') == 3) prose max-w-7xl @endif">
            <div class="mt-100">{!! $setting['terms_conditions'] !!}</div>
        </div>
    </section>
@endsection
