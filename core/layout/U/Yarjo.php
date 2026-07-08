
    <?php


    $select = mysqli_query($conn,"
    SELECT users.*,address_user.Full_Location
    FROM users
    LEFT JOIN address_user
    ON users.Id_user = address_user.Id_Address
    WHERE Id_user='$UserId'
    ");

    $row=mysqli_fetch_assoc($select);
    ?>

    <div class="col-lg-10 col-xl-10 col-md-12 ms-auto">

        <div class="main-content bg-light min-vh-100 p-4">

                    <div class="card custom-card shadow-sm">

                        <div class="card-header custom-card-header">

                            <i class="fas fa-user me-2"></i>

                            پروفایل کاربری

                        </div>

                        <div class="card-body">

                            <form action="Chek_Profile" method="post">

                                <input type="hidden"
                                       name="Method"
                                       value="Edit_Profile">

                                <div class="row">

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">

                                            نام

                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            name="firstname"
                                            value="<?php echo $row['FirstName_User']; ?>">

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">

                                            نام خانوادگی

                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            name="lastname"
                                            value="<?php echo $row['Lastname_User']; ?>">

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">

                                            ایمیل

                                        </label>

                                        <input
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            value="<?php echo $row['Email_User']; ?>">

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">

                                            شماره موبایل

                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            name="phone"
                                            value="<?php echo $row['PhoneNumber_User']; ?>">

                                    </div>

                                    <div class="col-12 mb-3">

                                        <label class="form-label">

                                            آدرس

                                        </label>

                                        <textarea
                                            class="form-control"
                                            rows="4"
                                            name="address"><?php echo $row['Full_Location']; ?></textarea>

                                    </div>

                                    <div class="col-md-6">

                                        <label class="form-label">

                                            نقش کاربری

                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            value="یارجو"
                                            readonly>

                                    </div>

                                    <div class="col-md-6">

                                        <label class="form-label">

                                            وضعیت حساب

                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            value="<?php echo ($row['Status_User']==1) ? 'فعال' : 'غیرفعال'; ?>"
                                            readonly>

                                    </div>

                                </div>

                                <hr>

                                <div class="text-end">

                                    <button
                                        class="btn btn-custom-primary">

                                        <i class="fas fa-save me-2"></i>

                                        ذخیره تغییرات

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>



