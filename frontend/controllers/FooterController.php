<?php
/*
 * @author Chetan Rajbhandari
 */
namespace frontend\controllers;

use Yii;
use common\components\Misc;
use common\components\HelperUser as HUser;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\HttpException;
use common\components\HelperBlog as HBlog;
use common\components\HelperSettings as HSet;
use common\components\HelperNews as HNews;
use common\components\HelperTestimonial as HTestimonial;

/**
 * Site controller
 */
class FooterController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() 
    {
        return [];
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction($action)
    {
        if ($action->id == 'error')
            $this->layout = 'error';

        return parent::beforeAction($action);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() 
    {
        $limit = HSet::getBasic("'show-blog', 'show-news'");
        $limit_blog = $limit['show-blog'];
        $limit_news = $limit['show-news'];
        $blogs = HBlog::getLimitedBlogs('', $limit_blog);
        $news = HNews::getLimitedNews('', $limit_news);
        return $this->render('/layouts/footer', array(
                                            'blogs'=>$blogs, 
                                            'news'=>$news,
                                        ));
    }

    public function actionViewBlog($slug)
    {
        $blog = HBlog::getBlog('slug', $slug);
        $blogs = HBlog::getBlogs();
        $users = Misc::exists(HUser::getUsers(), '');
        foreach ($users as $user) {
            $usernames[$user['id']] = $user['username'];
        }
        return $this->render('view-blog', array('blog'=>$blog, 'blogs'=>$blogs, 'usernames'=>$usernames));
    }

    public function actionViewNews($slug)
    {
        $news = HNews::getOneNews('slug', $slug);
        $allnews = HNews::getNews();
        $users = Misc::exists(HUser::getUsers(), '');
        foreach ($users as $user) {
            $usernames[$user['id']] = $user['username'];
        }
        return $this->render('view-news', array('news'=>$news, 'allnews'=>$allnews, 'usernames'=>$usernames));

    }
}
