<?php
session_start();
include '../config/config.php';
include'../process_send_mail.php';
ini_set('display_errors', 1); error_reporting(E_ALL);
if(isset($_POST['submit'])){
    $codeRecover = $_POST['codeRecover'];
    $code = $_SESSION['codeForgotPass'];
    if($codeRecover == $code ){
      header('Location: change_pass.php');
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
    <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/auth.css">
  <title>Đặt lại mật khẩu</title>
  <style>
    .form-outline input {
        border: 1px solid #ced4da !important; /* Màu và độ dày của border */
        border-radius: 5px; /* Bo góc của border */
    }

    /* CSS cho label của input khi được focus */
    .form-outline input:focus + label {
        color: #007bff; /* Màu của label khi input được focus */
    }
    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
.container{
    max-height: 100vh;
}
.background-radial-gradient{
    height: 100vh;
}
  </style>
  
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
          <h2 class="fw-bold mb-5 text-center">Nhập mã bảo mật</h2>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
              <div class="">
                  <div class="">
                     <div class="d-flex justify-content-between"><label class="form-label text-dark m-0 mb-2" for="form3Example2">Vui lòng kiểm tra mã trong email của bạn. Mã này gồm 4 số. </label><?php   ?></div> 
                    <input name="codeRecover" type="text" id="form3Example2" placeholder="Nhập mã" class="<?php echo $resultUser ?> form-control" />
                  </div>
                </div>
           
                <div class="float-end m-0 p-0">
                    <button type="button" class="btn btn-success"><a href="forgot-password.php" class="text-light text-decoration-none">Quay lại</a></button>
                    <div class="button-buy mt-4 mb-4 btn btn-primary shadow-0">
                        <input class="text-uppercase" name="submit" style="background: unset; color: white; border: none;" type="submit" value="Tiếp tục">
                    </div>
                </div>
              
             
              
            </form>
        </div>
      </div>
    </div>
  </div>
</section>
</body>

</html>
