<?php
/**
 * Миграция m171221_085334_add_column_request_bot
 *
 * @property string $prefix
 */
 
class m171221_085334_add_column_request_bot extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{requests_bot}}', 'id_office', "tinyint");
 
    }
 
    public function safeDown()
    {
        $this->dropColumn('{{requests_bot}}', 'id_office');
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