<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of SettingsController
     *
     * @author Chetan Rajbhandari
     */

    namespace backend\controllers;

    use Yii;
    use yii\filters\AccessControl;
    use yii\web\Controller;
    use yii\filters\VerbFilter;
    use common\components\Misc;
    use common\models\ClientRequest;

    class ClientRequestController extends Controller {

        protected $critical = array('superadmin', 'admin');

        protected $casual = array('superadmin', 'admin', 'operator');

        /**
         * @inheritdoc
         */
        public function behaviors() {
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
                    'class'   => VerbFilter::className(),
                    'actions' => [
                        'logout' => ['post'],
                    ],
                ],
            ];
        }

        public function beforeAction($action) {
            if ($action->id == 'error')
                $this->layout = 'error';

            if (!isset(Yii::$app->session[Yii::$app->params['user_session']])
                || !in_array(Yii::$app->params['role_user'][Yii::$app->session[Yii::$app->params['user_session']]->role], $this->casual)
            ) {
                return $this->redirect(Yii::$app->request->baseUrl . '/site/logout');
            }
            return parent::beforeAction($action);
        }

        /**
         * @inheritdoc
         */
        public function actions() {
            return [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                ],
            ];
        }

        public function actionIndex() {
            $datacenter = array(
                'signUp' => Misc::getClientRequest('is_approved', 0)
            );

            return $this->render('index', array(
                'datacenter' => $datacenter
            ));
        }

        public function actionView() {
            if (Yii::$app->request->isAjax && isset($_POST['id'])) {
                $model = ClientRequest::findOne($_POST['id']);
                $model->is_viewed = 1;
                if ($model->save(false)) {
                    return json_encode(TRUE);
                }
            }
            return json_encode(FALSE);
        }


    }
