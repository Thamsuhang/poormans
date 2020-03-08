<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of Slider
     *
     * @author Chetan Rajbhandari
     */

    namespace common\components;

    use Yii;
    use yii\base\Component;
    use common\components\Query;
    use common\components\Misc;
    use common\models\Slider as Slider;
    use common\models\SliderImages as SliderImages;

    class HelperSlider extends Component {

        public static function addSlider($data) {
            $model = new Slider();
            $model->name = isset($data['name']) ? $data['name'] : '';
            $model->title = isset($data['title']) ? $data['title'] : '';
            $model->height = isset($data['height']) ? $data['height'] : '';
            $model->width = isset($data['width']) ? $data['width'] : '';
            $model->created_on = date('Y-m-d H:i:s');
            $model->created_by = Yii::$app->session['user_CtNp1G0Ttqa4WFiWN25']->id;
            $model->last_edited_on = date('Y-m-d H:i:s');
            $model->last_edited_by = Yii::$app->session['user_CtNp1G0Ttqa4WFiWN25']->id;

            //return $model->save() ? $model : FALSE;
            if ($model->save()) {
                self::updateSliderImageRelation($data['gallery_images'], $model->id);
                return $model;
            }
            return FALSE;
        }

        public static function editSlider($data, $id) {
            $model = Slider::findOne($id);
            $model->name = isset($data['name']) ? $data['name'] : '';
            $model->title = isset($data['title']) ? $data['title'] : '';
            $model->height = isset($data['height']) ? $data['height'] : '';
            $model->width = isset($data['width']) ? $data['width'] : '';
            $model->last_edited_on = date('Y-m-d H:i:s');
            $model->last_edited_by = Yii::$app->session['user_CtNp1G0Ttqa4WFiWN25']->id;

            //return $model->update() ? $model : FALSE;
            if ($model->update()) {
                // delete initial relation data if exists
                self::deleteSliderImageRelation($id);
                self::updateSliderImageRelation($data['gallery_images'], $model->id);
                return $model;
            }
            return FALSE;
        }

        public static function getPageSlider($id) {

            $data = Query::queryOne("SELECT * FROM  `slider_images` WHERE  `page_id` = ". $id);
            return Misc::exists($data, FALSE);
        }

        public static function getSliders($field, $value) {
            $data = Query::queryAll("SELECT * FROM `slider` WHERE `$field` = '$value'");
            return Misc::exists($data, FALSE);
        }

        public static function getSlider($field, $value) {
            $data = Query::queryOne("SELECT * FROM `slider` WHERE `$field` = '$value'");
            return Misc::exists($data, FALSE);
        }

        public static function getJunctionSlider($field, $value) {
            return Slider::find()->where(["$field" => $value])
                ->with('sliderImages.images')
                ->one();
        }

        public static function getJunctionSliders($field, $value) {
            return Slider::find()->where(["$field" => $value])
                ->with('sliderImages.images')
                ->all();
        }

        public static function checkSlider($value, $id, $field) {
            $condition = $id > 0 ? " AND `id` != $id" : "";
            $data = Query::queryOne("SELECT * FROM `slider` WHERE `$field` = '$value' $condition");
            return Misc::exists($data, FALSE);
        }

        public static function deleteSlider($id) {
            $model = Slider::findOne($id);
            self::deleteSliderImageRelation($id);
            return $model->delete() ? TRUE : FALSE;
        }

        public static function updateSliderImageRelation($data, $id) {
            // yii batch insert
            if ($data != null) {
                $images = Misc::json_decode($data);
                foreach ($images as $img) :
                    $batch[] = [$id, $img];
                endforeach;
                if ($batch != null) {
                    Query::batchInsert('slider_images', array('slider_id', 'image_id'), $batch);
                }
            }
        }

        public static function deleteSliderImageRelation($id) {
            Query::execute("DELETE FROM `slider_images` WHERE `slider_id` = $id");
        }
    }