<?php if (isset($_GET['action'])) { ?>
    <div class="card">
        <div class="card-body" id="form-container">
        <?php if ($_GET['action'] == 'add-new' || $_GET['action'] == 'edit') { ?>
                <form action="" id="parent-registration" method="post" enctype="multipart/form-data">
                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">Personal Information</legend>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name" name="name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Father's Name</label>
                                    <input type="text" class="form-control" placeholder="Father's Name" name="father_name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">DOB</label>
                                    <input type="date" class="form-control" placeholder="DOB" name="dob">
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
                                    <input type="email" class="form-control" placeholder="Email Address" name="email">
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


                    <input type="hidden" name="type" value="<?php echo $_REQUEST['user'] ?>">
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
                            <th>Name</th>
                            <th>Children</th>
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
                url: 'ajax.php?user=parent&action=get_users_details',
                type: 'POST'
            },
            columns: [
                {
                    data: 'name',
                    orderable: false
                },
                {
                    data: 'children',
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