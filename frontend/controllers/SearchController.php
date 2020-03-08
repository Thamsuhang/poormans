<?php
    /*
     * @author Chetan Rajbhandari
     */
    namespace frontend\controllers;


    use common\components\HelperDirectory as HDirectory;
    use common\components\HelperDirectoryCategories as HDCategories;
    use common\components\HelperSearch as HSearch;
    use Yii;
    use yii\web\Controller;

    /**
     * Site controller
     */
    class SearchController extends Controller {

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
            if ($action->id == 'error')
                $this->layout = 'error';

            return parent::beforeAction($action);
        }

        /**
         * Displays check out page.
         *
         * @return mixed
         */
        public function actionIndex() {
            if (isset($_GET['keyword']) || isset($_GET['alphabet']) || isset($_GET['address']) || isset($_GET['category'])) {
                $businesses = HSearch::find($_GET);
                return $this->render('index', array(
                    'businesses' => $businesses,
                    'search'          => array(
                        'keyword'  => (isset($_GET['keyword'])) ? $_GET['keyword'] : '',
                        'alphabet' => (isset($_GET['alphabet'])) ? $_GET['alphabet'] : '',
                        'address'  => (isset($_GET['address'])) ? $_GET['address'] : '',
                        'category' => (isset($_GET['category'])) ? $_GET['category'] : '',
                    ),
                ));
            }
            $this->goHome();
        }
    }
