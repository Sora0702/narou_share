@if (session('flash_message'))
    <div class="mb-3 flash_message text-red-600 text-center">
        {{ session('flash_message') }}
    </div>
@endif
