<div class="w-full border border-primary mb-8">
    <div class="bg-primary">
        <h3 class="font-semibold text-white text-lg md:text-xl uppercase py-4 text-center">Có thể bạn quan tâm</h3>
    </div>
    <div class="flex divide-y flex-col">
        @foreach($topCommunications as $item)
            <div class="py-2 px-4 hover:bg-light-primary hover:text-white">
                <a href="{{route('post.detail', $item->slug)}}">{{$item->name}}</a>
            </div>
        @endforeach

        @foreach($topKnowledges as $item)
            <div class="py-2 px-4 hover:bg-light-primary hover:text-white">
                <a href="{{route('knowledge.detail', $item->slug)}}">{{$item->name}}</a>
            </div>
        @endforeach

    </div>
</div>
