<?php

namespace App\Mail;

//use Illuminate\Bus\Queueable;
//use Illuminate\Mail\Mailable;
//use Illuminate\Queue\SerializesModels;
//use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use PHPMailer;
use PHPMailerOAuth;
use DB;
class MailRegister extends Mailable
{

    public function __construct($user)
    {

            $nFrom = "Mix166";    //mail duoc gui tu dau, thuong de ten cong ty ban
            $mFrom = 'donkihote2595@gmail.com';  //dia chi email cua ban
            $mPass = 'maitrang0606';       //mat khau email cua ban
            $nTo = $user->name; //Ten nguoi nhan
            $mTo = $user->email;   //dia chi nhan mail
            $mail             = new PHPMailer();
            $url = url("register/$user->name/$user->_token");
                        $body             = '<!DOCTYPE html>
            <html>
            <head>
                <title></title>
            </head>
            <body>
            <div>
            <lable> Click vao link de kich hoat tai khoan </lable>
            </div>
            <a href="'.$url.'" >Link</a>
            
            </body>
            </html>';   // Noi dung email
            $title = 'Mail from laravel';   //Tieu de gui mail
            $mail->IsSMTP();
            $mail->CharSet  = "utf-8";
            $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
            $mail->SMTPAuth   = true;    // enable SMTP authentication
            $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
            $mail->Host       = "smtp.gmail.com";    // sever gui mail.
            $mail->Port       = 465;         // cong gui mail de nguyen
            // xong phan cau hinh bat dau phan gui mail
            $mail->Username   = $mFrom;  // khai bao dia chi email
            $mail->Password   = $mPass;              // khai bao mat khau
            $mail->SetFrom($mFrom, $nFrom);
            $mail->AddReplyTo('donkihote2595@gmail.com', 'Mix166.net'); //khi nguoi dung phan hoi se duoc gui den email nay
            $mail->Subject    = $title;// tieu de email
            $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
            $mail->AddAddress($mTo, $nTo);
            // thuc thi lenh gui mail
            if(!$mail->Send()) {
                $error = "<script>
            confirm('Create account error!  Check again email');
            </script>";
                echo $error;
                DB::table('users')->where('name',$user->name)->delete();
                return false;
            } else {

                return true;
            }

    }

    /**
     * Build the message.
     *
     * @return
     * $this
     */

}
