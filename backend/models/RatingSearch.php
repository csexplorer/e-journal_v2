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
            [['id', 'mark'], 'integer'],
            [['student_id', 'group_id', 'teacher_id', 'subject_id', 'date'], 'safe'],
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
    public function search($params, $group_id, $subject_id, $teacher_id)
    {
        $query = Rating::find();

        // echo "<pre>"; var_dump(!empty($teacher_id)); exit;

        if (!empty($group_id))
        {
            if (!empty($subject_id))
            {
                if (!empty($teacher_id))
                {
                    $query->where([
                        'group_id' => $group_id,
                        'subject_id' => $subject_id,
                        'teacher_id' => $teacher_id
                    ]);
                } else
                {
                    $query->where([
                        'group_id' => $group_id,
                        'subject_id' => $subject_id
                    ]);
                }
            } elseif (!empty($teacher_id))
            {
                $query->where(['and',
                    'group_id = ' . $group_id,
                    'teacher_id = ' . $teacher_id
                ]);
            } else
            {
                $query->where([
                    'group_id' => $group_id
                ]);
            }
        } elseif (!empty($subject_id))
        {
            if (!empty($teacher_id))
            {
                $query->where([
                    'subject_id' => $subject_id,
                    'teacher_id' => $teacher_id
                ]);
            } else
            {
                $query->where([
                    'subject_id' => $subject_id
                ]);
            }
        } else
        {
            $query->where([
                'teacher_id' => $teacher_id
            ]);
        }

        if (!empty($teacher_id)) {

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
