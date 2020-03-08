<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of Testimonial
     *
     * @author Chetan Rajbhandari
     */

    namespace common\components;

    use Yii;
    use yii\base\Component;
    use common\components\Query;
    use common\components\Misc;
    use common\models\Testimonial as Testimonial;

    class HelperTestimonial extends Component {

        public static function addTestimonial($data) {
            $model = new Testimonial();
            $model->client = isset($data['client']) ? $data['client'] : '';
            $model->position = isset($data['position']) ? $data['position'] : '';
            $model->quote = isset($data['quote']) ? $data['quote'] : '';
            $model->is_active = isset($data['is_active']) ? $data['is_active'] : 0;
            $model->created_on = date('Y-m-d H:i:s');
            $model->created_by = Yii::$app->session[Yii::$app->params['user_session']]->id;


            return $model->save(false) ? TRUE : FALSE;
        }

        public static function editTestimonial($data, $id) {
            $model = Testimonial::findOne($id);
            $model->client = isset($data['client']) ? $data['client'] : '';
            $model->position = isset($data['position']) ? $data['position'] : '';
            $model->quote = isset($data['quote']) ? $data['quote'] : '';
            $model->is_active = isset($data['is_active']) ? $data['is_active'] : 0;

            return $model->save(false) ? TRUE : FALSE;
        }

        public static function getTestimonials($fields = '', $field = '', $value = '') {
            $select = Misc::if_exists($fields) ? implode(', ', $fields) : '*';
            $condition = ($field != '' && $value != '') ? 'WHERE ' . $field . ' = ' . $value : '';
            $data = Query::queryAll("SELECT $select FROM `testimonial` $condition"." ORDER BY  `id` DESC ");
            return Misc::exists($data, FALSE);
        }

        public static function getAllTestimonials($field = '', $op, $value = '') {
            $data = Query::queryAll("SELECT * FROM `testimonial` $field $op $value "." ORDER BY  `id` DESC ");
            return Misc::exists($data, FALSE);
        }

        public static function getActiveTestimonials($fields = '', $field = '', $value = '') {
            $select = Misc::if_exists($fields) ? implode(', ', $fields) : '*';
            $condition = ($field != '' && $value != '') ? 'WHERE ' . $field . ' = ' . $value . ' AND is_active = 1 ' : 'WHERE is_active = 1 ';
            $data = Query::queryAll("SELECT $select FROM `testimonial` $condition"." ORDER BY  `id` DESC ");
            return Misc::exists($data, FALSE);
        }

        public static function getTestimonial($field, $value) {
            $data = Query::queryOne("SELECT * FROM `testimonial` WHERE `$field` = '$value'" ." ORDER BY  `id` DESC ");
            return Misc::exists($data, FALSE);
        }

        public static function checkTestimonial($value, $id, $field) {
            $condition = $id > 0 ? " AND `id` != $id" : "";
            $data = Query::queryOne("SELECT * FROM `testimonial` WHERE `$field` = '$value' $condition");
            return Misc::exists($data, FALSE);
        }

        public static function deleteTestimonial($id) {
            $model = Testimonial::findOne($id);
            return $model->delete() ? TRUE : FALSE;
        }
    }
