<?php

function select_drugs(){
    require 'connection.php';
    
    $sql = "SELECT drug_name,id FROM drugs";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $drugs = $row['drug_name'];
            $drug_id = $row['id'];
            echo "<option value='$drug_id'>$drugs</option>";
        }
    }
}

function select_kp(){
    require 'connection.php';
    
    $sql = "SELECT * FROM kp_class";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $kp_id = $row['id'];
            $kp_class = $row['kp_class'];
            echo "<option value='$kp_id'>$kp_class</option>";
        }
    }
}

function select_status_ipt(){
    require 'connection.php';
    
    $sql = "SELECT * FROM hact.status WHERE name='IPT'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $status = $row['status'];
            echo "<option value='$status'>$status</option>";
        }
    }
}

function select_status_cpt(){
    require 'connection.php';
    
    $sql = "SELECT * FROM hact.status WHERE name='CPT'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $status = $row['status'];
            echo "<option value='$status'>$status</option>";
        }
    }
}

function select_status_azi(){
    require 'connection.php';
    
    $sql = "SELECT * FROM hact.status WHERE name='AZI'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $status = $row['status'];
            echo "<option value='$status'>$status</option>";
        }
    }
}

function select_status_tb(){
    require 'connection.php';
    
    $sql = "SELECT * FROM hact.status WHERE name='tb'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $status = $row['status'];
            echo "<option value='$id'>$status</option>";
        }
    }
}

function select_codes(){
    require 'connection.php';
    
    $sql = "SELECT * FROM hact.codes";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $codes = $row['code'];
            echo "<option value='$id'>$codes</option>";
        }
    }
}

?>