<?php

/**
* This is the model class for table "{{requests_bot_place}}".
*
* The followings are the available columns in table '{{requests_bot_place}}':
    * @property integer $id
    * @property integer $id_request
    * @property string $coord_lat
    * @property string $coord_lnt
    * @property string $street_name
    * @property integer $status
*/
class RequestsBotPlace extends EActiveRecord
{
    public function tableName()
    {
        return '{{requests_bot_place}}';
    }


    public function rules()
    {
        return array(
            array('id_request, status', 'numerical', 'integerOnly'=>true),
            array('coord_lat, coord_lnt, street_name', 'length', 'max'=>255),
            // The following rule is used by search().
            array('id, id_request, coord_lat, coord_lnt, street_name, status', 'safe', 'on'=>'search'),
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
            'id_request' => 'ID_REQUEST',
            'coord_lat' => 'ID_REQUEST',
            'coord_lnt' => 'ID_REQUEST',
            'street_name' => 'Название улицы',
            'status' => 'Статус',
        );
    }



    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('id_request',$this->id_request);
		$criteria->compare('coord_lat',$this->coord_lat,true);
		$criteria->compare('coord_lnt',$this->coord_lnt,true);
		$criteria->compare('street_name',$this->street_name,true);
		$criteria->compare('status',$this->status);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


}
