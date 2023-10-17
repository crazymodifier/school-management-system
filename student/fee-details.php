<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>


<?php
$success_msg =  false;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
if (isset($_POST['form_submitted'])) {

    $status = isset($_POST["status"]) ? $_POST["status"] : 'success';
    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : '';
    $amount = isset($_POST["amount"]) ? $_POST["amount"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $month = isset($_POST["month"]) ? $_POST["month"] : '';



    $title = $month . ' - Fee';

    $query = mysqli_query($db_conn, "INSERT INTO `posts` (`title`, `type`,`description`, `status`, `author`,`parent`) VALUES ('$title', 'payment','','$status', $user_id,0)");

    if ($query) {
        $item_id = mysqli_insert_id($db_conn);
    }

    $payment_data = array(
        'amount' => $amount,
        'status' => $status,
        'student_id' => $user_id,
        'month' => $month
    );

    foreach ($payment_data as $key => $value) {
        mysqli_query($db_conn, "INSERT INTO `metadata` (`item_id`, `meta_key`, `meta_value`) VALUES ('$item_id', '$key', '$value')");
    }

    $success_msg = true;
}

if (isset( $_GET['action'] ) && $_GET['action'] == 'view-invoice') { ?>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-15">Invoice #DS0204 <span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                            <div class="mb-4">
                                <h2 class="mb-1 text-muted">Techno Study</h2>
                            </div>
                            <div class="text-muted">
                                <p class="mb-1">Vishwsh khand, Gomtinagar, Lucknow, UP 231216, India</p>
                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i>modifiercrazy@gmail.com</p>
                                <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-muted">
                                    <h5 class="font-size-16 mb-3">Billed To:</h5>
                                    <h5 class="font-size-15 mb-2">Preston Miller</h5>
                                    <p class="mb-1">4068 Post Avenue Newfolden, MN 56738</p>
                                    <p class="mb-1">PrestonMiller@armyspy.com</p>
                                    <p>001-234-5678</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-sm-6">
                                <div class="text-muted text-sm-end">
                                    <div>
                                        <h5 class="font-size-15 mb-1">Invoice No:</h5>
                                        <p>#DZ0112</p>
                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                        <p>12 Oct, 2020</p>
                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-size-15 mb-1">Order No:</h5>
                                        <p>#1123456</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="py-2">
                            <h5 class="font-size-15">Order Summary</h5>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px;">No.</th>
                                            <th>Fees</th>
                                            <th class="text-end" style="width: 120px;">Price</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        <tr>
                                            <th scope="row">01</th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14 mb-1">Tuition Fee</h5>
                                                    <!-- <p class="text-muted mb-0">Watch, Black</p> -->
                                                </div>
                                            </td>
                                            <td class="text-end">Rs. 500.00</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="2" class="text-end">Sub Total</th>
                                            <td class="text-end">Rs. 500.00</td>
                                        </tr>
                                        
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="2" class="border-0 text-end">Total</th>
                                            <td class="border-0 text-end">
                                                <h4 class="m-0 fw-semibold">Rs. 500.00</h4>
                                            </td>
                                        </tr>
                                        <!-- end tr -->
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div><!-- end table responsive -->
                            <div class="d-print-none mt-4">
                                <div class="float-end">
                                    <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                    <a href="#" class="btn btn-primary w-md">Send</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>
<?php


} else {

?>



    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Student Fee Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Student Fee Details</li>
                    </ol>
                </div><!-- /.col -->


            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <?php if ($success_msg) { ?>
                <div class="alert alert-success" role="alert">
                    Payment has been completed, Thank You!
                </div>
            <?php } ?>

            <?php
            $usermeta = get_user_metadata($std_id);

            $class = get_post(['id' => $usermeta['class']]);
            ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Student Detail</h3>
                </div>
                <div class="card-body">
                    <strong>Name: </strong> <?php echo get_users(array('id' => $std_id))[0]->name ?> <br>
                    <strong>Class: </strong> <?php echo $class->title ?>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tution Fee</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Month</th>
                                <th>Fee Status</th>

                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT m.meta_value as `month` FROM `posts` as p JOIN `metadata` as m ON p.id = m.item_id WHERE p.type = 'payment' AND p.author = $user_id AND m.meta_key = 'month' AND year(p.publish_date) = 2023";

                            $query = mysqli_query($db_conn, $sql);
                            $paid_fees = [];
                            while ($row = mysqli_fetch_object($query)) {

                                $paid_fees[] = strtolower($row->month);
                            }
                            //  echo '<pre>';

                            //                    print_r($paid_fees);
                            //                    echo '</pre>'; 
                            $months = array('january', 'fabruary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
                            foreach ($months as $key => $value) {
                                $highlight = '';

                                $paid = false;
                                if (in_array($value, $paid_fees)) {
                                    $paid = true;
                                    $highlight = 'class="bg-success"';
                                }
                                //   if(date('F') == ucwords($value))
                                //   {
                                //     $highlight = 'class="bg-success"';
                                //   }
                            ?>
                                <tr>
                                    <td><?php echo ++$key ?></td>
                                    <td><?php echo ucwords($value) ?></td>
                                    <td <?php echo $highlight ?>>
                                        <?php

                                        echo ($paid) ? "Paid" : "Pending";

                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($paid) { ?>
                                            <a href="?action=view-invoice&month=<?php echo $value ?>&std_id=<?php echo $std_id ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye fa-fw"></i> View</a>
                                        <?php } else { ?>
                                            <a href="#" data-toggle="modal" data-month="<?php echo ucwords($value) ?>" data-target="#paynow-popup" class="btn btn-sm btn-warning paynow-btn"><i class="fa fa-money-check-alt fa-fw"></i> Pay Now</a>
                                        <?php } ?>


                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->


    <!-- Modal -->
    <div class="modal fade" id="paynow-popup" tabindex="-1" role="dialog" aria-labelledby="paynow-popupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paynow-popupLabel">Paynow</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="amount" readonly="readonly" value="500" />
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" name="firstname" readonly class="form-control" value="<?php echo $student->name ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" name="email" readonly class="form-control" value="<?php echo $student->email ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" readonly class="form-control" value="1234567890">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Months</label>
                                    <input type="text" name="month" readonly class="form-control" id="month" value="<?php echo $student->name ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h3><i class="fa fa-rupee-sign"></i> 500.00</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <button type="submit" name="form_submitted" class="btn btn-success">Confirm & Pay</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        jQuery(document).on('click', '.paynow-btn', function() {
            var month = jQuery(this).data('month');

            jQuery('#month').val(month)
        })
    </script>

<?php
}
include('footer.php') ?>