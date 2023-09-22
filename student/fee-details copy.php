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

        <?php 
          $usermeta = get_user_metadata($std_id);
          ?>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Student Detail</h3>
          </div>
          <div class="card-body"> 
            <strong>Name: </strong> <?php echo get_users(array('id'=>$std_id))[0]->name ?> <br>
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
                $months = array('january', 'fabruary','march','april','may','june','july','august','september','october','november','december');
                foreach ($months as $key => $value) {
                  $highlight = ''; 
                  if(date('F') == ucwords($value))
                  {
                    $highlight = 'class="bg-success"';
                  }
                  ?>
                  <tr>
                    <td><?php echo ++$key?></td>
                    <td <?php echo $highlight?>><?php echo ucwords($value)?></td>
                    <td></td>
                    <td>
                      <a href="?action=pay&month=<?php echo $value?>&std_id=<?php echo $std_id?>" class="btn btn-sm btn-primary"><i class="fa fa-eye fa-fw"></i> View</a>
                      <a href="#" data-toggle="modal" data-month="<?php echo ucwords($value)?>" data-target="#paynow-popup" class="btn btn-sm btn-warning paynow-btn"><i class="fa fa-money-check-alt fa-fw"></i> Pay Now</a>

                      <a href="?action=pay&month=<?php echo $value?>&std_id=<?php echo $std_id?>" class="btn btn-sm btn-dark"><i class="fa fa-envelope fa-fw"></i> Send Message</a>

                      <a href="?action=pay&month=<?php echo $value?>&std_id=<?php echo $std_id?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i>Delete</a>
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


    <?php

    $MERCHANT_KEY = "YOUR MERCHANT_KEY";
    $SALT = "YOUR SALT";

    $PAYU_BASE_URL = "https://test.payu.in";			// For Production Mode

    $action = '';

    $posted = array();
    if(!empty($_POST)) {
        // print_r($_POST);die;
        foreach($_POST as $key => $value) {    
            $posted[$key] = $value; 
            
        }
    }

    $formError = 0;

    if(empty($posted['txnid'])) {
        // Generate random transaction id
        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    } else {
        $txnid = $posted['txnid'];
    }
    $hash = '';
    // Hash Sequence
    $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
    if(empty($posted['hash']) && sizeof($posted) > 0) {
        if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
          || empty($posted['service_provider'])
        ) {
            $formError = 1;
        } else {
            //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
            $hashVarsSeq = explode('|', $hashSequence);
            $hash_string = '';	
            foreach($hashVarsSeq as $hash_var) {
            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
            $hash_string .= '|';
            }

            $hash_string .= $SALT;


            $hash = strtolower(hash('sha512', $hash_string));
            $action = $PAYU_BASE_URL . '/_payment';
        }
    } 
    elseif(!empty($posted['hash'])) 
    {
        $hash = $posted['hash'];
        $action = $PAYU_BASE_URL . '/_payment';
    }
    
?>  
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
                    <form action="<?php echo $action?>" method="post" name="payuForm">
                        <input type="hidden" name="surl" value="http://localhost:8888/sms/actions/success.php" size="64" />
        
		                <input type="hidden" name="furl" value="http://localhost:8888/sms/actions/failure.php" size="64" />
                        <input type="hidden" name="amount" readonly="readonly" value="500" />
                        <input type="hidden" name="key" readonly="readonly" value="<?php echo $MERCHANT_KEY?>" />
                        <input type="hidden" name="hash" readonly="readonly" value="<?php echo $hash?>" />
                        <input type="hidden" name="txnid" readonly="readonly" value="<?php echo $txnid?>" />
                        <input type="hidden" name="service_provider" readonly="readonly" value="payu_paisa" size="64"/>
                        <input type="hidden" name="productinfo" readonly="readonly" value="Fee payment" />


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" name="firstname" readonly class="form-control" value="<?php echo $student->name?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" name="email" readonly class="form-control" value="<?php echo $student->email?>">
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
                                    <input type="text" name="month" readonly class="form-control" id="month" value="<?php echo $student->name?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h3><i class="fa fa-rupee-sign"></i> 500.00</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Confirm & Pay</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        jQuery(document).on('click', '.paynow-btn',function(){
            var month = jQuery(this).data('month');

            jQuery('#month').val(month)
        })
    </script>
    <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }

    jQuery(document).ready(function(){
      submitPayuForm();
    })
  </script>
<?php include('footer.php') ?>