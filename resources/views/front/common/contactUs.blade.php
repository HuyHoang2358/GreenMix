<form action="{{route('dataUser')}}" method="POST" class="bg-primary px-8 py-12">
    @csrf
    <h3 class="text-white font-semibold text-2xl text-center">LIÊN HỆ VỚI CHÚNG TÔI</h3>
    <div class="py-8 flex flex-col gap-5">
        <input type="text" class="rounded-lg outline-none border border-white pl-4" placeholder="Tên công ty" name="company">
        <input type="text" class="rounded-lg outline-none border border-white pl-4" placeholder="Họ và tên" name="name">
        <input type="text" class="rounded-lg outline-none border border-white pl-4" placeholder="Số điện thoại" name="phone">
        <textarea rows="3" class="rounded-lg outline-none border border-white pl-4" placeholder="Nội dung" name="content"></textarea>
    </div>
    <button type="submit" class="text-white font-semibold text-xl w-full text-center py-3 border-2 border-white rounded-xl">GỬI YÊU CẦU</button>
</form>
