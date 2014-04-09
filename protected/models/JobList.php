<?php

/**
* This is the model class for table "{{job_list}}".
*
* The followings are the available columns in table '{{job_list}}':
    * @property integer $id
    * @property integer $node_id
*/
class JobList extends EActiveRecord
{
    public function tableName()
    {
        return '{{job_list}}';
    }


    public function rules()
    {
        return array(
            array('node_id', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            array('id, node_id', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
            'node' => array(self::BELONGS_TO, 'Structure', 'node_id'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'node_id' => 'Node',
        );
    }

    public function behaviors()
    {
        return array(
            'structure' => array(
                'class' => 'application.behaviors.StructureBehavior',
            ),
        );
    }

    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('node_id',$this->node_id);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


}
