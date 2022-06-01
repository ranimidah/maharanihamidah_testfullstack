<?php

namespace backend\controllers;

use backend\models\Postingan;
use Yii;
use backend\models\Profil;
use backend\models\ProfilSearch;
use backend\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProfilController implements the CRUD actions for Profil model.
 */
class ProfilController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Profil models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Profil::find()
            ->where(['id' => Yii::$app->user->identity->id])
            ->one();
        $countPostingan = Postingan::find()
            ->where(['id_user' => Yii::$app->user->identity->id])
            ->count();
        $postingan = Postingan::find()
            ->where(['id_user' => Yii::$app->user->identity->id])
            ->all();

        return $this->render('index', [
            'model' => $model,
            'countPostingan' => $countPostingan,
            'postingan' => $postingan,
        ]);
    }

    /**
     * Displays a single Profil model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Profil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUpdate()
    {
        $cekProfil = Profil::find()
            ->where(['id' => Yii::$app->user->identity->id])
            ->one();
        $cekUser = User::find()
            ->where(['id' => Yii::$app->user->identity->id])
            ->one();

        $model = new Profil();

        $model->nama = $cekUser->nama;

        if ($cekProfil) {
            $cekProfil->nama = $cekUser->nama;
            if ($cekProfil->load(Yii::$app->request->post())) {
                $cekProfil->_photo = UploadedFile::getInstance($cekProfil, '_photo');

                $cekProfil->id = Yii::$app->user->identity->id;
                if ($cekProfil->_photo) {
                    $cekProfil->photo_profil = $cekProfil->id . rand() . date('dmYGis') . '.' . $cekProfil->_photo->extension;

                    $cekProfil->_photo->saveAs(Yii::getAlias('@home/uploads/profil/') . $cekProfil->photo_profil);
                    $cekProfil->save(FALSE);
                }
                $cekProfil->save();

                return $this->redirect(['index']);
            }
        } else {
            if ($model->load(Yii::$app->request->post())) {
                $model->_photo = UploadedFile::getInstance($model, '_photo');

                $model->id = Yii::$app->user->identity->id;

                if ($model->_photo) {
                    $model->photo_profil = $model->id . rand() . date('dmYGis') . '.' . $model->_photo->extension;

                    $model->_photo->saveAs(Yii::getAlias('@home/uploads/profil/') . $model->photo_profil);
                    $model->save(FALSE);
                }
                if ($model->save()) {
                    $cekUser->nama = $model->nama;
                    $cekUser->save(false);
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'cekProfil' => $cekProfil,
        ]);
    }

    /**
     * Updates an existing Profil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdates($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Profil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profil::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}