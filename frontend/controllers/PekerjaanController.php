<?php

namespace frontend\controllers;

use frontend\models\Pekerjaan;
use frontend\models\PekerjaanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PekerjaanController implements the CRUD actions for Pekerjaan model.
 */
class PekerjaanController extends Controller
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
     * Lists all Pekerjaan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PekerjaanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pekerjaan model.
     * @param int $id_pekerjaan Id Pekerjaan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pekerjaan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pekerjaan),
        ]);
    }

    /**
     * Creates a new Pekerjaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pekerjaan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pekerjaan' => $model->id_pekerjaan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pekerjaan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pekerjaan Id Pekerjaan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pekerjaan)
    {
        $model = $this->findModel($id_pekerjaan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pekerjaan' => $model->id_pekerjaan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pekerjaan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pekerjaan Id Pekerjaan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pekerjaan)
    {
        $this->findModel($id_pekerjaan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pekerjaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pekerjaan Id Pekerjaan
     * @return Pekerjaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pekerjaan)
    {
        if (($model = Pekerjaan::findOne(['id_pekerjaan' => $id_pekerjaan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
