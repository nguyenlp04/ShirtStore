INSERT INTO comments (id_customer, comment, type, id_product, date_comment)
SELECT
    (SELECT id_customer FROM customer ORDER BY RAND() LIMIT 1) AS id_customer,
    CASE
    WHEN RAND() <= 0.01 THEN 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài.'
        WHEN RAND() <= 0.01 THEN 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích.'
        WHEN RAND() <= 0.01 THEN 'Mình đã mua ở rất nhiều nơi rồi, shop này có thể là điểm đến cuối cùng của mình, bán toàn đồ chất lượng.'
        WHEN RAND() <= 0.01 THEN 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.'
        WHEN RAND() <= 0.01 THEN 'Vải mát ghê luôn á trời, mặc áo này mà vào mùa hè thì khỏi nói, cứ như là đang ở mùa đông luôn.'
        WHEN RAND() <= 0.01 THEN 'Dịch vụ chăm sóc khách hàng ở shop này rất tốt luôn mọi người ạ, sản phẩm lại còn ổn áp nữa chứ.'
       WHEN RAND() <= 0.01 THEN 'Sản phẩm tuyệt vời!'
        WHEN RAND() <= 0.01 THEN 'Tôi yêu sản phẩm này!'
        WHEN RAND() <= 0.01 THEN 'Chất lượng sản phẩm tốt.'
        WHEN RAND() <= 0.01 THEN 'Rất ấn tượng với sản phẩm.'
       
        WHEN RAND() <= 0.01 THEN 'Sản phẩm ở đây theo mình thấy thì vô cùng là chất lượng và ổn áp với giá tiền như vậy
Mình là người khá kỹ tính trong việc mua hàng, mà shop này lại làm mình vui vẻ khi mua hàng thì là một thành công lớn của shop này rồi đấy.'
        WHEN RAND() <= 0.01 THEN 'Không phải tự dưng mà tuy khen shop này đâu nhé. Đồ gì đâu mà vừa chất lượng lại vừa có giá vô cùng rẻ nữa chứ.'
        WHEN RAND() <= 0.01 THEN 'Lần đầu tiên mua hàng online nên là hơi lo lo, cứ sợ bị lừa. Nhưng đỡ cái là shop này hỗ trợ cho mình rất tận tình luôn nên cũng yên tâm được phần nào.'
        WHEN RAND() <= 0.01 THEN 'Sản phẩm tốt, ổn áp trong tầm giá như vậy, mình đã mua ở rất nhiều nơi rồi mà không nơi nào làm mình hài lòng như nơi này cả
.'
        WHEN RAND() <= 0.01 THEN 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.'
        ELSE 'Sản phẩm không tệ!'
    END AS comment,
    'product' AS type,
    (SELECT id_product FROM products ORDER BY RAND() LIMIT 1) AS id_product,
    DATE_SUB(NOW(), INTERVAL FLOOR(1 + RAND() * 30) DAY) AS date_comment
FROM customer;



-- Thêm 20 bình luận khen ngợi
INSERT INTO comments (id_customer, comment, type, id_product, date_comment)
SELECT
    (SELECT id_customer FROM customer ORDER BY RAND() LIMIT 1) AS id_customer,
    CASE
        WHEN RAND() <= 0.2 THEN 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!'
        WHEN RAND() <= 0.4 THEN 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!'
        WHEN RAND() <= 0.6 THEN 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.'
        WHEN RAND() <= 0.8 THEN 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.'
        ELSE 'Lần đầu tiên mua hàng online nên là hơi lo lo, cứ sợ bị lừa. Nhưng đỡ cái là shop này hỗ trợ cho mình rất tận tình luôn nên cũng yên tâm được phần nào!'
    END AS comment,
    'product' AS type,
    (SELECT id_product FROM products ORDER BY RAND() LIMIT 1) AS id_product,
    DATE_SUB(NOW(), INTERVAL FLOOR(1 + RAND() * 30) DAY) AS date_comment
FROM customer
LIMIT 20;



<?php
            $query = "SELECT comments.id_customer, comments.id_comment, comments.comment, comments.date_comment, customer.fullname, customer.avatar 
                        FROM comments 
                        JOIN customer ON comments.id_customer = customer.id_customer
                        WHERE id_product = $id_product";
            $resultShowCmt = mysqli_query($conn, $query);
            if ($resultShowCmt) {
                while ($row = mysqli_fetch_assoc($resultShowCmt)) {
                    echo '<div class="bg-white p-2">
                    <input type="hidden" value="' . $row['id_comment'] . '">
                    <div class="d-flex flex-row user-info">
                        <img class="rounded-circle me-2" src="./img/avatarUser/' . $row['avatar'] . '" height="40" width="40">
                        <div class="d-flex flex-column justify-content-start ml-2">
                            <span class="d-block font-weight-bold name"><h5>' . $row['fullname'] . '</h5></span>
                            <span class="date text-black-50">Được chia sẻ công khai - ' . $row['date_comment'] . '
                                <a style="display:' . $btnDeleteCmt . '" href="admin/delete_comment.php?id_comment=' . $row['id_comment'] . '"><i class="mx-2 fa-solid fa-trash"></i></a>
                            </span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="comment-text">' . $row['comment'] . '</p>
                    </div>
                </div>';
                }
            }
            ?>