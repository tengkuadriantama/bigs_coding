<?php

namespace app\controllers;

use app\models\TrxRegistrasi;
use app\models\TrxRegistrasiSearch;
use kartik\mpdf\Pdf;
use Mpdf\Mpdf;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TrxRegistrasiController implements the CRUD actions for TrxRegistrasi model.
 */
class TrxRegistrasiController extends Controller
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
     * Lists all TrxRegistrasi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TrxRegistrasiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single TrxRegistrasi model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TrxRegistrasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TrxRegistrasi();
        $model->waktu_registrasi = date('Y-m-d H:i:s');
        $model->waktu_mulai_pelayanan = date('Y-m-d H:i:s');
        $model->waktu_selesai_pelayanan = '';



        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                // return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TrxRegistrasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->status_registrasi === 'Tutup Kunjungan') {
            $model->waktu_selesai_pelayanan = date('Y-m-d H:i:s');
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else if (
            $this->request->isPost && $model->load($this->request->post())
        ) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TrxRegistrasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TrxRegistrasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TrxRegistrasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrxRegistrasi::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionReport()
    {
        $searchModel = new TrxRegistrasiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $html = $this->renderPartial(
            'pdf',
            ['dataProvider' => $dataProvider]
        );
        $mpdf = new Mpdf([
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE,
        ]);

        $mpdf->showImageErrors = true;
        $mpdf->SetDisplayMode('fullpage', 'two');
        $mpdf->list_indent_first_level = 0;
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        exit;
    }
}
