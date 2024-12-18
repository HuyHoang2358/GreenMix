<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\Setting\BannerController;
use App\Models\Address;
use App\Models\Banner;
use App\Models\Category;
use App\Models\DataUsers;
use App\Models\News;
use App\Models\Partner;

use App\Models\Post;

use App\Models\Recruitment;
use Exception;
use App\Models\Product;
use App\Models\Field;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;


class HomeController extends Controller
{
    // Trang chủ
    public function index(): Factory|Application|View
    {
        $partners = Partner::all();
        $banners = Banner::orderBy('order', 'ASC')->limit(6)->get();
        $projects = Project::all();
        $projectChunks = array_chunk($projects->toArray(), 4);
        $businesses = Field::with('post')->orderBy('updated_at', 'desc')->limit(3)->get();

        $communicationPosts = Post::where('type_id', 2)->orderBy('updated_at', 'desc')->limit(3)->get();
        $knowledgePosts = News::orderBy('updated_at', 'desc')->limit(3)->get();

      // set điều kiện để lấy ra các địa chỉ hiển thị
        return view('homepage', [
            'partners' => $partners,
            'banners' => $banners,
            'projects' =>  $projectChunks,
            'businesses' => $businesses,
            'communicationPosts' => $communicationPosts,
            'knowledgePosts' => $knowledgePosts,
        ]);
    }

    // Trang lĩnh vực kinh doanh
    public function business(): Factory|Application|View
    {
        $businesses = Field::with('post')->orderBy('updated_at', 'desc')->paginate(6);
        $fields = Field::orderBy('updated_at', 'desc')->get();
        return view('front.business.index', [
            'businesses' => $businesses,
            'fields' => $fields,
        ]);
    }

    // Trang chi tiết lĩnh vực kinh doanh
    public function businessDetail($slug): Factory|Application|View
    {
        $business = Field::where('slug', $slug)->with('post')->first();
        $products = Product::orderBy('updated_at', 'desc')->get();
        $fields = Field::orderBy('updated_at', 'desc')->with('post')->get()->reject(function ($field) use ($business) { return $field->id === $business->id; });
        return view('front.business.detail', [
            'business' => $business,
            'products' => $products,
            'fields' => $fields,
        ]);
    }

    // Trang danh sách dòng sản phẩm
    public function product(): Factory|Application|View
    {
        $products = Product::with('post')->orderBy('updated_at', 'desc')->paginate(6);
        return view('front.product.index', ['products' => $products]);
    }
    // Trang chi tiết dòng sản phẩm
    public function productDetail($slug): Factory|Application|View
    {
        $product = Product::where('slug', $slug)->with('post')->first();
        return view('front.product.detail', ['product' => $product]);
    }

    // Trang danh sách dự án
    public function project(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $projects =Project::with('post')->orderBy('updated_at', 'desc')->paginate(6);
        return view('front.project.index', [
            'projects' => $projects,
        ]);
    }
    // Trang chi tiết dự án
    public function projectDetail($slug): Factory|Application|View
    {
        $project = Project::where('slug', $slug)->with('post')->first();
        return view('front.project.detail', ['project' => $project]);
    }

    // Trang đối tác
    public function partner(): Factory|Application|View
    {
        $partners = Partner::orderBy('updated_at', 'desc')->get();
        return view('front.partner.index', ['partners' => $partners]);
    }

    // Trang truyền thông
    public function communication(): Factory|Application|View
    {
        $communications = Post::where('type_id', 2)->orderBy('updated_at', 'desc')->paginate(12);
        return view('front.communication.index', ['communications' => $communications]);
    }
    // Trang chi tiết truyền thông
    public function communicationDetail($slug): Factory|Application|View
    {
        $communication = Post::where('slug', $slug)->first();
        return view('front.communication.detail', ['communication' => $communication]);
    }

    // Trang kiến thức
    public function knowledge(): Factory|Application|View
    {
        $items = News::orderBy('updated_at', 'desc')->paginate(12);
        return view('front.knowledge.index', ['items' => $items]);
    }
    // Trang chi tiết kiến thức
    public function knowledgeDetail($slug): Factory|Application|View
    {
        $item = News::where('slug', $slug)->first();
        return view('front.knowledge.detail', ['item' => $item]);
    }

    // Trang tuyển dụng
    public function recruitment(): Factory|Application|View
    {
        // get all data from table recruitment
        $recruitments = Recruitment::orderBy('updated_at', 'desc')->paginate(6);
        return view('front.recruitment.index', ['recruitments' => $recruitments]);
    }
    // Trang chi tiết tuyển dụng
    public function recruitmentDetail($slug): Factory|Application|View
    {
        $recruitment = Recruitment::where('slug', $slug)->first();
        return view('front.recruitment.detail', ['recruitment' => $recruitment]);
    }

    // Trang liên hệ
    public function contact(): Factory|Application|View
    {
        $addresses = Address::all();
        return view('front.contact', [
        'addresses' => $addresses,
        ]);
    }
    public function dataUser(Request $request): \Illuminate\Http\RedirectResponse
    {
        $input = $request->all();
        try {
            DataUsers::create([
                'name' => $input['name'],
                'company' => $input['company'],
                'phone' => $input['phone'],
                'content' => $input['content'],
                'status' => 1,
            ]);

            // Chuyển hướng về trang danh sách dự án và kèm theo thông báo thành công
            return redirect()->route('home')->with('success', 'Thêm mới thông tin thành công!');

        } catch (Exception $e) {
            // Trường hợp có lỗi xảy ra, chuyển hướng về trang danh sách dự án và kèm theo thông báo lỗi
            return redirect()->route('home')->with('error', 'Thêm mới thông tin thất bại: ' . $e->getMessage());
        }
    }

    // Trang xem chi tiết bài viết
    public function postDetail($slug): Factory|Application|View
    {
        $post = Post::where('slug', $slug)->first();
        return view('front.post.detail', ['post' => $post]);
    }
}
