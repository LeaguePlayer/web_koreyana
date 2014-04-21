<?php

/**
* This is the model class for table "{{resume}}".
*
* The followings are the available columns in table '{{resume}}':
    * @property integer $id
    * @property string $name
    * @property string $job_type
    * @property string $salary
    * @property string $dt_birthday
    * @property string $register_adres
    * @property string $adres_fact
    * @property string $contacts
    * @property string $family_status
    * @property string $height
    * @property string $size
    * @property string $institution
    * @property string $faculty
    * @property string $speciality
    * @property string $study_form
    * @property string $knowledge
    * @property string $wrok_duration
    * @property string $company_name
    * @property string $company_sphere
    * @property string $post
    * @property string $timetable
    * @property string $work_duties
    * @property string $motivate
    * @property string $yours_timetable
    * @property string $postAfterYear
    * @property string $recommendation
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
    * @property string $wswg_body
*/
class Resume extends EActiveRecord
{
    public function tableName()
    {
        return '{{resume}}';
    }


    public function rules()
    {
        return array(
            array('status, sort', 'numerical', 'integerOnly'=>true),
            array('name, job_type, salary, dt_birthday, register_adres, adres_fact, contacts, family_status, height, size, institution, faculty, speciality, study_form, wrok_duration, company_name, company_sphere, post, timetable, motivate, yours_timetable, postAfterYear, recommendation', 'length', 'max'=>255),
            array('knowledge, work_duties, create_time, update_time, wswg_body', 'safe'),
            // The following rule is used by search().
            array('id, name, job_type, salary, dt_birthday, register_adres, adres_fact, contacts, family_status, height, size, institution, faculty, speciality, study_form, knowledge, wrok_duration, company_name, company_sphere, post, timetable, work_duties, motivate, yours_timetable, postAfterYear, recommendation, status, sort, create_time, update_time, wswg_body', 'safe', 'on'=>'search'),
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
            'name' => 'ФИО',
            'job_type' => 'На какую должность вы претендуете',
            'salary' => 'Желаемый доход',
            'dt_birthday' => 'Дата и место рождения',
            'register_adres' => 'Адрес постоянной регистрации',
            'adres_fact' => 'Адрес проживания',
            'contacts' => 'Контактная информация:тел., e-mail',
            'family_status' => 'Семейное положение, дети',
            'height' => 'Рост (см)',
            'size' => 'Размер',
            'institution' => 'Учебное заведение',
            'faculty' => 'Факультет',
            'speciality' => 'Специальность',
            'study_form' => 'Форма обучения',
            'knowledge' => 'Компьютерные навыки и знания',
            'wrok_duration' => 'Период работы',
            'company_name' => 'Название компании',
            'company_sphere' => 'Сфера деятельности компании',
            'post' => 'Должность или профессия',
            'timetable' => 'График работы',
            'work_duties' => 'Должностные обязанности и достижения',
            'motivate' => 'Мотивы и стимулы, побудившие Вас прийти именно к нам',
            'yours_timetable' => 'Какой график работы Вас устроиит? Ваше отношение к возможным командировкам?',
            'postAfterYear' => 'Как Вы представляете свое положение в нашей компании через год?',
            'recommendation' => 'Кто из Ваших бывших коллег и руководителей может дать Вам устную рекомендацию или рекомендательное письмо?',
            'status' => 'Статус',
            'sort' => 'Вес для сортировки',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
            'wswg_body' => 'Резюме',
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
		$criteria->compare('job_type',$this->job_type,true);
		$criteria->compare('salary',$this->salary,true);
		$criteria->compare('dt_birthday',$this->dt_birthday,true);
		$criteria->compare('register_adres',$this->register_adres,true);
		$criteria->compare('adres_fact',$this->adres_fact,true);
		$criteria->compare('contacts',$this->contacts,true);
		$criteria->compare('family_status',$this->family_status,true);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('institution',$this->institution,true);
		$criteria->compare('faculty',$this->faculty,true);
		$criteria->compare('speciality',$this->speciality,true);
		$criteria->compare('study_form',$this->study_form,true);
		$criteria->compare('knowledge',$this->knowledge,true);
		$criteria->compare('wrok_duration',$this->wrok_duration,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('company_sphere',$this->company_sphere,true);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('timetable',$this->timetable,true);
		$criteria->compare('work_duties',$this->work_duties,true);
		$criteria->compare('motivate',$this->motivate,true);
		$criteria->compare('yours_timetable',$this->yours_timetable,true);
		$criteria->compare('postAfterYear',$this->postAfterYear,true);
		$criteria->compare('recommendation',$this->recommendation,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('wswg_body',$this->wswg_body,true);
        $criteria->order = 'sort';
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
		if (!empty($this->dt_birthday))
			$this->dt_birthday = Yii::app()->date->toMysql($this->dt_birthday);
		return parent::beforeSave();
	}

	public function afterFind()
	{
		parent::afterFind();
		if ( in_array($this->scenario, array('insert', 'update')) ) { 
			$this->dt_birthday = ($this->dt_birthday !== '0000-00-00' ) ? date('d-m-Y', strtotime($this->dt_birthday)) : '';
		}
	}
}
