<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page
 *
 * @author Chetan Rajbhandari
 */

namespace common\components;

use Codeception\Event\PrintResultEvent;
use common\components\HelperUpload as Upload;
use common\components\HelperUser;
use common\components\Misc;
use common\components\Query;
use common\models\Directory;
use common\models\generated\InsertedDirectoryCategory;
use common\models\User;
use Yii;
use yii\base\Component;
use common\models\Contact;
use common\models\ClientRequest;


class HelperSignUp extends Component {
    public static function getAllRequests() {
        $data = Query::queryAll("SELECT *  FROM  `client_request` ");
        return Misc::exists($data, false);
    }

    public static function getRequest($field, $value) {
        $data = Query::queryOne("SELECT *  FROM  `client_request` WHERE " . $field . ' = ' . $value);
        return Misc::exists($data, false);
    }

    public static function getUser($email) {
        $data = Query::queryOne("SELECT id  FROM  `user` WHERE `email`" . '=' . '"' . $email . '"');
        return Misc::exists($data, false);
    }

    public static function getRequests($field, $value) {
        $data = Query::queryAll("SELECT *  FROM  `client_request` WHERE " . $field . ' = ' . $value);
        return Misc::exists($data, false);
    }

    public static function setRequest($data) {
        $model = new ClientRequest();
        $model->name = (isset($data['name'])) ? $data['name'] : '';
        $model->email = (isset($data['email'])) ? $data['email'] : '';
        $model->package = (isset($data['package'])) ? $data['package'] : '';
        $model->is_viewed = (isset($data['name'])) ? $data['is_viewed'] : '0';
        $model->is_approved = (isset($data['name'])) ? $data['is_approved'] : '0';
        if ($model->save(false)) {
            return $model;
        }
        return false;
    }

    //    public static function calculateCheckout($post, $card, $disp_add, $coupon) {
    //        $package = $post['business']['package'];
    //        $packages = Yii::$app->params['packages'][$package];
    //        $totals = [
    //                'package-price' => 0,
    //                'category'      => 0,
    //                'disp_add'      => 0,
    //                'card'          => 0,
    //                'coupon'        => 0,
    //                'grand-total'   => 0,
    //        ];
    //        $totals['package-price'] = $packages['price'];
    //
    //        if (isset($post['business']['category_id']) && $post['business']['category_id'] != '') {
    //            $categories = count($post['business']['category_id']);
    //            $rate_categories = Yii::$app->params['packages'][$package]['objects']['category']['price'];
    //            if(count($post['business']['category_id'])>$packages['objects']['category']['free']){
    //                $extra_categories = $categories -$packages['objects']['category']['free'];
    //                $totals['category'] = $extra_categories*$rate_categories;
    //            }
    //        }
    //
    //        if (isset($card['tmp_name']) && $card['tmp_name'] != '') {
    //            if ($packages['objects']['card']['free'] == 1) {
    //                $totals['card'] = 0;
    //            }
    //            else {
    //                $totals['card'] = $packages['objects']['card']['price'];
    //            }
    //        }
    //        if (isset($coupon['tmp_name']) && $coupon['tmp_name'] != '') {
    //            if ($packages['objects']['coupon']['free'] == 1) {
    //                $totals['coupon'] = 0;
    //            }
    //            else {
    //                $totals['coupon'] = $packages['objects']['coupon']['price'];
    //            }
    //        }
    //        if (isset($disp_add['tmp_name']) && $disp_add['tmp_name'] != '') {
    //            if ($packages['objects']['disp_add']['free'] == 1) {
    //                $totals['disp_add'] = 0;
    //            }
    //            else {
    //                $totals['disp_add'] = $packages['objects']['disp_add']['price'];
    //            }
    //        }
    //        $totals['grand-total'] = $totals['package-price'] + $totals['category'] +$totals['card'] + $totals['coupon'] + $totals['disp_add'];
    //
    //        $details = [
    //                'category' => $categories,
    //                'disp_add' => $disp_add,
    //                'card' => $card,
    //                'coupon' => $coupon,
    //                'user_info' => $user_info,
    //                'package'   => $package,
    //                'totals'    => $totals,
    //                'add_info'  => $add_info
    //        ];
    //        return $details;
    //    }
    public static function rearrangeFilesArray($x) {
        $co = [];
        foreach ($x as $k => $a) {
            foreach ($a as $m => $l) {
                $co[$m][$k] = $l;
            }

        }
        return $co;
    }

    public static function uploadFilesArray($x) {
        $r = [];
        $x = self::rearrangeFilesArray($x);
        foreach ($x as $c => $file) {
            echo $c;
            $up = Upload::upload($file);
            if ($up == false) {
                return false;
            }
            $r[$c] = $up;
        }
        return $r;
    }


    public static function signUp($post, $card, $disp_add, $coupon) {

        $user = HelperUser::addUser($post, 'user');
        if (isset($user) != false) {
            $model = new Directory();
            $model->extended_till = date('Y-m-d', strtotime('+1 year'));

            //calculating the total amount
            $package = $post['business']['package'];
            $packages = Yii::$app->params['packages'][$package];
            $totals = [
                    'package-price' => 0,
                    'category'      => 0,
                    'disp_add'      => 0,
                    'card'          => 0,
                    'coupon'        => 0,
                    'grand-total'   => 0,
            ];
            $totals['package-price'] = $packages['price'];
            if (isset($post['business']['category_id']) && $post['business']['category_id'] != '') {
                $categories = count($post['business']['category_id']);
                $rate_categories = Yii::$app->params['packages'][$package]['objects']['category']['price'];
                if (count($post['business']['category_id']) > $packages['objects']['category']['free']) {
                    $extra_categories = $categories - $packages['objects']['category']['free'];
                    $totals['category'] = $extra_categories * $rate_categories;
                }
            }
            if (isset($card['tmp_name']) && $card['tmp_name'] != '') {
                if ($packages['objects']['card']['free'] == 1) {
                    $totals['card'] = 0;
                }
                else {
                    $totals['card'] = $packages['objects']['card']['price'];
                }
            }
            if (isset($coupon) && $coupon != '') {
                $coupon_count = count($coupon);
                $rate_coupon = Yii::$app->params['packages'][$package]['objects']['coupon']['price'];
                if ($coupon_count > $packages['objects']['coupon']['free']) {
                    $extra_coupon = $coupon_count - $packages['objects']['coupon']['free'];
                    $totals['coupon'] = $extra_coupon * $rate_coupon;
                }
            }
            if (isset($disp_add) && $disp_add != '') {
                $disp_add_count = count($disp_add);
                $rate_disp_add = Yii::$app->params['packages'][$package]['objects']['disp_add']['price'];
                if ($disp_add_count > $packages['objects']['disp_add']['free']) {
                    $extra_disp_add = $disp_add_count - $packages['objects']['disp_add']['free'];
                    $totals['disp_add'] = $extra_disp_add * $rate_disp_add;
                }
            }
            $totals['grand-total'] = $totals['package-price'] + $totals['category'] + $totals['card'] + $totals['coupon'] + $totals['disp_add'];
            //calculating the total amount
            $package = (isset($post['business']['package']) && $post['business']['package'] != '') ? $post['business']['package'] : '';
            if ($package == 'featured') {
                $model->is_featured = 1;
                $item_count = Query::queryOne("SELECT MAX(featured_index) AS TotalItems FROM directory;");
                $featured_index = intval($item_count['TotalItems']);
                if ($featured_index <= 40) {
                    $model->featured_index = $featured_index + 1;
                }
            }

            $model->user_id = $user->id;
            $model->grand_total = $totals['grand-total'];
            $model->signup_code = strtoupper(Misc::shuffle(3)) . date('YmdHis');
            $model->package = (isset($post['business']['package']) && $post['business']['package'] != '') ? $post['business']['package'] : '';

            $model->phone = (isset($post['business']['phone']) && $post['business']['phone'] != '') ? $post['business']['phone'] : '';
            $model->del_address = (isset($post['business']['del_address']) && $post['business']['del_address'] != '') ? $post['business']['del_address'] : '';
            $model->fax = (isset($post['business']['fax']) && $post['business']['fax'] != '') ? $post['business']['fax'] : '';
            $model->email = (isset($post['business']['email']) && $post['business']['email'] != '') ? $post['business']['email'] : '';
            $model->url = (isset($post['business']['url']) && $post['business']['url'] != '') ? $post['business']['url'] : '';
            $model->name = (isset($post['business']['name']) && $post['business']['name'] != '') ? $post['business']['name'] : '';
            $model->owner_name = (isset($post['business']['owner_name']) && $post['business']['owner_name'] != '') ? $post['business']['owner_name'] : '';
            $model->owner_num = (isset($post['business']['owner_phone']) && $post['business']['owner_phone'] != '') ? $post['business']['owner_phone'] : '';
            $model->owner_zip = (isset($post['business']['owner_zip']) && $post['business']['owner_zip'] != '') ? $post['business']['owner_zip'] : '';
            $model->owner_email = (isset($post['business']['owner_email']) && $post['business']['owner_email'] != '') ? $post['business']['owner_email'] : '';
            $model->address = (isset($post['business']['address']) && $post['business']['address'] != '') ? $post['business']['address'] : '';
            $model->city = (isset($post['business']['city']) && $post['business']['city'] != '') ? $post['business']['city'] : '';
            $model->state = (isset($post['business']['state']) && $post['business']['state'] != '') ? $post['business']['state'] : '';
            $model->zip = (isset($post['business']['zip']) && $post['business']['zip'] != '') ? $post['business']['zip'] : '';
            $model->extended_till = (isset($post['business']['extended_till']) && $post['business']['extended_till'] != '') ? Misc::Ymd($post['business']['extended_till']) : $model->extended_till;
            $model->description = (isset($post['business']['description']) && $post['business']['description'] != '') ? $post['business']['description'] : '';
            $model->is_active = (isset($post['business']['status'])) ? '1' : '0';
            if (!$model->save()) {
                return false;
            }


            if (isset($coupon['name'])) {
                $coupon = self:: uploadFilesArray($coupon);
                if ($coupon !== false) {
                    $coupon = implode($coupon, ',');
                    $model->coupon = $coupon;
                    if ($model->save() == false) {
                        return false;
                    }
                }
            }
            if (isset($disp_add['name'])) {
                $disp_add = self:: uploadFilesArray($disp_add);
                if ($disp_add !== false) {
                    $disp_add = implode($disp_add, ',');
                    $model->disp_add = $disp_add;
                    if ($model->save() == false) {
                        return false;
                    }
                }
            }

            if (isset($card['name']) && strlen(trim($card['name'])) > 0) {
                $file = $card;
                $up = Upload::upload($file);

                if ($up) {
                    $model->card = $up;
                    $model->save(false);
                }
            }

            $categories = (isset($post['business']['category_id']) && $post['business']['category_id'] != '') ? $post['business']['category_id'] : '';
            if(!empty($categories)) {
                foreach ($categories as $key => $c) {
                    $model2 = new InsertedDirectoryCategory();
                    $model2->directory_id = $model->id;
                    $model2->category_id = $c;
                    if (!$model2->save()) {
                        echo '<pre>';
                        print_r($model2->errors);
                        echo '</pre>';
                    }
                }
            }


            //        }


            return true;
        }

    }
}