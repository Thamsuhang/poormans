<?php
    /*
     * @author Chetan Rajbhandari
     */
    namespace frontend\controllers;

    use common\components\HelperDirectory as HDirectory;
    use common\components\HelperDirectoryCategories as HDCategories;
    use Yii;
    use yii\web\Controller;

    /**
     * Site controller
     */
    class BusinessController extends Controller {

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
            return [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                ],
            ];
        }

        public function beforeAction($action) {
            if ($action->id == 'error') {
                $this->layout = 'error';
            }

            return parent::beforeAction($action);
        }

        /**
         * @return mixed
         */
        public function actionIndex($id = '') {
            if (isset($id) && $id != '') {
                $id = substr($id, 4);
                $business = HDirectory::getSingleDirectoryItem($id);
                if($business){
//                    $datacenter['used_categories'] = HDCategories::getUsedParentCategory();
                    return $this->render('index', array(
                        'business'     => $business,
                    ));
                }

            }
            return $this->redirect(Yii::$app->request->baseUrl);

        }
    }
