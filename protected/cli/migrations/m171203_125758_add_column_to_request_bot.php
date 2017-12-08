<?php
/**
 * Миграция m171203_125758_add_column_to_request_bot
 *
 * @property string $prefix
 */
 
class m171203_125758_add_column_to_request_bot extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{requests_bot}}', 'confirmed', "tinyint");
 
    }
 
    public function safeDown()
    {
        $this->dropColumn('{{requests_bot}}', 'confirmed');
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