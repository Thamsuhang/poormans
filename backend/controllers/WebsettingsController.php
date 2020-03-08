<?php


    namespace backend\controllers;

    use common\components\HelperContact as HContact;
    use common\components\HelperDirectory;
    use common\components\HelperPage as HPage;
    use common\components\HelperSectionContent as HSection;
    use common\components\HelperSectionContent;
    use common\components\HelperUpload as UploadFile;
    use common\components\HelperWebsettings as HWebSettings;
    use common\components\Misc;
    use Yii;
    use yii\filters\VerbFilter;
    use yii\web\Controller;

    class WebsettingsController extends Controller {

        protected $critical = array('superadmin', 'admin');

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

        public function beforeAction($action) {
            if ($action->id == 'error')
                $this->layout = 'error';

            if (!isset(Yii::$app->session[Yii::$app->params['user_session']]) || !in_array(Yii::$app->params['role_user'][Yii::$app->session[Yii::$app->params['user_session']]->role], $this->casual)) {
                return $this->redirect(Yii::$app->request->baseUrl . '/site/logout');
            }
            return parent::beforeAction($action);
        }

        /**
         * @inheritdoc
         */
        public function actions() {
            return ['error' => ['class' => 'yii\web\ErrorAction',],];
        }

        public function actionIndex() {
            return $this->render('index');
        }

        public function actionHome() {
            $page_id = 1;
            $datacenter = HPage::getPageContent($page_id);
            $datacenter['f_items'] = HelperDirectory::getFeatured();
            return $this->render('home/index', array(
                'datacenter' => $datacenter,
                'page_id'    => $page_id,
            ));

        }

        public function actionAbout() {

            $page_id = 2;
            $datacenter = HPage::getPageContent($page_id);


            return $this->render('about/index', array(
                'datacenter' => $datacenter,
                'page_id'    => $page_id,
            ));
        }

        public function actionFeatured() {

            $page_id = 3;
            $datacenter = HPage::getPageContent($page_id);
            return $this->render('featured/index', array(
                'datacenter' => $datacenter,
                'page_id'    => $page_id,
            ));
        }

        public function actionDirectory() {

            $page_id = 4;
            $datacenter = HPage::getPageContent($page_id);
            return $this->render('directory/index', array(
                'datacenter' => $datacenter,
                'page_id'    => $page_id,
            ));
        }


        public function actionContact() {
            $page_id = 5;
            $datacenter = HPage::getPageContent($page_id);
            return $this->render('contact/index', array(
                'datacenter' => $datacenter,
                'page_id'    => $page_id,
            ));

        }

        public function actionEditcontact() {
            $post = Yii::$app->request->post();
            $page_id = $post['contact']['page-id'];
            $page = HPage::getPage('id', $page_id);
            if (isset($post['contact'])) {
                HContact::editContact($post['contact']);
            }
            return $this->redirect(Yii::$app->request->baseUrl . '/' . $page['action']);
        }

        public function actionEmail() {

            $smtp = Misc::exists(HWebSettings::getSMTP(), '');
            return $this->render('email/index', array('smtp' => $smtp));
        }

        public function actionSocial() {
            $social = Misc::exists(HWebSettings::getSocial(), '');
            return $this->render('social/index', array('social' => $social));
        }

        public function actionSetsocial() {

            $post = Yii::$app->request->post();

            if (isset($post['social'])) {
                foreach ($post['social'] as $social) {
                    HWebSettings::setSocial($social);
                }


            }
            return $this->redirect(Yii::$app->request->baseUrl . '/websettings/social/');
        }


        public function actionSetemail() {

            $post = Yii::$app->request->post();

            if (isset($post['smtp'])) {
                HWebSettings::setSMTP($post['smtp']);
            }
            return $this->redirect(Yii::$app->request->baseUrl . '/websettings/email/');
        }

        public function actionSlider() {


            $post = Yii::$app->request->post();


            $page_id = $post['page-details']['page-id'];
            $page = HPage::getPage('id', $page_id);
            if (isset($_FILES['image'])) {
                $u = UploadFile::upload($_FILES['image']);
                if ($u) {
                    UploadFile::updateDB($page_id, $u);
                }
            }
            if (isset($post['contentSlider'])) {
                foreach ($post['contentSlider'] as $slider) {
                    HSection::editSlider($slider);
                }
            }
            return $this->redirect(Yii::$app->request->baseUrl . '/' . $page['action']);
        }

        public function actionDeleteSliderContent() {
            if (isset($_POST['id'])) {
                if (HSection::deleteSliderItem($_POST['id'])) {
                    return json_encode(TRUE);
                }
            }
            return json_encode(FALSE);
        }

        public function actionHomeicons() {
            $page_id = 1;
            $post = Yii::$app->request->post();
            //            echo '<pre>';
            //            print_r($post);

            if (isset($post['icon'])) {
                foreach ($post['icon'] as $icon) {
                    HSection::editSectionContent($icon);
                }
            }
            //die;
            return $this->redirect(Yii::$app->request->baseUrl . '/websettings/home/');

        }

        public function actionEditabout() {
            $page_id = 2;
            $post = Yii::$app->request->post();
            // print_r($post['postdata']);die;

            if (isset($post['postdata'])) {
                HelperSectionContent::editSectionContent($post['postdata']);
            }
            if (isset($post['icon'])) {
                echo '<pre>';
                print_r($post['icon']);
                foreach ($post['icon'] as $icon) :
                    HelperSectionContent::editSectionContent($icon);
                endforeach;

                // HelperSectionContent::editSectionContent($post['postdata']);
            }

            return $this->redirect(Yii::$app->request->baseUrl . '/websettings/about/');

        }


    }
