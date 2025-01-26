<?php if (isset($_GET['action'])) {
    $user = [];
    if (!empty($_GET['id'])) {
        $user = get_user_data($_GET['id'], false);
    }

    $name = isset($user['name']) ? $user['name'] : '';
    $dob = isset($user['dob']) ? $user['dob'] : '';
    $mobile = isset($user['mobile']) ? $user['mobile'] : '';
    $email = isset($user['email']) ? $user['email'] : '';
    $address = isset($user['address']) ? $user['address'] : '';
    $country = isset($user['country']) ? $user['country'] : '';
    $state = isset($user['state']) ? $user['state'] : '';
    $state = isset($user['state']) ? $user['state'] : '';
    $zip = isset($user['zip']) ? $user['zip'] : '';
    $gender = isset($user['gender']) ? $user['gender'] : '';
    $religion = isset($user['religion']) ? $user['religion'] : '';
    $category = isset($user['category']) ? $user['category'] : '';
    $aadhar_number = isset($user['aadhar_number']) ? $user['aadhar_number'] : '';

    $emp_id = isset($user['emp_id']) ? $user['emp_id'] : '';

    $subjects_d = isset($user['subjects']) ? unserialize($user['subjects']) : [];
    $teaching_area = isset($user['teaching_area']) ? unserialize($user['teaching_area']) : [];

    $doj = isset($user['doj']) ? $user['doj'] : date('Y-m-d');
    $salary = isset($user['salary']) ? $user['salary'] : '';
    $upi = isset($user['upi']) ? $user['upi'] : '';
    $bank_name = isset($user['bank_name']) ? $user['bank_name'] : '';
    $ac_holder_name = isset($user['ac_holder_name']) ? $user['ac_holder_name'] : '';
    $account_number = isset($user['account_number']) ? $user['account_number'] : '';
    $ifsc_code = isset($user['ifsc_code']) ? $user['ifsc_code'] : '';

    $father_name = isset($user['father_name']) ? $user['father_name'] : '';
    $photo = isset($user['photo']) ? $user['photo'] : '';

?>
    <div class="card">
        <div class="card-body" id="form-container">
            <?php if ($_GET['action'] == 'add-new' || $_GET['action'] == 'edit') { ?>
                <form action="" id="teacher-registration" method="post" enctype="multipart/form-data">
                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">Personal Information</legend>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo $name; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <?php
                                        $genders = ['Male', 'Female', 'Other'];
                                        foreach ($genders as $value) {
                                            $selected = ($gender == $value) ? 'selected' : '';
                                            echo '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Father's Name</label>
                                    <input type="text" class="form-control" placeholder="Father's Name" name="father_name" value="<?php echo $father_name; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">DOB</label>
                                    <input type="date" class="form-control" placeholder="DOB" name="dob" value="<?php echo $dob; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Mobile</label>
                                    <input type="text" class="form-control" placeholder="Mobile" name="mobile" value="<?php echo $mobile; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" placeholder="Email Address" name="email" value="<?php echo $email; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Religon</label>
                                    <select name="religion" id="religion" class="form-control">
                                        <?php
                                        $religions = ['Hindu', 'Muslim', 'Cristian', 'Buddhism', 'Jainism', 'Other'];
                                        foreach ($religions as $value) {
                                            $selected = ($religion == $value) ? 'selected' : '';
                                            echo '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <?php
                                        $categories = ['General', 'OBC', 'SC', 'ST', 'Minority', 'EBC'];
                                        foreach ($categories as $value) {
                                            $selected = ($category == $value) ? 'selected' : '';
                                            echo '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Aadhar Number (Other ID)</label>
                                    <input type="text" class="form-control" placeholder="(Other ID)" name="aadhar_number" value="<?php echo $aadhar_number; ?>">
                                </div>
                            </div>
                            <!-- Address Fields -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo $address; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" placeholder="Country" name="country" value="<?php echo $country; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">State</label>
                                    <input type="text" class="form-control" placeholder="State" name="state" value="<?php echo $state; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Pin/Zip Code</label>
                                    <input type="text" class="form-control" placeholder="Pin/Zip Code" name="zip" value="<?php echo $zip; ?>">
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">Qualifications</legend>
                        <table class="table border-0">
                            <thead>
                                <th width="200">Course</th>
                                <th>Roll/Enrollment</th>
                                <th>Board/University</th>
                                <th>Obtained mark</th>
                                <th>Total Mark</th>
                                <th>Percentage</th>
                                <th>Document</th>
                            </thead>
                            <tbody>

                                <?php

                                $courses = ['Highschool', 'Intermediate', 'Graduation', 'Post Graduation', 'Teacher Qualification'];

                                foreach ($courses as $key => $value) {
                                    $key = str_replace(' ', '_', strtolower($value));
                                ?>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="<?php echo $value; ?>" name="<?php echo $key; ?>_course"></td>
                                        <td><input type="text" class="form-control" placeholder="" name="<?php echo $key; ?>_enroll"></td>
                                        <td><input type="text" class="form-control" placeholder="" name="<?php echo $key; ?>_board"></td>
                                        <td><input type="text" class="form-control" placeholder="" name="<?php echo $key; ?>_ob_mark"></td>
                                        <td><input type="text" class="form-control" placeholder="" name="<?php echo $key; ?>_t_mark"></td>
                                        <td><input type="text" class="form-control" placeholder="" name="<?php echo $key; ?>_percent"></td>
                                        <td><input type="file" name="documention[<?php echo $key; ?>]" id=""></td>
                                    </tr>

                                <?php

                                }
                                ?>

                            </tbody>
                        </table>
                    </fieldset>

                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">Expertise</legend>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th width="200">
                                        <label for="">Subjects</label>
                                    </th>
                                    <td>

                                        <select name="subjects[]" id="" class="form-control select-2-multi-select" multiple>
                                            <?php
                                            $subjects = get_posts(['type' => 'subject']);

                                            foreach ($subjects as $key => $subject) {
                                                $selected = in_array($subject->id, $subjects_d) ? 'selected' : '';
                                                echo '<option value="' . $subject->id . '" ' . $selected . '>' . $subject->title . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="200">
                                        <label for="">Teaching Area</label>
                                    </th>
                                    <td>
                                        <select name="teaching_area[]" id="" class="form-control select-2-multi-select" multiple>

                                            <?php
                                            $teaching_areas = [
                                                'nursery' => 'Nursery (LKG, UKG)',
                                                'primary' => 'Primary (1-5))',
                                                'junior' => 'Junior (6-8)',
                                                'sencondary' => 'Sencondary (9,10',
                                                'higersencondary' => 'Higer-Sencondary (11,12)',
                                            ];

                                            foreach ($teaching_areas as $key => $value) {
                                                $selected = in_array($key, $teaching_area) ? 'selected' : '';
                                                echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>

                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">Experiances</legend>
                        <table class="table border-0">
                            <thead>
                                <th>Intitution Name</th>
                                <th>Experiance Duration</th>
                                <th>Job Description</th>
                                <th>Certificate</th>
                            </thead>
                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tbody>
                        </table>
                    </fieldset>

                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">Documentations</legend>
                        <table class="table border-0">
                            <tr>
                                <th>Photo</th>
                                <td>
                                    <input type="file" name="documention[photo]">
                                    <?php
                                    if (!empty($photo)) {
                                        echo '<img class="border" src="../dist/uploads/teacher-docs/' . $photo . '" width="40" height="40">';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>AADHAR Card</th>
                                <td><input type="file" name="documention[aadhar_card]"></td>
                            </tr>
                            <tr>
                                <th>Resume</th>
                                <td><input type="file" name="documention[resume]"></td>
                            </tr>
                        </table>
                    </fieldset>

                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">Salary Information</legend>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Date of Joining</label>
                                    <input type="date" class="form-control" name="doj" value="<?php echo $doj; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Salary</label>
                                    <input type="text" class="form-control" placeholder="Salary" name="salary" value="<?php echo $salary; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">UPI</label>
                                    <input type="text" class="form-control" placeholder="UPI" name="upi" value="<?php echo $upi; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Bank Name</label>
                                    <input type="text" class="form-control" placeholder="Bank Name" name="bank_name" value="<?php echo $bank_name; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Account Holder Name</label>
                                    <input type="text" class="form-control" placeholder="Account Holder Name" name="ac_holder_name" value="<?php echo $ac_holder_name; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Account Number</label>
                                    <input type="text" class="form-control" placeholder="Account Number" name="account_number" value="<?php echo $account_number; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">IFSC Code</label>
                                    <input type="text" class="form-control" placeholder="IFSC" name="ifsc_code" value="<?php echo $ifsc_code; ?>">
                                </div>
                            </div>

                        </div>
                    </fieldset>

                    <input type="hidden" name="type" value="<?php echo $_REQUEST['user'] ?>">
                    <input type="hidden" name="user_id" value="<?php echo !empty($_REQUEST['id']) ? $_REQUEST['id'] : 0; ?>">
                    <input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">
                    <button type="submit" name="submit" class="btn btn-primary"><span id="loader" style='display:none'><i class="fas fa-circle-notch fa-spin"></i></span> Register</button>
                </form>
            <?php } ?>
        </div>
    </div>
<?php  } else { ?>
    <!-- Info boxes -->
    <div class="card">
        <div class="card-header py-2">
            <h3 class="card-title">
                <?php echo ucfirst($_REQUEST['user']) ?>s
            </h3>
            <div class="card-tools">
                <a href="?user=<?php echo $_REQUEST['user'] ?>&action=add-new" class="btn btn-success btn-xs"><i class="fa fa-plus mr-2"></i>Add New</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive bg-white">
                <table class="table table-bordered" id="users-table" width="100%">
                    <thead>
                        <tr>
                            <th width="100">Employee ID.</th>
                            <th width="45">Photo</th>
                            <th width="200">Teacher's Name</th>
                            <th>Subjects</th>
                            <th>Zone</th>
                            <th>D.O.J.</th>
                            <th>Address</th>
                            <th width="103">Actions</th>
                        </tr>
                    </thead>

                </table>

            </div>
        </div>
    </div>
    <!-- /.row -->
<?php } ?>

<script>
    jQuery(document).ready(function() {
        jQuery('#users-table').DataTable({
            ajax: {
                url: 'ajax.php?user=teacher&action=get_users_details',
                type: 'POST'
            },
            columns: [{
                    data: 'emp_id'
                },
                {
                    data: 'photo',
                    orderable: false
                },
                {
                    data: 'name',
                    orderable: false
                },
                {
                    data: 'subjects',
                    orderable: false
                },
                {
                    data: 'zone',
                    orderable: false
                },

                {
                    data: 'doj',
                    orderable: false
                },
                {
                    data: 'address',
                    orderable: false
                },
                {
                    data: 'action',
                    orderable: false
                },
            ],
            processing: true,
            serverSide: true,

        });
    })

    jQuery('#teacher-registration').on('submit', function(e) {
        e.preventDefault();
        if (true) {
            var formdata = new FormData(this);
            jQuery.ajax({
                type: "post",
                url: "http://localhost/sms-project/admin/ajax.php",
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    jQuery('#loader').show();
                },
                success: function(response) {
                    // console.log(response);
                    // location.href = 'http://localhost/sms-project/admin/user-account.php?user=teacher';
                },
                complete: function() {
                    // jQuery('#loader').hide();
                }
            });
        }
        return false;
    });
</script>