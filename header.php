<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>نظام ادارة الفنادق</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/custom_styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <style>
        /* إزالة المساحة الجانبية وإضافة مسافة للمحتوى */
        body {
            font-family: 'Tajawal', sans-serif !important;
            padding-top: 80px !important;
            background: #5d00ffff !important;
        }
        
        .container-fluid {
            padding-right: 15px !important;
            padding-left: 15px !important;
        }
        
        /* إلغاء الهوامش الجانبية */
        .col-sm-9, .col-lg-10, .main {
            width: 100% !important;
            margin: 0 !important;
            padding: 20px !important;
        }
        
        /* تنسيق القائمة العلوية */
        .navbar-custom {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
            min-height: 60px;
            border: none;
        }
        
        .navbar-brand {
            color: #fff !important;
            font-weight: 600;
        }
        
        .navbar-brand span {
            color: #3498db;
        }
        
        .navbar-nav-top {
            float: right;
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .navbar-nav-top > li {
            float: right;
            position: relative;
        }
        
        .navbar-nav-top > li > a {
            color: #ecf0f1 !important;
            padding: 20px 18px;
            display: block;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .navbar-nav-top > li > a:hover {
            background: rgba(255,255,255,0.15);
            color: #fff !important;
        }
        
        .navbar-nav-top > li.active > a {
            background: rgba(52, 152, 219, 0.3);
            border-bottom: 3px solid #3498db;
            color: #fff !important;
        }
        
        .navbar-nav-top > li > a i {
            margin-left: 6px;
        }
        
        /* معلومات المستخدم في الأعلى */
        .user-info-top {
            float: left;
            color: #ecf0f1;
            padding: 15px 20px;
            font-size: 14px;
        }
        
        .user-info-top img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-left: 8px;
            vertical-align: middle;
            border: 2px solid #3498db;
        }
        
        .user-info-top .user-name {
            font-weight: 600;
            margin-left: 5px;
            color: #fff;
        }
        
        .user-info-top .user-role {
            font-size: 12px;
            color: #bdc3c7;
        }
        
        /* responsive */
        @media (max-width: 768px) {
            body {
                padding-top: 60px !important;
            }
            
            .navbar-nav-top {
                float: none;
                width: 100%;
            }
            
            .navbar-nav-top > li {
                float: none;
                width: 100%;
            }
            
            .navbar-nav-top > li > a {
                padding: 12px 15px;
            }
            
            .user-info-top {
                float: none;
                text-align: center;
                border-top: 1px solid rgba(255,255,255,0.1);
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?dashboard"><span>نظام</span> ادارة حجوزات الفندق</a>
        </div>
        
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <!-- القائمة الأفقية -->
            <ul class="navbar-nav-top">
                <?php if (isset($_GET['dashboard'])){ ?>
                    <li class="active">
                        <a href="index.php?dashboard"><i class="fa fa-dashboard"></i> لوحة التحكم</a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="index.php?dashboard"><i class="fa fa-dashboard"></i> لوحة التحكم</a>
                    </li>
                <?php } ?>
                
                <?php if (isset($_GET['reservation'])){ ?>
                    <li class="active">
                        <a href="index.php?reservation"><i class="fa fa-calendar"></i> الحجز</a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="index.php?reservation"><i class="fa fa-calendar"></i> الحجز</a>
                    </li>
                <?php } ?>
                
                <?php if (isset($_GET['room_mang'])){ ?>
                    <li class="active">
                        <a href="index.php?room_mang"><i class="fa fa-bed"></i> الغرف</a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="index.php?room_mang"><i class="fa fa-bed"></i> الغرف</a>
                    </li>
                <?php } ?>
                
                <?php if (isset($_GET['staff_mang'])){ ?>
                    <li class="active">
                        <a href="index.php?staff_mang"><i class="fa fa-users"></i> الموظفين</a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="index.php?staff_mang"><i class="fa fa-users"></i> الموظفين</a>
                    </li>
                <?php } ?>
            </ul>
            
            <!-- معلومات المستخدم -->
            <div class="user-info-top">
                <img src="img/user.png" alt="user">
                <span class="user-name"><?php echo $user['name'];?></span>
                <span class="user-role">| Manager</span>
                <a href="logout.php" style="color: #e74c3c; margin-right: 15px;" title="تسجيل الخروج">
                    <i class="fa fa-power-off"></i>
                </a>
            </div>
        </div>
    </div>
</nav>