@push('scripts')
<script>
    window.addEventListener('toastr:info', event => {
        window.toastr.info(event.detail.message);
    });
    window.addEventListener('toastr:success', event => {
        window.toastr.success(event.detail.message);
    });
    window.addEventListener('toastr:warning', event => {
        window.toastr.warning(event.detail.message);
    });
    window.addEventListener('toastr:error', event => {
        window.toastr.error(event.detail.message);
    });
</script>
@endpush