# GreenMix Web Application
## Giới thiệu

Web application dùng để quản lý các thông tin của công ty GreenMix và giới thiệu các sản phẩm của công ty.
## Cài đặt
- Clone project về máy để trong thư mục `OSPanel/domains/`
  ```bash
  git clone https://github.com/HuyHoang2358/GreenMix.git
  ```
- Checkout sang nhánh dev của remote
  ```bash
    git checkout origin/dev
  ```
- Copy file `.env.example` và đổi tên thành `.env`
- Cấu hình các thông số về CSDL trong file `.env`

- Cài đặt các thư viện cần thiết
  ```bash
  # Mở Console trong Advanced Console của OSPanel
  # Di chuyển đến thư mục chứa project
    cd domains/GreenMix
  # Cài đặt các thư viện cần thiết
    composer install
    composer update
  ```
- Tạo key cho ứng dụng
  ```bash
    # Mở php storm lên và mở terminal để chạy lệnh
    php artisan key:generate
  ```
- Tạo CSDL `green_mix_db` trong `SQL manger` của `OSPanel`
- Chạy các lệnh sau để tạo bảng và dữ liệu mẫu
  ```bash
    php artisan migrate
  ```
- Cài đặt thư viện `npm`
  ```bash
    npm install
    npm run build
    npm run dev
  ```
- Cấu hình domain cho ứng dụng trong `settings` của `OSPanel`
- Domain: `greenmix.th` và domain folder: `GreenMix/public`
## Khởi tạo tài khoản 
- Truy cập vào trang: `http://greenmix.th/admin/register`
- Tạo tài khoản và login vào trang quản trị
- Truy cập vào trang: `http://greenmix.th/admin`
