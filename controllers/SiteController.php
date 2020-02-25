<?php

namespace app\controllers;

use Yii;
use app\models\SuratSearch;
use app\models\Surat;
use app\models\Satker;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $searchModel = new SuratSearch();

            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $satker = Satker::find()->all();
            $satker = ArrayHelper::map($satker, 'id_satker', 'nama_satker');
            // if (Yii::$app->request->isAjax) {
            //     \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            //     $queryParam = array_slice(Yii::$app->request->queryParams, 1);
            //     // print_r($queryParam);
            //     // die;
            //     $dataProvider = $searchModel->search($queryParam);

            //     return $this->renderAjax('_surat', [
            //         'dataProvider' => $dataProvider,
            //         'searchModel' => $searchModel,
            //     ]);
            // }
            return $this->render('surat', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'satker' => $satker
            ]);
        } else {
            $surat = Surat::find()->count();
            $satker = Satker::find()->count();

            return $this->render('index', ['surat' => $surat, 'satker' => $satker]);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'main-login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
