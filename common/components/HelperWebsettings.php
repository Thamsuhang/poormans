<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of settings
     *
     * @author Chetan Rajbhandari
     */

    namespace common\components;

    use Yii;
    use yii\base\Component;
    use common\components\Query;
    use common\components\Misc;
    use common\models\Smtp;
    use common\models\Social;

    class HelperWebsettings extends Component {

        public static function getSMTP() {

            $data = Query::queryOne("SELECT * FROM `smtp` WHERE `id`= 1");

            //            if (isset($data['password']) && !empty($data['password'])) {
            //                $data['password'] = Yii::$app->security->decryptByKey($data['password'], Yii::$app->params['encryption_key']);
            //                $data['password'] = Yii::$app->security->decryptByKey($data['password'], Yii::$app->params['encryption_key']);
            //            }
            return Misc::exists($data, FALSE);
        }

        public static function setSMTP($data) {
            //print_r($data);
            // $decrypted = Yii::$app->security->decryptByKey(utf8_decode($encrypted), $key);
            if (isset($data['id'])) {
                $model = Smtp::findOne($data['id']);
                $model->email = (isset($data['email'])) ? $data['email'] : '';
                $model->host = (isset($data['host'])) ? $data['host'] : '';
                $model->mailer = (isset($data['mailer'])) ? $data['mailer'] : '';
                $model->authentication = (isset($data['authentication'])) ? $data['authentication'] : 1;
                $model->port = (isset($data['port'])) ? $data['port'] : '';
                $model->username = (isset($data['username'])) ? $data['username'] : '';
                $model->password = (isset($data['password']) && !empty($data['password'])) ? $data['password'] : $model->password;
                //$model->password = (isset($data['password']) && !empty($data['password'])) ? Yii::$app->security->encryptByKey(utf8_encode($data['password']), Yii::$app->params['encryption_key']) : '';
                $model->signature = (isset($data['signature'])) ? $data['signature'] : '';
                //                print_r($model);
                //                die;
                if ($model->save(false)) {
                    return true;
                }
                else {
                    die ('Could Not Save');
                }
            }
            die;
        }

        public static function getSocial() {
            $data = Query::queryAll("SELECT * FROM `social`");
            return Misc::exists($data, FALSE);
        }

        public static function setSocial($data) {


            if (isset($data['id']) && !empty($data['id'])) {
                $model = Social::findOne($data['id']);
            }
            else {
                $model = new Social;
            }

            $model->icon = (isset($data['icon'])) ? $data['icon'] : '';
            $model->type = (isset($data['type'])) ? $data['type'] : '';
            $model->url = (isset($data['url'])) ? $data['url'] : '';

            if ($model->save(false)) {
                return $model;
            }
            else {
                die('Couldn`t save data');
            }
        }

        public static function getOneSocial($id) {
        }
    }