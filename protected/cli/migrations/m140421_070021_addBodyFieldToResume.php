<?php
/**
 * Миграция m140421_070021_addBodyFieldToResume
 *
 * @property string $prefix
 */
 
class m140421_070021_addBodyFieldToResume extends CDbMigration
{
    // таблицы к удалению, можно использовать '{{table}}'
	private $table = '{{resume}}';
 
    public function safeUp()
    {
        $this->addColumn($this->table, 'wswg_body', "text COMMENT 'Резюме'");
 
    }
 
    public function safeDown()
    {
        $this->dropColumn($this->table, 'wswg_body');
    }
}