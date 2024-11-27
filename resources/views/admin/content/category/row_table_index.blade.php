@foreach($categories as $category)
    <tr>
        <td class="whitespace-nowrap">{{($category->parent_id === 0) ? $loop->index + 1 : ""}}</td>
        <td class="whitespace-nowrap">{{str_repeat("----", $level)}}  {{$category->name}}</td>
        <td class="whitespace-nowrap">{{$category->slug}}</td>
        <td class="whitespace-nowrap">{{$category->description}}</td>
        <td>
            <div class="flex justify-center items-center gap-2">
                <!-- Edit button -->
                @include('admin.common.editButton', [
                    'routeEdit' => route('admin.category.edit', [$type, $category->id])
                ])

                <!-- Delete button -->
                @include('admin.common.deleteButton', [
                    'deleteObjectName' => $category->name,
                    'deleteObjectId' => $category->id
                ])
            </div>
        </td>
    </tr>

    @if(count($category->childs))
        @include('admin.content.category.row_table_index', ["categories"=>$category->childs, "level"=>$level+1])
    @endif

@endforeach
