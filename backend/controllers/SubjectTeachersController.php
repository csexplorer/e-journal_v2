<?php

namespace backend\controllers;

use backend\models\Subjects;
use Yii;
use backend\models\SubjectTeachers;
use backend\models\SubjectTeachersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubjectTeachersController implements the CRUD actions for SubjectTeachers model.
 */
class SubjectTeachersController extends Controller
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
     * Lists all SubjectTeachers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubjectTeachersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SubjectTeachers model.
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
     * Creates a new SubjectTeachers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SubjectTeachers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SubjectTeachers model.
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
     * Deletes an existing SubjectTeachers model.
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
     * Finds the SubjectTeachers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SubjectTeachers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SubjectTeachers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionList($teacher_id) {
        $countSubjectTeachers = SubjectTeachers::find()
            ->where(['teacher_id' => $teacher_id])
            ->count();

        $subjectTeachers = SubjectTeachers::find()
            ->where(['teacher_id' => $teacher_id])
            ->all();

            // echo "<pre>";
            // var_dump($subjects); exit;

        if ($countSubjectTeachers > 0) {
            foreach ($subjectTeachers as $subjectTeacher) {
                $subjectName = Subjects::find()->where(['id' => $subjectTeacher->subject_id])->one();
// echo "<pre>";
//             var_dump($subjectName->name); exit;
                echo "<option value='" . $subjectTeacher->subject_id . "'>" . $subjectName->name . "</option>";
            }
        } else {
            echo "<option>-</option>";
        }

    }
}
