<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">ادارة الغرف</li>
        </ol>
    </div><!--/.row-->

    <br>

    <div class="row">
        <div class="col-lg-12">
            <div id="success"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">ادارة الغرف
                    <button class="btn btn-secondary pull-right" style="border-radius:0%" data-toggle="modal" data-target="#addRoom">اضافة غرفة </button>
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; خطا اثناء الحذف !
                            </div>";
                    }
                    if (isset($_GET['success'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; تم الحذف بنجاح !
                            </div>";
                    }
                    ?>
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%"
                           id="rooms">
                        <thead>
                        <tr>
                            <th>رقم الغرفة</th>
                            <th>نوع الغرفة</th>
                            <th>حالة حجز الغرفة</th>
                            <th>دفع</th>
                            <th>المغادرة</th>
                            <th>تحرير</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $room_query = "SELECT * FROM room NATURAL JOIN room_type WHERE deleteStatus = 0";
                        $rooms_result = mysqli_query($connection, $room_query);
                        if (mysqli_num_rows($rooms_result) > 0) {
                            while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>
                                <tr>
                                    <td><?php echo $rooms['room_no'] ?></td>
                                    <td><?php echo $rooms['room_type'] ?></td>
                                    <td>
                                        <?php
                                        if ($rooms['status'] == 0) {
                                            echo '<a href="index.php?reservation&room_id=' . $rooms['room_id'] . '&room_type_id=' . $rooms['room_type_id'] . '" class="btn btn-success" style="border-radius:0%">حجز الغرفة</a>';
                                        } else {
                                            echo '<a href="#" class="btn btn-danger" style="border-radius:0%">محجوزة</a>';
                                        }
                                        ?>


                                    <td>
                                        <?php
                                        if ($rooms['status'] == 1 && $rooms['check_in_status'] == 0) {
                                            echo '<button class="btn btn-warning" id="checkInRoom"  data-id="' . $rooms['room_id'] . '" data-toggle="modal" style="border-radius:0%" data-target="#checkIn">دفع</button>';
                                        } elseif ($rooms['status'] == 0) {
                                            echo '-';
                                        } else {

                                            echo '<a href="#" class="btn btn-danger" style="border-radius:0%">تم الدفع</a>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($rooms['status'] == 1 && $rooms['check_in_status'] == 1) {
                                            echo '<button class="btn btn-primary" style="border-radius:0%" id="checkOutRoom" data-id="' . $rooms['room_id'] . '">تاكيد عملية الدفع والمغادرة</button>';
                                        } elseif ($rooms['status'] == 0) {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    <td>

                                        <button title="Edit Room Information" style="border-radius:60px;" data-toggle="modal"
                                                data-target="#editRoom" data-id="<?php echo $rooms['room_id']; ?>"
                                                id="roomEdit" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                        <?php
                                        if ($rooms['status'] == 1) {
                                            echo '<button title="Customer Information" data-toggle="modal" data-target="#cutomerDetailsModal" data-id="' . $rooms['room_id'] . '" id="cutomerDetails" class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>';
                                        }
                                        ?>

                                        <a href="ajax.php?delete_room=<?php echo $rooms['room_id']; ?>"
                                           class="btn btn-danger" style="border-radius:60px;" onclick="return confirm('هل أنت متأكد؟')"><i
                                                    class="fa fa-trash" alt="delete"></i></a>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            echo "No Rooms";
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Add Room Modal -->
    <div id="addRoom" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اضافة غرفة جديدة</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="addRoom" data-toggle="validator" role="form">
                                <div class="response"></div>
                                <div class="form-group">
                                    <label>نوع الغرفة</label>
                                    <select class="form-control" id="room_type_id" required
                                            data-error="Select Room Type">
                                        <option selected disabled>اختار رقم الغرفة</option>
                                        <?php
                                        $query = "SELECT * FROM room_type";
                                        $result = mysqli_query($connection, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($room_type = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . $room_type['room_type_id'] . '">' . $room_type['room_type'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label>رقم الغرفة</label>
                                    <input class="form-control" placeholder="رقم الغرفة" id="room_no"
                                           data-error="Enter Room No" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <button class="btn btn-success pull-right">اضافة</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--Edit Room Modal -->
    <div id="editRoom" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">تحرير</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="roomEditFrom" data-toggle="validator" role="form">
                                <div class="edit_response"></div>
                                <div class="form-group">
                                    <label>نوع الغرفة</label>
                                    <select class="form-control" id="edit_room_type" required
                                            data-error="Select Room Type">
                                        <option selected disabled>اختار نوع الغرفة</option>
                                        <?php
                                        $query = "SELECT * FROM room_type";
                                        $result = mysqli_query($connection, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($room_type = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . $room_type['room_type_id'] . '">' . $room_type['room_type'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label>رقم الغرفة</label>
                                    <input class="form-control" placeholder="رقم الغرفة" id="edit_room_no" required
                                           data-error="Enter Room No">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <input type="hidden" id="edit_room_id">
                                <button class="btn btn-success pull-right">تحرير</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!---customer details-->
    <div id="cutomerDetailsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><b>تفاصيل العميل</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <!-- <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Detail</th>
                                </tr>
                                </thead> -->
                                <tbody>
                                <tr>
                                    <td><b>اسم العميل</b></td>
                                    <td id="customer_name"></td>
                                </tr>
                                <tr>
                                    <td><b>رقم الهاتف</b></td>
                                    <td id="customer_contact_no"></td>
                                </tr>
                                <tr>
                                    <td><b>البريد الالكتروني</b></td>
                                    <td id="customer_email"></td>
                                </tr>
                                <tr>
                                    <td><b>نوع الغرفة</b></td>
                                    <td id="customer_id_card_type"></td>
                                </tr>
                                <tr>
                                    <td><b>رقم الاثبات الشخصي</b></td>
                                    <td id="customer_id_card_number"></td>
                                </tr>
                                <tr>
                                    <td><b>العنوان</b></td>
                                    <td id="customer_address"></td>
                                </tr>
                                <tr>
                                    <td><b>المبلغ المتبقي من اصل المبلغ الكلي</b></td>
                                    <td id="remaining_price"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---customer details ends here-->

    <!-- Check In Modal -->
    <div id="checkIn" class="modal fade" role="dialog">
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
                            <table class="table table-responsive table-bordered">
                                
                                <tbody>
                                <tr>
                                    <td><b>اسم العميل</b></td>
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
                                    <td><b>تاريخ انتهاء الحجز</b></td>
                                    <td id="getCheckOut"></td>
                                </tr>
                                <tr>
                                    <td><b>المبلغ الكلي</b></td>
                                    <td id="getTotalPrice"></td>
                                </tr>
                                </tbody>
                            </table>
                            <form role="form" id="advancePayment">
                                <div class="payment-response"></div>
                                <div class="form-group col-lg-12">
                                    <label>دفعة مقدمة</label>
                                    <input type="number" class="form-control" id="advance_payment"
                                           placeholder="الرجاء اكتب المبلغ الذي تم دفعة مقدمة..">
                                </div>
                                <input type="hidden" id="getBookingID" value="">
                                <button type="submit" class="btn btn-primary pull-right">الدفع وتسجيل الوصل</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Check Out Modal-->
    <div id="checkOut" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><b>تاكيد عملية الدفع ومغادرة الغرفة</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                
                                <tbody>
                                <tr>
                                    <td><b>اسم العميل</b></td>
                                    <td id="getCustomerName_n"></td>
                                </tr>
                                <tr>
                                    <td><b>نوع الغرفة</b></td>
                                    <td id="getRoomType_n"></td>
                                </tr>
                                <tr>
                                    <td><b>رقم الغرفة</b></td>
                                    <td id="getRoomNo_n"></td>
                                </tr>
                                <tr>
                                    <td><b>تاريخ الحجز</b></td>
                                    <td id="getCheckIn_n"></td>
                                </tr>
                                <tr>
                                    <td><b>تاريخ الانتهاء</b></td>
                                    <td id="getCheckOut_n"></td>
                                </tr>
                                <tr>
                                    <td><b>المبلغ الكلي</b></td>
                                    <td id="getTotalPrice_n"></td>
                                </tr>
                                <tr>
                                    <td><b>المبلغ المتبقي</b></td>
                                    <td id="getRemainingPrice_n"></td>
                                </tr>
                                </tbody>
                            </table>
                            <form role="form" id="checkOutRoom_n" data-toggle="validator">
                                <div class="checkout-response"></div>
                                <div class="form-group col-lg-12">
                                    <label><b>دفع المبلغ المتبقي</b></label>
                                    <input type="text" class="form-control" id="remaining_amount"
                                           placeholder="المبلغ المتبقي" required
                                           data-error="Please Enter Remaining Amount">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <input type="hidden" id="getBookingId_n" value="">
                                <button type="submit" class="btn btn-primary pull-right">دفع واغلاق الغرفة</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
        <p class="back-link">تم التطوير بواسطة: <a href="https://linktr.ee/ahdevloper" target="_blank">المهندس أحمد ياسين</a></p>
        </div>
    </div>

</div>    <!--/.main-->



