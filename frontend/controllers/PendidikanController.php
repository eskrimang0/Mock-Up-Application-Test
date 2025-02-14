<?php

namespace frontend\controllers;

use frontend\models\Pendidikan;
use frontend\models\PedidikanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PendidikanController implements the CRUD actions for Pendidikan model.
 */
class PendidikanController extends Controller
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
     * Lists all Pendidikan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PedidikanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pendidikan model.
     * @param int $id_pendidikan Id Pendidikan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pendidikan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pendidikan),
        ]);
    }

    /**
     * Creates a new Pendidikan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pendidikan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pendidikan' => $model->id_pendidikan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pendidikan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pendidikan Id Pendidikan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pendidikan)
    {
        $model = $this->findModel($id_pendidikan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pendidikan' => $model->id_pendidikan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pendidikan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pendidikan Id Pendidikan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pendidikan)
    {
        $this->findModel($id_pendidikan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pendidikan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pendidikan Id Pendidikan
     * @return Pendidikan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pendidikan)
    {
        if (($model = Pendidikan::findOne(['id_pendidikan' => $id_pendidikan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
