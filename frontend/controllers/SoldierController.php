<?php

namespace frontend\controllers;

use Yii;
use common\models\Soldier;
use common\models\SoldierSearch;
use common\models\UnitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SoldierController implements the CRUD actions for Soldier model.
 */
class SoldierController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Soldier models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SoldierSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $units = (new UnitSearch())->selectOptions();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'units' => $units
        ]);
    }

    /**
     * Displays a single Soldier model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Soldier model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Soldier();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $units = (new UnitSearch())->selectOptions();

            return $this->render('create', [
                'model' => $model,
                'units' => $units
            ]);
        }
    }

    /**
     * Updates an existing Soldier model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $units = (new UnitSearch())->selectOptions();

            return $this->render('update', [
                'model' => $model,
                'units' => $units
            ]);
        }
    }

    /**
     * Deletes an existing Soldier model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Soldier model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Soldier the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Soldier::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
