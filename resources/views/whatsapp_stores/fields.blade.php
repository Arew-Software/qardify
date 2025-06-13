<?php ?>
@if ($partName == 'basics')
    @if (isset($whatsappStore))
        {!! Form::open([
            'route' => ['whatsapp.stores.update', $whatsappStore->id],
            'method' => 'post',
            'files' => 'true',
        ]) !!}
    @endif
    <input type="hidden" name="part" value="{{ $partName }}">
    <div class="container-fluid">
        <div class="row" id="basic">
            <div class="col-lg-6 mb-7">
                {{ Form::label('url_alias', __('messages.whatsapp_stores.store_unique_alias') . ':', ['class' => 'form-label required']) }}
                <div class="d-sm-flex">
                    <div class="input-group">
                        {{ Form::text('url_alias', isset($whatsappStore) ? $whatsappStore->url_alias : null, [
                            'class' => 'form-control ms-1 vcard-url-alias',
                            'id' => 'vcard-url-alias',
                            'placeholder' => __('messages.whatsapp_stores.store_unique_alias'),
                        ]) }}
                        <button class="btn btn-secondary" type="button" id="generate-url-alias">
                            <i class="fa-solid fa-arrows-rotate"></i>
                        </button>
                    </div>
                </div>
                <div id="error-url-alias-msg" class="text-danger ms-2 fs-6 d-none fw-light">
                    {{ __('messages.vcard.already_alias_url') }}
                </div>
            </div>
            <div class="col-lg-6 mb-7">
                {{ Form::label('store_name', __('messages.whatsapp_stores.store_name') . ':', ['class' => 'form-label required']) }}
                {{ Form::text('store_name', isset($whatsappStore) ? $whatsappStore->store_name : null, ['class' => 'form-control ', 'placeholder' => __('messages.whatsapp_stores.store_name'), 'required']) }}
            </div>
            <div class="col-lg-6">
                <div class="form-group  mb-7">
                    {{ Form::label('whatsapp_no', __('messages.whatsapp_stores.whatsapp_no') . ':', ['class' => 'form-label required']) }}
                    {{ Form::text('whatsapp_no', isset($whatsappStore) ? (isset($whatsappStore->region_code) ? '+' . $whatsappStore->region_code . '' . $whatsappStore->whatsapp_no : $whatsappStore->whatsapp_no) : null, ['class' => 'form-control', 'placeholder' => __('messages.whatsapp_stores.whatsapp_no'), 'id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
                    {{ Form::hidden('region_code', isset($whatsappStore) ? $whatsappStore->region_code : null, ['id' => 'prefix_code']) }}
                    <div class="mt-2">
                        <span id="valid-msg"
                            class="text-success d-none fw-400 fs-small mt-2">{{ __('messages.placeholder.valid_number') }}</span>
                        <span id="error-msg" class="text-danger d-none fw-400 fs-small mt-2">Invalid
                            Number</span>
                    </div>
                </div>
                <div class="mb-7">
                    {{ Form::label('address', __('messages.setting.address') . ':', ['class' => 'form-label required']) }}
                    {{ Form::textarea('address', isset($whatsappStore) ? $whatsappStore->address : null, ['class' => 'form-control ', 'placeholder' => __('messages.setting.address'), 'required', 'rows' => 4]) }}
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-7">
                <div class="mb-3" io-image-input="true">
                    <label for="exampleInputImage"
                        class="form-label required">{{ __('messages.nfc.logo') . ':' }}</label>
                    <span data-bs-toggle="tooltip" data-placement="top"
                        data-bs-original-title="{{ __('messages.tooltip.app_logo') }}">
                        <i class="fas fa-question-circle ml-1 general-question-mark"></i>
                    </span>
                    <div class="d-block">
                        <div class="image-picker">
                            <div class="image previewImage" id="exampleInputImage"
                                style="background-image: url('{{ !empty($whatsappStore->logo_url) ? $whatsappStore->logo_url : '' }}')">
                            </div>
                            <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                data-placement="top"
                                data-bs-original-title="{{ __('messages.whatsapp_stores.change_logo') }}">
                                <label>
                                    <i class="fa-solid fa-pen"></i>
                                    <input type="file" id="logo" name="logo"
                                        class="image-upload file-validation d-none" accept="image/*" />
                                </label>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-text">{{ __('messages.allowed_file_types') }}</div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-7">
                <div class="mb-3" io-image-input="true">
                    <label for="exampleInputImage"
                        class="form-label required">{{ __('messages.vcard.cover_image') . ':' }}</label>
                    <span data-bs-toggle="tooltip" data-placement="top"
                        data-bs-original-title="{{ __('messages.tooltip.app_logo') }}">
                        <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"></i>
                    </span>
                    <div class="d-block">
                        <div class="images-picker">
                            <div class="image previewImage" id="coverPreview"
                                style="background-image: url('{{ !empty($whatsappStore->cover_url) ? $whatsappStore->cover_url : '' }}');">
                            </div>
                            <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                data-placement="top" data-bs-original-title="{{ __('messages.tooltip.cover') }}">
                                <label>
                                    <i class="fa-solid fa-pen click-image" id="profileImageIcon"></i>
                                    <input type="file" id="coverImg" name="cover_img" class="d-none"
                                        accept="image/*, video/*" />
                                </label>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-text">{{ __('messages.allowed_file_types') }}</div>
            </div>

            <div class="d-flex">
                {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3', 'id' => 'vcardSaveBtn']) }}
                <a href="{{ route('whatsapp.stores') }}"
                    class="btn btn-secondary">{{ __('messages.common.discard') }}</a>
            </div>
        </div>
    </div>

    {{ Form::close() }}
@endif

@if ($partName == 'whatsapp-template')
    <input type="hidden" id="whatsappStoreId" value="{{ $whatsappStore->id }}">
    <div class="container-fluid">
        <div class="col-lg-12 mb-3">
            <input type="hidden" name="part" value="{{ $partName }}">
            <label class="form-label required">{{ __('messages.vcard.select_template') }}
                :</label>
        </div>
        <div class="row">
            @foreach ($templates as $id => $url)
                <div class="col-12 col-md-6">
                    <div class="form-group mb-7">
                        <input type="hidden" name="template_id" id="themeInput"
                            value="{{ $whatsappStore->template_id }}" id="themeInput">
                        <div class="theme-img-radio img-thumbnail {{ $whatsappStore->template_id == $id ? 'img-border' : '' }}"
                            data-id="{{ $id }}">
                            <img src="{{ asset($url) }}" alt="Template" loading="lazy">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-lg-12 mt-2 d-flex">
            <button class="btn btn-primary me-3 wp-template-save">
                {{ __('messages.common.save') }}
            </button>
            <a href="{{ route('whatsapp.stores') }}"
                class="btn btn-secondary">{{ __('messages.common.discard') }}</a>
        </div>
    </div>
@endif

@if ($partName == 'order-details')
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
            <div class="row">
                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                    <label for="name"
                        class="pb-2 fs-4 text-gray-600">{{ __('messages.whatsapp_stores.order_id') }}:</label>
                    <span class="fs-4 text-gray-800">{{ $wpOrder->order_id }}</span>
                </div>
                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                    <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.mail.name') }}</label>
                    <span class="fs-4 text-gray-800">{{ $wpOrder->name }}</span>
                </div>
                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                    <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.user.phone') }}:</label>
                    <span class="fs-4 text-gray-800" dir="ltr"
                        style='{{ getCurrentLanguageName() == 'ar' ? 'margin-right: 0px; margin-left: auto;"' : '' }}'>+{{ $wpOrder->region_code }}
                        {{ $wpOrder->phone }}</span>
                </div>


                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                    <label for="name"
                        class="pb-2 fs-4 text-gray-600">{{ __('messages.setting.address') }}:</label>
                    <span class="fs-4 text-gray-800">{{ $wpOrder->address }}</span>
                </div>
                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                    <label for="name"
                        class="pb-2 fs-4 text-gray-600">{{ __('messages.vcard.order_at') }}:</label>
                    <span class="fs-4 text-gray-800">
                        {{ getFormattedDateTime($wpOrder->created_at) }}
                    </span>
                </div>
            </div>
        </div>
    </div>
@endif
