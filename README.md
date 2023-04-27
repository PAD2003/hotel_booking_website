# Hotel Booking Website
Website quản lý chuỗi khách sạn sử dụng php &amp; html
Có thể xem thử bản demo tại: https://hotelbookingwebsiteuet.000webhostapp.com/index.php

# Cài đặt phần mềm

## Cài đặt phần mềm xampp
-	Bước 1: Tải phiên bản phù hợp lại đường link: https://www.apachefriends.org/download.html
-	Bước 2: Chạy file đuôi .exe
-	Bước 3: Trên cửa sổ Set up, tích chọn các phần mềm mà bạn muốn cài đặt. Các phần mềm bắt buộc phải chọn là MySQL, Apache, PHPMyAdmin. Sau khi chọn xong, nhấn "Next"
-	Bước 4: Chọn thư mục cài đặt và nhấn "Next"
-	Bước 5: Chờ vài phút để cài đặt, sau khi cài đặt hoàn tất nhấn "Finish" để kết thúc

## Clone phần mềm
-	Bước 1: Mở cửa sổ dòng lệnh trong thư mục /XAMPP/xamppfiles/htdocs
```
$ cd .../XAMPP/xamppfiles/htdocs

```
-	Bước 2: Clone phần mềm
```
$ git clone https://github.com/PAD2003/hotel_booking_website.git

```

## Cài đặt cơ sở dữ liệu
-	Bước 1: Mở ứng dụng xampp, khởi chạy MySQL Database và Apache Web Server
-	Bước 2: Vào trình duyệt và truy cập tới http://localhost/phpmyadmin/
-	Bước 3: Tạo cơ sở dữ liệu mới có tên “hotelManagement4 _test”
-	Bước 4: Chọn mục “Nhập”
-	Bước 5: Chọn mục “Chọn tệp” và chọn tệp “/XAMPP/xamppfiles/htdocs/hotel_booking_website/ hotelManagement4 _test.sql”

## Chạy chương trình
-	Mở ứng dụng xampp, khởi chạy MySQL Database và Apache Web Server
-	Với vai trò người dùng, truy cập tới http://localhost/hotel_management/index.php
-	Với vai trò Admin, truy cập tới http://localhost/phpmyadmin/

## Tắt chương trình
-	Mở ứng dụng xampp và ngắt tất cả các server đang chạy

