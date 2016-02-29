<?php
/**
 * Миграция m160225_181203_add_name_to_calculateCost
 *
 * @property string $prefix
 */
 
class m160225_181203_add_name_to_calculateCost extends CDbMigration
{
    // таблицы к удалению, можно использовать '{{table}}'
	public function safeUp()
    {
        $this->addColumn('{{calculate_cost}}', 'name', "string");
 
    }
 
    public function safeDown()
    {
        $this->dropColumn('{{calculate_cost}}', 'name');
    }
}