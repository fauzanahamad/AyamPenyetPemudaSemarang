<?php
    ob_start(); // Start output buffering

    require_once 'header_template.php';
    
    $query_select = 'select * from qrcode where idqrcode = "'.$_GET['id'].'"';
    $run_query_select = mysqli_query($conn, $query_select);
    $d = mysqli_fetch_object($run_query_select);

    if(!$d){
        header('Location: index.php');
        exit(); // Stop further execution to ensure the header function works
    }

    ob_end_flush(); // Send output to the browser
?>

<div class="content">
    <div class="container">

        <h3 class="page-title">Detail QR Code</h3>
        
        <div class="card">
            
        <img src="../upload/qrcode/<?= $d->qrname ?>">

        <hr style="margin-bottom: 10px;">

        <button type="button" onclick="window.location = 'qrcode.php'" class="btn-back" >Kembali</button>

        </div>

    </div>
</div>

<?php require_once 'footer_tamplate.php'; ?>