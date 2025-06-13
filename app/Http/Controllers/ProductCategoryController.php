<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends AppBaseController
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|file|image|mimes:jpg,jpeg,png|max:1024',
        ]);
        $input = $request->all();
        $productCategory = ProductCategory::create([
            'name' => $input['name'],
            'whatsapp_store_id' => $input['whatsappStoreId'],
        ]);

        if ($request->hasFile('image')) {
            $productCategory->addMedia($input['image'])->toMediaCollection(
                ProductCategory::IMAGE,
                config('app.media_disc')
            );
        }

        return $this->sendSuccess(__('messages.flash.product_category_create'));
    }

    public function edit(ProductCategory $productCategory)
    {
        $access = $productCategory->tenant_id == getLogInTenantId();
        if(!$access){
            return $this->sendError('Unauthorized.');
        }
        $productCategory->loadCount('products');

        return $this->sendResponse($productCategory, 'Product category retrieved successfully.');
    }

    

    public function update(ProductCategory $productCategory, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'file|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        $access = $productCategory->tenant_id == getLogInTenantId();

        if(!$access){
            return $this->sendError('Unauthorized.');
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $productCategory->clearMediaCollection(ProductCategory::IMAGE);
            $productCategory->addMedia($input['image'])->toMediaCollection(
                ProductCategory::IMAGE,
                config('app.media_disc')
            );
        }

        $productCategory->update([
            'name' => $input['name'],
        ]);

        return $this->sendSuccess(__('messages.flash.product_category_update'));
    }

    public function show(ProductCategory $productCategory)
    {
        $access = $productCategory->tenant_id == getLogInTenantId();
        if(!$access){
            return $this->sendError('Unauthorized.');
        }

        return $this->sendResponse($productCategory, 'Product category retrieved successfully.');
    }

    public function destroy($id)
    {
        $productCategory = ProductCategory::findOrFail($id);

        if($productCategory->tenant_id != getLogInTenantId()){
            return $this->sendError('Unauthorized.');
        }

        if ($productCategory->products()->exists()) {
            return $this->sendError('Product category in use.');
        }

        $productCategory->clearMediaCollection(ProductCategory::IMAGE);
        $productCategory->delete();
               
        return $this->sendSuccess('Product category deleted successfully.');
    }

    
}
