<?php

/**
* This is the model class for table "{{clients}}".
*
* The followings are the available columns in table '{{clients}}':
    * @property integer $id
    * @property string $type_auth
    * @property string $id_auth
    * @property string $name
    * @property string $phone
    * @property integer $confirmed
    * @property integer $status
    * @property string $create_time
*/
class Clients extends EActiveRecord
{
    public function tableName()
    {
        return '{{clients}}';
    }


    public function rules()
    {
        return array(
            array('confirmed, status', 'numerical', 'integerOnly'=>true),
            array('type_auth, id_auth, name, phone', 'length', 'max'=>255),
            array('create_time', 'safe'),
            // The following rule is used by search().
            array('id, type_auth, id_auth, name, phone, confirmed, status, create_time', 'safe', 'on'=>'search'),
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
            'type_auth' => 'Тип',
            'id_auth' => 'Id Auth',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'confirmed' => 'Подтверждён',
            'status' => 'Статус',
            'create_time' => 'Дата создания',
        );
    }



    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('type_auth',$this->type_auth,true);
		$criteria->compare('id_auth',$this->id_auth,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('confirmed',$this->confirmed);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


}
