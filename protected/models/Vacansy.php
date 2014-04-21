<?php

/**
* This is the model class for table "{{vacansy}}".
*
* The followings are the available columns in table '{{vacansy}}':
    * @property integer $id
    * @property string $name
    * @property string $sername
    * @property string $phone
    * @property string $vacansy
    * @property string $file
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Vacansy extends EActiveRecord
{
    public function tableName()
    {
        return '{{vacansy}}';
    }


    public function rules()
    {
        return array(
            array('status, sort', 'numerical', 'integerOnly'=>true),
            array('name, sername, phone, vacansy', 'length', 'max'=>255),
            array('create_time, update_time', 'safe'),
            array('name, sername, phone, file, vacansy','required'),
            array('id, name, sername, phone, vacansy, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
            array('file', 'file', 'types'=>'doc, docx, pdf'),

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
            'name' => 'Имя',
            'sername' => 'Фамилия',
            'phone' => 'Телефон',
            'vacansy' => 'Вакансия',
            'status' => 'Статус',
            'file' => 'Резюме',
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
		$criteria->compare('sername',$this->sername,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('vacansy',$this->vacansy,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
        $criteria->order = 'sort';
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function getStatusAliases()
    {
        return array('0'=>'Рассмотрено','1'=>'Не рассмотрено','2'=>'Удаленно');
    }
    public function getCurrentStatus()
    {
        $statuses=self::getStatusAliases();
        return $statuses[$this->status];
    }
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


}
