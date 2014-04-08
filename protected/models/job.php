<?php

/**
* This is the model class for table "{{job}}".
*
* The followings are the available columns in table '{{job}}':
    * @property integer $id
    * @property string $name
    * @property string $preview
    * @property string $wswg_body
    * @property integer $list_id
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Job extends EActiveRecord
{
    public function tableName()
    {
        return '{{job}}';
    }


    public function rules()
    {
        return array(
            array('list_id, status, sort', 'numerical', 'integerOnly'=>true),
            array('name, preview', 'length', 'max'=>255),
            array('wswg_body, create_time, update_time', 'safe'),
            // The following rule is used by search().
            array('id, name, preview, wswg_body, list_id, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
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
            'name' => 'Название',
            'preview' => 'Аннонс',
            'wswg_body' => 'Описание',
            'list_id' => 'List',
            'status' => 'Статус',
            'sort' => 'Вес для сортировки',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
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
		$criteria->compare('preview',$this->preview,true);
		$criteria->compare('wswg_body',$this->wswg_body,true);
		$criteria->compare('list_id',$this->list_id);
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


}
