<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PageController
 *
 * @author Chetan Rajbhandari
 */

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\components\Misc;
use common\components\HelperPage as HPage;

class PageController extends Controller {

    protected $critical = array('superadmin', 'admin');

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
        $pages = HPage::getPages(); 
        return $this->render('list', array('pages' => $pages));
    }

    public function actionAdd() 
    {
        return $this->render('add');
    }

    public function actionAddPage() 
    {
        if (Yii::$app->request->isAjax) {
            echo json_encode(HPage::addPage($_POST)); die;
        }
        echo json_encode(FALSE); die;
    }

    public function actionEdit($slug) 
    {
        $page = HPage::getPage('slug', $slug); 
        if ($page) {
            return $this->render('edit', array('page' => $page));
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/page');
    }

    public function actionEditPage() 
    {
        if (Yii::$app->request->isAjax) {
            echo json_encode(HPage::editPage($_POST, $_POST['id'])); die;
        }
        echo json_encode(FALSE); die;
    }

    public function actionCheckPage() 
    { 
        if (Misc::if_exists($_POST['name']) && Yii::$app->request->isAjax) {
            echo json_encode(!HPage::checkPage($_POST['name'], $_POST['id'], 'name')); die;
        }
        echo json_encode(FALSE); die;
    }

    public function actionGetPages() 
    {
        if (Yii::$app->request->isAjax) {
            echo json_encode(Misc::exists(HPage::getPages(), FALSE)); die;
        }
        echo json_encode(FALSE); die;
    }

    public function actionChangeStatus() 
    {
        if (HPage::toggle('is_active', $_POST['id'])) {
            echo json_encode(TRUE); die;
        }
        echo json_encode(FALSE); die;
    }
}
