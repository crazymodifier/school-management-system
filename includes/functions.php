<?php
function site_url()
{
    global $db_conn;
    $query = mysqli_query($db_conn , "SELECT setting_value as site_url FROM `settings` WHERE setting_key = 'site_url'");
    if(mysqli_num_rows($query)){
        $siteurl = mysqli_fetch_assoc($query)['site_url'];
        $sls = substr($siteurl, strlen($siteurl)-1);
        if('/' !== $sls){
            return $siteurl.'/';
        }
        return $siteurl;
    }

    return '';
}
function get_the_teachers($args)
{
    return $args;
}

function site_url()
{
    global $db_conn;
    $query = mysqli_query($db_conn , "SELECT setting_value as site_url FROM `settings` WHERE setting_key = 'site_url'");
    if(mysqli_num_rows($query)){
        $siteurl = mysqli_fetch_assoc($query)['site_url'];
        $sls = substr($siteurl, strlen($siteurl)-1);
        if('/' !== $sls){
            return $siteurl.'/';
        }
        return $siteurl;
    }
}

function get_the_classes()
{
    global $db_conn;
    $output = array();
    $query = mysqli_query($db_conn, 'SELECT * FROM classes');

    while ($row = mysqli_fetch_object($query)) {
        $output[] = $row;
    }

    return $output;
}


function get_post(array $args = [])
{
    global $db_conn;
    if(!empty($args))
    {
        $condition = "WHERE 0 ";
        foreach($args as $k => $v)
        {
            $v = (string)$v;
            $condition_ar[] = "$k = '$v'";
        }
        if ($condition_ar > 0) {
            $condition = "WHERE " . implode(" AND ", $condition_ar);
        }
    };

    
    $sql = "SELECT * FROM posts $condition";
    $query = mysqli_query($db_conn,$sql);
    return mysqli_fetch_object($query);
}


function _get_post($post_id=0, $type = 'OBJECT'){ 
    global $db_conn;

    $result = mysqli_query($db_conn,"SELECT * FROM `posts` WHERE `id` = $post_id");
    
    if($type == 'ARRAY'){
        $output = mysqli_fetch_assoc($result);
    }
    else{
        $output = mysqli_fetch_object($result);
    }


    return $output;
}


function _get_post_metadata($item_id, $meta_key='', $single=FALSE){

    global $db_conn;

    $sql = "SELECT * FROM `metadata` WHERE `item_id` = $item_id";

    if($single){
        $sql .= " AND meta_key = '$meta_key'";
        // return $sql;
        $result = mysqli_query($db_conn, $sql);

        if($row = mysqli_fetch_assoc($result)){

            return $row['meta_value'];
        }
    }
    else{
        $result = mysqli_query($db_conn, $sql);

        $output = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $output[$row['meta_key']] =  $row['meta_value'];
        }
    }

    return $output;

}

function get_posts(array $args = [],string $type = 'object')
{
    global $db_conn;
    $condition = "WHERE 0 ";
    if(!empty($args))
    {
        foreach($args as $k => $v)
        {
            $v = (string)$v;
            $condition_ar[] = "$k = '$v'";
        }
        if ($condition_ar > 0) {
            $condition = "WHERE " . implode(" AND ", $condition_ar);
        }
    };

    
    $sql = "SELECT * FROM posts $condition";

    $query = mysqli_query($db_conn,$sql);
    return data_output($query , $type);
}

function get_metadata($item_id,$meta_key='',$type ='object')
{
    global $db_conn;
    $query = mysqli_query($db_conn,"SELECT * FROM metadata WHERE item_id = $item_id");
    if(!empty($meta_key))
    {
        $query = mysqli_query($db_conn,"SELECT * FROM metadata WHERE item_id = $item_id AND meta_key = '$meta_key'");
    }
    return data_output($query , $type);
}


function data_output($query , $type ='object')
{
    $output = array();
    if($type == 'object')
    {
        while ($result = mysqli_fetch_object($query)) {
            $output[] = $result;
        }
    }
    else
    {
        while ($result = mysqli_fetch_assoc($query)) {
            $output[] = $result;
        }
    }
    return $output;
}

// Need to remove
function get_user_data($user_id,$type = 'object')
{
    global $db_conn;
    $sql = "SELECT 
    a.id,
    a.name,
    c.meta_value as `class_id`, 
    s.meta_value as `sec_id`, 
    d.meta_value as `dob`,
    da.meta_value as `doa`,
    f.meta_value as `father_name`,
    m.meta_value as `mother_name`,
    ad.meta_value as `address`
    FROM `accounts` as a 

    JOIN `usermeta` as c ON c.user_id = a.id 
    JOIN `usermeta` as s ON s.user_id = a.id 
    JOIN `usermeta` as d ON d.user_id = a.id
    JOIN `usermeta` as da ON da.user_id = a.id 
    JOIN `usermeta` as f ON f.user_id = a.id
    JOIN `usermeta` as m ON m.user_id = a.id
    JOIN `usermeta` as ad ON ad.user_id = a.id
    WHERE a.id = '$user_id' AND c.meta_key = 'class' AND s.meta_key = 'section' AND d.meta_key = 'dob' AND da.meta_key = 'doa' AND f.meta_key = 'father_name' AND m.meta_key = 'mother_name' AND ad.meta_key = 'address' ";

    $query = mysqli_query($db_conn,$sql);
    return mysqli_fetch_array($query, MYSQLI_ASSOC);
    // return data_output($query , $type)[0];
}


function get_userdata($user_id=0){

    global $db_conn;

    $sql = "SELECT * FROM `accounts` WHERE `id` = $user_id";

    $result = mysqli_query($db_conn,$sql);

    $user = mysqli_fetch_assoc($result);

    $user+= get_user_metadata($user_id);
    return $user;
}

function get_post_title($post_id='')
{

}


function get_users($args = array(),$type ='object')
{
    global $db_conn;
    $condition = "";
    if(!empty($args))
    {
        foreach($args as $k => $v)
        {
            $v = (string)$v;
            $condition_ar[] = "$k = '$v'";
        }
        if ($condition_ar > 0) {
            $condition = "WHERE " . implode(" AND ", $condition_ar);
        }
        
    }
    $query = mysqli_query($db_conn,"SELECT * FROM accounts $condition");
    return data_output($query , $type);
}

function get_user_metadata($user_id)
{
    global $db_conn;
    $output = [];
    $query = mysqli_query($db_conn,"SELECT * FROM usermeta WHERE `user_id` = '$user_id'");
    while ($result = mysqli_fetch_object($query)) {
        $output[$result->meta_key] = $result->meta_value;
    }

    return $output;
}

function get_usermeta($user_id,$meta_key,$signle=true)
{
    global $db_conn;
    if(!empty($user_id) && !empty($meta_key))
    {
        $query = mysqli_query($db_conn,"SELECT * FROM usermeta WHERE `user_id` = '$user_id' AND `meta_key` = '$meta_key'");
    }
    else{
        return false;
    }
    if($signle)
    {
        return mysqli_fetch_object($query)->meta_value;
    }
    else{
        return mysqli_fetch_object($query);
    }
}


function get_setting($setting_key=''){
    global $db_conn;

    if($setting_key){
        $result = mysqli_query($db_conn,"SELECT `setting_value` as {$setting_key} FROM `settings` WHERE `setting_key` = '$setting_key'");

        if(mysqli_num_rows($result)){
            return mysqli_fetch_assoc($result)[$setting_key];
        }
        
    }
    else{
        $result = mysqli_query($db_conn,"SELECT * FROM `settings`");

        $output = [] ;

        while ($row = mysqli_fetch_assoc($result)) {
            $output[$row['setting_key']] = $row['setting_value'];
        }
        return $output;
    }

    return [];
}
?>