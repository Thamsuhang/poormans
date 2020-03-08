<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of AdminController
     *
     * @author Chetan Rajbhandari
     */

    namespace backend\controllers;

    use common\components\Query;
    use common\models\Message;
    use Yii;
    use yii\filters\VerbFilter;
    use yii\web\Controller;

    class MessageController extends Controller {

        protected $critical = array('superadmin', 'admin', 'operator');

        protected $casual = array('superadmin', 'admin', 'operator');

        /**
         * @inheritdoc
         */
        public function behaviors() {
            return [//            'access' => [
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
                    'verbs' => ['class' => VerbFilter::className(), 'actions' => ['logout' => ['post'],],],
            ];
        }

        /**
         * @inheritdoc
         */
        public function actions() {
            return ['error' => ['class' => 'yii\web\ErrorAction',],];
        }

        public function beforeAction($action) {
            if ($action->id == 'error')
                $this->layout = 'error';

            if (!isset(Yii::$app->session[Yii::$app->params['user_session']]) || !in_array(Yii::$app->params['role_user'][Yii::$app->session[Yii::$app->params['user_session']]->role], $this->critical)) {
                return $this->redirect(Yii::$app->request->baseUrl . '/site/logout');
            }
            return parent::beforeAction($action);
        }

        public function actionIndex() {
            $appointments = Query::queryAll("SELECT * FROM `message` ORDER BY created_on DESC");
            return $this->render('index', array('appointments' => $appointments));
        }

        public function actionDelete() {
            if (Yii::$app->request->isAjax) {
                if ($_POST['id'] > 0) {
                    $model = Message::findOne($_POST['id']);
                    return ($model->delete()) ? json_encode(TRUE) : json_encode(FALSE);
                }
            }
        }

        public function actionReadmsg() {
            //echo 'hello';
            if (Yii::$app->request->isAjax) {
                $id = Yii::$app->request->post('id');

                if ($id > 0) {
                    $model = Message::findOne($id);
                    $model->is_read = 1;
                    return $model->save(false) ? json_encode(TRUE) : json_encode(FALSE);
                }
            }
        }

    }
