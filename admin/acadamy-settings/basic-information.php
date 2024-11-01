<?php include('../../includes/config.php') ?>

<?php

if(isset($_POST['submit'])){
    unset($_POST['submit']);
    foreach ($_POST as $key => $value) {
        $check =mysqli_query($db_conn,"SELECT * FROM `settings` WHERE `setting_key` = '$key'");

        if(mysqli_num_rows($check)){
            $sql = "UPDATE `settings` SET `setting_value`='$value' WHERE `setting_key` = '$key'";
        }
        else{
            $sql = "INSERT INTO `settings` (`setting_key`, `setting_value`) VALUES ('$key','$value')";
        }

        mysqli_query($db_conn,$sql) or die('Something went wrong');
    }
}

$query = mysqli_query($db_conn,"SELECT setting_key,setting_value FROM `settings`");
$data = [];
if(mysqli_num_rows($query) > 0){
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

    foreach($result as $key => $value){
        $data[$value['setting_key']] = $value['setting_value'];
    }
}
?>

<?php include('../header.php') ?>
<?php include('../sidebar.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Acadamy Settings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Settings</li>
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
                <form action="" method="post" enctype="multipart/form-data">
                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">Acadamy Information</legend>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="acadany_name">Acadamy Name</label>
                                    <input type="text" class="form-control" name="acadany_name" id="acadany_name" placeholder="Acadamy Name" value="<?php echo !empty($data['acadany_name'])?$data['acadany_name']:'';?>">
                                </div>
                                <div class="form-group">
                                    <label for="acadany_description">Acadamy Description</label>
                                    <textarea name="acadany_description" id="" class="form-control" rows="5" placeholder="Acadamy Description"><?php echo !empty($data['acadany_description'])?$data['acadany_description']:'';?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="acadany_logo">Acadamy Logo</label>
                                    <input type="text" class="form-control" name="acadany_logo" id="acadany_logo" placeholder="Acadamy Name">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">System Settings</legend>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="current_session">Current Session</label>
                                    <select name="current_session" id="current_session" class="form-control">
                                        <option value="">-Select Session-</option>
                                        <?php
                                        $startYear = 2020;
                                        $endYear = date('Y');
                                        
                                        for ($year = $startYear; $year < $endYear; $year++) {
                                            $nextYear = $year + 1;
                                            $opt = "$year-$nextYear";
                                            $selected = ($opt == $data['current_session']) ? 'selected':'';
                                            echo "<option ".$selected.">".$opt."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="session_starts_from">Session Starts From</label>
                                    <select name="session_starts_from" id="session_starts_from" class="form-control">
                                        <option value="">-Select Month-</option>
                                        <?php

                                        $months = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
                                        
                                        foreach ($months as $key => $value) {
                                            $selected = ($value == $data['session_starts_from']) ? 'selected':'';
                                            echo '<option value="'.$value.'" '.$selected.'>'.ucwords($value).'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="examination_types">Examinsation Types</label>
                                    <select name="examination_types" id="examination_types" class="form-control">
                                        <option value="">-Select Examinsation-</option>
                                        <?php
                                        echo $data['examination_types'];
                                        $months = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
                                        
                                        foreach ($months as $key => $value) {
                                            $selected = ($value == $data['examination_types']) ? 'selected':'';
                                            echo '<option value="'.$value.'" '.$selected.'>'.ucwords($value).'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="start_time">Start Time</label>
                                    <input type="time" name="start_time" id="start_time" class="form-control" value="<?php echo $data['start_time'];?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="period_time">Each Period Time (in minutes)</label>
                                    <select name="period_time" id="period_time" class="form-control">
                                        <option value="">-Select time-</option>
                                        <?php
                                        
                                        for ($i=30; $i<=60;$i+= 15) {
                                            $selected = ($i == $data['period_time']) ? 'selected':'';
                                            echo '<option value="'.$i.'" '.$selected.'>'.$i.' Minutes</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="examination_types">Examinsation Types</label>
                                    <!-- <select name="examination_types" id="examination_types" class="form-control">
                                        <option value="">-Select Examinsation-</option>
                                        <?php

                                        $months = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
                                        
                                        foreach ($months as $key => $value) {
                                            echo '<option value="'.$value.'">'.ucwords($value).'</option>';
                                        }
                                        ?>
                                    </select> -->
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    
                    <button type="submit" name="submit" class="btn btn-primary">Save Settings</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<?php include('../footer.php') ?>
