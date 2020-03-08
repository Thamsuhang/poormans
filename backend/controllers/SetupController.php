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

    use Yii;
    use yii\filters\AccessControl;
    use yii\web\Controller;
    use yii\filters\VerbFilter;
    use common\components\Misc;
    use common\components\Query;
    use common\components\UserSetup;
    use common\components\HelperUser as HUser;
    use common\models\ClientRequest;

    class SetupController extends Controller {

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
            $client = '';
            if (isset($_GET['user'])) {
                $id = $_GET['user'];
                if (isset($id) && $id != '' && $id > 0) {
                    $id = substr($id, 4, -4);
                    $client = ClientRequest::findOne($id);
                }
            }
            return $this->render('index', array(
                'client' => $client
            ));
        }

        public function actionNewSetup() {
            if (isset($_POST) && !empty($_POST)) {
                return json_encode(UserSetup::setup($_POST['account'], $_POST['directory']));
                die;
            }
            die;
            return json_encode(FALSE);

        }

        public function actionCheckUser() {
            if (Misc::if_exists($_POST['username']) && Yii::$app->request->isAjax) {
                // print_r($_POST['username']);
                // die;
                if (!HUser::checkUser($_POST['username'], '', 'username')) {
                    echo json_encode(array('valid' => TRUE));
                }
                else {
                    echo json_encode(array('valid' => FALSE));
                }
                die;
            }
            echo json_encode(array('valid' => FALSE));
            die;
        }

    }
