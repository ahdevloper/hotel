<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">اضافة موظف جديد</li>
        </ol>
    </div><!--/.row-->

    <!-- <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Employee</h1>
        </div>
    </div> -->
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">بيانات الموظف:</div>
                <div class="panel-body">
                    <div class="emp-response"></div>
                    <form role="form" id="addEmployee" data-toggle="validator">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>المهنة</label>
                                <select class="form-control" id="staff_type" required data-error="Select Staff Type">
                                    <option selected disabled>اختار المهنه</option>
                                    <?php
                                    $query = "SELECT * FROM staff_type";
                                    $result = mysqli_query($connection, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($staff = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $staff['staff_type_id'] . '">' . $staff['staff_type'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>وقت العمل</label>
                                <select class="form-control" id="shift" required data-error="Select Shift Type">
                                    <option selected disabled>اختار وقت العمل</option>
                                    <?php
                                    $query = "SELECT * FROM shift";
                                    $result = mysqli_query($connection, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($shift = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $shift['shift_id'] . '">' . $shift['shift'] . ' - ' . $shift['shift_timing'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>الاسم </label>
                                <input type="text" class="form-control" placeholder="الاسم" id="first_name" required data-error="Enter First Name">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>القب</label>
                                <input type="text" class="form-control" placeholder="القب" id="last_name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>نوع الاثبات الشخصي</label>
                                <select class="form-control" id="id_card_id" required onchange="validId(this.value);">
                                    <option selected disabled>اختار</option>
                                    <?php
                                    $query = "SELECT * FROM id_card_type";
                                    $result = mysqli_query($connection, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($id_card_type = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $id_card_type['id_card_type_id'] . '">' . $id_card_type['id_card_type'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>رقم الاثبات الشخصي</label>
                                <input type="text" class="form-control" placeholder="" id="id_card_no" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>رقم الهاتف</label>
                                <input type="number" class="form-control" placeholder="" id="contact_no" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>العنوان</label>
                                <input type="text" class="form-control" placeholder="" id="address" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>الراتب</label>
                                <input type="number" class="form-control" placeholder="" id="salary" data-error="Enter Salary" required>
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-lg btn-success" style="border-radius:0%">اضافة</button>
                        <button type="reset" class="btn btn-lg btn-danger" style="border-radius:0%">الفاء</button>
                    </form>
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




