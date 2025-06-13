<?php

namespace App\Livewire;

use App\Models\WhatsappStore;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Stancl\Tenancy\Database\Models\Tenant;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class WhatsappStoreTable extends LivewireTableComponent
{
    protected $model = WhatsappStore::class;

    public bool $showButtonOnHeader;

    public function mount()
    {
        $this->showButtonOnHeader = Auth::user()->roles->first()->name === 'admin';
    }

    public string $buttonComponent = 'whatsapp_stores.add-button';
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPageName('whatsapp-store-table');
        $this->setDefaultSort('created_at', 'desc');

        $this->setThAttributes(function (Column $column) {
            if ($column->isField('id')) {
                return [
                    'class' => 'text-center',
                ];
            }
            return [];
        });
    }

    public function builder(): Builder
    {
        if (auth()->user()->hasRole('super_admin')) {
            return WhatsappStore::query();
        } else {
            return WhatsappStore::where('tenant_id', getLogInTenantId());
        }
    }

    public function columns(): array
    {
        return [
            Column::make('url', 'url_alias')
                ->hideIf(1),
            Column::make('region', 'region_code')
                ->hideIf(1),
            Column::make('template', 'template_id')
                ->hideIf(1),
            Column::make(__('messages.whatsapp_stores.store_name'), "store_name")
                ->view('whatsapp_stores.columns.store_name')
                ->searchable()
                ->sortable(),
            Column::make(__('messages.vcard.user_name'), 'tenant.tenant_username')
                ->hideIf(auth()->user()->hasRole('admin'))
                ->sortable()
                ->searchable(),
            Column::make(__('messages.vcard.preview_url'), 'url_alias')
                ->hideIf('url_alias')
                ->searchable(),
            Column::make(__('messages.vcard.preview_url'), 'url_alias')->sortable()->view('whatsapp_stores.columns.preview')->hideIf(auth()->user()->hasRole('admin')),
            Column::make(__('messages.whatsapp_stores.whatsapp_no'), "whatsapp_no")
                ->view('whatsapp_stores.columns.whatsapp_no')
                ->hideIf(auth()->user()->hasRole('super_admin'))
                ->searchable()
                ->sortable(),
            Column::make(__('messages.vcard.created_at'), "created_at")
                ->view('whatsapp_stores.columns.created_at')
                ->sortable(),
            Column::make(__('messages.common.action'), "id")
                ->hideIf(auth()->user()->hasRole('super_admin'))
                ->view('whatsapp_stores.columns.action'),
        ];
    }

    public function placeholder()
    {
        return view('lazy_loading.without-filter-skelecton');
    }
}
