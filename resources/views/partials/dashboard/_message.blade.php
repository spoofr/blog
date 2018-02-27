<script>
    @if(Session::has('success'))
    UIkit.notification({
        message: '<span uk-icon="icon: check"></span> <span class="uk-text-bold">{{ Session::get("success") }}</span>',
        status: 'success',
        pos: 'top-right'
    });
    
    @elseif(Session::has('warning'))
    UIkit.notification({
        message: '<span uk-icon="icon: close"></span> <span class="uk-text-bold">{{ Session::get("warning") }}</span>',
        status: 'danger',
        pos: 'top-right'
    });
    @endif
</script>