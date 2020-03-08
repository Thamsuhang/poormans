<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
 use common\models\User;
/**
 * Site controller
 */
class SiteController extends Controller {

    public function behaviors()
    {
        return [
            // 'access' => [
            //     'class' => AccessControl::className(),
            //     'only' => ['logout'],
            //     'rules' => [
            //         [
            //             'actions' => ['logout'],
            //             'allow' => true,
            //             'roles' => ['@'],
            //         ],
            //     ],
            // ],
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         //'logout' => ['post'],
            //     ],
            // ],
        ];
    }

    public function beforeAction($action) 
    { 
        $this->layout="login";
        if ($action->id=='error')
            $this->layout ='error';
        
        return parent::beforeAction($action);
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function actionIndex() 
    {
        if (!Yii::$app->user->isGuest && isset(Yii::$app->session[Yii::$app->params['user_session']])) {
            
            if (Yii::$app->session[Yii::$app->params['user_session']]->role == Yii::$app->params['user_role']['superadmin']
                || Yii::$app->session[Yii::$app->params['user_session']]->role == Yii::$app->params['user_role']['admin'] ) {
                return $this->redirect(Yii::$app->request->baseUrl . '/admin');
            } 
            else if (Yii::$app->session[Yii::$app->params['user_session']]->role == Yii::$app->params['user_role']['operator']) {
                return $this->redirect(Yii::$app->request->baseUrl . '/operator');
            }
        }

        $model = new LoginForm();
        if ( isset($_POST['LoginForm']) && $model->load(Yii::$app->request->post()) && $model->login()) {
            
            if (Yii::$app->session[Yii::$app->params['user_session']]->role == Yii::$app->params['user_role']['superadmin']
                || Yii::$app->session[Yii::$app->params['user_session']]->role == Yii::$app->params['user_role']['admin'] ) {
                return $this->redirect(Yii::$app->request->baseUrl . '/admin');
            } 
            else if (Yii::$app->session[Yii::$app->params['user_session']]->role == Yii::$app->params['user_role']['operator']) {
                return $this->redirect(Yii::$app->request->baseUrl . '/operator');
            }
        }

        return $this->render('login', [
            'model' => $model
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        $session = Yii::$app->session;
        $session->remove(Yii::$app->params['user_session']);
        return $this->redirect(Yii::$app->request->baseUrl.'/site');
    }

    public function actionProfile() 
    {
        if (!Yii::$app->user->isGuest || Yii::$app->params['user_role']['admin'] == Yii::$app->session[Yii::$app->params['user_session']]->role) {
            return $this->redirect(Yii::$app->request->baseUrl . '/admin/profile');
        } 
        else if (!Yii::$app->user->isGuest || Yii::$app->params['user_role']['operator'] == Yii::$app->session[Yii::$app->params['user_session']]->role) {
            return $this->redirect(Yii::$app->request->baseUrl . '/operator/profile');
        } 
        else {
            return $this->redirect(Yii::$app->request->baseUrl . '/site/logout');
        }
    }

//    public function actionSignup()
//    {
//        echo "are you lost?"; die;
//        $user = new User();
//        $user->name = 'Super Admin';
//        $user->username = 'superadmin';
//        $user->setPassword('maharajgunj');
//        $user->role = 'fLCDf8HuRQ';
//        $user->email = 'info@klientscape.com';
//        $user->status = 10;
//        $user->insert();
//
//        echo "<pre>"; print_r($user);
//    }
}
