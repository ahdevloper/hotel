<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">إدارة الموظفين</li>
        </ol>
    </div><!--/.row-->

   

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تفاصيل الموظفين:
                    <a href="index.php?add_emp" class="btn btn-secondary pull-right" style="border-radius:0%">اضافة موظف جديد</a>
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; خطأ !
                            </div>";
                    }
                    if (isset($_GET['success'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; تم بنجاح!
                            </div>";
                    }
                    ?>
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%"
                           id="rooms">
                        <thead>
                        <tr>
                            <th>التسلسل</th>
                            <th>اسم الموظف</th>
                            <th>المهنة</th>
                            <th>وقت العمل</th>
                            <th>تاريخ الانضمام</th>
                            <th>الراتب</th>
                            <th>تغير وقت العمل</th>
                            <th>تحرير</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //$staff_query = "SELECT * FROM staff  JOIN staff_type JOIN shift ON staff.staff_type_id =staff_type.staff_type_id ON shift.";
                        $staff_query = "SELECT * FROM staff  NATURAL JOIN staff_type NATURAL JOIN shift";
                        $staff_result = mysqli_query($connection, $staff_query);

                        if (mysqli_num_rows($staff_result) > 0) {
                            while ($staff = mysqli_fetch_assoc($staff_result)) { ?>
                                <tr>

                                    <td><?php echo $staff['emp_id']; ?></td>
                                    <td><?php echo $staff['emp_name']; ?></td>
                                    <td><?php echo $staff['staff_type']; ?></td>
                                    <td><?php echo $staff['shift'] . ' - ' . $staff['shift_timing']; ?></td>
                                    <td><?php echo date('M j, Y', strtotime($staff['joining_date'])); ?></td>
                                    <td><?php echo $staff['salary']; ?></td>
                                    <td>
                                        <button class="btn btn-warning" style="border-radius:0%" data-toggle="modal" data-target="#changeShift"
                                                data-id="<?php echo $staff['emp_id']; ?>" id="change_shift">تغير</button>
                                    </td>
                                    <td>

                                        <button data-toggle="modal"
                                                data-target="#empDetail<?php echo $staff['emp_id']; ?>"
                                                data-id="<?php echo $staff['emp_id']; ?>" id="editEmp"
                                                class="btn btn-info" style="border-radius:60px;"><i class="fa fa-pencil"></i></button>
                                        <a href='functionmis.php?empid=<?php echo $staff['emp_id']; ?>'
                                           class="btn btn-danger" onclick="return confirm('Are you Sure?')" style="border-radius:60px;"><i
                                                    class="fa fa-trash"></i></a>
                                        <a href='index.php?emp_history&empid=<?php echo $staff['emp_id']; ?>'
                                           class="btn btn-success" title="Employee Histery" style="border-radius:60px;"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>


                                <?php
                            }
                        }
                        ?>


                        </tbody>
                    </table>
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

<?php
//$staff_query = "SELECT * FROM staff  JOIN staff_type JOIN shift ON staff.staff_type_id =staff_type.staff_type_id ON shift.";
$staff_query = "SELECT * FROM staff  NATURAL JOIN staff_type NATURAL JOIN shift";
$staff_result = mysqli_query($connection, $staff_query);

if (mysqli_num_rows($staff_result) > 0) {
    while ($staffGlobal = mysqli_fetch_assoc($staff_result)) {
        $fullname = explode(" ", $staffGlobal['emp_name']);
        ?>

        <!-- Employee Detail-->
        <div id="empDetail<?php echo $staffGlobal['emp_id']; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">بيانات الموظفين</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">بيانات الموظف:</div>
                                    <div class="panel-body">
                                        <form data-toggle="validator" role="form" action="functionmis.php"
                                              method="post">
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label>المهنة</label>
                                                    <select class="form-control" id="staff_type" name="staff_type_id"
                                                            required>
                                                        <option selected disabled>اختار المهنة</option>
                                                        <?php
                                                        $query = "SELECT * FROM staff_type";
                                                        $result = mysqli_query($connection, $query);
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($staff = mysqli_fetch_assoc($result)) {
                                                                //  echo '<option value=" ' . $staff['staff_type_id'] . ' "  selected  >' . $staff['staff_type'] . '</option>';
                                                                echo '<option value="' . $staff['staff_type_id'] . '" ' . (($staff['staff_type_id'] == $staffGlobal['staff_type_id']) ? 'selected="selected"' : "") . '>' . $staff['staff_type'] . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <select style="visibility: hidden;" class="form-control" id="shift" name="shift_id" required>
                                                        <option selected disabled>نوع المهنة</option>
                                                        <?php
                                                        $query = "SELECT * FROM shift";
                                                        $result = mysqli_query($connection, $query);
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($shift = mysqli_fetch_assoc($result)) {
                                                                // echo '<option value="' . $shift['shift_id'] . '">' . $shift['shift'] . ' - ' . $shift['shift_timing'] . '</option>';
                                                                echo '<option value="' . $shift['shift_id'] . '" ' . (($shift['shift_id'] == $staffGlobal['shift_id']) ? 'selected="selected"' : "") . '>' . $shift['shift_timing'] . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <input type="hidden" value="<?php echo $staffGlobal['emp_id']; ?>"
                                                       id="emp_id" name="emp_id">

                                                <div class="form-group col-lg-6">
                                                    <label>الاسم </label>
                                                    <input type="text" value="<?php echo $fullname[0]; ?>"
                                                           class="form-control" placeholder="First Name" id="first_name"
                                                           name="first_name" required>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label>القب</label>
                                                    <input type="text" value="<?php echo $fullname[1]; ?>"
                                                           class="form-control" placeholder="Last Name" id="last_name"
                                                           name="last_name" required>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label>الاثبات الشخصي الذي تريد تقديمة</label>
                                                    <select class="form-control" id="id_card_id" name="id_card_type"
                                                            required>
                                                        <option selected disabled>اختار الاثبات الشخصي الذي تريد تقديمة</option>
                                                        <?php
                                                        $query = "SELECT * FROM id_card_type";
                                                        $result = mysqli_query($connection, $query);

                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($id_card_type = mysqli_fetch_assoc($result)) {
                                                                //  echo '<option value="' . $id_card_type['id_card_type_id'] . '">' . $id_card_type['id_card_type'] . '</option>';
                                                                echo '<option  value="' . $id_card_type['id_card_type_id'] . '" ' . (($id_card_type['id_card_type_id'] == $staffGlobal['id_card_type']) ? 'selected="selected"' : "") . '>' . $id_card_type['id_card_type'] . '</option>';
                                                            }
                                                        }

                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label>رقم الاثبات الشخصي</label>
                                                    <input type="text" class="form-control" placeholder="ID Card No"
                                                           id="id_card_no"
                                                           value="<?php echo $staffGlobal['id_card_no']; ?>"
                                                           name="id_card_no" required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>رقم الهاتف</label>
                                                    <input type="number" class="form-control"
                                                           placeholder="Contact Number" id="contact_no"
                                                           value="<?php echo $staffGlobal['contact_no']; ?>"
                                                           name="contact_no" required>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label>العنوان</label>
                                                    <input type="text" class="form-control" placeholder="address"
                                                           id="address" value="<?php echo $staffGlobal['address']; ?>"
                                                           name="address">
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label>الراتب</label>
                                                    <input type="number" class="form-control" placeholder="Salary"
                                                           id="salary" value="<?php echo $staffGlobal['salary']; ?>"
                                                           name="salary" required>
                                                </div>

                                            </div>

                                            <button type="submit" class="btn btn-lg btn-primary" name="submit">تحديث
                                            </button>
                                            <button type="reset" class="btn btn-lg btn-danger">الغاء</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Employee Detail-->
        <div id="changeShift" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">تغير الوقت</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form data-toggle="validator" role="form" action="ajax.php" method="post">
                                            <div class="row">
                                            <div class="form-group col-lg-12">
                                                <label>اوقات العمل</label>
                                                <select class="form-control" id="shift" name="shift_id" required>
                                                    <option selected disabled>اختار وقت العمل</option>
                                                    <?php
                                                    $query = "SELECT * FROM shift";
                                                    $result = mysqli_query($connection, $query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($shift = mysqli_fetch_assoc($result)) {
                                                            // echo '<option value="' . $shift['shift_id'] . '">' . $shift['shift'] . ' - ' . $shift['shift_timing'] . '</option>';
                                                            echo '<option value="' . $shift['shift_id'] . '" ' . (($shift['shift_id'] == $staffGlobal['shift_id']) ? 'selected="selected"' : "") . '>' . $shift['shift_timing'] . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            </div>
                                            <input type="hidden" name="emp_id" value="" id="getEmpId">
                                            <button type="submit" class="btn btn-lg btn-primary" name="change_shift">تغير</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>
        <?php
    }
}