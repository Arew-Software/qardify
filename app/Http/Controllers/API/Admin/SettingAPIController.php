<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserSettingRequest;
use App\Models\Language;
use App\Models\ScheduleAppointment;
use App\Models\UserSetting;
use App\Models\Vcard;
use App\Repositories\UserSettingRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SettingAPIController extends AppBaseController
{
    /**
     * @var UserSettingRepository
     */
    private $userSettingRepository;

    /**
     * SettingController constructor.
     */
    public function __construct(UserSettingRepository $userSettingRepository)
    {
        $this->userSettingRepository = $userSettingRepository;
    }

    public function editSettings()
    {
        $setting = UserSetting::where('user_id', getLogInUserId())->pluck('value', 'key')->toArray();

        $language = Language::where('iso_code', getCurrentLanguageName())->value('name');

        $data[] = [
            'paypal_email' => $setting['paypal_email'] ?? '',
            'currency_id' => $setting['currency_id'] ?? '',
            'subscription_model_time' => $setting['subscription_model_time'] ?? '',
            'time_format' => $setting['time_format'] ?? '',
            'ask_details_before_downloading_contact' => $setting['ask_details_before_downloading_contact'] ?? '',
            'enable_attachment_for_inquiry' => $setting['enable_attachment_for_inquiry'] ?? '',
            'enable_pwa' => $setting['enable_pwa'] ?? '',
            'pwa_icon' => $setting['pwa_icon'] ?? '',
            'language' => $language ?? '',
        ];

        return $this->sendResponse($data, 'Setting data retrieved successfully.');
    }

    public function updateSettings(UpdateUserSettingRequest $request)
    {
        $input = $request->all();
        $id = Auth::id();
        $setting = UserSetting::where('user_id', getLogInUserId())->where('key', 'time_format')->first();
        $userVcards = Vcard::where('tenant_id', getLogInTenantId())->pluck('id')->toArray();
        $bookedAppointment = ScheduleAppointment::whereIn('vcard_id', $userVcards)->where(
            'status',
            ScheduleAppointment::PENDING
        )->count();
        if ($setting) {
            $timeFormat = $setting->value == UserSetting::HOUR_24 ? UserSetting::HOUR_24  : UserSetting::HOUR_12;
        }
        $requestTimeFormat = isset($request->time_format) ? $request->time_format : $timeFormat;

        $this->userSettingRepository->updateAPI($input, $id);


        return $this->sendSuccess("Setting updated successfully");
    }

    public function getPaymentConfig()
    {
        $setting = UserSetting::where('user_id', getLogInUserId())->pluck('value', 'key')->toArray();

        return $this->sendResponse($setting, 'Setting data retrieved successfully.');
    }

    public  function updatePaymentConfig(Request $request)
    {
        $id = Auth::id();
        $this->userSettingRepository->paymentMethodUpdate($request->all(), $id);
        return $this->sendSuccess("Setting updated successfully");
    }
}
