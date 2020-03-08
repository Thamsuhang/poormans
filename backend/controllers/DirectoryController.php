<?php

    namespace backend\controllers;

    use common\components\HelperDirectory;
    use common\components\HelperDirectory as HDirectory;
    use common\components\HelperDirectoryCategories;
    use common\components\Misc;
    use common\models\Directory;
    use Yii;
    use yii\filters\AccessControl;
    use yii\web\Controller;

    class DirectoryController extends Controller {

        /**
         * @inheritdoc
         */
        public function behaviors() {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['login', 'error'],
                            'allow'   => TRUE,
                        ],
                        [
                            //  'actions' => ['logout', 'index'],
                            'allow' => TRUE,
                            'roles' => ['@'],
                        ],
                    ],
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
         * @inheritdoc
         */
        public function actions() {
            return ['error' => ['class' => 'yii\web\ErrorAction',],];
        }

        public function actionIndex($type = '') {
            if ($type != '' && key_exists($type, Yii::$app->params['packages'])) {

                return $this->render('list', array(
                    'directories' => HDirectory::getAllByType($type),
                    'type'        => $type,
                ));
            }


            return $this->redirect(Yii::$app->request->baseUrl);
        }

        public function actionSort() {
            $datacenter['f_items'] = HelperDirectory::getFeatured();
            return $this->render('sort', array(
                'datacenter' => $datacenter,
            ));
        }

        public function actionListing($type = '', $id = '') {
            if ($type != '' && isset(Yii::$app->params['packages'][$type])) {
                $business = [];

                if ($id != '' && Misc::decodeUrl($id) > 0) {
                    $business = HelperDirectory::getSingleDirectoryItem(Misc::decodeUrl($id));
                }


                return $this->render('form', array(
                    'categories' => HelperDirectoryCategories::getTypes(),
                    'type'       => $type,
                    'business'   => $business,
                ));
            }
            return $this->redirect(Yii::$app->request->baseUrl);
        }

        public function actionAdd($type = '') {
            if ($type != '' && isset(Yii::$app->params['packages'][$type])) {
                return $this->render('single/add.php', array(
                    'categories' => HelperDirectoryCategories::getTypes(),
                    'type'       => $type,
                ));
            }
            return $this->redirect(Yii::$app->request->baseUrl);
        }

        public function actionAddNew() {
            if (isset($_POST) && !empty($_POST)) {
                $post = Yii::$app->request->post();
                $id = HDirectory::setBusiness($post, (isset($_FILES['card']) && !empty($_FILES['card'])) ? $_FILES['card'] : '', (isset($_FILES['disp_add']) && !empty($_FILES['disp_add'])) ? $_FILES['disp_add'] : '', (isset($_FILES['coupon']) && !empty($_FILES['coupon'])) ? $_FILES['coupon'] : '');
                $this->redirect(Yii::$app->request->baseUrl . '/directory/edit/' . Misc::RUrl() . $id . Misc::RUrl());
            }
        }

        public function actionEdit($id = '') {
            if ($id != '') {
                $id = substr($id, 4, -4);
            }
            if ($id > 0) {
                $business = HDirectory::getSingleDirectoryItem($id);
                return $this->render('single/edit.php', array(
                    'business'   => $business,
                    'categories' => HelperDirectoryCategories::getTypes(),
                ));
            }
            $this->goHome();
        }

        public function actionUpdate() {
            $post = Yii::$app->request->post();
            if (isset($post) && !empty($post)) {
                $id = HDirectory::setBusiness($post, (isset($_FILES['card']) && !empty($_FILES['card'])) ? $_FILES['card'] : '', (isset($_FILES['disp_add']) && !empty($_FILES['disp_add'])) ? $_FILES['disp_add'] : '', (isset($_FILES['coupon']) && !empty($_FILES['coupon'])) ? $_FILES['coupon'] : '');
            }
            $this->redirect(Yii::$app->request->baseUrl . '/directory/edit/' . Misc::RUrl() . $id . Misc::RUrl());
        }

        public function actionDelete() {
            if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
                return HDirectory::deleteDirectory($_POST['id']);
            }
        }

        public function actionToggleFeatured() {
            if (Yii::$app->request->isAjax) {
                $post = $_POST;

                $items = count(HelperDirectory::getActiveItems(" is_featured = 1 "));

                if ($items >= 40) {
                    return json_encode(array(
                                           'message' => 'Only 40 remium Business cards allowed',
                                       ));
                }
                $model = Directory::findOne($post['id']);

                if ($post['status'] == 'true') {
                    $model->is_featured = 1;
                }
                else {
                    $model->is_featured = 0;
                }
                if ($model->update()) {
                    return json_encode(TRUE);
                }
                return json_encode(FALSE);

                die;
            }
        }

        public function actionUpdateFeaturedIndex() {
            if (Yii::$app->request->isAjax && $_POST['order'] != '') {
                return HelperDirectory::updateFeaturedIndex($_POST['order']);
            }
            return json_encode(FALSE);

        }

        public function actionToggleStatus() {
            if (Yii::$app->request->isAjax) {
                $post = $_POST;
                $model = Directory::findOne($post['id']);

                if ($post['status'] == 'true') {
                    $model->is_active = 1;
                }
                else {
                    $model->is_active = 0;
                }
                if ($model->update()) {
                    return json_encode(TRUE);
                }
                return json_encode(FALSE);

            }
        }

        public function actionExtendDate() {
            if (Yii::$app->request->isAjax && isset($_POST['id'])) {
                return (HelperDirectory::extendDate($_POST['id']));
            }
            return FALSE;
        }

        public function actionDeleteItem() {
            if (Yii::$app->request->isAjax) {
                if ($_POST['id'] > 0) {
                    echo HDirectory::deleteItem($_POST);
                }
            }
            echo json_encode(FALSE);
            die;
        }

        public function actionCategories() {
            return $this->render('categories', array(
                'categories' => HelperDirectoryCategories::getTypes(),
                'parent_cat' => HelperDirectoryCategories::getCertainType('parent', 0),
            ));
        }

        public function actionEditCategory() {
            if (Yii::$app->request->isAjax && $_POST['id'] > 0) {
                $category = HelperDirectoryCategories::getType('id', $_POST['id']);
                echo json_encode($category);
                die;
            }
            echo json_encode('FALSE');
            die;
        }

        public function actionEditCat() {
            //            print_r($_POST);
            //            die;
            if (isset($_POST['id']) && $_POST['id'] > 0) {
                HelperDirectoryCategories::editType($_POST);
            }
            $this->redirect(Yii::$app->request->baseUrl . '/directory/categories');
        }

        public function actionAddCategory() {
            if (isset($_POST) && !empty($_POST)) {
                if (!HelperDirectoryCategories::addType($_POST['category'])) {
                    die('Category Not added');
                }
            }
            $this->redirect(Yii::$app->request->baseUrl . '/directory/categories');
        }

        public function actionCheckCategory() {
            if (Yii::$app->request->isAjax) {
                echo json_encode(!HelperDirectoryCategories::validateType($_POST['type'], $_POST['parent']));
                die;
            }
            echo json_encode(FALSE);
            die;
        }

    }
