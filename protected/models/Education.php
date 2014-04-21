<?php

/**
* This is the model class for table "{{education}}".
*
* The followings are the available columns in table '{{education}}':
    * @property integer $id
    * @property string $institution
    * @property string $faculty
    * @property string $speciality
    * @property string $study_form
    * @property string $dt_end
*/
class Education extends EActiveRecord
{
    public function tableName()
    {
        return '{{education}}';
    }


    public function rules()
    {
        return array(
            array('institution, faculty, speciality, study_form, dt_end', 'length', 'max'=>255),
            // The following rule is used by search().
            array('id, institution, faculty, speciality, study_form, dt_end', 'safe', 'on'=>'search'),
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
            'institution' => 'Учебное заведение',
            'faculty' => 'Факультет',
            'speciality' => 'Специальность',
            'study_form' => 'Форма обучения',
            'dt_end' => 'Дата окончания',
        );
    }



    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('institution',$this->institution,true);
		$criteria->compare('faculty',$this->faculty,true);
		$criteria->compare('speciality',$this->speciality,true);
		$criteria->compare('study_form',$this->study_form,true);
		$criteria->compare('dt_end',$this->dt_end,true);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

	public function beforeSave()
	{
		if (!empty($this->dt_end))
			$this->dt_end = Yii::app()->date->toMysql($this->dt_end);
		return parent::beforeSave();
	}

	public function afterFind()
	{
		parent::afterFind();
		if ( in_array($this->scenario, array('insert', 'update')) ) { 
			$this->dt_end = ($this->dt_end !== '0000-00-00' ) ? date('d-m-Y', strtotime($this->dt_end)) : '';
		}
	}
}
