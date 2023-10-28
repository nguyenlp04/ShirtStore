<?php 
function showProducts($id_category) {
    echo '<div class="row container ">
        <div class="col-3 select-category">
            <span class="title-list-category">DANH MỤC SẢN PHẨM</span>
            <div class="is-divider small"></div>
            <ul class="product-categories">';

    global $conn; 

    $queryShowCategory = "SELECT c.id_category AS id_category,c.slug AS slug, c.title AS category_title, COUNT(p.id_product) AS product_count
        FROM category c 
        LEFT JOIN products p ON c.id_category = p.id_category
        GROUP BY c.id_category, c.title";
    $resultShowCategory = mysqli_query($conn, $queryShowCategory);

    while ($rowCategory = mysqli_fetch_assoc($resultShowCategory)) {
        echo "<li class='cat-item'><a href='category.php?id_category=" . $rowCategory['id_category'] . "'>" . $rowCategory['category_title'] . "</a>
            <span class='count'>(" . $rowCategory['product_count'] . ")</span></li><hr class='mt-2 mb-2'>";
    }
    echo '</ul>
        </div>
        <div class="col-9 products">';
    $queryShowProducts = "SELECT sp.id_product AS id_product, sp.name_products, sp.price, sp.discount, sp.image, sp.entry_date, sp.id_category, sp.special_product, sp.views, sp.description, c.title as category_title, c.description as category_description, c.img as category_img 
            FROM products sp 
            JOIN category c ON sp.id_category = c.id_category
            WHERE c.id_category = '$id_category'";
    $resultShow = mysqli_query($conn, $queryShowProducts);
    while ($row = mysqli_fetch_assoc($resultShow)) {
        $hiddenDiscount = "";
        if($row['discount'] == 0){
            $hiddenDiscount = 'd-none';
            }
            $temp = $row['price'];
            $row['price'] = $row['discount'];
            $row['discount'] = $temp;
        echo "<div class='article-loop'>
            <div class='card'>
                <div class='container-card-products'>
                    <img src='./img/imgProducts" . $row['image'] . "' class='card-img-top' alt=''>
                    <div class='card-body'>
                    <a href='product_detail.php?product_detail=" . $row['id_product'] . "' class='text-decoration-none'>
                        <p class='card-category'>" . $row['category_title'] . "</p>
                        <p class='card-text name-products'>" . $row['name_products'] . "</p>
                        <div class='price d-flex align-items-center'>
                            <p class='discount text-decoration-line-through ".$hiddenDiscount."'>$" . $row['discount'] . "</p>&nbsp;
                            <span class='gia'>$" . $row['price'] . "</span>
                        </div>
                        </a>
                        <a href='product_detail.php?product_detail=" . $row['id_product'] . "' class='btn btn-outline-primary'>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>";
    }
    echo '</div>
    </div>';
}
function postComment($id, $type, $rowID){
    global $conn; 
    if (isset($_POST['postComment'])) {
        if (isset($_SESSION['id_customer'])) {
            $id_customer = $_SESSION['id_customer'];
        } else {
            $id_customer = 0;
        }
        $comment = $_POST["comment"];
        $dateCmt = date('Y-m-d');
        $sqlCmt = "INSERT INTO `comments` (`id_customer`,`comment`,`type`,`$rowID`,`date_comment`) 
        VALUES('$id_customer','$comment','$type','$id','$dateCmt')";
        $old = mysqli_query($conn, $sqlCmt);
    }
}

function deleteComment($idDelete, $rowID){
    global $conn, $id_customer; 
    $query = "SELECT comments.id_customer, comments.id_comment, comments.comment, comments.date_comment, customer.fullname, customer.avatar 
                        FROM comments 
                        JOIN customer ON comments.id_customer = customer.id_customer
                        WHERE $rowID = $idDelete";
                    $resultShowCmt = mysqli_query($conn, $query);
                    if ($resultShowCmt) {
                        while ($row = mysqli_fetch_assoc($resultShowCmt)) {
                            if ($row['id_customer'] == $id_customer || isset($_SESSION['vai_tro']) && $_SESSION['vai_tro'] === "admin") {
                                $btnDeleteCmt = "inline-block";
                            } else {
                                $btnDeleteCmt = "none";
                            }
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
}

function addToCart($index, $id_product, $nameProduct, $imageProduct, $priceProduct, $categoryProduct, $size, $quantity){
    $productInfo = array(
        'index' => $index,  
        'id' => $id_product,
        'name' => $nameProduct,
        'image' => $imageProduct,
        'price' => $priceProduct * $quantity,
        'category' => $categoryProduct,
        'size' => $size,
        'quantity' => $quantity,
    );
    // Thêm sản phẩm vào giỏ hàng
    $_SESSION['cart'][] = $productInfo;
}

function getQuantityCategory($id){
    global $conn; 
    $sql = "SELECT COUNT(*) AS product_count
    FROM products
    WHERE id_category = $id";
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        $productCount = $row["product_count"];
        return $productCount;
    } else {
        return 0; 
    }
}


?>