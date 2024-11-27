<div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
    <h2 class="font-medium text-xl mr-auto">
        {{$title}}
    </h2>
    <div class="w-full sm:w-auto flex  items-center gap-2 mt-4 sm:mt-0">
        <a href="{{$routeAdd}}">
            <button type="button" class="btn btn-primary w-56 h-12">
                <i data-lucide="plus"></i> {{$titleButton}}
            </button>
        </a>
        <div class="dropdown ml-auto sm:ml-0">
            <button class="dropdown-toggle btn px-2 box bg-gray-500 shadow" aria-expanded="false" data-tw-toggle="dropdown">
                <span class="w-7 h-7 flex items-center justify-center"><i data-lucide="printer"></i></span>
            </button>
            <div class="dropdown-menu w-40">
                <ul class="dropdown-content">
                    <li><a href="#" class="dropdown-item"> In </a></li>
                    <li><a href="#" class="dropdown-item"> Xuất file excel</a></li>
                </ul>
            </div>
        </div>
    </div>

</div>
