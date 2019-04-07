<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Rating;

/**
 * RatingSearch represents the model behind the search form of `backend\models\Rating`.
 */
class RatingSearch extends Rating
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mark', 'date'], 'integer'],
            [['student_id', 'group_id', 'teacher_id', 'subject_id'], 'safe'],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $student_id, $group_id, $subject_id, $teacher_id)
    {
        $query = Rating::find();
            // var_dump($group_id);exit();


        // add conditions that should always apply here

        if (!empty($group_id) || !empty($subject_id))
        {
            $query->where(['group_id' => $group_id, 'subject_id' => $subject_id]);   
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'mark' => $this->mark,
            'date' => $this->date,
            'student_id' => $this->student_id,
            'group_id' => $this->group_id,
            'subject_id' => $this->subject_id,
            'teacher_id' => $this->teacher_id,
        ]);

        return $dataProvider;
    }
}
