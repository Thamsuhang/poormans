<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace common\components;

use common\models\Blogs;
use common\models\SliderImages;
use yii\base\Component;

//use common\models\SliderImages;

class HelperUpload extends Component {
    public static function upload($upload) {
    //        echo '<pre>';
    //        print_r($upload);
    //        echo '</pre>';
    //        die;
        $path = $upload['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
//        echo $ext;
//        echo '<pre>';
//        print_r($upload);
//        echo '</pre>';
//        die;
        // $target_dir = Yii::$app->params['upload_path']['image'];
        $target_dir = '../../common/assets/images/uploads/';
//        substr($upload["name"], -6
        $filename = Misc::timestamp(date('Y-m-d H:i:s')).mt_rand(1000,9999).'.'.$ext;
        $target_file = $target_dir . basename($filename);
//        echo '<pre>';
//        print_r($target_file);
//        echo '</pre>';
//        die;
        $uploadOk = 1;
        $error = '';
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($upload["tmp_name"]);
            if ($check !== FALSE) {
                $error = "File is not an image.";
                $uploadOk = 0;
            }
            else {
                $error = "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $error = "Sorry, file ".$target_file." already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($upload["size"] > 10000000) {
            $error = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error

        if ($uploadOk == 0) {
            echo "Sorry, your file '".$path."' was not uploaded - " . $error;
            die;
            // if everything is ok, try to upload file
        }
        else {
            if (move_uploaded_file($upload["tmp_name"], $target_file)) {
                //echo "The file " . basename($upload["name"]) . " has been uploaded.";
                return $filename;
            }
            else {
                //return false;
                echo "Sorry, there was an error uploading your file.";
                die;
            }
        }
        //die;
    }

    public static function updateDB($page_id, $filename) {
        $image_data = Query::queryOne("SELECT * FROM `slider_images` WHERE `page_id` = " . $page_id);
        if (isset($image_data['id'])) {
            $model = SliderImages::findOne($image_data['id']);
        }
        else {
            $model = new SliderImages;
        }
        $model->page_id = $page_id;
        $model->image = $filename;
        $model->link = '';

        if ($model->save(FALSE)) {
            return TRUE;
        }
        else {
            echo 'not done';
            die;
        }
    }
}
