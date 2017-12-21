<?php

/**
* This is the model class for table "{{requests_bot}}".
*
* The followings are the available columns in table '{{requests_bot}}':
    * @property integer $id
    * @property integer $id_client
    * @property integer $id_type
    * @property string $comment
    * @property integer $status
    * @property string $create_time
*/
class RequestsBot extends EActiveRecord
{
    public function tableName()
    {
        return '{{requests_bot}}';
    }


    // Статусы в базе данных
    const STATUS_NEW = 0;
    const STATUS_VIEWED = 1;
    const STATUS_DEFAULT = self::STATUS_NEW;

    public $max_sort;

    public static function getStatusAliases($status = -1)
    {
        $aliases = array(
            self::STATUS_NEW => 'Новое обращение',
            self::STATUS_VIEWED => 'Просмотрено',

        );

        if ($status > -1)
            return $aliases[$status];

        return $aliases;
    }

    public function viewAllRequestsByThisType()
    {
        $criteria = new CDbCriteria;
        $criteria->addCondition("id_type = :type and confirmed = 1");
            $criteria->params[':type'] = $this->id_type;

        if(Yii::app()->request->cookies['office']->value != RequestsBot::OFFICE_ANY)
        {
            $criteria->addCondition("id_office is null or id_office = :id_office");
            $criteria->params[':id_office'] = Yii::app()->request->cookies['office']->value;
        }
        self::model()->updateAll(array('status'=>self::STATUS_VIEWED), $criteria);
    } 


     //Офисы
    const OFFICE_MOLODEJNAYA = 0;
    const OFFICE_TOVARNOE = 1;
    const OFFICE_DOMOSTROITELEY = 2;
    const OFFICE_30_LET_POBEDI = 3;
    const OFFICE_ANY = 4;

    public static function getOffices($type = false)
    {
        $aliases = array(
            self::OFFICE_MOLODEJNAYA => 'Молодёжная, 74 ст3',
            self::OFFICE_TOVARNOE => 'Товарное шоссе, 14/1',
            self::OFFICE_DOMOSTROITELEY => 'Домостроителей, 19',
            self::OFFICE_30_LET_POBEDI => '30 лет Победы, 125 ст8',
            self::OFFICE_ANY => 'Любой офис',
        );

        if (is_numeric($type))
            return $aliases[$type];
        elseif (is_null($type))
            return "";

        return $aliases;
    }

     //ТИПЫ Обращений
    const TYPE_EVACUTOR = 0;
    const TYPE_STO = 1;
    // const TYPE_PARTS = 2;
    const TYPE_REVIEWS = 3;

    public static function getTypes($type = false)
    {
        $aliases = array(
            self::TYPE_EVACUTOR => 'Вызов эвакуатора',
            self::TYPE_STO => 'Запрос СТО / Запчасти',
            // self::TYPE_PARTS => 'Запрос по запчастям',
            self::TYPE_REVIEWS => 'Отзывы',
        );
// var_dump($type);die();
        if (is_numeric($type))
            return $aliases[$type];
        

        return $aliases;
    }


    public function rules()
    {
        return array(
            array('id_client, id_type, confirmed, status, id_office', 'numerical', 'integerOnly'=>true),
            array('comment, create_time', 'safe'),
            // The following rule is used by search().
            array('id, id_client, id_type, comment, status, create_time', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
            'client' => array(self::BELONGS_TO, 'Clients', 'id_client'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'id_client' => 'Клиент',
            'id_type' => 'Тип',
            'id_office' => 'Офис',
            'comment' => 'Комментарий',
            'status' => 'Статус',
            'create_time' => 'Дата создания',
        );
    }


    public function beforeSave()
    {
        parent::beforeSave();

        

        if($this->isNewRecord)
        {
            $this->create_time = date("Y-m-d H:i");
            $this->confirmed = 0;
        }

        return true;
    }



    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('id_client',$this->id_client);
		$criteria->compare('id_type',$this->id_type);
        $criteria->compare('comment',$this->comment,true);
		$criteria->compare('confirmed',$this->confirmed,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);

        if(Yii::app()->request->cookies['office']->value != RequestsBot::OFFICE_ANY)
        {
            $criteria->addCondition("id_office is null or id_office = :id_office");
            $criteria->params[':id_office'] = Yii::app()->request->cookies['office']->value;
        }

        

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
             'sort' => array('defaultOrder' => 'create_time DESC'),
             'pagination'=>array(
                'pageSize'=>10000
            )
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


}
