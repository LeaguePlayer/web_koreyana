<?php

/**
* This is the model class for table "{{works}}".
*
* The followings are the available columns in table '{{works}}':
    * @property integer $id
    * @property string $wrok_duration
    * @property string $company_name
    * @property string $company_sphere
    * @property string $post
    * @property string $timetable
    * @property string $work_duties
*/
class Works extends EActiveRecord
{
    public function tableName()
    {
        return '{{works}}';
    }


    public function rules()
    {
        return array(
            array('wrok_duration, company_name, company_sphere, post, timetable', 'length', 'max'=>255),
            array('work_duties', 'safe'),
            // The following rule is used by search().
            array('id, wrok_duration, company_name, company_sphere, post, timetable, work_duties', 'safe', 'on'=>'search'),
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
            'wrok_duration' => 'Период работы',
            'company_name' => 'Название компании',
            'company_sphere' => 'Сфера деятельности компании',
            'post' => 'Должность или профессия',
            'timetable' => 'График работы',
            'work_duties' => 'Должностные обязанности и достижения',
        );
    }



    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('wrok_duration',$this->wrok_duration,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('company_sphere',$this->company_sphere,true);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('timetable',$this->timetable,true);
		$criteria->compare('work_duties',$this->work_duties,true);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


}
