@foreach($categories as $category)
    @if($parent_id && $parent_id == $category->id)
        <option value="{{$category->id}}" selected>{{str_repeat("----", $level).$category->name}}</option>
    @else
        <option value="{{$category->id}}">{{str_repeat("----", $level).$category->name}}</option>
    @endif

    @if($category->childs)
        @include('admin.content.category.option', ["categories" =>$category->childs, 'level' => $level+1, 'parent_id' => $parent_id])
    @endif
@endforeach
