<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestimonialController
 *
 * @author Chetan Rajbhandari
 */

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\components\Misc;
use common\components\HelperTestimonial as HTestimonial;


class TestimonialsController extends Controller {

    protected $critical = array('superadmin', 'admin','operator');

    protected $casual   = array('superadmin', 'admin', 'operator');

    /**
     * @inheritdoc
     */
    public function behaviors() 
    {
        return [
            //            'access' => [
            //                'class' => AccessControl::className(),
            //                'rules' => [
            //                    [
            //                        'actions' => ['login', 'error'],
            //                        'allow' => true,
            //                    ],
            //                    [
            //                        'actions' => ['logout', 'index'],
            //                        'allow' => true,
            //                        'roles' => ['@'],
            //                    ],
            //                ],
            //            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action) 
    {
        if ($action->id == 'error')
            $this->layout = 'error';
        
        if (!isset(Yii::$app->session[Yii::$app->params['user_session']])
            || !in_array(Yii::$app->params['role_user'][Yii::$app->session[Yii::$app->params['user_session']]->role], $this->casual) ) {
            return $this->redirect(Yii::$app->request->baseUrl . '/site/logout');
        }
        return parent::beforeAction($action);
    }

    /**
     * @inheritdoc
     */
    public function actions() 
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex() 
    {
        $testimonial = Misc::exists(HTestimonial::getTestimonials(), '');
        return $this->render('list', array('testimonial' => $testimonial));
    }

    public function actionAddTestimonial() 
    {
        if (Yii::$app->request->isAjax) { 
            echo json_encode(HTestimonial::addTestimonial($_POST)); die;
        }
        echo json_encode(FALSE); die;
    }

    public function actionEdit($id) 
    {
        $testimonial = HTestimonial::getTestimonial('id', $id); 
        if ($testimonial) {
            return $this->render('edit', array('testimonial' => $testimonial));
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/testimonials');
    }

    public function actionEditTestimonial() 
    {
        if (Yii::$app->request->isAjax) {
            echo json_encode(HTestimonial::editTestimonial($_POST, $_POST['id'])); die;
        }
        echo json_encode(FALSE); die;
    }

    public function actionDeleteTestimonial() 
    {
        if (Yii::$app->request->isAjax) {
            echo json_encode(HTestimonial::deleteTestimonial($_POST['id'])); die;
        }
        echo json_encode(FALSE); die;
    }

    // not in use //
    public function actionGetTestimonials() 
    {
        if (Yii::$app->request->isAjax) {
            echo json_encode(Misc::exists(HTestimonial::getTestimonials(), FALSE)); die;
        }
        echo json_encode(FALSE); die;
    }

    // not in use //
    public function actionCheckTestimonial() 
    { 
        if (Misc::if_exists($_POST['name']) && Yii::$app->request->isAjax) {
            echo json_encode(!HTestimonial::checkTestimonial($_POST['name'], $_POST['id'], 'name')); die;
        }
        echo json_encode(FALSE); die;
    }
}
