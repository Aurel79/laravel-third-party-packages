<div class="d-flex align-items-center py-2 px-4 bg-light rounded-3 border">
    <div class="bi
        @if(isset($iconType) && $iconType == 'person')
            bi-person-circle
        @else
            bi-house-fill
        @endif
        me-3 fs-1"></div>
    <h4 class="mb-0">Well done! This is {{ $pageTitle }}.</h4>
</div>

