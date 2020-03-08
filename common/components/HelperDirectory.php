<?php

namespace common\components;

use common\components\HelperUpload as Upload;
use common\models\Directory;
use common\models\InsertedDirectoryCategory;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;

class HelperDirectory extends Component {

    public static $sql2 = "SELECT
                                I.*,
                                d.*,
                                C.*,
                                P.*,
                                I.id as inserted_directory_category_id,
                                d.id as id,
                                C.id as child,
                                C.type as type,                                
                                P.type as parent
                                FROM inserted_directory_category AS I
                                LEFT JOIN directory AS d ON d.id = I.directory_id 
                                LEFT JOIN directory_categories AS C ON C.id = I.category_id
                                LEFT JOIN directory_categories AS P ON P.id = C.parent";

    public static $sql = "SELECT *,
                    d.id AS directory_id,
                    dc.type AS type,
                    dp.type AS parent,
                    dp.id AS parent_id
                    FROM `directory` AS d
                    LEFT JOIN `directory_categories` AS dc ON d.category_id = dc.id
                    LEFT JOIN `directory_categories` AS dp ON dc.parent = dp.id ";

    public static function commaSeparateItems($directories) {
        foreach ($directories as $key => $directory) {
            if (isset($directory['category_id']) && $directory['category_id'] != '') {
                $directory['category_id'] = explode(',', $directory['category_id']);
            }
            if (isset($directory['tags']) && $directory['tags'] != '') {
                $directory['tags'] = explode(',', $directory['tags']);
            }
            if (isset($directory['phone']) && $directory['phone'] != '') {
                $directory['phone'] = explode(',', $directory['phone']);
            }
            if (isset($directory['fax']) && $directory['fax'] != '') {
                $directory['fax'] = explode(',', $directory['fax']);
            }
            if (isset($directory['email']) && $directory['email'] != '') {
                $directory['email'] = explode(',', $directory['email']);
            }
            if (isset($directory['url']) && $directory['url'] != '') {
                $directory['url'] = explode(',', $directory['url']);
            }
        }
        return $directories;
    }

    public static function jsonDecodeDirectoryItems($directories) {
        foreach ($directories as $key => $directory) {
            if (isset($directory['tags']) && $directory['tags'] != '') {
                $directory['tags'] = explode(',', $directory['tags']);
            }
            if (isset($directory['phone']) && $directory['phone'] != '') {
                $directory['phone'] = explode(',', $directory['phone']);
            }
            if (isset($directory['fax']) && $directory['fax'] != '') {
                $directory['fax'] = explode(',', $directory['fax']);
            }
            if (isset($directory['email']) && $directory['email'] != '') {
                $directory['email'] = explode(',', $directory['email']);
            }
            if (isset($directory['url']) && $directory['url'] != '') {
                $directory['url'] = explode(',', $directory['url']);
            }
        }
        return $directories;
    }

    public static function getActiveItems($where) {
        $sql = self::$sql2;
        $sql .= " WHERE " . $where . "
            
            AND  d.is_active = 1
            AND  d.extended_till >= '" . date('Y-m-d') . "'";

        $directories = Query::queryAll($sql);
        if (isset($directories) && !empty($directories)) {
            //   $directories = self::jsonDecodeDirectoryItems($directories);
            $directories = self::commaSeparateItems($directories);
        }
        return $directories;
    }

    public static function getFeatured() {
        $sql = self::$sql;
        $sql .= "WHERE  d.is_featured = 1
                    AND d.package LIKE 'featured'
                    AND  d.is_active = 1
                    AND  d.extended_till >= '" . date('Y-m-d') . "'" . "
                    ORDER BY `featured_index`
                    LIMIT 0 , " . Yii::$app->params['allowed_featured'];
        $directories = Query::queryAll($sql);
        if (isset($directories) && !empty($directories)) {
            $directories = self::jsonDecodeDirectoryItems($directories);
        }
        return Misc::exists($directories, false);
    }

    public static function countFeatured() {
        $count = Query::queryAll("SELECT COUNT(id)
                                FROM `directory` AS d
                                WHERE  d.is_featured = 1
                                AND d.package LIKE 'featured'
                                AND  d.is_active = 1");

        return Misc::exists($count, false);

    }

    public static function updateFeaturedIndex($order) {
        $order_count = 1;
        foreach ($order as $item) {
            $model = Directory::findOne($item);
            $model->featured_index = $order_count;
            if (!$model->save(false)) {
                return json_encode(false);
            }
            $order_count++;
        };
        return json_encode(true);
    }

    public static function getAllByType($value) {
        $sql = self::$sql;
        $sql .= " WHERE D.package LIKE '$value' ";

        if ($value == 'featured') {
            $sql .= " ORDER BY `featured_index`
                            LIMIT 0 , " . Yii::$app->params['allowed_featured'];
        }
        else {
            $sql .= " ORDER BY `created_on` DESC";
        }
        $directories = Query::queryAll($sql);
        if (isset($directories) && !empty($directories)) {
            $directories = self::jsonDecodeDirectoryItems($directories);
        }
        return Misc::exists($directories, false);
    }

    public static function getCategoriesByName($string) {
        $sql = self::$sql;
        $sql .= "WHERE  d.is_active = 1
                    AND d.name LIKE '$string%'
                    AND  d.extended_till >= '" . date('Y-m-d') . "'" . "
                    ORDER BY  d . created_on DESC ";
        $directories = Query::queryAll($sql);
        if (isset($directories) && !empty($directories)) {
            $directories = self::jsonDecodeDirectoryItems($directories);
        }
        return Misc::exists($directories, false);
    }

    public static function getAll() {
        $directories = Query::queryAll(self::$sql2);
        $directories = self::jsonDecodeDirectoryItems($directories);
        return Misc::exists($directories, false);
    }

    public static function getSingleDirectoryItem($id) {
        $sql = self::$sql2;
        $sql .= " WHERE d . id = '$id'";
        $directory = Query::queryAll($sql);

        if (!empty($directory)) {
            foreach ($directory as $d) {
                if (!isset($array)) {
                    $array = $d;
                }
                if (!isset($array['category'][$d['parent']])) {
                    $array['category'][$d['parent']] = [];
                }
                array_push($array['category'][$d['parent']], [
                        'inserted_directory_category_id' => $d['inserted_directory_category_id'],
                        'child_id'                       => $d['child'],
                        'child_name'                     => $d['type'],
                        'parent_name'                    => $d['parent']
                ]);
            }

        }
        else {
            $sql = self::$sql;
            $sql .= " WHERE d . id = '$id'";
            $array = Query::queryOne($sql);
            $array['category'] = '';
        }
        if (isset($array['tags']) && $array['tags'] != '') {
            $array['tags'] = explode(',', $array['tags']);
        }
        if (isset($array['phone']) && $array['phone'] != '') {
            $array['phone'] = explode(',', $array['phone']);
        }
        if (isset($array['fax']) && $array['fax'] != '') {
            $array['fax'] = explode(',', $array['fax']);
        }
        if (isset($array['email']) && $array['email'] != '') {
            $array['email'] = explode(',', $array['email']);
        }
        if (isset($array['url']) && $array['url'] != '') {
            $array['url'] = explode(',', $array['url']);
        }


        return Misc::exists($array, false);
    }

    public static function deleteItem($item) {
        if ($item['id'] > 0) {
            $model = Directory::findOne($item['id']);
            $old_data = json_decode($model->$item['type']);
            if ($old_data[$item['position']] == $item['value']) {
                unset($old_data[$item['position']]);
            }
            $new_data = json_encode($old_data);
            $model->$item['type'] = $new_data;
            echo ($model->save(false)) ? json_encode(true) : json_encode(false);
            die;
        }
    }

    public static function deleteFile($filename) {
        $file = Yii::$app->params['upload_path']['image'] . $filename;
        if (file_exists($file)) {
            unlink($file);
        }
    }

    public static function deleteDirectory($id) {
        $model = Directory::findOne($id);
        if ($model->card != '') {
            self::deleteFile($model->card);
        }
        if ($model->disp_add != '') {
            self::deleteFile($model->disp_add);
        }
        if ($model->coupon != '') {
            self::deleteFile($model->coupon);
        }
        return ($model->delete()) ? json_encode(true) : json_encode(false);
    }

    public static function rearrangeFilesArray($x) {
        $co = [];
        foreach ($x as $k => $a) {
            foreach ($a as $m => $l) {
                $co[$m][$k] = $l;
            }

        }
//        echo '<pre>';
//        print_r($co);
//        echo '</pre>';
//        die;
        return $co;
    }

    public static function uploadFilesArray($x) {
        $r = [];
//        $x = self::rearrangeFilesArray($x);
        foreach ($x as $c => $file) {
            if (!empty($file['name'])) {
                $up = Upload::upload($file);
                if ($up == false) {
                    return false;
                }
                $r[$c] = $up;
            }
        }
        return $r;
    }

    public static function setBusiness($post, $card = '', $display_add = '', $coupon = '') {

        if(isset($post['old_coupon'])) {
            $old_coupon = $post['old_coupon'];
        }
        if(isset($post['old_disp'])) {
            $old_coupon = $post['old_disp'];
        }
        if ($post['business']['id'] == '') {
            $id = (isset($post['business']['id']) && $post['business']['id'] > 0) ? $post['business']['id'] : 0;
            $user = HelperUser::addUser($post, 'user');
            if (isset($user) != false) {
                if (isset($post['business'])) {
                    $business = new Directory;
                    $business->extended_till = date('Y-m-d', strtotime('+1 year'));
                    $package = (isset($post['business']['package']) && $post['business']['package'] != '') ? $post['business']['package'] : '';

                    if ($package == 'featured') {
                        $business->is_featured = 1;
                        $item_count = Query::queryOne("SELECT MAX(featured_index) AS TotalItems FROM directory;");
                        $featured_index = intval($item_count['TotalItems']);
                        if ($featured_index <= 40) {
                            $business->featured_index = $featured_index + 1;
                        }
                    }
                    $business->user_id = $user->id;
                    $business->package = (isset($post['business']['package']) && $post['business']['package'] != '') ? $post['business']['package'] : '';
                    $business->name = (isset($post['business']['name']) && $post['business']['name'] != '') ? $post['business']['name'] : '';
                    $business->owner_name = (isset($post['business']['owner_name']) && $post['business']['owner_name'] != '') ? $post['business']['owner_name'] : '';
                    $business->owner_num = (isset($post['business']['owner_number']) && $post['business']['owner_number'] != '') ? $post['business']['owner_number'] : '';
                    $business->owner_zip = (isset($post['business']['owner_zip']) && $post['business']['owner_zip'] != '') ? $post['business']['owner_zip'] : '';
                    $business->owner_email = (isset($post['business']['owner_email']) && $post['business']['owner_email'] != '') ? $post['business']['owner_email'] : '';
                    $business->address = (isset($post['business']['address']) && $post['business']['address'] != '') ? $post['business']['address'] : '';
                    $business->city = (isset($post['business']['city']) && $post['business']['city'] != '') ? $post['business']['city'] : '';
                    $business->state = (isset($post['business']['state']) && $post['business']['state'] != '') ? $post['business']['state'] : '';
                    $business->zip = (isset($post['business']['zip']) && $post['business']['zip'] != '') ? $post['business']['zip'] : '';
                    $business->extended_till = (isset($post['business']['extended_till']) && $post['business']['extended_till'] != '') ? Misc::Ymd($post['business']['extended_till']) : $business->extended_till;
                    $business->description = (isset($post['business']['description']) && $post['business']['description'] != '') ? $post['business']['description'] : '';
                    $business->is_active = (isset($post['business']['status'])) ? '1' : '0';
                    $business->phone = (isset($post['business']['phone']) && $post['business']['phone'] != '') ? $post['business']['phone'] : '';
                    $business->fax = (isset($post['business']['fax']) && $post['business']['fax'] != '') ? $post['business']['fax'] : '';
                    $business->email = (isset($post['business']['email']) && $post['business']['email'] != '') ? $post['business']['email'] : '';
                    $business->url = (isset($post['business']['url']) && $post['business']['url'] != '') ? $post['business']['url'] : '';
                    $business->tags = (isset($post['business']['tags']) && $post['business']['tags'] != '') ? $post['business']['tags'] : '';


                    if ($business->save(false)) {
                        $id = $business->id;


                        $categories = (isset($post['business']['category_id']) && $post['business']['category_id'] != '') ? $post['business']['category_id'] : '';
                        if (!empty($categories)) {
                            foreach ($categories as $key => $c) {
                                $model2 = new InsertedDirectoryCategory();
                                $model2->directory_id = $id;
                                $model2->category_id = $c;
                                if (!$model2->save()) {
                                    echo '<pre>';
                                    print_r($model2->errors);
                                    echo '</pre>';
                                }
                            }
                        }
                        if (isset($card['name']) && strlen(trim($card['name'])) > 0) {
                            $file = $card;
                            if ($id > 0) {
                                $business_model = Directory::findOne($id);
                                // Delete Old File if exists
                                if (isset($business_model->card) && !empty($business_model->card) && $business_model->card != '') {
                                    $old_file = Yii::$app->params['upload_path']['image'] . $business_model['card'];
                                    if (file_exists($old_file)) {
                                        if (unlink($old_file)) {
                                            $business_model->card = '';
                                        }
                                    }
                                }
                                // Upload New file
                                $up = Upload::upload($file);

                                if ($up) {
                                    $business_model->card = $up;
                                    $business_model->save(false);
                                }
                            }
                        }
                        if (isset($coupon['name'])) {
                            $coupon = self:: uploadFilesArray($coupon);
                            if ($coupon !== false) {
                                $coupon = implode($coupon, ',');
                                $business->coupon = $coupon;
                                if ($business->save() == false) {
                                    return false;
                                }
                            }
                        }
                        if (isset($display_add['name'])) {
                            $disp_add = self:: uploadFilesArray($display_add);
                            if ($disp_add !== false) {
                                $disp_add = implode($disp_add, ',');
                                $business->disp_add = $disp_add;
                                if ($business->save() == false) {
                                    return false;
                                }
                            }
                        }

                    }
                    return $id;

                }
            }
            return false;
        }
        else {
            $id = (isset($post['business']['id']) && $post['business']['id'] > 0) ? $post['business']['id'] : 0;

            $business = Directory::findOne($id);
            //            echo '<pre>';
            //            print_r($business);
            //            echo '</pre>';
            //            die;


            $package = (isset($post['business']['package']) && $post['business']['package'] != '') ? $post['business']['package'] : '';
            if ($package == 'featured') {
                $business->is_featured = 1;
                $item_count = Query::queryOne("SELECT MAX(featured_index) AS TotalItems FROM directory;");
                $featured_index = intval($item_count['TotalItems']);
                if ($featured_index <= 40) {
                    $business->featured_index = $featured_index + 1;
                }
            }
            $business->package = (isset($post['business']['package']) && $post['business']['package'] != '') ? $post['business']['package'] : '';
            $business->name = (isset($post['business']['name']) && $post['business']['name'] != '') ? $post['business']['name'] : '';
            $business->owner_name = (isset($post['business']['owner_name']) && $post['business']['owner_name'] != '') ? $post['business']['owner_name'] : '';
            $business->owner_num = (isset($post['business']['owner_number']) && $post['business']['owner_number'] != '') ? $post['business']['owner_number'] : '';
            $business->owner_zip = (isset($post['business']['owner_zip']) && $post['business']['owner_zip'] != '') ? $post['business']['owner_zip'] : '';
            $business->owner_email = (isset($post['business']['owner_email']) && $post['business']['owner_email'] != '') ? $post['business']['owner_email'] : '';
            $business->extended_till = (isset($post['business']['extended_till']) && $post['business']['extended_till'] != '') ? Misc::Ymd($post['business']['extended_till']) : $business->extended_till;
            $business->address = (isset($post['business']['address']) && $post['business']['address'] != '') ? $post['business']['address'] : '';
            $business->city = (isset($post['business']['city']) && $post['business']['city'] != '') ? $post['business']['city'] : '';
            $business->state = (isset($post['business']['state']) && $post['business']['state'] != '') ? $post['business']['state'] : '';
            $business->zip = (isset($post['business']['zip']) && $post['business']['zip'] != '') ? $post['business']['zip'] : $post['business']['date'];
            $business->description = (isset($post['business']['description']) && $post['business']['description'] != '') ? $post['business']['description'] : '';
            $business->is_active = (isset($post['business']['status'])) ? '1' : '0';
            $business->phone = (isset($post['business']['phone']) && $post['business']['phone'] != '') ? $post['business']['phone'] : '';
            $business->fax = (isset($post['business']['fax']) && $post['business']['fax'] != '') ? $post['business']['fax'] : '';
            $business->email = (isset($post['business']['email']) && $post['business']['email'] != '') ? $post['business']['email'] : '';
            $business->url = (isset($post['business']['url']) && $post['business']['url'] != '') ? $post['business']['url'] : '';
            $business->tags = (isset($post['business']['tags']) && $post['business']['tags'] != '') ? $post['business']['tags'] : '';


            if ($business->save(false)) {
                $id = $business->id;
                if (isset($card['name']) && strlen(trim($card['name'])) > 0) {
                    $file = $card;
                    if ($id > 0) {
                        $business_model = Directory::findOne($id);
                        // Delete Old File if exists
                        if (isset($business_model->card) && !empty($business_model->card) && $business_model->card != '') {
                            $old_file = Yii::$app->params['upload_path']['image'] . $business_model['card'];
                            if (file_exists($old_file)) {
                                if (unlink($old_file)) {
                                    $business_model->card = '';
                                }
                            }
                        }
                        // Upload New file
                        $up = Upload::upload($file);

                        if ($up) {
                            $business_model->card = $up;
                            $business_model->save(false);
                        }
                    }
                }

                if($business->package=='premium') {
                    if(isset($coupon)) {
                        $co = [];
                        foreach ($coupon as $k => $a) {
                            foreach ($a as $m => $l) {
                                $co[$m][$k] = $l;
                            }

                        }
                        if(!empty($co[0])) {
                            $coupon = self:: uploadFilesArray($co);
                            if (!empty($coupon)) {
                                $coupon = implode($coupon, ',');
                                $business->coupon = $coupon;
                            }
                            else {
                                if(isset($post['old_coupon'])) {
                                    $old_coupon = implode(',',$old_coupon);
                                    $business->coupon = $old_coupon;
                                }
                            }
                        }
                        if ($business->save() == false) {
                            return false;
                        }

                    }
                    if(isset($display_add)) {
                        $co = [];
                        foreach ($display_add as $k => $a) {
                            foreach ($a as $m => $l) {
                                $co[$m][$k] = $l;
                            }

                        }
                        if(!empty($co[0])) {
                            $display_add = self:: uploadFilesArray($co);
                            if (!empty($display_add)) {
                                $display_add = implode($display_add, ',');
                                $business->disp_add = $display_add;
                            }
                            else {
                                if(isset($post['$old_disp'])) {
                                    $old_disp = implode(',',$old_disp);
                                    $business->disp_add = $old_disp;
                                }
                            }
                        }
                        if ($business->save() == false) {
                            return false;
                        }

                    }
                }

                if (isset($post['business']['category'])) {
                    $cat_array = $post['business']['category'];
                }
                else {
                    $cat_array = '';
                }

                if ($cat_array != '') {
                    foreach ($cat_array as $cat => $c) {
                        $inserted_directory_id = $c['inserted_directory_id'];
                        $inserted_directory_category_id = $c['inserted_directory_category_id'];

                        if (!empty($inserted_directory_id)) {
                            $inserted_directory = InsertedDirectoryCategory::findOne($inserted_directory_id);
                            $inserted_directory->category_id = $inserted_directory_category_id;

                        }
                        else {
                            $inserted_directory = new InsertedDirectoryCategory;
                            $inserted_directory->directory_id = $post['business']['id'];
                            $inserted_directory->category_id = $inserted_directory_category_id;
                        }
                        if (!$inserted_directory->save()) {
                            return false;
                        }
                    }
                }
                elseif(isset($post['business']['category'])) {
                    $categories = (isset($post['business']['category_id']) && $post['business']['category_id'] != '') ? $post['business']['category_id'] : '';

                    foreach ($categories as $key => $c) {
                        $model2 = new InsertedDirectoryCategory();
                        $model2->directory_id = $post['business']['id'];
                        $model2->category_id = $c;
                        if (!$model2->save()) {
                            echo '<pre>';
                            print_r($model2->errors);
                            echo '</pre>';
                        }
                    }

                }
            }
            return $id;
            return false;
        }
    }

    public static function extendDate($id) {
        $model = Directory::findOne($id);
        $model->created_on = date("Y - m - d H:i:s");
        if ($model->update(false)) {
            $expiry = date('D, d M Y', strtotime('+1 year', strtotime($model->created_on)));
            return json_encode(true);
        }
        return json_encode(false);
    }
}
