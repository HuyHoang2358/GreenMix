@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible show flex items-center mb-2 fixed right-60" role="alert"
        style="z-index: 9999; top: 6.75rem;">
        <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ Session::get('success') }}
        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x"
                class="w-4 h-4"></i> </button>
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible show flex items-center mb-2 fixed right-60" role="alert"
        style="z-index: 9999; top: 6.75rem;">
        <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ Session::get('error') }}
        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x"
                class="w-4 h-4"></i> </button>
    </div>
@endif
@if (Session::has('info'))
    <div class="alert alert-warning alert-dismissible show flex items-center mb-2 fixed right-60" role="alert"
        style="z-index: 9999; top: 6.75rem;">
        <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ Session::get('info') }}
        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x"
                class="w-4 h-4"></i> </button>
    </div>
@endif

