<?php

    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
        return $con;
    }

    function login($username, $password){
        $con = getConnection();
        $sql = "select * from users where username='{$username}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count =  mysqli_num_rows($result);

        if($count ==1){
            return true;
        }else{
            return false;
        }
    }

    function addUser($username, $password, $email){
        $con = getConnection();
        $sql = "insert into users VALUES('', '{$username}', '{$password}', '{$email}')";        
        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }
    }

    function getUser($id){
        $con =getConnection();
        $sql ="select* from users where id='{id}'";
        $result= mysqli_query($con, $sql);

        if(mysqli_num_rows($result)==1){
            return mysqli_fetch_assoc($result);{
                else{
                    return null;
                }
            }
        }

    }

    function getAllUser(){

    }

    function updateUser($id, $username, $password, $email){
        $con = getConnection();
    
        $sql = "UPDATE users SET username = ?, password = ?, email = ? WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'sssi', $username, $password, $email, $id);
        
        $result = mysqli_stmt_execute($stmt);
    
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        
        return $result;

    }

    function deleteUser($id){
        $con = getConnection();
    
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    
    $result = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    
    return $result; 

    }
?>