<?php

if (isset($_GET['action'])) {
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

  $father_name = isset($user['father_name']) ? $user['father_name'] : '';
  $father_mobile = isset($user['father_mobile']) ? $user['father_mobile'] : '';
  $mother_name = isset($user['mother_name']) ? $user['mother_name'] : '';
  $mother_mobile = isset($user['mother_mobile']) ? $user['mother_mobile'] : '';
  $parents_address = isset($user['parents_address']) ? $user['parents_address'] : '';
  $parents_country = isset($user['parents_country']) ? $user['parents_country'] : '';
  $parents_state = isset($user['parents_state']) ? $user['parents_state'] : '';
  $parents_zip = isset($user['parents_zip']) ? $user['parents_zip'] : '';

  $school_name = isset($user['school_name']) ? $user['school_name'] : '';
  $previous_class = isset($user['previous_class']) ? $user['previous_class'] : '';
  $status = isset($user['status']) ? $user['status'] : '';
  $total_marks = isset($user['total_marks']) ? $user['total_marks'] : '';
  $obtain_mark = isset($user['obtain_mark']) ? $user['obtain_mark'] : '';
  $previous_percentage = isset($user['previous_percentage']) ? $user['previous_percentage'] : '';

  $class_d = isset($user['class']) ? $user['class'] : '';
  $section_d = isset($user['section']) ? $user['section'] : '';
  $subject_streem = isset($user['subject_streem']) ? $user['subject_streem'] : '';
  $doa = isset($user['doa']) ? $user['doa'] : date('Y-m-d');


  $photo = isset($user['photo']) ? $user['photo'] : '';
  $aadhar = isset($user['aadhar']) ? $user['aadhar'] : '';
  $prev_marksheet = isset($user['previous_marksheet']) ? $user['previous_marksheet'] : '';
  $previous_tc = isset($user['previous_tc']) ? $user['previous_tc'] : '';
  $enrollment_no = isset($user['enrollment_no']) ? $user['enrollment_no'] : '';


  if ('view' != $_GET['action']) :
    ?>
    <div class="card">
      <div class="card-body" id="form-container">
        <form action="" id="student-registration" method="post" enctype="multipart/form-data">

          <fieldset class="border border-secondary p-3 form-group">
            <legend class="d-inline w-auto h6">Student Information</legend>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="">Full Name</label>
                  <input type="text" required class="form-control" placeholder="Full Name" name="name" value="<?php echo $name; ?>">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                    <?php
                    $genders = ['Male', 'Female','Other'];
                    foreach ($genders as $value) {
                      $selected = ($gender == $value) ? 'selected' : '';
                      echo '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
                    } ?>
                    </select>
                </div>
              </div>
              
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="">DOB</label>
                  <input type="date" required class="form-control" placeholder="DOB" name="dob" value="<?php echo $dob; ?>">
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
                    $religions = ['Hindu', 'Muslim','Cristian','Buddhism','Jainism','Other'];
                    foreach ($religions as $value) {
                      $selected = ($religion == $value) ? 'selected' : '';
                      echo '<option value="' . $value . '" ' . $selected . '>' . $value. '</option>';
                    } ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Category</label>
                  <select name="category" id="category" class="form-control">
                    <?php
                    $categories = ['General', 'OBC','SC','ST','Minority','EBC'];
                    foreach ($categories as $value) {
                      $selected = ($category == $value) ? 'selected' : '';
                      echo '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
                    } ?>
                  </select>
                </div>
              </div>

              <!-- Address Fields -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="">Address</label>
                  <input type="text" required class="form-control" placeholder="Address" name="address" value="<?php echo $address; ?>">
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
            <legend class="d-inline w-auto h6">Parents Information</legend>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Father's Name</label>
                  <input type="text" required class="form-control" placeholder="Father's Name" name="father_name" value="<?php echo $father_name; ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Father's Mobile</label>
                  <input type="text" class="form-control" placeholder="Father's Mobile" name="father_mobile" value="<?php echo $father_mobile; ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Mother's Name</label>
                  <input type="text" required class="form-control" placeholder="Mother's Name" name="mother_name" value="<?php echo $mother_name; ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Mothers's Mobile</label>
                  <input type="text" class="form-control" placeholder="Mothers's Mobile" name="mother_mobile" value="<?php echo $mother_mobile; ?>">
                </div>
              </div>
              <!-- Address Fields -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="">Address</label>
                  <input type="text" class="form-control" placeholder="Address" name="parents_address" value="<?php echo $parents_address; ?>">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Country</label>
                  <input type="text" class="form-control" placeholder="Country" name="parents_country" value="<?php echo $parents_country; ?>">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="">State</label>
                  <input type="text" class="form-control" placeholder="State" name="parents_state" value="<?php echo $parents_state; ?>">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Pin/Zip Code</label>
                  <input type="text" class="form-control" placeholder="Pin/Zip Code" name="parents_zip" value="<?php echo $parents_zip; ?>">
                </div>
              </div>
            </div>
          </fieldset>

          <fieldset class="border border-secondary p-3 form-group">
            <legend class="d-inline w-auto h6">Last Qualification</legend>
            <div class="row">

              <div class="col-lg-12">
                <div class="form-group">
                  <label for="">School Name</label>
                  <input type="text" class="form-control" placeholder="School Name" name="school_name" value="<?php echo $school_name; ?>">
                </div>
              </div>
              <div class="col-lg">
                <div class="form-group">
                  <label for="">Class</label>
                  <input type="text" class="form-control" placeholder="Class" name="previous_class" value="<?php echo $previous_class; ?>">
                </div>
              </div>
              <div class="col-lg">
                <div class="form-group">
                  <label for="">Status</label>
                  <input type="text" class="form-control" placeholder="Status" name="status" value="<?php echo $status; ?>">
                </div>
              </div>
              <div class="col-lg">
                <div class="form-group">
                  <label for="">Total Marks</label>
                  <input type="text" class="form-control" placeholder="Total Marks" name="total_marks" value="<?php echo $total_marks; ?>">
                </div>
              </div>
              <div class="col-lg">
                <div class="form-group">
                  <label for="">Obtain Marks</label>
                  <input type="text" class="form-control" placeholder="Obtain Marks" name="obtain_mark" value="<?php echo $obtain_mark; ?>">
                </div>
              </div>
              <div class="col-lg">
                <div class="form-group">
                  <label for="">Percentage</label>
                  <input type="text" class="form-control" placeholder="Percentage" name="previous_percentage" value="<?php echo $previous_percentage; ?>">
                </div>
              </div>
            </div>
          </fieldset>

          <fieldset class="border border-secondary p-3 form-group">
            <legend class="d-inline w-auto h6">Admission Details</legend>
            <div class="row">
              <div class="col-lg-2">
                <div class="form-group">
                  <label for="">Class</label>
                  <!-- <input type="text" class="form-control" placeholder="Class" name="class"> -->

                  <select name="class" id="class_id" class="form-control" required>
                    <option value="">Select Class</option>
                    <?php
                    $args = array(
                      'type' => 'class',
                      'status' => 'publish',
                    );
                    $classes = get_posts($args);
                    foreach ($classes as $class) {
                      $selected = ($class_d == $class->id) ? 'selected' : '';
                      echo '<option value="' . $class->id . '" ' . $selected . '>' . $class->title . '</option>';
                    } ?>

                  </select>
                </div>
              </div>
              <div class="col-lg-2">
                <div class="form-group" id="section-container">
                  <label for="section">Select Section</label>
                  <select required name="section" id="section_id" class="form-control">

                    <?php
                    if (!empty($section_d)) {
                      $sec = get_post(['id' => $section_d]);
                      echo '<option value="' . $section_d . '">' . $sec->title . '</option>';
                    } else {
                      echo '<option value="">-Select Section-</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-2">
                <div class="form-group">
                  <label for="">Subject Streem</label>
                  <input type="text" class="form-control" placeholder="Subject Streem" name="subject_streem" value="<?php echo $subject_streem; ?>">
                </div>
              </div>
              <div class="col-lg-2">
                <div class="form-group">
                  <label for="">Current Session</label>
                  <input type="text" class="form-control" placeholder="Subject Streem" name="subject_streem" value="<?php echo $subject_streem; ?>">
                </div>
              </div>
              <div class="col-lg-2">
                <div class="form-group">
                  <label for="">Date of Admission</label>
                  <input type="date"  class="form-control" placeholder="Date of Admission" name="doa" value="<?php echo $doa; ?>">
                </div>
              </div>
            </div>
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
                    echo '<img class="border" src="../dist/uploads/student-docs/' . $photo . '" width="40" height="40">';
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <th>AADHAR Card</th>
                <td>
                  <input type="file" name="documention[aadhar_card]">
                  <?php
                  if (!empty($aadhar)) {
                    echo '<a href="../dist/uploads/student-docs/' . $photo . '" target="_blank">View</a>';
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <th>Previous Marksheet</th>
                <td>
                  <input type="file" name="documention[previous_marksheet]">
                  <?php
                  if (!empty($previous_marksheet)) {
                    echo '<a href="../dist/uploads/student-docs/' . $previous_marksheet . '" target="_blank">View</a>';
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <th>Previous TC</th>
                <td>
                  <input type="file" name="documention[previous_tc]">
                  <?php
                  if (!empty($previous_tc)) {
                    echo '<a href="../dist/uploads/student-docs/' . $previous_tc . '" target="_blank">View</a>';
                  }
                  ?>
                </td>
              </tr>

            </table>
          </fieldset>
          <input type="hidden" name="type" value="student">
          <input type="hidden" name="user_id" value="<?php echo !empty($_REQUEST['id']) ? $_REQUEST['id'] : 0; ?>">
          <input type="hidden" name="enrollment_no" value="<?php echo $enrollment_no ?>">
          <button type="submit" name="submit" class="btn btn-primary"><span id="loader" style='display:none'><i class="fas fa-circle-notch fa-spin"></i></span> Register</button>
        </form>
      </div>
    </div>

  <?php else : 

    include('../lib/std-proifle.php');
    endif; ?>
<?php  } else { ?>
  <!-- Info boxes -->
  <div class="card">
    <div class="card-header py-2">
      <h3 class="card-title">
        <?php echo ucfirst($_REQUEST['user']) ?>s
      </h3>
      <div class="card-tools">
        <a href="#" data-toggle="modal" data-target="#user-import-modal" class="btn btn-info btn-xs"><i class="fa fa-plus mr-2"></i>Import</a>
        <a href="?user=<?php echo $_REQUEST['user'] ?>&action=add-new" class="btn btn-success btn-xs"><i class="fa fa-plus mr-2"></i>Add New</a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive bg-white">
        <table class="table table-bordered" id="users-table" width="100%">
          <thead>
            <tr>
              <th>Enrollment No.</th>
              <th>Photo</th>
              <th>Student's Name</th>
              <th>Class</th>
              <th>D.O.B.</th>
              <th>Father's Name</th>
              <th>Mother's Name</th>
              <th>D.O.A.</th>
              <th>Address</th>
              <th width="104">Actions</th>
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
        url: 'ajax.php?user=student&action=get_users_details',
        type: 'POST'
      },
      columns: [{
          data: 'enroll'
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
          data: 'class',
          orderable: false
        },
        {
          data: 'dob',
          orderable: false
        },
        {
          data: 'father_name',
          orderable: false
        },
        {
          data: 'mother_name',
          orderable: false
        },
        {
          data: 'doa',
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
      "search": {
        "search": "<?php echo isset($_GET['s'])?$_GET['s']:'';?>"
      }
    });
  })

  jQuery('#student-registration').on('submit', function(e) {
    // console.log();
    e.preventDefault();
    if (true) {
      // var formdata = jQuery(this).serialize();
      var formdata = new FormData(this);
      jQuery.ajax({
        type: "post",
        url: "http://localhost/sms-project/actions/student-registration.php",
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
          jQuery('#loader').show();
        },
        success: function(response) {
          console.log(response);
          // if (response.success == true) {
            location.href = 'http://localhost/sms-project/admin/user-account.php?user=student';
          // }
        },
        complete: function() {
        //   jQuery('#loader').hide();
        }
      });
    }
    return false;
  });
</script>

<div class="modal fade" id="user-import-modal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <form action="http://localhost/sms-project/actions/student-registration.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="file" name="csv" id="">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>

  </div>

</div>