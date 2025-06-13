@extends('settings.edit')

@section('section')
    <div class="card w-100 ">
        <div class="card-body d-flex flex-column flex-md-row">
            @include('settings.setting_menu')
            <div class="w-100">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border shadow-sm h-100">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Primary Color</h5>
                            </div>
                            <div
                                class="card-body d-flex flex-column align-items-center justify-content-center text-center p-4">
                                <span class="fw-semibold mb-2">Select Primary Color</span>
                                <div class="primary-picker"></div>
                                <form action="{{ route('change.theme.color') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="color" id="primaryColor"
                                        value="{{$setting['primary_color'] ?? '' }}">
                                    <input type="hidden" name="check_color" value="1">
                                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border shadow-sm h-100">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Secondary Color</h5>
                            </div>
                            <div
                                class="card-body d-flex flex-column align-items-center justify-content-center text-center p-4">
                                <span class="fw-semibold mb-2">Select Secondary Color</span>
                                <div class="secondary-picker" style="height: 50px;width: 100px"></div>
                                <form action="{{ route('change.theme.color') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="color" id="secondaryColor"
                                        value="{{ $setting['secondary_color'] ?? '' }}">
                                    <input type="hidden" name="check_color" value="2">
                                    <button type="submit" class="btn btn-secondary mt-3 text-white">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
