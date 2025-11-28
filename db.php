<?php

$connection = mysqli_connect("localhost","root","","hotelms");

// التحقق من نجاح الاتصال
if (!$connection) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}

// تحديد ترميز الاتصال إلى UTF-8
mysqli_set_charset($connection, "utf8");