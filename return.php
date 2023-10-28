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

<body>
    <?php menu() ?>
    <div class="container mt-4 mb-0 ">
        <div class="row" id="">
            <div id="" class="col small-12 large-12">
                <div class="col-inner">
                    <h1>THAY THẾ &amp; HOÀN TIỀN</h1>
                    <div>1 – Đổi hoặc hủy</div>
                    <div>Tất cả các sản phẩm của chúng tôi đều được tùy chỉnh. Nếu bạn muốn sửa đổi đơn đặt hàng của mình, vui lòng liên hệ với chúng tôi càng sớm càng tốt. Chúng tôi sẽ không chịu trách nhiệm về bất kỳ thông tin sai lệch nào nếu bạn không cung cấp cho chúng tôi trong vòng 12 giờ. Sau 12 giờ, đơn hàng của bạn đã được đưa vào sản xuất và không thể sửa đổi được nữa. Người mua chịu mọi rủi ro khi chọn sai kiểu dáng và kích thước mua hàng, không chấp nhận trả lại hoặc hoàn tiền trong trường hợp này.</div>
                    <div>&nbsp;</div>
                    <div>Đơn hàng bị mất</div>
                    <div>Nếu đơn hàng bị thất lạc trong quá trình vận chuyển, chúng tôi sẽ gửi đơn hàng thay thế cho bạn và chúng tôi sẽ chịu chi phí. Bạn sẽ được cung cấp số theo dõi và đây là số liệu chúng tôi sử dụng để xác định xem đơn hàng có bị thất lạc trong quá trình vận chuyển hay được giao hay không.</div>
                    <div>&nbsp;</div>
                    <div>Thiếu địa chỉ hoặc sai địa chỉ giao hàng</div>
                    <div>Nếu có sai sót về địa chỉ bị thiếu hoặc bạn cung cấp sai địa chỉ giao hàng dẫn đến giao hàng không thành công và gửi lại cho chúng tôi, vui lòng liên hệ với chúng tôi và chúng tôi sẽ giải quyết vấn đề cho bạn.</div>
                    <div>&nbsp;</div>
                    <div>2 – Chính sách hoàn trả hoặc thay thế</div>
                    <div>Tất cả các sản phẩm đều trải qua quá trình kiểm tra kiểm soát chất lượng trước khi gửi đến bạn – Nhưng chỉ để đề phòng, hãy đọc phần bên dưới!</div>
                    <div>&nbsp;</div>
                    <div>Nếu sản phẩm gặp một trong các vấn đề dưới đây khi bạn mở gói hàng, hãy cho chúng tôi biết bằng cách chụp ảnh và gửi email trực tiếp cho chúng tôi kèm theo mã số đơn hàng của bạn.</div>
                    <div>&nbsp;</div>
                    <div>+ Hình ảnh in không rõ nét.</div>
                    <div>&nbsp;</div>
                    <div>+ Hình in không nằm chính giữa áo.</div>
                    <div>&nbsp;</div>
                    <div>+ Gói hàng nhận sai so với đơn đặt hàng.</div>
                    <div>&nbsp;</div>
                    <div>+ Hư hỏng do vận chuyển: rách, bẩn…</div>
                    <div>&nbsp;</div>
                    <div>+ Đơn hàng không đúng size, màu sắc, kiểu dáng so với đơn hàng.</div>
                    <div>&nbsp;</div>
                    <div>+ Các sai sót khác do chúng tôi gây ra…</div>
                    <div>&nbsp;</div>
                    <div>Nếu sản phẩm bạn nhận được có bất kỳ vấn đề nào nêu trên, vui lòng liên hệ với chúng tôi qua email hoặc trang web kèm theo hình ảnh lỗi và số đơn hàng của bạn. Chúng tôi sẽ hoàn lại tiền hoặc thay thế một mặt hàng khi vấn đề được xác minh là chính xác.</div>
                    <div>&nbsp;</div>
                    <div>Lưu ý: * Chỉ chấp nhận trả lại khi mặt hàng chưa được sử dụng hoặc giặt và ở tình trạng như lúc bạn nhận được.</div>
                    <div>&nbsp;</div>
                    <div>* Chúng tôi sẽ không chịu bất kỳ trách nhiệm nào về kích thước nếu chúng tôi thực hiện theo yêu cầu của bạn. Trường hợp vận chuyển sai kích thước so với đơn hàng chúng tôi sẽ thực hiện theo chính sách trên.</div>
                    <div>&nbsp;</div>
                    <div>3 – Chính sách hoàn tiền</div>
                    <div>Khoản tiền hoàn lại của bạn sẽ được chuyển vào cùng thẻ tín dụng hoặc phương thức thanh toán ban đầu mà bạn đã sử dụng để đặt hàng. Vì khoản tiền hoàn lại là sự đảo ngược khoản thanh toán của bạn nên chúng tôi chỉ có thể gửi lại khoản tiền đó theo cách tương tự như cách bạn đã nhận được. Hoàn nguyên khoản thanh toán theo cách này là cách nhanh nhất và an toàn nhất để nhận lại tiền hoàn lại cho bạn.</div>
                    <div>&nbsp;</div>
                    <div>Chi phí vận chuyển là không hoàn lại. Nếu bạn nhận được tiền hoàn lại, chi phí vận chuyển trả lại sẽ được khấu trừ vào số tiền hoàn lại của bạn.</div>
                    <div>&nbsp;</div>
                    <div>* Vấn đề về hoàn tiền: Dưới đây là một số lý do khiến bạn được hoàn tiền đầy đủ:</div>
                    <div>Đơn hàng trùng lặp, chúng tôi sẽ hủy và hoàn lại một đơn hàng cho bạn.</div>
                    <div>(Các) mặt hàng của bạn chưa nhận được trong vòng 30 ngày hoặc bạn nhận được một mặt hàng bị hư hỏng/bị lỗi (xem các điều kiện trong CHÍNH SÁCH TRẢ LẠI), trước tiên chúng tôi sẽ giải quyết các đơn đặt hàng thay thế và bạn không cần phải trả lại (các) mặt hàng. Nhưng nếu bạn vẫn muốn hoàn tiền, chúng tôi sẽ xử lý khoản tín dụng hoặc hoàn tiền của cửa hàng sau khi chúng tôi nhận được (các) mặt hàng trả lại từ bạn.</div>
                    <div>Nếu bạn cần trả lại hoặc hoàn tiền đơn hàng, vui lòng đọc kỹ hướng dẫn sau</div>
                    <div>* Làm thế nào để trả lại (các) mặt hàng của bạn?</div>
                    <div>Bước 1: Làm thế nào để quay lại?</div>
                    <div>&nbsp;</div>
                    <div>– Hàng trả lại phải được chuyển lại cho chúng tôi trong vòng 30 ngày (???) kể từ ngày gói hàng của bạn được giao.</div>
                    <div>&nbsp;</div>
                    <div>– Để đủ điều kiện được trả lại, mặt hàng của bạn phải chưa được sử dụng và ở tình trạng như lúc bạn nhận được. Nó cũng phải còn trong bao bì gốc, chưa qua sử dụng, chưa được giặt hoặc hư hỏng dưới bất kỳ hình thức nào khác. Tất cả các thẻ khâu hoặc treo ban đầu phải còn nguyên vẹn.</div>
                    <div>&nbsp;</div>
                    <div>– Để hoàn tất việc hoàn trả của bạn, chúng tôi yêu cầu biên lai hoặc bằng chứng mua hàng. Bạn sẽ chịu trách nhiệm thanh toán chi phí vận chuyển của riêng mình khi trả lại (các) mặt hàng của mình.</div>
                    <div>&nbsp;</div>
                    <div>Bước 2: Xử lý séc của chúng tôi.</div>
                    <div>&nbsp;</div>
                    <div>– Sau khi chúng tôi nhận được (các) mặt hàng trả lại của bạn, chúng tôi sẽ gửi cho bạn một email để thông báo rằng chúng tôi đã nhận được nó. Chúng tôi cũng sẽ thông báo cho bạn về việc chấp thuận hoặc từ chối khoản tiền hoàn lại của bạn nhanh nhất có thể. Quá trình xử lý séc sẽ mất thời gian để so sánh và trao đổi với đối tác của chúng tôi.</div>
                    <div>&nbsp;</div>
                    <div>Sau đó, khoản tiền hoàn lại của bạn sẽ được xử lý. Phải mất 3-5 ngày làm việc để xử lý sau khi chúng tôi phát hành chúng.</div>
                    <div>&nbsp;</div>
                    <div>– Nếu bạn chưa nhận được tiền hoàn lại, trước tiên hãy kiểm tra lại tài khoản ngân hàng của bạn. Sau đó liên hệ với công ty thẻ tín dụng của bạn. Có thể mất một thời gian trước khi khoản tiền hoàn lại của bạn được đăng chính thức.</div>
                    <div>&nbsp;</div>
                    <div>– Tiếp theo hãy liên hệ với ngân hàng của bạn. Thường có một số thời gian xử lý trước khi khoản hoàn trả được đăng. Nếu bạn đã thực hiện tất cả những điều này mà vẫn chưa nhận được tiền hoàn lại, vui lòng liên hệ với chúng tôi theo địa chỉ support@dineintrospective.org</div>
                </div>
            </div>
        </div>
    </div>
    <?php footer() ?>
    <script src="./js/search.js"></script>
    <script src="./js/all_products.js"></script>
</body>
</html>