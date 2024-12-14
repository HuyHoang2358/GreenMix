<div class="mobile-menu md:hidden px-3">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="GreenMix" class="w-6" src="{{asset('backend/dist/images/logo.svg')}}">
            <span class="logo__text text-white text-lg ml-3"> GreenMix </span>
        </a>
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <div class="scrollable">

        <a href="javascript:; html" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        <ul class="scrollable__content py-2">
            <li>
                <a href="{{route('admin.homepage')}}" class="menu menu--active {{isset($page) ? $page =='homepage'? 'side-menu--active' : '' : ''}}">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title"> Trang chủ </div>
                </a>

            </li>
            <li>
                <a href="{{route('admin.account.index')}}" class="menu {{isset($page) ? $page =='account-manager'? 'side-menu--active' : '' : ''}}">
                    <div class="menu__icon"> <i data-lucide="user"></i> </div>
                    <div class="menu__title"> Tài khoản quản trị </div>
                </a>
            </li>
            <li>
                <a href="{{route('admin.field.index')}}" class="menu {{isset($page) ? $page =='field-manager'? 'side-menu--active' : '' : ''}}">
                    <div class="menu__icon"> <i data-lucide="layers"></i> </div>
                    <div class="menu__title"> Lĩnh vực kinh doanh </div>
                </a>
            </li>
            <li>
                <a href="{{route('admin.project.index')}}" class="menu {{isset($page) ? $page =='project-manager'? 'side-menu--active' : '' : ''}}">
                    <div class="menu__icon"> <i data-lucide="package"></i> </div>
                    <div class="menu__title"> Dự án hợp tác </div>
                </a>
            </li>
            <li>
                <a href="{{route('admin.partner.index')}}" class="menu {{isset($page) ? $page =='partner-manager'? 'side-menu--active' : '' : ''}}">
                    <div class="menu__icon"> <i data-lucide="award"></i> </div>
                    <div class="menu__title"> Quản lý đối tác </div>
                </a>
            </li>
            <li>
                <a href="{{route('admin.dataUser.index')}}" class="menu {{isset($page) ? $page =='contact-manager'? 'side-menu--active' : '' : ''}}">
                    <div class="menu__icon"> <i data-lucide="message-square"></i> </div>
                    <div class="menu__title"> Liên hệ </div>
                </a>
            </li>
            <li>
                <a href="{{route('admin.product.index')}}" class="menu {{isset($page) ? $page =='product-manager'? 'side-menu--active' : '' : ''}}">
                    <div class="menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                    <div class="menu__title"> Sản phẩm </div>
                </a>
            </li>
            <li>
                <a class="menu {{isset($page) ? ( $page =='category-post-manager' || $page =='category-new-manager' )? 'side-menu--active' : '' : ''}}">
                    <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                    <div class="menu__title"> Danh mục <i data-lucide="chevron-down" class="menu__sub-icon"></i></div>
                </a>
                <ul class="menu__sub-open {{isset($page) ? ( $page =='category-post-manager' || $page =='category-news-manager' || $page == 'category-knowledge-manager') ? 'side-menu__sub-open' : '' : ''}}">
                    <li>
                        <a href="{{route('admin.category.index', 'knowledge')}}" class="menu {{isset($page) ? $page =='category-knowledge-manager'? 'side-menu--active' : '' : ''}}">
                            <div class="menu__icon"> <i data-lucide="share-2"></i> </div>
                            <div class="menu__title"> Danh mục kiến thức </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.category.index', 'recruitment')}}" class="menu {{isset($page) ? $page =='category-requirement-manager'? 'side-menu--active' : '' : ''}}">
                            <div class="menu__icon"> <i data-lucide="briefcase"></i> </div>
                            <div class="menu__title"> Vị trí tuyển dụng </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="menu {{isset($page) ? ( $page =='post-new-manager' || $page =='post-knowledge-manager')? 'side-menu--active' : '' : ''}}">
                    <div class="menu__icon"> <i data-lucide="edit"></i> </div>
                    <div class="menu__title"> Bài viết <i data-lucide="chevron-down" class="menu__sub-icon"></i></div>
                </a>
                <ul class="menu__sub-open {{isset($page) ? ($page =='post-post-manager' || $page =='post-knowledge-manager' || $page =='post-introduce-manager')? 'side-menu__sub-open' : '' : ''}}">
                    <li>
                        <a href="{{route('admin.post.index', 'introduce')}}" class="menu {{isset($page) ? $page =='post-introduce-manager'? 'side-menu--active' : '' : ''}}">
                            <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="menu__title"> Giới thiệu </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.post.index', 'post')}}" class="menu {{isset($page) ? $page =='post-post-manager'? 'side-menu--active' : '' : ''}}">
                            <div class="menu__icon"> <i data-lucide="tv"></i> </div>
                            <div class="menu__title"> Truyền thông </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.knowledge.index')}}" class="menu {{isset($page) ? $page =='post-knowledge-manager'? 'side-menu--active' : '' : ''}}">
                            <div class="menu__icon"> <i data-lucide="share-2"></i> </div>
                            <div class="menu__title"> Kiến thức </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('admin.recruitment.index')}}" class="menu {{isset($page) ? $page =='recruitment-manager'? 'side-menu--active' : '' : ''}}">
                    <div class="menu__icon"> <i data-lucide="github"></i> </div>
                    <div class="menu__title"> Tuyển dụng </div>
                </a>
            </li>
            <li class="menu__devider my-6"></li>
            <li>
                <a href="{{route('admin.media.files.index')}}" class="menu {{isset($page) ? $page =='files-manager'? 'side-menu--active' : '' : ''}}">
                    <div class="menu__icon"> <i data-lucide="hard-drive"></i> </div>
                    <div class="menu__title"> Quản lý Files <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="menu {{isset($page) ? ($page =='setting-config' || $page =='setting-language' || $page == 'setting-banner' || $page =='setting-address') ? 'side-menu--active' : '' : ''}}">
                    <div class="menu__icon"> <i data-lucide="settings"></i> </div>
                    <div class="menu__title"> Cấu hình <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                </a>
                <ul class="{{isset($page) ? ($page =='setting-config' || $page =='setting-language' || $page == 'setting-banner' || $page =='setting-address') ? 'side-menu__sub-open' : '' : ''}}">
                    <li>
                        <a href="{{route('admin.setting.language.index')}}" class="menu {{isset($page) ? $page =='setting-language'? 'side-menu--active' : '' : ''}}">
                            <div class="menu__icon"> <i data-lucide="book-open"></i> </div>
                            <div class="menu__title"> Ngôn ngữ  </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.setting.config.index')}}" class="menu {{isset($page) ? $page =='setting-config'? 'side-menu--active' : '' : ''}} ">
                            <div class="menu__icon"> <i data-lucide="command"></i> </div>
                            <div class="menu__title"> Hệ thống </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.setting.banner.index')}}" class="menu {{isset($page) ? $page =='setting-banner'? 'side-menu--active' : '' : ''}}">
                            <div class="menu__icon"> <i data-lucide="image"></i> </div>
                            <div class="menu__title"> Banner quảng cáo </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.setting.address.index')}}" class="menu {{isset($page) ? $page =='setting-address'? 'side-menu--active' : '' : ''}}">
                            <div class="menu__icon"> <i data-lucide="map"></i> </div>
                            <div class="menu__title"> Địa chỉ </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
