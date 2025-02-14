<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Biodata;
use frontend\models\Pekerjaan;
use frontend\models\Pendidikan;
use frontend\models\Pelatihan;
use yii\base\Model;
use yii\db\Exception;
use yii\filters\VerbFilter;
use frontend\models\ModelHelper; 


/**
 * BiodataController implements the CRUD actions for Biodata model.
 */
class BiodataController extends Controller
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
     * Lists all Biodata models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BiodataSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Biodata model.
     * @param int $id_pelamar Id Pelamar
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionView($id_pelamar)
    // {
    //     return $this->render('view', [
    //         'model' => $this->findModel($id_pelamar),
    //     ]);
    // }

    public function actionView($id)
{
    $model = Biodata::findOne(['id_pelamar' => $id]);

    if (!$model) {
        throw new NotFoundHttpException('Data biodata tidak ditemukan.');
    }

    return $this->render('view', ['model' => $model]);
}


    /**
     * Creates a new Biodata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

     public function actionCreate()
     {
         $user = Yii::$app->user->identity;
     
         // Cek apakah user sudah mengisi biodata
         if ($user->isFormFilled()) {
             Yii::$app->session->setFlash('error', 'Anda sudah mengisi biodata.');
             return $this->redirect(['view', 'id' => $user->id]);
         }
     
         $model = new Biodata();
         $model->id_pelamar = $user->id;
     
         // Pastikan variabel child tidak undefined
         $pekerjaans = [new Pekerjaan()];
         $pendidikan = [new Pendidikan()];
         $pelatihan = [new Pelatihan()];
     
         if ($model->load(Yii::$app->request->post())) {
             $transaction = Yii::$app->db->beginTransaction();
             try {
                 if ($model->save()) {
                     $user->markFormAsFilled();
     
                     // Pekerjaan
                    $pekerjaans = ModelHelper::createMultiple(Pekerjaan::class, $pekerjaans);
                    Model::loadMultiple($pekerjaans, Yii::$app->request->post());

     
                     foreach ($pekerjaans as $pekerjaan) {
                         $pekerjaan->id_pelamar = $model->id_pelamar;
                         if (!$pekerjaan->save()) {
                             throw new Exception('Gagal menyimpan Pekerjaan.');
                         }
                     }
     
                     // Pendidikan
                    $pendidikan = ModelHelper::createMultiple(Pendidikan::class, $pendidikan);
                    Model::loadMultiple($pendidikan, Yii::$app->request->post());

     
                     foreach ($pendidikan as $pendidikanItem) {
                         $pendidikanItem->id_pelamar = $model->id_pelamar;
                         if (!$pendidikanItem->save()) {
                             throw new Exception('Gagal menyimpan Pendidikan.');
                         }
                     }
     
                     // Pelatihan
                    $pelatihan = ModelHelper::createMultiple(Pelatihan::class, $pelatihan);
                    Model::loadMultiple($pelatihan, Yii::$app->request->post());

                     foreach ($pelatihan as $pelatihanItem) {
                         $pelatihanItem->id_pelamar = $model->id_pelamar;
                         if (!$pelatihanItem->save()) {
                             throw new Exception('Gagal menyimpan Pelatihan.');
                         }
                     }
     
                     $transaction->commit();
                     Yii::$app->session->setFlash('success', 'Data berhasil disimpan.');
                     return $this->redirect(['view', 'id' => $model->id_pelamar]);
                 } else {
                     throw new Exception('Gagal menyimpan Biodata.');
                 }
             } catch (Exception $e) {
                 $transaction->rollBack();
                 Yii::$app->session->setFlash('error', $e->getMessage());
             }
         }
     
         return $this->render('create', [
            'model' => $model,
            'pekerjaans' => (empty($pekerjaans)) ? [new Pekerjaan()] : $pekerjaans,
            'pendidikan' => (empty($pendidikan)) ? [new Pendidikan()] : $pendidikan,
            'pelatihan' => (empty($pelatihan)) ? [new Pelatihan()] : $pelatihan,
        ]);
        
     }
     

    // public function actionCreate()
    // {
        
    // $user = Yii::$app->user->identity;

    // // Cek apakah user sudah mengisi form
    // if ($user->isFormFilled()) {
    //     Yii::$app->session->setFlash('error', 'Anda sudah mengisi biodata. Anda hanya bisa melihat atau mengeditnya.');
    //     return $this->redirect(['view', 'id' => $user->id]);
    // }

    // $model = new Biodata();
    // $model->id_pelamar = $user->id;

    // if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //     // Tandai user telah mengisi form
    //     $user->markFormAsFilled();

    //     Yii::$app->session->setFlash('success', 'Biodata berhasil dibuat.');
    //     return $this->redirect(['view', 'id' => $model->id_pelamar]);
    // }

    // return $this->render('create', [
    //     'model' => $model,
    // ]);
    // }
    
    

    /**
     * Updates an existing Biodata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pelamar Id Pelamar
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdate($id_pelamar)
    // {
    //     $model = $this->findModel($id_pelamar);

    //     if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id_pelamar' => $model->id_pelamar]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }

//     public function actionUpdate($id)
// {
//     $model = Biodata::findOne(['id_pelamar' => $id]);

//     if (!$model) {
//         throw new NotFoundHttpException('Data biodata tidak ditemukan.');
//     }

//     if ($model->load(Yii::$app->request->post()) && $model->save()) {
//         Yii::$app->session->setFlash('success', 'Data biodata berhasil diperbarui.');
//         return $this->redirect(['view', 'id' => $model->id_pelamar]); 
//     }

//     return $this->render('update', ['model' => $model]);
// }

public function actionUpdate($id)
{
    $model = Biodata::findOne(['id_pelamar' => $id]);

    if (!$model) {
        throw new NotFoundHttpException('Data biodata tidak ditemukan.');
    }

    // Load data child dari database
    $pekerjaans = Pekerjaan::findAll(['id_pelamar' => $id]);
    $pendidikan = Pendidikan::findAll(['id_pelamar' => $id]);
    $pelatihan = Pelatihan::findAll(['id_pelamar' => $id]);

    // Jika data child kosong, buat array baru agar tidak error
    if (empty($pekerjaans)) {
        $pekerjaans = [new Pekerjaan()];
    }
    if (empty($pendidikan)) {
        $pendidikan = [new Pendidikan()];
    }
    if (empty($pelatihan)) {
        $pelatihan = [new Pelatihan()];
    }

    if ($model->load(Yii::$app->request->post())) {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($model->save()) {
                // Hapus data child lama sebelum menyimpan ulang
                Pekerjaan::deleteAll(['id_pelamar' => $id]);
                Pendidikan::deleteAll(['id_pelamar' => $id]);
                Pelatihan::deleteAll(['id_pelamar' => $id]);

                // Simpan ulang child tables
                $pekerjaans = ModelHelper::createMultiple(Pekerjaan::class, $pekerjaans);
                Model::loadMultiple($pekerjaans, Yii::$app->request->post());

                foreach ($pekerjaans as $pekerjaan) {
                    $pekerjaan->id_pelamar = $id;
                    if (!$pekerjaan->save()) {
                        throw new Exception('Gagal menyimpan Pekerjaan.');
                    }
                }

                $pendidikan = ModelHelper::createMultiple(Pendidikan::class, $pendidikan);
                Model::loadMultiple($pendidikan, Yii::$app->request->post());

                foreach ($pendidikan as $pendidikanItem) {
                    $pendidikanItem->id_pelamar = $id;
                    if (!$pendidikanItem->save()) {
                        throw new Exception('Gagal menyimpan Pendidikan.');
                    }
                }

                $pelatihan = ModelHelper::createMultiple(Pelatihan::class, $pelatihan);
                Model::loadMultiple($pelatihan, Yii::$app->request->post());

                foreach ($pelatihan as $pelatihanItem) {
                    $pelatihanItem->id_pelamar = $id;
                    if (!$pelatihanItem->save()) {
                        throw new Exception('Gagal menyimpan Pelatihan.');
                    }
                }

                $transaction->commit();
                Yii::$app->session->setFlash('success', 'Data berhasil diperbarui.');
                return $this->redirect(['view', 'id' => $model->id_pelamar]);
            } else {
                throw new Exception('Gagal menyimpan Biodata.');
            }
        } catch (Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }

    return $this->render('update', [
        'model' => $model,
        'pekerjaans' => $pekerjaans,
        'pendidikan' => $pendidikan,
        'pelatihan' => $pelatihan,
    ]);
}



    /**
     * Deletes an existing Biodata model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pelamar Id Pelamar
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionDelete($id_pelamar)
    // {
    //     $this->findModel($id_pelamar)->delete();

    //     return $this->redirect(['/']);
    // }

    public function actionDelete($id)
    {
        $model = Biodata::findOne(['id_pelamar' => $id]);

        if ($model) {
            $model->delete();
        }
        
        return $this->redirect(['/']);
    }

    /**
     * Finds the Biodata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pelamar Id Pelamar
     * @return Biodata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pelamar)
    {
        if (($model = Biodata::findOne(['id_pelamar' => $id_pelamar])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
