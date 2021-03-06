<?php

namespace backend\controllers;

use backend\models\Students;
use Yii;
use backend\models\Rating;
use backend\models\Groups;
use backend\models\Subjects;
use backend\models\RatingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * RatingController implements the CRUD actions for Rating model.
 */
class RatingController extends Controller
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
     * Lists all Rating models.
     * @return mixed
     */
    public function actionIndex($group_id = false, $subject_id = false)
    {
        if (Yii::$app->request->post('hasEditable'))
        {
            $_id=$_POST['editableKey'];
            $rating = Rating::findOne($_id);
            
            $out = Json::encode(['output' => '', 'message' => '']);
            $post = [];
            $posted = current($_POST['Rating']);
            $post['Rating'] = $posted;
            
            if ($rating->load($post))
            {
                
                $rating->save();
                $output = 'my values';
                Json::encode(['output' => $output, 'message' => '']);
            }
            echo $out;
            return;
        }
        
        $teacher_id = false;
        $date = false;
        $isPost = false;
        
        
        
        if (Yii::$app->request->isPost)
        {
            $post = Yii::$app->request->post('Rating');
            $teacher_id = $post['teacher_id'];
            $date = $post['date'];
            
            $isPost = true;
        }
        
        $searchModel = new RatingSearch();
        $dataProvider = $searchModel->search(
            Yii::$app->request->queryParams,
            $group_id, $subject_id, $teacher_id, $date
            );
        
        $model = new Rating();
        
        if ($group_id && $subject_id) {
            $groupName = Groups::find()->where(['id' => $group_id])->one()->name;
            $subjectName = Subjects::find()->where(['id' => $subject_id])->one()->name;
            
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $model,
                'isPost' => $isPost,
                'ratingSearchParams' => [$groupName, $subjectName],
                'groupId' => $group_id
            ]);
        }
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'isPost' => $isPost,
            'groupId' => $group_id
        ]);
        
        
    }

    /**
     * Displays a single Rating model.
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
     * Creates a new Rating model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rating();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Rating model.
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
     * Deletes an existing Rating model.
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
     * Finds the Rating model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rating the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rating::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
