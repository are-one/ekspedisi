<?php

namespace app\controllers;

use Yii;
use app\models\Satker;
use app\models\Model;
use app\models\CariSatker;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * SatkerController implements the CRUD actions for Satker model.
 */
class SatkerController extends Controller
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
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return !(Yii::$app->user->isGuest);
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Satker models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CariSatker();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Satker model.
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
     * Creates a new Satker model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $models = [new Satker()];


        if (Yii::$app->request->post() != null) {


            $models = Model::createMultiple(Satker::classname());

            Model::loadMultiple($models, Yii::$app->request->post());

            // if (Yii::$app->request->isAjax) {
            //     Yii::$app->response->format = Response::FORMAT_JSON;
            //     return ArrayHelper::merge(
            //         ActiveForm::validateMultiple($models),
            //     );
            // }
            // validate all models
            $valid = Model::validateMultiple($models);


            if ($valid) {

                $transaction = \Yii::$app->db->beginTransaction();


                try {

                    // if ($flag = $modelCustomer->save(false)) {

                    foreach ($models as $model) {

                        // $model->customer_id = $model->id;

                        if (!($flag = $model->save(false))) {

                            $transaction->rollBack();

                            break;
                        }
                    }
                    // }


                    if ($flag) {

                        $transaction->commit();

                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {

                    $transaction->rollBack();
                }
            }
        }


        return $this->render('create', [
            'models' => (empty($models)) ? [new Satker()] : $models
        ]);
    }

    /**
     * Updates an existing Satker model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_satker]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Satker model.
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
     * Finds the Satker model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Satker the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Satker::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
