<?php
/**
 * Миграция m140417_090950_AddFileToVacansy
 *
 * @property string $prefix
 */
 
class m140417_090950_AddFileToVacansy extends CDbMigration
{
   private $table = '{{vacansy}}';
 
    public function safeUp()
    {
        $this->addColumn($this->table, 'file', "string COMMENT 'Резюме'");
 
    }
 
    public function safeDown()
    {
        $this->dropColumn($this->table, 'file');
    }
 
}