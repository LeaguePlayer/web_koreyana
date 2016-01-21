<?php

/**
* This is the model class for table "{{calculate_cost}}".
*
* The followings are the available columns in table '{{calculate_cost}}':
    * @property integer $id
    * @property integer $id_brand
    * @property string $model
    * @property integer $year
    * @property integer $id_basket
    * @property integer $id_glass
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class CalculateCost extends EActiveRecord
{
    public  $email,
            $phone,
            $comment;

    public function tableName()
    {
        return '{{calculate_cost}}';
    }

    public static function getBrands($id=false){
        $data=array(
            '',
            'Марка автомобиля',
            "Acura"=>'Acura',
            "Alfa Romeo"=>'Alfa Romeo',
            "Audi"=>'Audi',
            "Bentley"=>'Bentley',
            "BMW"=>'BMW',
            "Bogdan"=>'Bogdan',
            "Cadillac"=>'Cadillac',
            "Chery"=>'Chery',
            "Chevrolet"=>'Chevrolet',
            "Chrysler"=>'Chrysler',
            "Citroen"=>'Citroen',
            "Daewoo"=>'Daewoo',
            "Datsun"=>'Datsun',
            "Dodge"=>'Dodge',
            "FAW"=>'FAW',
            "Fiat"=>'Fiat',
            "Ford"=>'Ford',
            "GAZ (Волга)"=>'GAZ (Волга)',
            "Geely"=>'Geely',
            "Great Wall"=>'Great Wall',
            "Haima"=>'Haima',
            "Honda"=>'Honda',
            "Hummer"=>'Hummer',
            "Hyundai"=>'Hyundai',
            "Infiniti"=>'Infiniti',
            "Iran Khodro"=>'Iran Khodro',
            "IZH (ИЖ)"=>'IZH (ИЖ)',
            "Jaguar"=>'Jaguar',
            "Jeep"=>'Jeep',
            "Kia"=>'Kia',
            "Lada (ВАЗ)"=>'Lada (ВАЗ)',
            "Land Rover"=>'Land Rover',
            "Lexus"=>'Lexus',
            "Lifan"=>'Lifan',
            "Mazda"=>'Mazda',
            "Mercedes-Benz"=>'Mercedes-Benz',
            "Mini (BMW)"=>'Mini (BMW)',
            "Mitsubishi"=>'Mitsubishi',
            "Nissan"=>'Nissan',
            "Opel"=>'Opel',
            "Peugeot"=>'Peugeot',
            "Porsche"=>'Porsche',
            "Renault"=>'Renault',
            "Saab"=>'Saab',
            "SEAT"=>'SEAT',
            "Skoda"=>'Skoda',
            "SsangYong"=>'SsangYong',
            "Subaru"=>'Subaru',
            "Suzuki"=>'Suzuki',
            "TagAZ (ТагАЗ)"=>'TagAZ (ТагАЗ)',
            "Toyota"=>'Toyota',
            "UAZ (УАЗ)"=>'UAZ (УАЗ)',
            "VAZ (ВАЗ)"=>'VAZ (ВАЗ)',   
            "Volga (ГАЗ)"=>'Volga (ГАЗ)',
            "Volkswagen"=>'Volkswagen',
            "Volvo"=>'Volvo',
            "Vortex"=>'Vortex',
            "ZAZ (ЗАЗ)"=>'ZAZ (ЗАЗ)'
        );
        unset($data[0]);
        return $id ? $data[$id] : $data;
    }

    public static function getYears($id=false){
        $data=array();
        $year=Date('Y');
        while ($year > 1986) {
            $data[$year]=$year;
            $year--;            
        }
        unset($data[0]);
        return $id ? $data[$year] : $data;
    }

    public static function getGlassTypes($id=false){
        $data=array(1=>'Лобовое',2=>'Заднее',3=>'Боковое');
        return $id ? $data[$id] : $data;
    }

    public static function getBasketType($id=false){
        $data=array(
            '',
            "седан",
            "хэтчбек 3 двери",
            "хэтчбек 5 дверей",
            "внедорожник",
            "универсал",
            "купе",
        );
        unset($data[0]);
        return $id!==false ? $data[$id] : $data;
    }

    public function rules()
    {
        return array(
            array('id_brand, model, year, id_basket, id_glass','required'),
            array('year, id_basket, phone, id_glass, status, sort', 'numerical', 'integerOnly'=>true),
            array('model,id_brand,email', 'length', 'max'=>255),
            array('create_time, update_time, comment', 'safe'),
            // The following rule is used by search().
            array('id, id_brand, model, year, id_basket, id_glass, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
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
            'id_brand' => 'Марка',
            'model' => 'Модель',
            'year' => 'Год выпуска',
            'id_basket' => 'Кузов',
            'id_glass' => 'Тип стекла',
            'comment'=>'Комментарий',
            'phone'=>'Телефон',
            'email'=>'E-mail',
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
		$criteria->compare('id_brand',$this->id_brand);
		$criteria->compare('model',$this->model,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('id_basket',$this->id_basket);
		$criteria->compare('id_glass',$this->id_glass);
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
