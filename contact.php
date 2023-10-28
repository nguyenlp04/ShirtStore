<?php
session_start();
include "./config/config.php";
include "layout.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/favicon/favicon.ico" type="image/x-icon">
    <title>Danh mục</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/search.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<div>
    <?php menu() ?>
    <div class="container mt-4 mb-0 ">
        <div class="col-inner">




            <h2><span>Liên hệ chúng tôi</span></h2>
            <div class="is-divider divider clearfix" style="max-width:100px;background-color:rgb(37, 187, 101);"></div>

            <p>Có một câu hỏi cho chúng tôi? <br>Giờ làm việc: Thứ Hai – Thứ Sáu, 10 giờ sáng – 5 giờ chiều theo giờ EST <br>Địa chỉ: Gio Linh, Quảng Trị</p>
            <p>Văn phòng của chúng tôi đặt tại Garden Grove, CA. Chúng tôi không có phòng trưng bày, tất cả các sản phẩm phải được đặt hàng trực tuyến và gửi <br>Email: admin@nguyenlp.id.vn (Vui lòng đợi 24 giờ để xử lý email của bạn)</p>
            <p><strong>Mẹo nhanh<br></strong> Sản phẩm của chúng tôi sản xuất trong 2 - 3 ngày làm việc. Thời gian vận chuyển mất 4 – 7 ngày. Chúng tôi gửi hàng từ Detroit, MI</p>
            <p>Để xem trạng thái hoặc thông tin theo dõi đơn hàng của bạn, vui lòng truy cập trang Theo dõi đơn hàng</p>

            <div class="wpcf7 js" id="wpcf7-f7-p17112-o3" lang="en-US" dir="ltr">
                <div class="screen-reader-response">
                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                    <ul></ul>
                </div>
                <div class="row">
                    <div class="col-6">
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">

<!-- Name Input -->
<div class="form-floating mb-3">
    <input class="form-control" id="name" type="text" placeholder="Name" data-sb-validations="required" />
    <label for="name">Name</label>
    <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
</div>

<!-- Email Input -->
<div class="form-floating mb-3">
    <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
    <label for="emailAddress">Email Address</label>
    <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
    <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
</div>

<!-- Message Input -->
<div class="form-floating mb-3">
    <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>
    <label for="message">Message</label>
    <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
</div>

<!-- Submit success message -->
<div class="d-none" id="submitSuccessMessage">
    <div class="text-center mb-3">
        <div class="fw-bolder">Form submission successful!</div>
        <p>To activate this form, sign up at</p>
        <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
    </div>
</div>

<!-- Submit error message -->
<div class="d-none" id="submitErrorMessage">
    <div class="text-center text-danger mb-3">Error sending message!</div>
</div>

<!-- Submit button -->
<div class="d-grid">
    <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Gửi</button>
</div>
</form>
                    </div>
                </div>
               
            </div>





        </div>
        <?php footer() ?>
        <script src="./js/search.js"></script>
        <script src="./js/all_products.js"></script>
        </body>

</html>