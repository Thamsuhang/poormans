<?php
    /*
     * @author Chetan Rajbhandari
     */
    namespace frontend\controllers;

    use common\components\HelperDirectory as HD;
    use common\components\HelperDirectoryCategories as HDC;
    use Yii;
    use yii\web\Controller;

    /**
     * Site controller
     */
    class CategoriesController extends Controller {

        /**
         * @inheritdoc
         */
        public function behaviors() {
            return [];
        }

        /**
         * @inheritdoc
         */
        public function actions() {
            return ['error' => ['class' => 'yii\web\ErrorAction',]];
        }

        public function beforeAction($action) {
            if ($action->id == 'error') {
                $this->layout = 'error';
            }

            return parent::beforeAction($action);
        }

        /**
         * Displays about page.
         * @return mixed
         */
        public function actionIndex($id = '') {

            return $this->render('index', array(
                'data' => HDC::listedCategories($id),
                'id'   => $id,

            ));
        }

        public function actionItem($id = '') {
            if (!($id == '' || $id < 1)) {
                return $this->render('category', array(
                    'data' => HD::getActiveItems("I.category_id = ". $id),
                    'id'   => $id,

                ));
            }
            return $this->redirect(Yii::$app->request->baseUrl . '/categories');

        }
    }
