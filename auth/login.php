<?php
ini_set('display_errors', 1); error_reporting(E_ALL);
session_start();
    include '../config/config.php';
    $userAvailable = "";
    $resultUser = "";
    $warning = "";
    $resultPass = "";
    $passAvailable = "";
    if (isset($_POST['submit'])) {
      $username = $_POST["username"];
      $password = $_POST["password"];
        if(isset($_POST["username"])){
            if($username == ""){
                $userAvailable = '<span class="text-danger">Tên đăng nhập không hợp lệ</span>';
                $resultUser = "border-danger";
            } else {
                $userAvailable = "";
                $resultUser = "";
            }
        }
        if(isset($_POST["password"])){
            if($password == ""){
                $resultPass = "border-danger";
                $passAvailable = '<span class="text-danger">Mật khẩu không hợp lệ</span>';
            } else {
                $resultPass = "";
                $passAvailable = "";
            }
        }
        $sqlVT = "SELECT roles FROM customer";
        $resultVT = mysqli_query($conn, $sqlVT);

        if($resultUser == "" && $resultPass == ""){
          $sqlAvatar = "SELECT * FROM customer WHERE username = '$username' ";
          $resultGetAvatar = mysqli_query($conn, $sqlAvatar);
          
          if (mysqli_num_rows($resultGetAvatar) > 0) {
              // Lấy kết quả và gán avatar vào session
              $rowGetInfo = mysqli_fetch_assoc($resultGetAvatar);
              $avatar = $rowGetInfo['avatar'];
              $_SESSION['getAvatarUser'] = $avatar;
              $id_customer = $rowGetInfo['id_customer'];
              $_SESSION['id_customer'] = $id_customer;
              $fullname = $rowGetInfo['fullname'];
              $_SESSION['fullname'] = $fullname;
          } 
            $sqlAdmin = "SELECT * FROM customer WHERE username = '$username' && password = '$password' && roles = 'admin'";
            $logAdmin = mysqli_query($conn, $sqlAdmin);
            $getAvatar = $logAdmin->fetch_assoc();
            $_SESSION['username'] = $username;
            $_SESSION['admin'] = $username;
            $_SESSION['vai_tro'] = "admin";
            if(mysqli_num_rows($logAdmin) > 0){
              header("location: ../admin/dashboard.php");
              exit();
            }
             $sql = "SELECT * FROM customer WHERE username = '$username' && password = '$password'";
             $user = mysqli_query($conn, $sql);
             if(mysqli_num_rows($user) > 0){
              $_SESSION['username'] = $username;
              $_SESSION['vai_tro'] = "user";
               header("location: ../index.php");
               exit();
              }  else{
                $warning = '<div class="warning" style="display:block";><p>Tên đăng nhập hoặc mật khẩu không đúng</p></div>';
             }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/auth.css">
  <title>Document</title>
</head>

<body >
<section class="background-radial-gradient overflow-hidden">
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          The best offer <br />
          <span style="color: hsl(218, 81%, 75%)">for your business</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
          Temporibus, expedita iusto veniam atque, magni tempora mollitia
          dolorum consequatur nulla, neque debitis eos reprehenderit quasi
          ab ipsum nisi dolorem modi. Quos?
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
          <h2 class="fw-bold mb-5 text-center">Đăng nhập</h2>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class=" mb-4">
                  <div class="">
                     <div class="d-flex justify-content-between"><label class="form-label text-dark m-0" for="form3Example2">Username </label><?php echo $userAvailable ?></div> 
                    <input name="username" type="text" id="form3Example2" placeholder="Username" class="<?php echo $resultUser ?> form-control" />
                  </div>
                </div>
            <!-- Password input -->
            <div class=" mb-4">
            <div class="d-flex justify-content-between"><label class="form-label text-dark m-0" for="form3Example4">Mật khẩu</label><?php echo $passAvailable ?></div> 
                <input name="password" type="password" id="form3Example4" placeholder="Mật khẩu" class="<?php echo $resultPass ?> form-control" />
              </div>
              
              <!-- Submit button -->
              <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Login">
              <div class="d-flex justify-content-end">
             <p><a class="text-decoration-none" href="forgot-password.php">Quên mật khẩu</a></p>
              </div>
<!-- Register buttons -->
            <div class="text-center">
             <p>Bạn chưa có tài khoản? <a class="text-decoration-none" href="sign-up.php">Đăng ký</a></p>
            <div class="text-center">
             <p>hoặc đăng nhập bằng:</p>
                <button type="button" class="border btn btn-link ">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="border btn btn-link ">
                  <i class="fab fa-google"></i>
                </button>

                <button type="button" class="border btn btn-link ">
                  <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="border btn btn-link ">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>

</html>
