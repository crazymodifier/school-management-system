<?php

function get_the_teachers($args)
{
    return $args;
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


function get_user_data($user_id,$type = 'object')
{
    global $db_conn;
    $query = mysqli_query($db_conn,"SELECT * FROM accounts WHERE id = $user_id");
    return data_output($query , $type)[0];
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



?>