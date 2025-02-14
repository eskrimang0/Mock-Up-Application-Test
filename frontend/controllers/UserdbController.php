<?php

namespace frontend\controllers;

use frontend\models\Userdb;
use frontend\models\UserdbSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserdbController implements the CRUD actions for Userdb model.
 */
class UserdbController extends Controller
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
     * Lists all Userdb models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserdbSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Userdb model.
     * @param string $email_user Email User
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($email_user)
    {
        return $this->render('view', [
            'model' => $this->findModel($email_user),
        ]);
    }

    /**
     * Creates a new Userdb model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Userdb();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'email_user' => $model->email_user]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Userdb model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $email_user Email User
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($email_user)
    {
        $model = $this->findModel($email_user);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'email_user' => $model->email_user]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Userdb model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $email_user Email User
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($email_user)
    {
        $this->findModel($email_user)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Userdb model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $email_user Email User
     * @return Userdb the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($email_user)
    {
        if (($model = Userdb::findOne(['email_user' => $email_user])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
