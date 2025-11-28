<?php
if (isset($_GET['room_id'])){
    $get_room_id = $_GET['room_id'];
    $get_room_sql = "SELECT * FROM room NATURAL JOIN room_type WHERE room_id = '$get_room_id'";
    $get_room_result = mysqli_query($connection,$get_room_sql);
    $get_room = mysqli_fetch_assoc($get_room_result);

    $get_room_type_id = $get_room['room_type_id'];
    $get_room_type = $get_room['room_type'];
    $get_room_no = $get_room['room_no'];
    $get_room_price = $get_room['price'];
}

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">الحجز</li>
        </ol>
    </div><!--/.row-->

    <!-- <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Reservation</h1>
        </div>
    </div>/.row -->

    

    <div class="row">
        <div class="col-lg-12">
            <form role="form" id="booking" data-toggle="validator">
                <div class="response"></div>
                <div class="col-lg-12">
                    <?php
                    if (isset($_GET['room_id'])){?>

                        <div class="panel panel-default">
                            <div class="panel-heading">معلومات الغرفة:
                                <a class="btn btn-secondary pull-right" href="index.php?room_mang">اعادة الحجز</a>
                            </div>
                            <div class="panel-body">
                                <div class="form-group col-lg-6">
                                    <label>نوع الغرفة</label>
                                    <select class="form-control" id="room_type" data-error="اختار نوع الغرفة" required>
                                        <option selected disabled>اختار نوع الغرفة</option>
                                        <option selected value="<?php echo $get_room_type_id; ?>"><?php echo $get_room_type; ?></option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>رقم الغرفة</label>
                                    <select class="form-control" id="room_no" onchange="fetch_price(this.value)" required data-error="رقم الغرفة">
                                        <option selected disabled>اختار رقم الغرفة</option>
                                        <option selected value="<?php echo $get_room_id; ?>"><?php echo $get_room_no; ?></option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>تاريخ الحجز</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="check_in_date" data-error="اختار تاريخ الحجز" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>موعد انتهاء الحجز</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="check_out_date" data-error="اختار " required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-lg-12">
                                    <h4 style="font-weight: bold">مجموع الأيام: <span id="staying_day"></span> </h4>
                                    <h4 style="font-weight: bold">السعر: <span id="price"><?php echo $get_room_price; ?></span> </h4>
                                    <h4 style="font-weight: bold">المبلغ الاجمالي : <span id="total_price"></span> </h4>
                                </div>
                            </div>
                        </div>
                    <?php } else{?>
                        <div class="panel panel-default">
                            <div class="panel-heading">معلومات الغرفة:
                                <a class="btn btn-secondary pull-right" style="border-radius:0%" href="index.php?reservation">اعادة الحجز</a>
                            </div>
                            <div class="panel-body">
                                <div class="form-group col-lg-6">
                                    <label>نوع الغرفة</label>
                                    <select class="form-control" id="room_type" onchange="fetch_room(this.value);" required data-error="اختار نوع الغرفة">
                                        <option selected disabled>اختار نوع الغرفة</option>
                                        <?php
                                        $query  = "SELECT * FROM room_type";
                                        $result = mysqli_query($connection,$query);
                                        if (mysqli_num_rows($result) > 0){
                                            while ($room_type = mysqli_fetch_assoc($result)){
                                                echo '<option value="'.$room_type['room_type_id'].'">'.$room_type['room_type'].'</option>';
                                            }}
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>رقم الغرفة</label>
                                    <select class="form-control" id="room_no" onchange="fetch_price(this.value)" required data-error="اختار رقم الغرفة">

                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>تاريخ الحجز</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="check_in_date" data-error="اختار تاريخ الحجز" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>موعد انتهاء الحجز</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="check_out_date" data-error="موعد انتهاء الحجز" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-lg-12">
                                    <h4 style="font-weight: bold">مجموع الايام : <span id="staying_day"></span> </h4>
                                    <h4 style="font-weight: bold">السعر: <span id="price"></span> </h4>
                                    <h4 style="font-weight: bold">المبلغ الاجمالي : <span id="total_price"></span> </h4>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">معلومات العميل:</div>
                        <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label>الاسم </label>
                                <input class="form-control" placeholder="الاسم" id="first_name" data-error="Enter First Name" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>القب</label>
                                <input class="form-control" placeholder="القب" id="last_name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>رقم الهاتف</label>
                                <input type="number" class="form-control" data-error="أدخل 10 أرقام كحد أدنى" data-minlength="10" placeholder="رقم الهاتف" id="contact_no" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>البريد الالكتروني</label>
                                <input type="email" class="form-control" placeholder="البريد الالكتروني" id="email" data-error="Enter Valid Email Address" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>نوع الاثبات الشخصي</label>
                                <select class="form-control" id="id_card_id" data-error="Select ID Card Type" required onchange="validId(this.value);">
                                    <option selected disabled>اختار نوع الاثبات الشخصي </option>
                                    <?php
                                    $query  = "SELECT * FROM id_card_type";
                                    $result = mysqli_query($connection,$query);
                                    if (mysqli_num_rows($result) > 0){
                                        while ($id_card_type = mysqli_fetch_assoc($result)){
                                            echo '<option value="'.$id_card_type['id_card_type_id'].'">'.$id_card_type['id_card_type'].'</option>';
                                        }}
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>رقم بطاقة الاثبات الشخصي المختارة</label>
                                <input type="text" class="form-control" placeholder="الرقم" id="id_card_no" data-error="Enter Valid ID Card No" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>عنوان السكن</label>
                                <input type="text" class="form-control" placeholder="العنوان" id="address" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-success pull-right" style="border-radius:0%">حجز</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <p class="back-link">تم التطوير بواسطة: <a href="https://linktr.ee/ahdevloper" target="_blank">المهندس أحمد ياسين</a></p>
        </div>
    </div>

</div>    <!--/.main-->


<!-- Booking Confirmation-->
<div id="bookingConfirm" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center"><b>معلومات الحجز</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert bg-success alert-dismissable" role="alert"><em class="fa fa-lg fa-check-circle">&nbsp;</em>تم حجز الغرفة بنجاح</div>
                        <table class="table table-striped table-bordered table-responsive">
                            <!-- <thead>
                            <tr>
                                <th>Name</th>
                                <th>Detail</th>
                            </tr>
                            </thead> -->
                            <tbody>
                            <tr>
                                <td><b>رقم العميل</b></td>
                                <td id="getCustomerName"></td>
                            </tr>
                            <tr>
                                <td><b>نوع الغرفة</b></td>
                                <td id="getRoomType"></td>
                            </tr>
                            <tr>
                                <td><b>رقم الغرفة</b></td>
                                <td id="getRoomNo"></td>
                            </tr>
                            <tr>
                                <td><b>تاريخ الحجز</b></td>
                                <td id="getCheckIn"></td>
                            </tr>
                            <tr>
                                <td><b>تاريخ الانتهاء</b></td>
                                <td id="getCheckOut"></td>
                            </tr>
                            <tr>
                                <td><b>المبلغ الاجمالي</b></td>
                                <td id="getTotalPrice"></td>
                            </tr>
                            <tr>
                                <td><b>حالة الدفع</b></td>
                                <td id="getPaymentStaus"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" style="border-radius:60px;" href="index.php?reservation"><i class="fa fa-check-circle"></i></a>
            </div>
        </div>

    </div>
</div>


