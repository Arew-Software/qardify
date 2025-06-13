<div class="d-flex justify-content-center">
    <a title="{{ __('messages.common.view') }}" class="btn px-1 text-info fs-3" href="{{ route('nfc-card-orders.show', $row->id) }}">
        <i class="fa-solid fa-eye"></i>
    </a>
    <a href="javascript:void(0)" data-id="{{ $row->id }}" title="{{ __('messages.common.delete') }}"
        class="btn px-1 text-danger fs-3 nfc-order-delete-btn">
        <i class="fa-solid fa-trash"></i>
    </a>
</div>
