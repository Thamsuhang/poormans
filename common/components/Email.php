<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of Email
     *
     * @author Chetan Rajbhandari
     */

    namespace common\components;

    use Yii;
    use yii\base\Component;

    class Email extends Component {

        public static function sendAttachmentTo($email, $name, $subject, $msg, $display_link = '', $coupon = '', $card = '', $featured = '') {
            $path = Yii::getAlias("@vendor/phpmailer/JPhpMailer.php");
            require_once($path);
            if (!empty(Yii::$app->params['email'])) {
                $mail = new \JPhpMailer();
                $mail->Host = Yii::$app->params['email']['Host'];
                $mail->Port = Yii::$app->params['email']['Port'];
                $mail->SMTPSecure = 'tls';
                $mail->SMTPAuth = TRUE;
                $mail->SMTPKeepAlive = TRUE;
                $mail->SMTPDebug = 0;
                $mail->Mailer = 'mail';
                $mail->CharSet = 'utf-8';
                $mail->ContentType = 'text/html';
                $mail->IsHTML(TRUE);

                $mail->From = Yii::$app->params['email']['From'];
                $mail->FromName = Yii::$app->params['email']['FromName'];
                $mail->Username = Yii::$app->params['email']['Username'];
                $mail->Password = Yii::$app->params['email']['Password'];
                $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!!';

                $mail->Subject = $subject;
                $mail->MsgHTML($msg . Yii::$app->params['email']['Signature']);
                $mail->AddAddress($email, $name);
                if (isset($display_link) && !empty($display_link) && $display_link != '') {
                    if ($display_link['attach'] != '') {
                        $mail->AddAttachment($display_link['attach'], 'display link- ' . $display_link['filename']);
                    }
                }
                if (isset($coupon) && !empty($coupon) && $coupon != '') {
                    if ($coupon['attach'] != '') {
                        $mail->AddAttachment($coupon['attach'], 'coupon- ' . $coupon['filename']);
                    }
                }
                if (isset($card) && !empty($card) && $card != '') {
                    if ($card['attach'] != '') {
                        $mail->AddAttachment($card['attach'], 'card- ' . $card['filename']);
                    }
                }
                if (isset($featured) && !empty($featured) && $featured != '') {
                    if ($featured['attach'] != '') {
                        $mail->AddAttachment($featured['attach'], 'featured- ' . $featured['filename']);
                    }
                }
                if ($mail->send()) {
                    return TRUE;
                }
            }
            return FALSE; //$mail->ErrorInfo;
        }

        public static function sendTo($email, $name, $subject, $msg) {
            $path = Yii::getAlias("@vendor/phpmailer/JPhpMailer.php");
            require_once($path);
            if (!empty(Yii::$app->params['email'])) {
                $mail = new \JPhpMailer();
                $mail->Host = Yii::$app->params['email']['Host'];
                $mail->Port = Yii::$app->params['email']['Port'];
                $mail->SMTPSecure = 'tls';
                $mail->SMTPAuth = TRUE;
                $mail->SMTPKeepAlive = TRUE;
                $mail->SMTPDebug = 0;
                $mail->Mailer = 'mail';
                $mail->CharSet = 'utf-8';
                $mail->ContentType = 'text/html';
                $mail->IsHTML(TRUE);

                $mail->From = Yii::$app->params['email']['From'];
                $mail->FromName = Yii::$app->params['email']['FromName'];
                $mail->Username = Yii::$app->params['email']['Username'];
                $mail->Password = Yii::$app->params['email']['Password'];
                $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!!';

                $mail->Subject = $subject;
                $mail->MsgHTML($msg . Yii::$app->params['email']['Signature']);
                $mail->AddAddress($email, $name);

                if ($mail->send()) {
                    return TRUE;
                }
            }
            return FALSE; //$mail->ErrorInfo;
        }

        public static function sendFrom($email, $name, $subject, $msg) {
            $path = Yii::getAlias("@vendor/phpmailer/JPhpMailer.php");
            require_once($path);

            if (!empty(Yii::$app->params['email'])) {
                $mail = new \JPhpMailer();
                //$mail->IsSMTP();
                $mail->Host = Yii::$app->params['email']['Host'];
                $mail->Port = Yii::$app->params['email']['Port'];
                $mail->SMTPSecure = 'tls';
                $mail->SMTPAuth = TRUE;
                $mail->SMTPKeepAlive = TRUE;
                $mail->SMTPDebug = 0;
                $mail->Mailer = 'mail';
                $mail->CharSet = 'utf-8';
                $mail->ContentType = 'text/html';

                $mail->From = $email;
                $mail->FromName = $name;
                $mail->Username = Yii::$app->params['email']['Username'];
                $mail->Password = Yii::$app->params['email']['Password'];
                $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!!';

                $mail->Subject = $subject;
                $mail->MsgHTML($msg);
                $mail->AddAddress(Yii::$app->params['email']['From'], Yii::$app->params['email']['FromName']);

                if ($mail->send()) {
                    return TRUE;
                }
            }
            return FALSE; //$mail->ErrorInfo;
        }
    }