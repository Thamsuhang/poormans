<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FAQ
 *
 * @author Chetan Rajbhandari
 */

namespace common\components;

use Yii;
use yii\base\Component;
use common\components\Query;
use common\components\Misc;
use common\models\Faq as Faq;

class HelperFaq extends Component {

    public static function addFaq($data) 
    {
        $model = new Faq();
        $model->question            = isset($data['question']) ? $data['question'] : '';
        $model->answer              = isset($data['answer']) ? $data['answer'] : '';
        $model->created_on          = date('Y-m-d H:i:s');
        $model->created_by          = Yii::$app->session[Yii::$app->params['user_session']]->id;
        $model->last_edited_on      = date('Y-m-d H:i:s');
        $model->last_edited_by      = Yii::$app->session[Yii::$app->params['user_session']]->id;

        return $model->save() ? $model : FALSE;
    }

    public static function editFaq($data, $id) 
    {
        $model = Faq::findOne($id);
        $model->question            = isset($data['question']) ? $data['question'] : '';
        $model->answer              = isset($data['answer']) ? $data['answer'] : '';
        $model->last_edited_on      = date('Y-m-d H:i:s');
        $model->last_edited_by      = Yii::$app->session[Yii::$app->params['user_session']]->id;

        return $model->update() ? $model : FALSE;
    }

    public static function getFaqs($fields='') 
    {
        $select = Misc::if_exists($fields) ? implode(', ', $fields) : '*';
        $data = Query::queryAll("SELECT $select FROM `faq` ORDER BY created_on DESC");
        return Misc::exists($data, FALSE);
    }

    public static function getFaq($field, $value) 
    {
        $data = Query::queryOne("SELECT * FROM `faq` WHERE $field = '$value'");
        return Misc::exists($data, FALSE);
    }

    public static function deleteFaq($id)
    {
        $model = Faq::findOne($id);
        return $model->delete() ? TRUE : FALSE;
    }
}
