<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

class Database
{
    private  $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ShirtStoreDB";
    public $conn;
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
class DeleteHandler
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }
    public  function deleteItem($name_table, $col_name, $id_item)
    {
        global $deleteSuccess;
        global $deleteFailure;
        $conn = $this->conn->conn;
        $sql = "SELECT * FROM $name_table WHERE $col_name ='$id_item'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $delete = "DELETE FROM $name_table WHERE $col_name ='$id_item'";
            if ($conn->query($delete) === TRUE) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
                $_SESSION['delete_success'] = true;
            } else {
            }
        }
        echo "Không tìm thấy dữ liệu";
        exit;
    }
}
class AddHandler
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }
    public function addCoupon()
    {
        global $addSuccess;
        global $addFailure;
        global $couponlAvailable;
        global $resultCode;
        global $resultDiscount;
        global $resultStartDate;
        global $resultEndDate;
        global $resultUses;

        $code = $_POST['code'];
        $discount = $_POST['discount'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $uses = $_POST['uses'];
        $description = $_POST['description'];


        $conn = $this->conn->conn;
        $resultCode = "";
        $resultDiscount = "";
        $resultStartDate = "";
        $resultEndDate = "";
        $resultUses = "";
        $couponlAvailable = "";
        $sqlCheck = "SELECT * FROM `coupons` WHERE name_coupon = '$code'";
        $resultCheck = $conn->query($sqlCheck);

        if (mysqli_num_rows($resultCheck) > 0) {
            $couponlAvailable = '<span class="text-danger">Mã giảm giá đã tồn tại</span>';
            $resultCode = "border-danger";
        } else if ($code === "") {
            $resultCode = "border-danger";
        } else {
            $resultCode = "";
        }


        $resultDiscount = $discount == "" ? "border-danger" : "";
        $resultStartDate = $startDate == "" ? "border-danger" : "";
        $resultEndDate = $endDate == "" ? "border-danger" : "";
        $resultUses = $uses == "" ? "border-danger" : "";


        if (
            $resultCode == "" &&
            $resultDiscount == "" &&
            $resultStartDate == "" &&
            $resultEndDate == "" &&
            $resultUses == ""
        ) {
            $sql = "INSERT INTO `coupons` (`name_coupon`, `discount_coupon`, `start_date_coupon`, `end_date_coupon`, `max_uses_coupon`, `description_coupon`) 
            VALUES ('$code', '$discount', '$startDate', '$endDate', '$uses', '$description')";
            if (mysqli_query($conn, $sql)) {
                $addSuccess = true;
            } else {
                $addFailure = true;
            }
        } else {
            $addFailure = true;
        }
    }
    public  function addCategorys()
    {
        $conn = $this->conn->conn;
        global $addSuccess;
        global $addFailure;
        global $resultNameCategery;
        global $resultDescription;

        $userPost = $_SESSION['username'];
        $name = $_POST["nameCategory"];
        $description = $_POST["description"];
        function createSlug($string)
        {
            $string = strtolower($string);
            $string = preg_replace('/[^a-z0-9\-]/', '-', $string);
            $string = preg_replace('/-+/', '-', $string);
            return $string;
        }

        $slug = createSlug($name);
        $img = $_FILES["fileToUpload"];
        $fileName = $img["name"];
        if ($fileName != "") {
            $path = $userPost . basename($_FILES['fileToUpload']['name']);
        } else {
            $path = "categoryDefault.png";
        }
        $target_dir = "../img/imgCategory/";
        $target_file = $target_dir . $path;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        }
        $avatarCategoryPath = '/' . $path;
        if (isset($_POST["nameCategory"])) {
            if ($name === "") {
                $resultNameCategery = "border-danger";
            } else {
                $resultNameCategery = "";
            }
        }
        if (isset($_POST["description"])) {
            if ($description === "") {
                $resultDescription = "border-danger";
            } else {
                $resultDescription = "";
            }
        }
        if ($resultDescription === '' && $resultNameCategery === '') {
            $sql = "INSERT INTO `category` (`title`,`description`,`img`,`slug`) VALUES('$name','$description','$avatarCategoryPath', '$slug')";
            if (mysqli_query($conn, $sql)) {
                $addSuccess = true;
            } else {
                $addFailure = true;
            }
        } else {
            $addFailure = true;
        }
    }
    public  function addNews()
    {
        global $addSuccess;
        global $addFailure;
        global $resultTitle;


        $conn = $this->conn->conn;
        $userPost = $_SESSION['username'];
        $sqlGetFullname = "SELECT * FROM customer WHERE username='$userPost'";
        $result = $conn->query($sqlGetFullname);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Không tìm thấy dữ liệu";
            exit;
        }
        $FullnamePost = $row['fullname'];
        $maUserPost = $row['id_customer'];

        $title = $_POST["title"];
        $content = $_POST["content"];

        $avatar = $_FILES["fileToUpload"];
        $fileName = $avatar["name"];
        if ($fileName != "") {
            $path = $userPost . basename($_FILES['fileToUpload']['name']);
        } else {
            $path = "postDefault.jpeg";
        }
        $target_dir = "../img/imgPost/";
        $target_file = $target_dir . $path;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        }
        $avatarPostPath =  $path;
        $datePost = date('Y-m-d');

        $resultTitle = $title == "" ? "border-danger" : "";

        if ($resultTitle === "") {
            $sql = "INSERT INTO `news` (`title`,`description`,`id_customer`,`author`,`img`,`date`) VALUES('$title','$content','$maUserPost','$FullnamePost','$avatarPostPath','$datePost')";
            $old = mysqli_query($conn, $sql);
            $addSuccess = true;
        } else {
            $addFailure = true;
        }
    }
    public  function addProducts()
    {
        $userPost = $_SESSION['username'];
        $conn = $this->conn->conn;
        global $addSuccess;
        global $addFailure;
        global $resultName;
        global $resultPrice;
        global $resultDiscount;
        global $resultDate;
        $nameProduct = $_POST["nameProduct"];
        $priceProduct = $_POST["priceProduct"];
        $discountPriceProduct = $_POST["discountPriceProduct"];
        $dateProduct = $_POST["dateProduct"];
        $quatityProduct = $_POST["quantityPriceProduct"];
        $categoryProducts = $_POST["categoryProducts"];
        $description = $_POST["description"];
        $particular = "đặc biệt";
        $view = 0;
        $imgProduct = $_FILES["fileToUpload"];
        $fileName = $imgProduct["name"];
        $resultName = "";
        $resultPrice = "";
        $resultDiscount = "";
        $resultDate = "";
        $resultnameProduct = !empty($nameProduct) ?? false;
        $resultpriceProduct = !empty($priceProduct) ?? false;
        $resultdateProduct = !empty($dateProduct) ?? false;
        if ($quatityProduct == "") {
            $quatityProduct = 0;
        }
        if ($fileName != "") {
            $path = $userPost . basename($_FILES['fileToUpload']['name']);
        } else {
            $path = "productsDefault.png";
        }
        $resultName = $nameProduct == "" ? "border-danger" : "";
        $resultPrice = $priceProduct == "" ? "border-danger" : "";
        // $resultDiscount = $discountPriceProduct == "" ? "border-danger" : "";
        if ($discountPriceProduct == '') {
            $discountPriceProduct = 0;
        }
        
        $resultDate = $dateProduct == "" ? "border-danger" : "";
        $target_dir = "../img/imgProducts/";
        $target_file = $target_dir . $path;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        }
        $avatarCategoryPath = '/' . $path;
        if ($resultnameProduct && $resultpriceProduct && $resultdateProduct) {
            $sql = "INSERT INTO `products` (`name_products`,`price`,`discount`,`image`,`entry_date`, `quantity`,`id_category`,`special_product`,`views`,`description`) 
        VALUES('$nameProduct','$priceProduct','$discountPriceProduct', '$avatarCategoryPath','$dateProduct','$quatityProduct','$categoryProducts','$particular','$view','$description')";
            $old = mysqli_query($conn, $sql);
            $addSuccess = true;
        } else {
            $addFailure = true;
        }
    }
    public  function addUser()
    {
        $conn = $this->conn->conn;
        global $addSuccess;
        global $addFailure;
        global $resultFullName;
        global $resultUser;
        global $resultPass;
        global $resultCfPass;
        global $resultEmail;
        global $userAvailable;
        global $emailAvailable;
        $fullname = $_POST["fullname"];
        $user = $_POST["username"];
        $pass = $_POST["password"];
        $cfpass = $_POST["cfpassword"];
        $email = $_POST["email"];
        $vaitro = $_POST["vaitro"];

        $avatar = $_FILES["fileToUpload"];
        $fileName = $avatar["name"];
        if ($fileName != "") {
            $path = $user . basename($_FILES['fileToUpload']['name']);
        } else {
            $path = "user.png";
        }
        $target_dir = "../img/avatarUser/";
        $target_file = $target_dir . $path;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        }
        $avatarPath = '/' . $path;

        $resultFullName = empty($fullname) ? "border-danger" : "";
        $resultUser = (empty($user) || strlen($user) < 1) ? "border-danger" : "";
        $resultPass = empty($pass) ? "border-danger" : "";
        $resultCfPass = ($pass != $cfpass || empty($pass)) ? "border-danger" : "";


        if (isset($_POST["email"])) {
            $sqlEmail = "SELECT * FROM `customer` WHERE email = '$email'";
            $oldEmail = mysqli_query($conn, $sqlEmail);
            if (mysqli_num_rows($oldEmail) > 0) {
                $emailAvailable = '<span class="text-danger">Email đã tồn tại</span>';
                $resultEmail = "border-danger";
            } else if ($email === "") {
                $resultEmail = "border-danger";
                $addFailure = true;
            } else {
                $resultEmail = "";
            }
        }

        $sql = "SELECT * FROM `customer` WHERE username = '$user'";
        $old = mysqli_query($conn, $sql);
        if (mysqli_num_rows($old) > 0) {
            $userAvailable = '<span class="text-danger">Tên đăng nhập đã tồn tại</span>';
            $addFailure = true;
            $resultUser = "border-danger";
        } else if ($user == "") {
            $resultUser = "";
            $resultUser = "border-danger";
        } else {
            $resultUser = "";
        }

        if ($resultFullName == "" && $resultUser == "" && $resultPass == "" && $resultCfPass == "" && $resultEmail == "") {
            $sql = "INSERT INTO `customer` (`username`,`fullname`,`password`,`email`,`avatar`,`roles`) VALUES('$user','$fullname','$pass','$email','$avatarPath','$vaitro')";
            mysqli_query($conn, $sql);
            $addSuccess = true;
        } else {
            $addFailure = true;
        }
    }
}
class UpdateHandler
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }
    public  function updateCategory()
    {
        $conn = $this->conn->conn;
        global $addSuccess;
        global $addFailure;
        global $resultNameCategery;
        global $resultDescription;
        $userPost = $_SESSION['username'];
        $id_category = $_POST['id_category'];
        $name = $_POST["nameCategory"];
        $description = $_POST["description"];
        $img = $_FILES["fileToUpload"];
        $fileName = $img["name"];
        if ($fileName != "") {
            $path = $userPost . basename($_FILES['fileToUpload']['name']);
        } else {
            $path = "categoryDefault.png";
        }
        $target_dir = "../img/imgCategory/";
        $target_file = $target_dir . $path;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        }
        $avatarCategoryPath = '/' . $path;

        $resultNameCategery = $name == "" ? "border-danger" : "";
        $resultDescription = $description == "" ? "border-danger" : "";


        if ($resultDescription === "" && $resultNameCategery === "") {
            $sql = "UPDATE category SET title = '$name', description = '$description', img = '$avatarCategoryPath' WHERE id_category='$id_category'";
            $old = mysqli_query($conn, $sql);
            if ($conn->query($sql) === TRUE) {
                $addSuccess = true;
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
                $addFailure = true;
            }
        } else {
            $addFailure = true;
        }
    }
    public  function updateNews()
    {
        $conn = $this->conn->conn;
        global $updateSuccess;
        global $updateFailure;
        global $resultTitle;
        $userPost = $_SESSION['username'];
        $id_news = $_POST['id_news'];
        $title = $_POST["title"];
        $content = $_POST["content"];

        $avatar = $_FILES["fileToUpload"];
        $fileName = $avatar["name"];
        if ($fileName != "") {
            $path = $userPost . basename($_FILES['fileToUpload']['name']);
        } else {
            $query = "SELECT * FROM news WHERE id_news='$id_news'";
            $resultShow = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($resultShow);
            $path = $row['img'];
        }

        $resultTitle = $title == "" ? "border-danger" : "";


        $target_dir = "../img/imgPost";
        $target_file = $target_dir . $path;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        }
        $avatarPostPath = $path;
        if ($resultTitle == "") {
            $sql = "UPDATE news SET title = '$title', description = '$content', img = '$avatarPostPath' WHERE id_news='$id_news'";
            $old = mysqli_query($conn, $sql);
            if ($conn->query($sql) === TRUE) {
                $updateSuccess = true;
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $updateFailure = true;
        }
    }
    public  function updateUser()
    {
        $conn = $this->conn->conn;
        global $addSuccess;
        global $addFailure;
        global $emailAvailable;
        global $warningEmail;
        global $resultUser;
        global $resultPass;

        $ma_kh = $_POST['id_customer'];
        $fullname = $_POST["fullname"];
        $pass = $_POST["password"];
        $email = $_POST["email"];
        $vaitro = $_POST["vaitro"];
        $user = $_POST["username"];
        $avatar = $_FILES["fileToUpload"];
        $fileName = $avatar["name"];
        if ($fileName != "") {
            $path = $user . basename($_FILES['fileToUpload']['name']);
        } else {
            $query = "SELECT * FROM customer WHERE id_customer='$ma_kh'";
            $resultShow = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($resultShow);
            $path = $row['avatar'];
        }
        $target_dir = "../img/avatarUser/";
        $target_file = $target_dir . $path;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        }
        $avatarPath = '/' . $path;
        $resultUser = $user == "" ? "border-danger" : "";
        $resultPass = $pass == "" ? "border-danger" : "";
        $sqlEmail = "SELECT * FROM `customer` WHERE email = '$email'";
        $oldEmail = mysqli_query($conn, $sqlEmail);
        if (mysqli_num_rows($oldEmail) > 1) {
            $emailAvailable = '<span class="text-danger">Email đã tồn tại</span>';
            $warningEmail = "border-danger";
        } else if ($email == "") {
            $emailAvailable = '<span class="text-danger">Vui lòng nhập email</span>';
            $warningEmail = "border-danger";
        } else {
            $warningEmail = "";
        }


        if ($resultUser == "" && $resultPass == "" && $warningEmail == "") {
            $sql = "UPDATE customer SET  fullname='$fullname', password='$pass', email='$email', avatar='$avatarPath', roles = '$vaitro' WHERE id_customer='$ma_kh'";
            $old = mysqli_query($conn, $sql);
            $addSuccess = true;
            if ($conn->query($sql) === TRUE) {
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $addFailure = true;
        }
    }
    public  function updateCoupon()
    {
        $conn = $this->conn->conn;
        global $updateSuccess;
        global $updateFailure;
        global $resultCode;
        global $couponlAvailable;
        global $resultDiscount;
        global $resultStartDate;
        global $resultEndDate;
        global $resultUses;

        $code = $_POST['code'];
        $id_coupon = $_POST['id_coupon'];
        $discount = $_POST["discount"];
        $startDate = $_POST["startDate"];
        $endDate = $_POST["endDate"];
        $uses = $_POST["uses"];
        $description = $_POST["description"];

        if ($code === "") {
            $resultCode = "border-danger";
            $couponlAvailable = "Mã giảm giá không hợp lệ";
        } else {
            $resultCode = "";
        }
        $resultDiscount = $discount == "" ? "border-danger" : "";
        $resultStartDate = $startDate == "" ? "border-danger" : "";
        $resultEndDate = $endDate == "" ? "border-danger" : "";
        $resultUses = $uses == "" ? "border-danger" : "";

        if ($resultCode == "" && $resultDiscount == "" && $resultStartDate == "" && $resultEndDate == "" && $resultUses == "") {
            $sql = "UPDATE coupons SET name_coupon = '$code', discount_coupon = '$discount',
            start_date_coupon = '$startDate', end_date_coupon = '$endDate', max_uses_coupon = '$uses', description_coupon = '$description' 
            WHERE id_coupon='$id_coupon'";
            $old = mysqli_query($conn, $sql);
            if ($conn->query($sql) === TRUE) {
                $updateSuccess = true;
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $updateFailure = true;
        }
    }

    public  function updateProduct()
    {
        $conn = $this->conn->conn;
        global $updateSuccess;
        global $updateFailure;
        global $resultName;
        global $resultPrice;
        global $resultDiscount;
        global $resultDate;
        global $resultCategory;


        $userPost = $_SESSION['username'];
        $id_product = $_POST["id_product"];
        $nameProduct = $_POST["nameProduct"];
        $priceProduct = $_POST["priceProduct"];
        $discountPriceProduct = $_POST["discountPriceProduct"];
        $dateProduct = $_POST["dateProduct"];
        $quatityProduct = $_POST["quantityPriceProduct"];
        $categoryProducts = $_POST["categoryProducts"];
        $description = $_POST["description"];
        $img = $_FILES["fileToUpload"];
        $fileName = $img["name"];
        $path = "";
        if ($fileName != "") {
            $path = $userPost . basename($_FILES['fileToUpload']['name']);
        } else {
            $query = "SELECT * FROM products WHERE id_product='$id_product'";
            $resultShow = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($resultShow);
            $path = $row['image'];
        }


        $target_dir = "../img/imgProducts/";
        $target_file = $target_dir . $path;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        }
        $avatarProduct = '/' . $path;


        if ($quatityProduct == "") {
            $quatityProduct = 0;
        }

        $resultName = $nameProduct == "" ? "border-danger" : "";
        $resultPrice = $priceProduct == "" ? "border-danger" : "";
        $resultDiscount = $discountPriceProduct == "" ? "border-danger" : "";
        $resultDate = $dateProduct == "" ? "border-danger" : "";
        $resultCategory = $categoryProducts == "" ? "border-danger" : "";




        if ($resultName == "" && $resultPrice == "" && $resultDiscount == "" && $resultDate == "" && $resultCategory == "") {

                $sql = "UPDATE products SET name_products = '$nameProduct', image = '$avatarProduct', price = '$priceProduct',
                discount = '$discountPriceProduct', entry_date = '$dateProduct', quantity = '$quatityProduct', id_category = '$categoryProducts', description = '$description'
                WHERE id_product='$id_product'";
                $old = mysqli_query($conn, $sql);
                if ($conn->query($sql) === TRUE) {
                    $updateSuccess = true;
                } 
        } else {
            $updateFailure = true;
        }
    }
}
class RenderHandler
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }
    public  function renderInputValues($name_table, $col_name, $id_item)
    {
        $conn = $this->conn->conn;
        $sql = "SELECT * FROM $name_table WHERE $col_name='$id_item'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }
    }

    public  function renderJoinedData($primaryTable, $relatedTable, $id)
    {
        $conn = $this->conn->conn;
        $query = "SELECT $primaryTable.*, $relatedTable.*
        FROM $primaryTable
        JOIN $relatedTable ON $primaryTable.$id = $relatedTable.$id";
        $result = $conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public  function renderTableData($name_tabele)
    {
        $conn = $this->conn->conn;
        $query = "SELECT * FROM $name_tabele";
        $result = $conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $data[] = $item;
            }
        }
        return $data;
    }

    
}


class ChangeInfoHandler
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }
    public  function changeInfo()
    {
        global $changeInfoSuccess;
        global $changeInfoFailure;
        global $resultFullname;
        global $resultEmail;
        $conn = $this->conn->conn;
        $email = $_POST["email"];
        $usernameProfile = $_SESSION['username'];
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $userPost = $_SESSION['username'];
        $img = $_FILES["fileToUpload"];
        $fileName = $img["name"];
        $id_customer = $_POST["id_customer"];
        $path = "";
        if ($fileName != "") {
            $path = $userPost . basename($_FILES['fileToUpload']['name']);
        } else {
            $query = "SELECT * FROM products WHERE id_customer='$id_customer'";
            $resultAvt = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($resultAvt);
            $path = $row['avatar'];
        }
        $target_dir = "../img/avatarUser/";
        $target_file = $target_dir . $path;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        }
        $avatarUser = '/' . $path;
        $resultFullname = $fullname === "" ? "border-danger" : "";
        $resultEmail = $email === "" ? "border-danger" : "";
        if ($resultFullname == "" && $resultEmail == "") {
            $sql = "UPDATE customer SET fullname='$fullname', email='$email', avatar ='$avatarUser' WHERE username='$usernameProfile'";
            mysqli_query($conn, $sql);
            $changeInfoSuccess = true;
        } else {
            $changeInfoFailure = true;
        }
    }
    public  function changePass()
    {
        global $changePassSuccess;
        global $changePassFailure;
        global $resultPass;
        global $resultCfPass;

        $conn = $this->conn->conn;
        $usernameProfile = $_SESSION['username'];

        $password = $_POST["pass"];
        $passNew = $_POST["passNew"];
        $cfpassNew = $_POST["cfpassNew"];

        $sqlChangePass = "SELECT * FROM customer WHERE username='$usernameProfile'";
        $resultChangePass = $conn->query($sqlChangePass);
        if ($resultChangePass->num_rows > 0) {
            $row = $resultChangePass->fetch_assoc();
        } else {
            echo "Không tìm thấy dữ liệu";
            exit;
        }


        $resultPass = ($password === "" || $row['password'] != $password) ? "border-danger" : "";
        $resultCfPass = ($passNew != $cfpassNew || $passNew === "") ? "border-danger" : "";


        if ($resultPass == "" && $resultCfPass == "") {
            $sqlChangePass = "UPDATE customer SET password = '$passNew' WHERE username='$usernameProfile'";
            $oldChangePass = mysqli_query($conn, $sqlChangePass);
            $changePassSuccess = true;
        } else {
            $changePassFailure = true;
        }
    }
}

