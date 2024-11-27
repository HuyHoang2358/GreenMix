@if ($errors->any())
    <div class="alert alert-danger alert-dismissible show flex items-center mb-2 fixed right-60" style="z-index: 9999; top: 6.75rem;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close">
            <i data-lucide="x" class="w-4 h-4"></i>
        </button>
    </div>
@endif
