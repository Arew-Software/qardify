<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhatsappStore extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, BelongsToTenant;

    const LOGO = 'whatsapp-logo';
    const COVER_IMAGE = 'whatsapp-cover-image';

    protected $fillable = [
        'url_alias',
        'store_name',
        'region_code',
        'whatsapp_no',
        'address',
        'store_id',
        'tenant_id',
        'template_id',
    ];

    protected $appends = [
        'logo_url',
        'cover_url',
    ];

    public function getLogoUrlAttribute()
    {
        $media = $this->getMedia(self::LOGO)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return '';
    }

    public function getCoverUrlAttribute()
    {
        $media = $this->getMedia(self::COVER_IMAGE)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return '';
    }

    public function template()
    {
        return $this->belongsTo(WpStoreTemplate::class, 'template_id');
    }

    public function products()
    {
        return $this->hasMany(WhatsappStoreProduct::class, 'whatsapp_store_id');
    }

    public function categories()
    {
        return $this->hasMany(ProductCategory::class, 'whatsapp_store_id');
    }
    public static $rules = [
        'url_alias' => 'required|string|min:8|max:100|unique:whatsapp_stores,url_alias',
        'store_name' => 'required',
        'region_code' => 'required',
        'whatsapp_no' => 'required|numeric',
        'logo' => 'required|file|image|mimes:jpg,png,jpeg|max:1024', // Max 1MB
        'cover_img' => 'required|file|image|mimes:jpg,png,jpeg|max:1024', // Max 1MB
    ];
}
