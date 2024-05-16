<?php

$hostname="localhost";
$username="root";
$password="";
$db="gohiking";

$con = mysqli_connect($hostname,$username,$password,$db);

if(!$con){
    die("cannot connect to the database".mysqli_connect_error());
}
// else{
//     echo("connected successfully");
// }

function filteration($data){
    foreach($data as $key=>$value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        $data[$key] = $value;
    }
    return $data;
}

function selectAll($table){
    $con = $GLOBALS['con'];
    $res=mysqli_query($con,"SELECT * FROM $table");
    return $res;
}

function select($sql,$values,$datatypes){
    $con= $GLOBALS["con"];
    if($stmt=mysqli_prepare($con,$sql)){
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res= mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("Query cannot be executed -SELECT");
        }
    }
    else{
        die("Query cannot be prepared -SELECT");
    }
}

function update($sql,$values,$datatypes){
    $con= $GLOBALS["con"];
    if($stmt=mysqli_prepare($con,$sql)){
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res= mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("Query cannot be executed -UPDATE");
        }
    }
    else{
        die("Query cannot be prepared -UPDATE");
    }
}


function insert($sql, $values, $datatypes)
{
    $con = $GLOBALS["con"];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed -INSERT");
        }
    } 
    else 
    {
        die("Query cannot be prepared -INSERT");
    }
}

function delete($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed -DELETE");
        }
    } else {
        die("Query cannot be prepared -DELETE");
    }
}




?>