<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/connection.php');

/* ===============================
   PHPMailer
================================= */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

/* ===============================
   CONFIG
================================= */
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USER', 'readnovaebookstore@gmail.com');
define('SMTP_PASS', 'ncyjnpqmqqjwpmwh');
define('SMTP_PORT', 587);

define('MAIL_FROM', 'readnovaebookstore@gmail.com');
define('MAIL_NAME', 'ReadNova BookStore');

define('PDF_FOLDER', __DIR__ . '/pdfs/');

/* ===============================
   GET PAID ORDERS
================================= */
function getPaidOrders($conn)
{
    $sql = "
        SELECT DISTINCT orders.*
        FROM orders
        INNER JOIN payments 
        ON orders.id = payments.order_id
        WHERE LOWER(payments.status)='paid'
        AND orders.status!='completed'
    ";

    $run = mysqli_query($conn,$sql);

    if(!$run){
        die(mysqli_error($conn));
    }

    return mysqli_fetch_all($run,MYSQLI_ASSOC);
}

/* ===============================
   FIND PDF
================================= */
function findPdf($conn,$order)
{
    $book = trim($order['book_name']);

    /* exact match */
    $stmt = mysqli_prepare($conn,"
        SELECT *
        FROM pdf
        WHERE LOWER(TRIM(book_name)) = LOWER(TRIM(?))
        LIMIT 1
    ");

    mysqli_stmt_bind_param($stmt,"s",$book);
    mysqli_stmt_execute($stmt);

    $res = mysqli_stmt_get_result($stmt);
    $pdf = mysqli_fetch_assoc($res);

    if($pdf){
        return $pdf;
    }

    /* like match */
    $stmt2 = mysqli_prepare($conn,"
        SELECT *
        FROM pdf
        WHERE LOWER(book_name) LIKE CONCAT('%',LOWER(?),'%')
        LIMIT 1
    ");

    mysqli_stmt_bind_param($stmt2,"s",$book);
    mysqli_stmt_execute($stmt2);

    $res2 = mysqli_stmt_get_result($stmt2);

    return mysqli_fetch_assoc($res2);
}

/* ===============================
   SEND EMAIL
================================= */
function sendMail($order,$pdf)
{
    $file = PDF_FOLDER . $pdf['pdf-file'];

    if(!file_exists($file)){
        return [
            'success'=>false,
            'msg'=>"PDF file missing: ".$file
        ];
    }

    $mail = new PHPMailer(true);

    try{

        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = 'tls';
        $mail->Port       = SMTP_PORT;

        $mail->setFrom(MAIL_FROM,MAIL_NAME);
        $mail->addAddress($order['email'],$order['name']);

        $mail->Subject = "Your Purchased Book";

        $mail->Body = "
Dear {$order['name']},

Thank you for your purchase.

Book Name: {$order['book_name']}
Author: {$order['author']}

Your PDF file is attached.

Regards,
ReadNova BookStore
        ";

        $mail->addAttachment($file);

        $mail->send();

        return ['success'=>true];

    }catch(Exception $e){

        return [
            'success'=>false,
            'msg'=>$mail->ErrorInfo
        ];
    }
}

/* ===============================
   MARK ORDER COMPLETED
================================= */
function markDone($conn,$id)
{
    $stmt = mysqli_prepare($conn,"
        UPDATE orders
        SET status='completed'
        WHERE id=?
    ");

    mysqli_stmt_bind_param($stmt,"i",$id);
    mysqli_stmt_execute($stmt);
}

/* ===============================
   MAIN PROCESS
================================= */

echo "<h2>Processing Paid Orders...</h2>";

$orders = getPaidOrders($conn);

if(empty($orders)){
    echo "❌ No Paid Orders Found";
    exit();
}

foreach($orders as $order){

    echo "<hr>";
    echo "Order ID: ".$order['id']."<br>";
    echo "Book Name: ".$order['book_name']."<br>";
    echo "Author: ".$order['author']."<br>";
    echo "Customer: ".$order['name']."<br>";
    echo "Email: ".$order['email']."<br>";

    $pdf = findPdf($conn,$order);

    if(!$pdf){
        echo "❌ PDF Not Found In Database<br>";
        continue;
    }

    echo "✅ PDF Found: ".$pdf['pdf-file']."<br>";

    $send = sendMail($order,$pdf);

    if($send['success']){

        markDone($conn,$order['id']);

        echo "✅ Email Sent Successfully<br>";
        echo "✅ Order Marked Completed<br>";

    }else{

        echo "❌ Mail Error: ".$send['msg']."<br>";
    }
}
?>