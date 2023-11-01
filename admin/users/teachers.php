<?php if (isset($_GET['action'])) { ?>
    <div class="card">
        <div class="card-body" id="form-container">
            <?php if ($_GET['action'] == 'add-new') { ?>
                <form action="" id="student-registration" method="post">
                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">Student Information</legend>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name" name="name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">DOB</label>
                                    <input type="date" required class="form-control" placeholder="DOB" name="dob">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Mobile</label>
                                    <input type="text" class="form-control" placeholder="Mobile" name="mobile">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" required class="form-control" placeholder="Email Address" name="email">
                                </div>
                            </div>

                            <!-- Address Fields -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" placeholder="Address" name="address">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" placeholder="Country" name="country">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">State</label>
                                    <input type="text" class="form-control" placeholder="State" name="state">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Pin/Zip Code</label>
                                    <input type="text" class="form-control" placeholder="Pin/Zip Code" name="zip">
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
                                    <input type="text" class="form-control" placeholder="Father's Name" name="father_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Father's Mobile</label>
                                    <input type="text" class="form-control" placeholder="Father's Mobile" name="father_mobile">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Mother's Name</label>
                                    <input type="text" class="form-control" placeholder="Mother's Name" name="mother_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Mothers's Mobile</label>
                                    <input type="text" class="form-control" placeholder="Mothers's Mobile" name="mother_mobile">
                                </div>
                            </div>
                            <!-- Address Fields -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" placeholder="Address" name="parents_address">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" placeholder="Country" name="parents_country">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">State</label>
                                    <input type="text" class="form-control" placeholder="State" name="parents_state">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Pin/Zip Code</label>
                                    <input type="text" class="form-control" placeholder="Pin/Zip Code" name="parents_zip">
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
                                    <input type="text" class="form-control" placeholder="School Name" name="school_name">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Class</label>
                                    <input type="text" class="form-control" placeholder="Class" name="previous_class">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <input type="text" class="form-control" placeholder="Status" name="status">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Total Marks</label>
                                    <input type="text" class="form-control" placeholder="Total Marks" name="total_marks">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Obtain Marks</label>
                                    <input type="text" class="form-control" placeholder="Obtain Marks" name="obtain_mark">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Percentage</label>
                                    <input type="text" class="form-control" placeholder="Percentage" name="previous_percentage">
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">Admission Details</legend>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Class</label>
                                    <!-- <input type="text" class="form-control" placeholder="Class" name="class"> -->

                                    <select name="class" id="class" class="form-control">
                                        <option value="">Select Class</option>
                                        <?php
                                        $args = array(
                                            'type' => 'class',
                                            'status' => 'publish',
                                        );
                                        $classes = get_posts($args);
                                        foreach ($classes as $class) {
                                            echo '<option value="' . $class->id . '">' . $class->title . '</option>';
                                        } ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group" id="section-container">
                                    <label for="section">Select Section</label>
                                    <select require name="section" id="section" class="form-control">
                                        <option value="">-Select Section-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Subject Streem</label>
                                    <input type="text" class="form-control" placeholder="Subject Streem" name="subject_streem">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Date of Admission</label>
                                    <input type="date" class="form-control" placeholder="Date of Admission" name="doa">
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <label for="online-payment"><input type="radio" name="payment_method" value="online" id="online-payment"> Online Payment</label>
                        <label for="offline-payment"><input type="radio" name="payment_method" value="offline" id="offline-payment"> Offline Payment</label>
                    </div>
                    <input type="hidden" name="type" value="<?php echo $_REQUEST['user'] ?>">
                    <button type="submit" name="submit" class="btn btn-primary"><span id="loader" style='display:none'><i class="fas fa-circle-notch fa-spin"></i></span> Register</button>
                </form>
            <?php } elseif ($_GET['action'] == 'fee-payment') { ?>
                <form action="" id="registration-fee" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Reciept Number</label>
                                <input type="text" name="reciept_number" placeholder="Reciept Number" class="form-control">
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Registration Fee</label>
                                <input type="text" name="registration_fee" placeholder="Registration Fee" class="form-control">
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="std_id" value="<?php echo isset($_GET['std_id']) ? $_GET['std_id'] : '' ?>">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
                            <th>Employee ID.</th>
                            <th>Photo</th>
                            <th>Teacher's Name</th>
                            <th>Subjects</th>
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
                url: 'ajax.php?user=<?php echo $_GET['user'] ?>',
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

</script>