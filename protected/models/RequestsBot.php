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
        self::model()->updateAll(array('status'=>self::STATUS_VIEWED), "id_type = {$this->id_type} and confirmed = 1");
    } 

     //ТИПЫ Обращений
    const TYPE_EVACUTOR = 0;
    const TYPE_STO = 1;
    const TYPE_PARTS = 2;

    public static function getTypes($type = false)
    {
        $aliases = array(
            self::TYPE_EVACUTOR => 'Вызов эвакуатора',
            self::TYPE_STO => 'Запрос в СТО',
            self::TYPE_PARTS => 'Запрос по запчастям',
        );

        if (is_numeric($type))
            return $aliases[$type];

        return $aliases;
    }


    public function rules()
    {
        return array(
            array('id_client, id_type, confirmed, status', 'numerical', 'integerOnly'=>true),
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
