<nav class="side-nav">
    <ul>
        <li>
            <a href="{{route('admin.homepage')}}" class="side-menu {{isset($page) ? $page =='homepage'? 'side-menu--active' : '' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title"> Trang chủ </div>
            </a>
        </li>

        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="{{route('admin.field.index')}}" class="side-menu {{isset($page) ? $page =='field-manager'? 'side-menu--active' : '' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                <div class="side-menu__title"> Lĩnh vực kinh doanh</div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.project.index')}}" class="side-menu {{isset($page) ? $page =='project-manager'? 'side-menu--active' : '' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="package"></i> </div>
                <div class="side-menu__title"> Dự án hợp tác </div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.partner.index')}}" class="side-menu {{isset($page) ? $page =='partner-manager'? 'side-menu--active' : '' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="award"></i> </div>
                <div class="side-menu__title"> Quản lý đối tác </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="{{route('admin.product.index')}}" class="side-menu {{isset($page) ? $page =='product-manager'? 'side-menu--active' : '' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                <div class="side-menu__title"> Sản phẩm </div>
            </a>
        </li>

        <li>
            <a class="side-menu {{isset($page) ? ( $page =='category-post-manager' || $page =='post-new-manager' || $page =='post-knowledge-manager')? 'side-menu--active' : '' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
                <div class="side-menu__title">
                    Bài viết
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{isset($page) ? ( $page =='category-post-manager' || $page =='post-new-manager' || $page =='post-knowledge-manager')? 'side-menu__sub-open' : '' : ''}}">
                <li>
                    <a href="{{route('admin.category.index', 'post')}}" class="side-menu {{isset($page) ? $page =='category-post-manager'? 'side-menu--active' : '' : ''}}">
                        <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                        <div class="side-menu__title"> Danh mục bài viết </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.post.index', 'news')}}" class="side-menu {{isset($page) ? $page =='post-news-manager'? 'side-menu--active' : '' : ''}}">
                        <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                        <div class="side-menu__title"> Tin tức </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.post.index', 'knowledge')}}" class="side-menu {{isset($page) ? $page =='post-knowledge-manager'? 'side-menu--active' : '' : ''}}">
                        <div class="side-menu__icon"> <i data-lucide="share-2"></i> </div>
                        <div class="side-menu__title"> Kiến thức </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="side-menu {{isset($page) ? ($page =='post-recruitment-manager' || $page =='category-recruitment-manager') ? 'side-menu--active' : '' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title">
                    Tuyển dụng
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{isset($page) ? ($page =='post-recruitment-manager' || $page =='category-recruitment-manager') ? 'side-menu__sub-open' : '' : ''}}">
                <li>
                    <a href="{{route('admin.category.index', 'recruitment')}}" class="side-menu {{isset($page) ? $page =='category-recruitment-manager'? 'side-menu--active' : '' : ''}}">
                        <div class="side-menu__icon"> <i data-lucide="github"></i> </div>
                        <div class="side-menu__title"> Vị trí tuyển dụng </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.post.index', 'recruitment')}}" class="side-menu {{isset($page) ? $page =='post-recruitment-manager'? 'side-menu--active' : '' : ''}}">
                        <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                        <div class="side-menu__title"> Bài viết </div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="side-nav__devider my-6"></li>


        <li>
            <a class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                <div class="side-menu__title">
                    Media
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin.media.files.index') }}" class="side-menu {{isset($page) ? $page =='files-manager'? 'side-menu--active' : '' : ''}}">
                        <div class="side-menu__icon"> <i data-lucide="hard-drive"></i> </div>
                        <div class="side-menu__title"> Files </div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Cấu hình -->
        <li>
            <a class="side-menu {{isset($page) ? ($page =='setting-config' || $page =='setting-language' || $page == 'setting-banner' || $page =='setting-address') ? 'side-menu--active' : '' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="settings"></i> </div>
                <div class="side-menu__title">
                    Cấu hình
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{isset($page) ? ($page =='setting-config' || $page =='setting-language' || $page == 'setting-banner' || $page =='setting-address') ? 'side-menu__sub-open' : '' : ''}}">
                <li>
                    <a href="{{route('admin.setting.language.index')}}" class="side-menu {{isset($page) ? $page =='setting-language'? 'side-menu--active' : '' : ''}}">
                        <div class="side-menu__icon"> <i data-lucide="book-open"></i> </div>
                        <div class="side-menu__title"> Ngôn ngữ </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.setting.config.index')}}" class="side-menu {{isset($page) ? $page =='setting-config'? 'side-menu--active' : '' : ''}}">
                        <div class="side-menu__icon"> <i data-lucide="command"></i> </div>
                        <div class="side-menu__title"> Hệ thống </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.setting.banner.index')}}" class="side-menu {{isset($page) ? $page =='setting-banner'? 'side-menu--active' : '' : ''}}" >
                        <div class="side-menu__icon"> <i data-lucide="image"></i> </div>
                        <div class="side-menu__title"> Banner quảng cáo </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.setting.address.index')}}" class="side-menu {{isset($page) ? $page =='setting-address'? 'side-menu--active' : '' : ''}}">
                        <div class="side-menu__icon"> <i data-lucide="map"></i> </div>
                        <div class="side-menu__title"> Địa chỉ </div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Cấu hình -->
    </ul>
</nav>
