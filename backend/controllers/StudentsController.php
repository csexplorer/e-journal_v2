<?php

namespace backend\controllers;

use backend\models\GroupSubjects;
use backend\models\Rating;
use backend\models\SubjectTeachers;
use Yii;
use backend\models\Students;
use backend\models\StudentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentsController implements the CRUD actions for Students model.
 */
class StudentsController extends Controller
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
     * Lists all Students models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Students model.
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
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Students();
        $rating = new Rating();

        if ($model->load(Yii::$app->request->post())) {

            $model->save();

            $subjects = GroupSubjects::find()->where(['group_id' => $model->group_id])->all();

            $bulkInsertArray = array();

            foreach($subjects as $subject){
                $bulkInsertArray[]=[
                    $rating->student_id = $model->id,
                    $rating->group_id = $model->group_id,
                    $rating->subject_id = $subject->subject_id,
                    $rating->teacher_id = SubjectTeachers::find()->where(['subject_id' => $subject->subject_id])->one()->teacher_id,
                    $rating->mark = 0,
                    $rating->date = date('Y-m-d H:m:s'),
                ];
            }

            if(count($bulkInsertArray)>0){
                $columnNameArray=['student_id','group_id','subject_id', 'teacher_id', 'mark', 'date'];
                // below line insert all your record and return number of rows inserted
                $insertCount = Yii::$app->db->createCommand()
                    ->batchInsert(
                        Rating::tableName(), $columnNameArray, $bulkInsertArray
                    )
                    ->execute();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'rating' => $rating
        ]);
    }

    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
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
     * Deletes an existing Students model.
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
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Students::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
