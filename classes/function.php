<?php 
function showProducts($category) {
    echo '<div class="row container ">
        <div class="col-3 select-category">
            <span class="title-list-category">DANH MỤC SẢN PHẨM</span>
            <div class="is-divider small"></div>
            <ul class="product-categories">';

    global $conn; 

    $queryShowCategory = "SELECT c.slug AS slug, c.title AS category_title, COUNT(p.id_product) AS product_count
        FROM category c 
        LEFT JOIN products p ON c.id_category = p.id_category
        GROUP BY c.id_category, c.title";
    $resultShowCategory = mysqli_query($conn, $queryShowCategory);

    while ($rowCategory = mysqli_fetch_assoc($resultShowCategory)) {
        echo "<li class='cat-item'><a href='" . $rowCategory['slug'] . ".php'>" . $rowCategory['category_title'] . "</a>
            <span class='count'>(" . $rowCategory['product_count'] . ")</span></li><hr class='mt-2 mb-2'>";
    }
    echo '</ul>
        </div>
        <div class="col-9 products">';
    $queryShowProducts = "SELECT sp.id_product AS id_product, sp.name_products, sp.price, sp.discount, sp.image, sp.entry_date, sp.id_category, sp.special_product, sp.views, sp.description, c.title as category_title, c.description as category_description, c.img as category_img 
            FROM products sp 
            JOIN category c ON sp.id_category = c.id_category
            WHERE c.title = '$category'";
    $resultShow = mysqli_query($conn, $queryShowProducts);
    while ($row = mysqli_fetch_assoc($resultShow)) {
        echo "<div class='article-loop'>
            <div class='card'>
                <div class='container-card-products'>
                    <img src='./img/imgProducts" . $row['image'] . "' class='card-img-top' alt=''>
                    <div class='card-body'>
                    <a href='product_detail.php?product_detail=" . $row['id_product'] . "' class='text-decoration-none'>
                        <p class='card-category'>" . $row['category_title'] . "</p>
                        <p class='card-text name-products'>" . $row['name_products'] . "</p>
                        <div class='price d-flex align-items-center'>
                            <p class='discount text-decoration-line-through'>$" . $row['discount'] . "</p>&nbsp;
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

?>