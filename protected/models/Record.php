<?php

/**
* This is the model class for table "{{record}}".
*
* The followings are the available columns in table '{{record}}':
    * @property integer $id
    * @property string $name
    * @property string $phone
    * @property string $dt_visit
    * @property string $visit_time
    * @property string $avto_info
    * @property string $work_type
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Record extends EActiveRecord
{
    public function tableName()
    {
        return '{{record}}';
    }


    public function rules()
    {
        return array(
            array('status, sort', 'numerical', 'integerOnly'=>true),
            array('name, phone, dt_visit, visit_time, avto_info', 'length', 'max'=>255),
            array('work_type, create_time, update_time', 'safe'),
            // The following rule is used by search().
            array('id, name, phone, dt_visit, visit_time, avto_info, work_type, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'dt_visit' => 'Dt Visit',
            'visit_time' => 'Visit Time',
            'avto_info' => 'Avto Info',
            'work_type' => 'Work Type',
            'status' => 'Status',
            'sort' => 'Sort',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        );
    }


    public function behaviors()
    {
        return CMap::mergeArray(parent::behaviors(), array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'create_time',
                'updateAttribute' => 'update_time',
                'setUpdateOnCreate' => true,
			),
        ));
    }

    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('dt_visit',$this->dt_visit,true);
		$criteria->compare('visit_time',$this->visit_time,true);
		$criteria->compare('avto_info',$this->avto_info,true);
		$criteria->compare('work_type',$this->work_type,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
        $criteria->order = 'sort';
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

	public function beforeSave()
	{
		if (!empty($this->dt_visit))
			$this->dt_visit = Yii::app()->date->toMysql($this->dt_visit);
		return parent::beforeSave();
	}

	public function afterFind()
	{
		parent::afterFind();
		if ( in_array($this->scenario, array('insert', 'update')) ) { 
			$this->dt_visit = ($this->dt_visit !== '0000-00-00' ) ? date('d-m-Y', strtotime($this->dt_visit)) : '';
		}
	}
}
