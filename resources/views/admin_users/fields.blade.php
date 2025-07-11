<div class="row">
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::hidden('is_admin',true) }}
            {{ Form::label('first_name', __('messages.user.first_name').':', ['class' => 'form-label required']) }}
            {{ Form::text('first_name', isset($user) ? $user->first_name : null, ['class' => 'form-control', 'placeholder' => __('messages.form.first_name'), 'required', 'id' => 'userFirstName']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('last_name', __('messages.user.last_name').':', ['class' => 'form-label required']) }}
            {{ Form::text('last_name', isset($user) ? $user->last_name : null, ['class' => 'form-control', 'placeholder' => __('messages.form.last_name'), 'required', 'id' => 'userLastName']) }}
        </div>
    </div>
    <div class="col-lg-6 mb-5">
        {{ Form::label('email', __('messages.user.email').':', ['class' => 'form-label required']) }}
        {{ Form::email('email', isset($user) ? $user->email : null, ['class' => 'form-control check-email', 'placeholder' => __('messages.form.mail'), 'required']) }}
        <input type="hidden" id="originalEmail" value="{{ isset($user) ? $user->email : '' }}">
        <span id="email-error-msg" class="text-danger fw-400 fs-small mt-2"></span>
    </div>
    <div class="col-lg-6">
        {{ Form::label('contact', __('messages.user.contact_no').':', ['class' => 'form-label']) }}
        {{ Form::tel('contact', isset($user) && $user->contact ? '+'.$user->region_code.$user->contact : null, ['class' => 'form-control', 'placeholder' => __('messages.form.contact'), 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber']) }}
        {{ Form::hidden('region_code',isset($user) ? $user->region_code : null,['id'=>'prefix_code']) }}
        <p id="valid-msg"
           class="text-success d-none fw-400 fs-small mt-2">{{__('messages.placeholder.valid_number')}}</p>
        <p id="error-msg"
           class="text-danger d-none fw-400 fs-small mt-2">{{__('messages.placeholder.invalid_number')}}</p>
    </div>
    @if(!isset($user))
        <div class="col-lg-6 mb-5">
            <label class="form-label required">{{ __('messages.user.password').':' }}</label>
            <div class="mb-3 position-relative">
                <input class="form-control" id="password" type="password" name="password"
                       placeholder="{{__('messages.form.password')}}" autocomplete="off" required aria-label="Password"
                       data-toggle="password"/>
                <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                                <i class="bi bi-eye-slash-fill"></i>
                            </span>
            </div>
        </div>

        <div class="col-lg-6 mb-5">
            <label class="form-label required">{{ __('messages.user.confirm_password').':' }}</label>
            <div class="mb-3 position-relative">
                <input class="form-control " id="cPassword"
                       type="password" placeholder="{{__('messages.form.c_password')}}" name="password_confirmation"
                       autocomplete="off" required aria-label="Password" data-toggle="password"/>
                <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                                <i class="bi bi-eye-slash-fill"></i>
                            </span>
            </div>
        </div>
    @endif
    <div class="mb-3" io-image-input="true">
        <label for="exampleInputImage" class="form-label">{{__('auth.app.profile').':' }}</label>
        <span data-bs-toggle="tooltip" data-placement="top"
            data-bs-original-title="{{ __('messages.tooltip.profile_img') }}">
            <i class="fas fa-question-circle ml-1 general-question-mark"></i>
        </span>
        <div class="d-block">
            <div class="image-picker">
                <div class="image previewImage" id="exampleInputImage"
                     style="background-image: url('{{ !empty($user->profile_image) ? $user->profile_image : asset('web/media/avatars/user.png') }}')">
                </div>
                <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                      data-placement="top" data-bs-original-title="{{__('messages.tooltip.profile')}}">
                    <label>
                        <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                        <input type="file" id="profile_image" name="profile" class="image-upload file-validation d-none"
                               accept="image/*"/>
                    </label>
                </span>
            </div>
            <div class="form-text">{{__('messages.allowed_file_types')}}</div>
        </div>
    </div>
    <div>
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
        <a href="{{ route('admins.index') }}"
           class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>
</div>
