@extends(homePageLayout())
@section('title')
    {{ __('Shipping & Delivery Policy') }}
@endsection
@section('content')
    <section class="@if(getSuperAdminSettingValue('home_page_theme') == 3) mt-4 mb-4 @else top-margin-privacy @endif">
        <div class="container p-t-100 padding-top-0 @if(getSuperAdminSettingValue('home_page_theme') == 3) prose max-w-7xl @endif">
            <div class="mt-100 px-2">{!! $setting['shipping_delivery'] !!}</div>
        </div>
    </section>
@endsection
