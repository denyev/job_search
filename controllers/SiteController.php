<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\helpers\Url;
use app\models\Vacancies;
use app\models\ResponseForm;

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
        define("NUMBER_PER_PAGE", 5);
        $data = Vacancies::getAll(NUMBER_PER_PAGE);

        return $this->render('index',[
            'vacancies' => $data['vacancies'],
            'pagination' => $data['pagination']
        ]);
    }

    /**
     * Displays a single vacancy.
     *
     * @return string
     */
    public function actionView($id)
    {
        $vacancy = Vacancies::findOne($id);
        $responses = $vacancy->responses;
        $responseForm = new ResponseForm();

        return $this->render('single', [
            'vacancy'  => $vacancy,
            'responses' => $responses,
            'responseForm' => $responseForm
        ]);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function actionResponse($id)
    {
        $model = new ResponseForm();

        if(Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            if($model->saveResponse($id)) {
                return $this->redirect(['site/view','id' => $id]);
            }
        }
    }
}
