<?php
/**
 */ ?>
<!doctype html>
<html dir="rtl" lang="ar">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>تسجيل الدخول - المهندس أحمد ياسين</title>

  <!-- خط Tajawal -->
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">

  <!-- ستايل داخل الصفحة لضمان العمل (يمكنك نقله لاحقاً إلى css/login.css) -->
  <style>
    /* Reset بسيط */
    * { box-sizing: border-box; }
    html,body { height: 100%; margin:0; padding:0; }

    body {
      font-family: 'Tajawal', sans-serif;
      background: linear-gradient(135deg, #0f172a 0%, #0b3d91 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 30px;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      direction: rtl;
    }

    /* صندوق مركزي */
    .container {
      width: 100%;
      max-width: 420px;
    }

    .card-container {
      background: #fff;
      border-radius: 16px;
      padding: 28px;
      box-shadow: 0 18px 40px rgba(2,6,23,0.45);
      text-align: right;
      overflow: hidden;
    }

    /* صورة البروفايل */
    .profile-img-card {
      width: 96px;
      height: 96px;
      border-radius: 50%;
      object-fit: cover;
      display: block;
      margin-left: 0;
      margin-right: 0;
      margin: 0 auto 12px auto;
      border: 4px solid rgba(26,115,232,0.12);
      background: #f5f7fb;
    }

    /* عنوان */
    .login-title {
      font-size: 20px;
      font-weight: 700;
      color: #0b1220;
      margin: 6px 0 16px 0;
      text-align: center;
    }

    /* تنسيق الـ form */
    .form-signin .form-group {
      margin-bottom: 14px;
    }

    .form-signin label {
      display: block;
      font-weight: 600;
      font-size: 14px;
      margin-bottom: 6px;
      color: #263145;
      text-align: right;
    }

    /* الحقول */
    .form-control {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid #e1e6ef;
      border-radius: 10px;
      font-size: 15px;
      transition: all .18s ease-in-out;
      background: #fff;
      color: #1b2430;
    }
    .form-control:focus {
      outline: none;
      border-color: #1a73e8 !important;
      box-shadow: 0 6px 18px rgba(26,115,232,0.12);
    }

    /* زر احترافي */
    .btn-signin {
      display: inline-block;
      width: 100%;
      padding: 12px 16px;
      border-radius: 12px;
      border: none;
      background: linear-gradient(180deg,#1a73e8,#0e4fa3);
      color: #fff;
      font-weight: 700;
      font-size: 16px;
      cursor: pointer;
      transition: transform .12s ease, box-shadow .12s ease;
      box-shadow: 0 8px 20px rgba(10,70,160,0.18);
    }
    .btn-signin:hover { transform: translateY(-3px); box-shadow: 0 12px 28px rgba(10,70,160,0.22); }
    .btn-signin:active { transform: translateY(-1px); }

    /* رسائل الخطأ */
    .alert {
      background: #fff4f4;
      border: 1px solid #ffd6d6;
      color: #7a1a1a;
      padding: 10px 12px;
      border-radius: 8px;
      margin-bottom: 12px;
      font-size: 14px;
      text-align: right;
    }

    /* responsive */
    @media (max-width:480px) {
      .card-container { padding: 20px; border-radius: 12px; }
      .profile-img-card { width:78px; height:78px; }
      .login-title { font-size:18px; }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card card-container" role="main">
    <!-- صورة: تأكد أن المسار img/hot.png موجود، وإلا ضع رابط كامل -->
    <img id="profile-img" class="profile-img-card" src="img/hot.png" alt="logo"/>

    <h2 class="login-title">تسجيل الدخول</h2>

    <div class="result">
      <?php
      if (isset($_GET['empty'])){
          echo '<div class="alert alert-danger">الرجاء إدخال اسم المستخدم أو كلمة المرور</div>';
      } elseif (isset($_GET['loginE'])){
          echo '<div class="alert alert-danger">اسم المستخدم أو كلمة المرور غير صحيحة</div>';
      } ?>
    </div>

    <form class="form-signin" data-toggle="validator" action="ajax.php" method="post" autocomplete="on">
      <div class="form-group">
        <label for="email">البريد الالكتروني او اسم المستخدم</label>
        <input id="email" type="text" name="email" class="form-control" required aria-required="true" />
      </div>

      <div class="form-group">
        <label for="password">كلمة المرور</label>
        <input id="password" type="password" name="password" class="form-control" required aria-required="true" />
      </div>

      <button class="btn btn-lg btn-success btn-block btn-signin" type="submit" name="login">تسجيل الدخول</button>
    </form>
  </div>
</div>

<!-- سكربتات (تبقى كما هي) -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.min.js"></script>

</body>
</html>
