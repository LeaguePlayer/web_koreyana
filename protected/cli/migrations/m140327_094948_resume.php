<?php
/**
 * Миграция m140327_094948_resume
 *
 * @property string $prefix
 */
 
class m140327_094948_resume extends CDbMigration
{
    // таблицы к удалению, можно использовать '{{table}}'
	private $dropped = array('{{resume}}');
 
    public function safeUp()
    {
        $this->_checkTables();
 
        $this->createTable('{{resume}}', array(
            'id' => 'pk', // auto increment

			'name' => "string COMMENT 'ФИО'",
            'job_type' => "string COMMENT 'На какую должность вы претендуете'",
            'salary' => "string COMMENT 'Желаемый доход'",
            'dt_birthday' => "string COMMENT 'Дата и место рождения'",
            'register_adres' => "string COMMENT 'Адрес постоянной регистрации'",
            'adres_fact' => "string COMMENT 'Адрес проживания'",
            'contacts' => "string COMMENT 'Контактная информация:тел., e-mail'",
            'family_status' => "string COMMENT 'Семейное положение, дети'",
            'height' => "string COMMENT 'Рост (см)'",
            'size' => "string COMMENT 'Размер'",
            'institution' => "string COMMENT 'Учебное заведение'",
            'faculty' => "string COMMENT 'Факультет'",
            'speciality' => "string COMMENT 'Специальность'",
            'study_form' => "string COMMENT 'Форма обучения'",
            'knowledge' => "text COMMENT 'Компьютерные навыки и знания'",
            'wrok_duration' => "string COMMENT 'Период работы'",
            'company_name' => "string COMMENT 'Название компании'",
            'company_sphere' => "string COMMENT 'Сфера деятельности компании'",
            'post' => "string COMMENT 'Должность или профессия'",
            'timetable' => "string COMMENT 'График работы'",
            'work_duties' => "text COMMENT 'Должностные обязанности и достижения'",
            'motivate' => "string COMMENT 'Мотивы и стимулы, побудившие Вас прийти именно к нам'",
            'yours_timetable' => "string COMMENT 'Какой график работы Вас устроиит? Ваше отношение к возможным командировкам?'",
            'postAfterYear' => "string COMMENT 'Как Вы представляете свое положение в нашей компании через год?'",
            'recommendation' => "string COMMENT 'Кто из Ваших бывших коллег и руководителей может дать Вам устную рекомендацию или рекомендательное письмо?'",
            
			'status' => "tinyint COMMENT 'Статус'",
			'sort' => "integer COMMENT 'Вес для сортировки'",
            'create_time' => "datetime COMMENT 'Дата создания'",
            'update_time' => "datetime COMMENT 'Дата последнего редактирования'",
        ),
        'ENGINE=MyISAM DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci');
    }
 
    public function safeDown()
    {
        $this->_checkTables();
    }
 
    /**
     * Удаляет таблицы, указанные в $this->dropped из базы.
     * Наименование таблиц могут сожержать двойные фигурные скобки для указания
     * необходимости добавления префикса, например, если указано имя {{table}}
     * в действительности будет удалена таблица 'prefix_table'.
     * Префикс таблиц задается в файле конфигурации (для консоли).
     */
    private function _checkTables ()
    {
        if (empty($this->dropped)) return;
 
        $table_names = $this->getDbConnection()->getSchema()->getTableNames();
        foreach ($this->dropped as $table) {
            if (in_array($this->tableName($table), $table_names)) {
                $this->dropTable($table);
            }
        }
    }
 
    /**
     * Добавляет префикс таблицы при необходимости
     * @param $name - имя таблицы, заключенное в скобки, например {{имя}}
     * @return string
     */
    protected function tableName($name)
    {
        if($this->getDbConnection()->tablePrefix!==null && strpos($name,'{{')!==false)
            $realName=preg_replace('/{{(.*?)}}/',$this->getDbConnection()->tablePrefix.'$1',$name);
        else
            $realName=$name;
        return $realName;
    }
 
    /**
     * Получение установленного префикса таблиц базы данных
     * @return mixed
     */
    protected function getPrefix(){
        return $this->getDbConnection()->tablePrefix;
    }
}