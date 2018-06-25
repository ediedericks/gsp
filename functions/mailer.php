<?php

// require '../mailgun/vendor/autoload.php';
// use Mailgun\Mailgun;



function sentMail($name, $email, $subject, $msg){



    try{

        $template = $msg.'<br/><br/><b>Client Details: </b><br/><b>Name: </b>'.$name.'<br/><b>Subject: </b>'.$subject.'<br/><b>Email: </b>'.$email;

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: estian@gspelectronics.co.za" . "\r\n";

        mail("estian@gspelectronics.co.za",$subject,$template, $headers);

        return 'true';
        exit;

    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

};



function sentClientMail($name, $email, $subject){


    try{

        $msg = '<table align="center" cellpadding="0" cellspacing="0" width="80%%">
                <tr>
                    <td align="center">
                        <table align="center" cellpadding="0" cellspacing="0" width="600"
                               style="border-collapse: separate; box-shadow: 1px 0 1px 1px #B8B8B8;"
                               bgcolor="#FFFFFF">
                            <tr>
                                <td align="center" style="padding: 5px 5px 5px 5px;">
                                    <a href="" target="_blank">
                                        <img src="https://s3.eu-west-2.amazonaws.com/gsp-electronics/images/gsp-logo-black.png" alt="Logo" style="width:186px;border:0;"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                    <table cellpadding="0" cellspacing="0" width="100%%">
                                        <tr>
                                            <td style="padding: 10px 0 10px 0; font-family: Avenir, sans-serif; font-size: 16px;">
                                                
                                                Thank you <strong>'.ucfirst($name).'</strong>, we have received your message and will get in touch with you as soon as possible. <br/><br/>Thank you!<br/><strong>GSP Team</strong>

                                            </td>
                                        </tr>
                                        <hr>
                                        <tr>
                                            <td><h4>Contact Details</h4></td>
                                        </tr>
                                        <tr>
                                            <td>082 424 3990</td>
                                        </tr>
                                        <tr>
                                            <td>083 341 6049</td>
                                        </tr>
                                        <tr>
                                            <td>info@gspelectronics.co.za</td>
                                        </tr>
                                        <tr>
                                            <a href="https://www.facebook.com/gspelectros/"><img src="https://s3.eu-west-2.amazonaws.com/gsp-electronics/images/facebook-icon.png" width="25" height="25" alt="facebook"></a>
                                        </tr>
                                        
                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>   
            </table>';        

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: noreply@gspelectronics.com" . "\r\n";

        // mail("estian@estiantestingenv.com",$subject,$template, $headers);
        mail($email,$subject,$msg, $headers);

        return 'true';
        exit;

    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

};

// sentMail('name', 'code.estian@gmail.com', 'sub', 'kasjdkasdjaskd');
// sentClientMail('name', 'estian.diedericks@gmail.com', 'subbbb');


?>