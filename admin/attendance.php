<?php include('../includes/config.php'); ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Attendance</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Attendance</li>
                </ol>
            </div><!-- /.col -->


        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="" method="get" id="get_user_attendance">
                    <div class="row">

                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">User Tpye</label>
                                <select name="user_type" id="user_type" class="form-control">
                                    <option value="">-Select Type-</option>
                                    <option value="student">Student</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="counseller">Counseller</option>
                                    <option value="ohter">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group mb-0">
                                <label for="">User</label>
                                <select name="user_id" id="user_id" class="form-control select2-users">

                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group mb-0">
                                <label for="">Month</label>
                                <select name="month" id="months" class="form-control">
                                    <?php

                                    $months = array('january', 'fabruary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');

                                    foreach ($months as $key => $value) {
                                        echo '<option value="' . $value . '">' . ucwords($value) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="year" value="<?php echo date('Y') ?>">
                    <input type="submit" value="View" name="filter" class="btn btn-primary">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="calendar"></div>
            </div>
        </div>

    </div><!--/. container-fluid -->
</section>
<!-- /.content -->

<script>
    att_url = '<?php echo 'ajax.php?action=get_user_attendance&user_id=' . (isset($_GET['user_id']) ? $_GET['user_id'] : '0'); ?>';

    jQuery(document)
        .on('submit', '#get_user_attendance', function(e) {
            e.preventDefault();
            console.log(this);
            
            data = new FormData(this);

            console.log(data);

            jQuery.ajax({
                type: "get",
                url: "ajax.php?action=get_user_attendance",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    jQuery('#loader').show();
                },
                success: function(response) {
                    console.log(response);
                    // init_calendar(response)
                    jQuery(".calendar").zabuto_calendar({
                        year: 2023,
                        month: 11,
                        events: response,
                        navigation_prev: false,
                        navigation_next: false,
                        classname: 'table table-bordered lightgrey-weekends',
                    })
                }
            });
            return false;
        })
        .on('change', '#user_type', function() {
            jQuery.ajax({
                type: "post",
                url: "ajax.php?action=get_user_by_type",
                data: {
                    'type': jQuery(this).val()
                },
                dataType: 'json',
                beforeSend: function() {
                    jQuery('#loader').show();
                },
                success: function(response) {
                    console.log(response);
                    // jQuery('#user_id').html(response.user_options);
                },
                complete: function() {}
            });
        })
        .ready(function() {

            jQuery(".calendar").zabuto_calendar({
                classname: 'table table-bordered lightgrey-weekends',
                year: 2023,
                month: 12,
                ajax: {
                    url: 'ajax.php',
                    data: {
                        action: 'get_user_attendance',
                        type: 'student',

                    }
                }
            });

            jQuery('.select2-users').select2({
                placeholder: 'Search User',
                ajax: {
                    delay: 250,
                    url: 'ajax.php',
                    dataType: 'json',
                    data: function(params) {
                        return {
                            action: 'get_user_by_type',
                            type: 'student',
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data) {
                        // Transforms the top-level key of the response object from 'items' to 'results'
                        return {
                            results: data
                        };
                    }
                }
            });
        });
</script>
<?php include('footer.php') ?>