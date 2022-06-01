<?php

namespace backend\controllers;

use backend\models\KomentarPostingan;
use backend\models\LikePostingan;
use backend\models\Postingan;
use backend\models\Profil;
use backend\models\SignupForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
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
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'signup'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'like', 'unlike', 'comment'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = Postingan::find()->orderBy('id DESC')->all();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout = 'main-login';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionLike($id)
    {
        $model = new LikePostingan();
        $model->id_user = Yii::$app->user->identity->id;
        $model->id_postingan = $id;
        $model->tanggal = date('Y-m-d');
        $model->save(false);

        $cekPostingan = Postingan::find()
            ->where(['id' => $id])
            ->one();
        $cekPostingan->count_like = $cekPostingan->count_like + 1;
        $cekPostingan->save(false);

        return $this->redirect('index');
    }

    public function actionUnlike($id)
    {
        $model = LikePostingan::find()
            ->where(['id_user' => Yii::$app->user->identity->id])
            ->andWhere(['id_postingan' => $id])
            ->one();

        $cekPostingan = Postingan::find()
            ->where(['id' => $id])
            ->one();
        $cekPostingan->count_like = $cekPostingan->count_like - 1;
        if ($cekPostingan->save(false)) {
            $model->delete();
        }

        return $this->redirect('index');
    }

    public function actionComment($id)
    {
        $model = new KomentarPostingan();
        $cekPembuat = Postingan::find()
            ->where(['id' => $id])
            ->one();
        $cekProfil = Profil::find()
            ->where(['id' => Yii::$app->user->identity->id])
            ->one();
        $cekKomentar = KomentarPostingan::find()
            ->where(['id_postingan' => $id])
            ->all();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_user = Yii::$app->user->identity->id;
            $model->id_postingan = $id;
            $model->tanggal = date('Y-m-d');
            if ($cekPembuat->id_user == Yii::$app->user->identity->id) {
                $model->status = 0;
            } else {
                $model->status = 1;
            }
            $model->save();

            return $this->redirect(['comment', 'id' => $id]);
        }

        return $this->render('view', [
            'model' => $model,
            'cekPembuat' => $cekPembuat,
            'cekProfil' => $cekProfil,
            'cekKomentar' => $cekKomentar
        ]);
    }
}