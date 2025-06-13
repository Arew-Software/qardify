<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use App\Models\WpOrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\WhatsappStore;
use App\Models\ProductCategory;
use App\Models\WpStoreTemplate;
use Illuminate\Support\Facades\DB;
use App\Models\WhatsappStoreProduct;
use App\Http\Requests\WpProductBuyRequest;
use App\Repositories\WhatsappStoreRepository;
use App\Http\Requests\CreateWhatsappStoreRequest;
use App\Http\Requests\UpdateWhatsappStoreRequest;
use App\Models\Product;
use App\Models\Template;
use App\Models\User;

class WhatsappStoreController extends AppBaseController
{
    private WhatsappStoreRepository $whatsappStoreRepository;

    public function __construct(WhatsappStoreRepository $whatsappStoreRepository)
    {
        $this->whatsappStoreRepository = $whatsappStoreRepository;
    }

    public function index(Request $request)
    {
        $partName = $request->part;

        if($partName === null){
            return view('whatsapp_stores.index');
        }

        return view('whatsapp_stores.create', compact('partName'));
    }

    public function store(CreateWhatsappStoreRequest $request)
    {
        $input = $request->all();

        $whatsappStore = $this->whatsappStoreRepository->store($input);

        Flash::success(__('messages.flash.whatsapp_store_create'));

        return redirect(route('whatsapp.stores.edit', [$whatsappStore->id]));
    }

    public function edit(WhatsappStore $whatsappStore, Request $request)
    {
        $isWhatsappStoreAllowed = getPlanFeature(getCurrentSubscription()->plan)['whatsapp_store'];

        if(!$isWhatsappStoreAllowed){
            abort(404);
        }

        $access = $whatsappStore->tenant_id == getLogInTenantId();

        if(!$access){
            abort(404);
        }
            
        $partName = ($request->part === null) ? 'basics' : $request->part;

        $templates = WpStoreTemplate::all()->pluck('path','id')->toArray();

        $productsCategories = ProductCategory::where('whatsapp_store_id', $whatsappStore->id)->pluck('name', 'id')->toArray();

        return view('whatsapp_stores.edit', compact('whatsappStore', 'partName', 'productsCategories','templates'));
    }

    public function show($alias)
    {
        $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();

        if($whatsappStore === null){
            abort(404);
        }
        $user = User::whereTenantId($whatsappStore->tenant_id)->first();
        $userId = $user->id;
        $enable_pwa = getUserSettingValue('enable_pwa', $userId);
        return view('whatsapp_stores.templates.'.$whatsappStore->template->name.'.index', compact('whatsappStore', 'enable_pwa'));
    }

    public function update(WhatsappStore $whatsappStore,UpdateWhatsappStoreRequest $request)
    {
        $input = $request->all();

        $whatsappStore = $this->whatsappStoreRepository->update($whatsappStore, $input);

        Flash::success(__('messages.flash.whatsapp_store_update'));

        return redirect(route('whatsapp.stores.edit', [$whatsappStore->id]));
    }

    public function destroy($id)
    {
        $whatsappStore = WhatsappStore::findOrFail($id);

        if($whatsappStore->tenant_id != getLogInTenantId()){
            return $this->sendError('Unauthorized.');
        }

        $whatsappStore->clearMediaCollection(WhatsappStore::LOGO);
        $whatsappStore->clearMediaCollection(WhatsappStore::COVER_IMAGE);
        $whatsappStore->delete();

        return $this->sendSuccess(__('messages.flash.whatsapp_store_delete'));
    }

    public function wpTemplateUpate(WhatsappStore $whatsappStore, Request $request)
    {

        $whatsappStore->update(['template_id' => $request->template_id]);

        return $this->sendSuccess(__('messages.flash.whatsapp_store_update'));

    }

    public function showProducts($alias,$categoryId = null)
    {
        $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
        if(!$whatsappStore){
            abort(404);
        }

        $template = $whatsappStore->template->name;
        if($whatsappStore === null){
            abort(404);
        }
        return view('whatsapp_stores.templates.'.$template.'.products',compact('whatsappStore','categoryId'));
    }

    public function productDetails($alias, $id)
    {
        $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
        if (!$whatsappStore) {
            abort(404);
        }
        $product = WhatsappStoreProduct::where('id', $id)->whereHas('whatsappStore', function ($query) use ($whatsappStore) {
            $query->where('id', $whatsappStore->id);
        })->first();

        if (!$product) {
            abort(404);
        }

        $template = $whatsappStore->template->name;

        return view('whatsapp_stores.templates.' . $template . '.product-details', compact('whatsappStore', 'product'));
    }


}
