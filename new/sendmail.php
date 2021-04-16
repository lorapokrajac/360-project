<!DOCTYPE html>
<html>

<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["email"])){
        include_once("smtp.class.php");
        $smtpserver = "smtp.qq.com";
        $smtpserverport = 25;
        $smtpusermail = "328664798@qq.com";
        $smtpemailto = $_POST["email"];
        $smtpuser = "328664798@qq.com";
        $smtppass = "anzdchstby541";
        $subject = "reset your password";
        $message = "<a href=\"reset.html\">click here</a>";

        $smtp = new Smtp($smtpserver,$smtpserverport,false,$smtpuser,$smtppass);
        $emailtype = "HTML";
        $state = $smtp->sendmail($smtpemailto,$smtpusermail,$subject,$message,$emailtype);
        if($state==""){
            echo "sorry, cannot send to this email";
            exit();
        }
        echo "Email sent successfully";
    

    }
}
?>