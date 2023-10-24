<?php
session_start();
include '../config/config.php';
include '../process_send_mail.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit'])) {
  $emailForgot = $_POST['emailForgot'];
  $_SESSION['emailChangePass'] = $emailForgot;
  $random = strval(rand(0001, 9999));
  $_SESSION['codeForgotPass'] = $random;

  $query = "SELECT * FROM customer WHERE email = '$emailForgot'";
  $resultGetEmail = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($resultGetEmail);
  $fullname = $row['fullname'];


  $session_expiration = 180;
  if (isset($_SESSION['codeForgotPass']) && (time() - $_SESSION['codeForgotPass'] > $session_expiration)) {
    unset($_SESSION['user']);
  }

  $resetLink = "http://localhost/Code/auth/change_pass.php?code=$random";

  $subject = "$random là mã khôi phục tài khoản của bạn";
  $message = ' <div style="width: 500px">
    <span
      class="m_2518355874397658137mb_text"
      style="
        font-family: Helvetica Neue, Helvetica, Lucida Grande, tahoma, verdana,
          arial, sans-serif;
        font-size: 16px;
        line-height: 21px;
        color: #141823;
      "
      ><span style="font-size: 15px"
        ><p></p>
        <div style="margin-top: 16px; margin-bottom: 20px">
          Xin chào ' . $fullname . ',
        </div>
        <div>
          Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu
          <span class="il">

          

          </span> của bạn.
        </div>
        Nhập mã đặt lại mật khẩu sau đây:
        <p></p>
        <table
          border="0"
          cellspacing="0"
          cellpadding="0"
          style="
            border-collapse: collapse;
            width: max-content;
            margin-top: 20px;
            margin-bottom: 20px;
          "
        >
          <tbody>
            <tr>
              <td
                style="
                  font-size: 11px;
                  font-family: LucidaGrande, tahoma, verdana, arial,
                    sans-serif;
                  padding: 14px 32px 14px 32px;
                  background-color: #f2f2f2;
                  border-left: 1px solid #ccc;
                  border-right: 1px solid #ccc;
                  border-top: 1px solid #ccc;
                  border-bottom: 1px solid #ccc;
                  text-align: center;
                  border-radius: 7px;
                  display: block;
                  border: 1px solid #1877f2;
                  background: #e7f3ff;
                "
              >
                <span
                  class="m_2518355874397658137mb_text"
                  style="
                    font-family: Helvetica Neue, Helvetica, Lucida Grande,
                      tahoma, verdana, arial, sans-serif;
                    font-size: 16px;
                    line-height: 21px;
                    color: #141823;
                  "
                  ><span
                    style="
                      font-size: 17px;
                      font-family: Roboto;
                      font-weight: 700;
                      margin-left: 0px;
                      margin-right: 0px;
                    "
                    >' . $random . '</span
                  ></span
                >
              </td>
            </tr>
          </tbody>
        </table>
        Ngoài ra, bạn có thể thay đổi trực tiếp mật khẩu của mình.
        <table
          border="0"
          width="100%"
          cellspacing="0"
          cellpadding="0"
          style="border-collapse: collapse"
        >
          <tbody>
            <tr>
              <td height="20" style="line-height: 20px">&nbsp;</td>
            </tr>
            <tr>
              <td align="middle">
                    <tbody>
                      <tr>
                        <td
                          style="
                            border-collapse: collapse;
                            border-radius: 6px;
                            text-align: center;
                            display: block;
                            background: #1877f2;
                            padding: 8px 20px 8px 20px;
                          "
                        >
                          <a
                            href="'.$resetLink.'"
                            style="
                              color: #1b74e4;
                              text-decoration: none;
                              display: block;
                            "
                            target="_blank"
                            ><center>
                              <font size="3"
                                ><span
                                  style="
                                    font-family: Helvetica Neue, Helvetica,
                                      Lucida Grande, tahoma, verdana, arial,
                                      sans-serif;
                                    white-space: nowrap;
                                    font-weight: bold;
                                    vertical-align: middle;
                                    color: #ffffff;
                                    font-weight: 500;
                                    font-family: Roboto-Medium, Roboto,
                                      -apple-system, BlinkMacSystemFont,
                                      Helvetica Neue, Helvetica, Lucida Grande,
                                      tahoma, verdana, arial, sans-serif;
                                    font-size: 17px;
                                  "
                                  >Đổi&nbsp;mật&nbsp;khẩu</span
                                ></font
                              >
                            </center></a
                          >
                        </td>
                      </tr>
                    </tbody>
                  </table></a
                >
              </td>
            </tr>
            <tr>
              <td height="8" style="line-height: 8px">&nbsp;</td>
            </tr>
            <tr>
              <td height="20" style="line-height: 20px">&nbsp;</td>
            </tr>
          </tbody>
        </table>
        <br />
        <div>
          <span style="color: #333333; font-weight: bold"
            >Bạn đã không yêu cầu thay đổi này?</span
          >
        </div>
        Nếu bạn không yêu cầu mật khẩu mới,
        <a
          href="http://localhost/Code3"
          style="color: #0a7cff; text-decoration: none"
          target="_blank"
          >hãy cho chúng tôi biết</a
        >.</span
      >
      <div>
        <div></div>
        <div></div></div
    ></span>
  </div>';
  $customer = "";  // Đặt giá trị customer tương ứng
  header('Location: recover_code.php');

  send_email($emailForgot, $subject, $message, $customer);
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
  <style>
    .form-outline input {
      border: 1px solid #ced4da !important;
      /* Màu và độ dày của border */
      border-radius: 5px;
      /* Bo góc của border */
    }

    /* CSS cho label của input khi được focus */
    .form-outline input:focus+label {
      color: #007bff;
      /* Màu của label khi input được focus */
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

    .container {
      max-height: 100vh;
    }

    .background-radial-gradient {
      height: 100vh;
    }
  </style>

</head>

<body>
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
              <h2 class="fw-bold mb-5 text-center">Đặt lại mật khẩu</h2>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <div class=" mb-4">
                  <div class="">
                    <div class="d-flex justify-content-between"><label class="form-label text-dark m-0 mb-2" for="form3Example2">Vui lòng nhập email để tìm kiếm tài khoản của bạn. </label><?php   ?></div>
                    <input name="emailForgot" type="text" id="form3Example2" placeholder="Email" class="<?php echo $resultUser ?> form-control" />
                  </div>
                </div>


                <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Đặt lại mật khẩu">



                <div class="row d-flex ">
                  <div class="col-6"> <a href="./login.php" class="btn btn-primary shadow-0 text-nowrap w-100">Đăng nhập</a></div>
                  <div class="col-6"><a href="./sign-up.php" class="btn btn-outline-primary me-0 me-md-2 mb-2 mb-md-0 w-100">Đăng ký</a></div>


                </div>


              </form>
            </div>
          </div>
        </div>
      </div>
  </section>
</body>

</html>