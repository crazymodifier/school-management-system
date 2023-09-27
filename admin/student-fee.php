<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>


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

        <?php if (isset($_GET['action']) && $_GET['action'] == 'view') {
            $std_id = isset($_GET['std_id']) ? $_GET['std_id'] : '';
            $usermeta = get_user_metadata($std_id);
        ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Student Detail</h3>
                </div>
                <div class="card-body">
                    <strong>Name: </strong> <?php echo get_users(array('id' => $std_id))[0]->name ?> <br>
                    <strong>Class: </strong> <?php echo $usermeta['class'] ?>

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

                            $sql = "SELECT m.meta_value as `month` FROM `posts` as p JOIN `metadata` as m ON p.id = m.item_id WHERE p.type = 'payment' AND p.author = $std_id AND m.meta_key = 'month' AND year(p.publish_date) = 2023";

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

        <?php } elseif( isset($_GET['action']) && $_GET['action'] == 'view-invoice') { ?>
            <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-15">Invoice #DS0204 <span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                            <div class="mb-4">
                                <h2 class="mb-1 text-muted">Bootdey.com</h2>
                            </div>
                            <div class="text-muted">
                                <p class="mb-1">3184 Spruce Drive Pittsburgh, PA 15201</p>
                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> xyz@987.com</p>
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
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th class="text-end" style="width: 120px;">Total</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        <tr>
                                            <th scope="row">01</th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14 mb-1">Black Strap A012</h5>
                                                    <p class="text-muted mb-0">Watch, Black</p>
                                                </div>
                                            </td>
                                            <td>$ 245.50</td>
                                            <td>1</td>
                                            <td class="text-end">$ 245.50</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row">02</th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14 mb-1">Stainless Steel S010</h5>
                                                    <p class="text-muted mb-0">Watch, Gold</p>
                                                </div>
                                            </td>
                                            <td>$ 245.50</td>
                                            <td>2</td>
                                            <td class="text-end">$491.00</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                            <td class="text-end">$732.50</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Discount :</th>
                                            <td class="border-0 text-end">- $25.50</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Shipping Charge :</th>
                                            <td class="border-0 text-end">$20.00</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Tax</th>
                                            <td class="border-0 text-end">$12.00</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                            <td class="border-0 text-end">
                                                <h4 class="m-0 fw-semibold">$739.00</h4>
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
        <?php } else { ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.no.</th>
                        <th>Student Name</th>
                        <th>Last Payment</th>
                        <th>Due Payment</th>
                        <th>Fee Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $students = get_users(array('type' => 'student'));
                    foreach ($students as $key => $student) { ?>
                        <tr>
                            <td><?php echo ++$key ?></td>
                            <td><?php echo $student->name ?></td>
                            <td>4/12</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="?action=view&std_id=<?php echo $student->id ?>" class="btn btn-sm btn-info"><i class="fa fa-eye fa-fw"></i> View</a>
                                <!-- <a href="" class="btn btn-xs btn-dark"><i class="fa fa-pencil-alt fa-fw"></i></a> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div><!--/. container-fluid -->
</section>
<!-- /.content -->
<?php include('footer.php') ?>