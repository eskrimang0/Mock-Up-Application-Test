<?php

namespace frontend\controllers;

use frontend\models\Pelatihan;
use frontend\models\PelatihanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PelatihanController implements the CRUD actions for Pelatihan model.
 */
class PelatihanController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Pelatihan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PelatihanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pelatihan model.
     * @param int $id_pelatihan Id Pelatihan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pelatihan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pelatihan),
        ]);
    }

    /**
     * Creates a new Pelatihan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pelatihan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pelatihan' => $model->id_pelatihan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pelatihan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pelatihan Id Pelatihan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pelatihan)
    {
        $model = $this->findModel($id_pelatihan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pelatihan' => $model->id_pelatihan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pelatihan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pelatihan Id Pelatihan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pelatihan)
    {
        $this->findModel($id_pelatihan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pelatihan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pelatihan Id Pelatihan
     * @return Pelatihan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pelatihan)
    {
        if (($model = Pelatihan::findOne(['id_pelatihan' => $id_pelatihan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
