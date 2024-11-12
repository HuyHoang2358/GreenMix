@foreach($categories as $category)
    <tr>
        <td class="whitespace-nowrap">{{($category->parent_id === 0) ? $loop->index + 1 : ""}}</td>
{{--        <td class="whitespace-nowrap">--}}
{{--            @if($category->icon)--}}
{{--                <img src="{{asset($category->icon)}}" alt="" style="width: 40px"/>--}}
{{--            @else--}}
{{--                <img src="{{asset('/images/samples/no_image.png')}}" alt="" style="width: 40px"/>--}}
{{--            @endif--}}
{{--        </td>--}}
        <td class="whitespace-nowrap">{{str_repeat("----", $level)}}  {{$category->name}}</td>
        <td class="whitespace-nowrap">{{$category->slug}}</td>
        <td class="whitespace-nowrap">{{$category->description}}</td>
        <td>
            <div class="">
                <a href="{{route('admin.category.edit', [$type, $category->id])}}" class="mr-1">
                    <button type="button" class="btn btn-outline-warning p-1 w-8 h-8"> <i data-lucide="edit-3"></i></button>
                </a>
                <a href="{{route('admin.category.destroy', [$type, $category->id])}}" class="mr-1" onclick="return confirm('Bạn có muốn xóa danh mục {{$category->name}}?');">
                    <button type="button" class="btn btn-outline-danger p-1 w-8 h-8"><i data-lucide="trash-2"></i></button>
                </a>
            </div>
        </td>
    </tr>

    @if(count($category->childs))
        @include('admin.content.category.row_table_index', ["categories"=>$category->childs, "level"=>$level+1])
    @endif

@endforeach
