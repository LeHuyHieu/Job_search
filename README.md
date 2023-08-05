# Website Việc Làm sử dụng PHP thuần

## Giới thiệu

Đây là một dự án website Việc Làm đơn giản được xây dựng bằng ngôn ngữ lập trình PHP thuần, nhằm mục đích cung cấp một nền tảng để người tìm việc có thể tìm kiếm, xem và đăng các công việc tuyển dụng. Dự án này giúp người tìm việc dễ dàng tìm thấy các cơ hội việc làm phù hợp với mình và cho các nhà tuyển dụng có cơ hội đăng tải thông tin tuyển dụng.

## Yêu cầu hệ thống

Trước khi bạn bắt đầu triển khai dự án, đảm bảo hệ thống của bạn đáp ứng các yêu cầu sau:

- Máy chủ web: Apache hoặc Nginx
- Phiên bản PHP: 7.0 trở lên
- MySQL hoặc MariaDB để lưu trữ dữ liệu công việc và người dùng.

## Cài đặt

Hướng dẫn cài đặt dự án:

1. Sao chép dự án từ repository:
   git clone https://github.com/ten-du-an.git
2.Di chuyển vào thư mục dự án:
   cd ten-du-an
3,Cấu hình cơ sở dữ liệu: Mở file config.php và cập nhật thông tin kết nối đến cơ sở dữ liệu MySQL hoặc MariaDB.

4.Import cơ sở dữ liệu: Sử dụng tệp SQL có sẵn để import cấu trúc dữ liệu và dữ liệu mẫu vào cơ sở dữ liệu.

## Sử dụng
Dự án này cung cấp các chức năng cơ bản sau:

1.Xem danh sách công việc: Trang chính hiển thị danh sách các công việc hiện có, với thông tin cơ bản về công việc.

2.Tìm kiếm công việc: Người tìm việc có thể tìm kiếm các công việc dựa trên từ khóa, vị trí, ngành nghề, v.v.

3.Đăng công việc: Nhà tuyển dụng có thể đăng các công việc mới bằng cách cung cấp thông tin về công việc, yêu cầu ứng viên, v.v.

4.Ứng tuyển công việc: Người tìm việc có thể ứng tuyển vào các công việc và gửi thông tin liên hệ đến nhà tuyển dụng.

## Đóng góp
Nếu bạn muốn đóng góp vào dự án, bạn có thể thực hiện các bước sau:

1.Fork dự án trên GitHub.

2.Clone repository từ tài khoản của bạn:
  git clone https://github.com/ten-tai-khoan/ten-du-an.git
3.Tạo một branch mới để làm việc:
  git checkout -b feature/ten-chuc-nang
4.Tiến hành sửa đổi và commit:
  git add .
  git commit -m "Thêm chức năng ABC"
5.Push branch lên repository của bạn:
  git push origin feature/ten-chuc-nang
6.Tạo một Pull Request (PR) từ branch của bạn vào branch chính của dự án.

## Vấn đề và Góp ý
Nếu bạn gặp bất kỳ vấn đề hoặc có góp ý, vui lòng tạo một issue trên GitHub.

© 2023 - Lê Huy Hiệu
