<?php
/**
 * Миграция m140421_083003_addFileToRsume
 *
 * @property string $prefix
 */
 
class m140421_083003_addFileToRsume extends CDbMigration
{
    // таблицы к удалению, можно использовать '{{table}}'
	private $table = '{{resume}}';
 
    public function safeUp()
    {
        $this->addColumn($this->table, 'file', "string COMMENT 'Файл резюме'");
 
    }
 
    public function safeDown()
    {
        $this->dropColumn($this->table, 'file');
    }
}