<?
class Question extends EActiveRecord
{
	const TYPE_PARTS = 1;
	const TYPE_SERVICE = 2;

	public static function getTypes()
	{
		return array(
			self::TYPE_PARTS => 'Запчасти',
			self::TYPE_SERVICE => 'Сервис',
		);
	}

	public function getCurrentType()
	{
		$types = self::getTypes();
		return $types[$this->type];
	}

    public function tableName()
    {
        return '{{question}}';
    }


    public function rules()
    {
        return array(
            array('name, phone, comment', 'required'),
            array('name, phone, comment', 'length','max'=>255),
			array('name, phone, comment', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
        );
    }

     public function afterSave(){
        
        // $to=Config::model()->findByPk(12)->value;
        // $message="Перейти к просмотру http://koreyana-tyumen.ru/admin/calls";

        // if (strpos($to, '@'))
        //     SiteHelper::sendMail("Поступила новая заявка с http://koreyana-tyumen.ru/page/Contacts",$message,$to,'koreyana-tyumen.ru');
        return parent::afterSave();
    }

    public function attributeLabels()
    {
        return array(

            'id' => 'ID',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'comment' => 'Комментарий',
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
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
        $criteria->order = 'create_time DESC';

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

}
?>