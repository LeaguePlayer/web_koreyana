<?php

/**
* This is the model class for table "{{calls}}".
*
* The followings are the available columns in table '{{calls}}':
    * @property integer $id
    * @property string $fam
    * @property string $sername
    * @property string $comment
    * @property integer $type
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Calls extends EActiveRecord
{
    public function tableName()
    {
        return '{{calls}}';
    }


    public function rules()
    {
        return array(
            // array('status, sort', 'numerical', 'integerOnly'=>true),
            // array('type','boolean'),
            // array('fam, sername', 'length', 'max'=>255),
            // array('fam, sername, type, phone, e_mail comment, create_time, update_time', 'safe'),
            // // The following rule is used by search().
            // array('id, fam, sername, comment, tatus, sort, create_time, update_time', 'safe', 'on'=>'search'),

            array('fam, sername, comment,phone', 'required'),
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
            'fam' => 'Имя',
            'sername' => 'Фамилия',
            'phone' => 'Телефон',
            'comment' => 'Комментарий',
            'e_mail' => 'Електронная почта',
            'type' => 'Тип звонка',
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
		$criteria->compare('fam',$this->fam,true);
		$criteria->compare('sername',$this->sername,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('type',$this->type);
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
