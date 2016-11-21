<?php

use yii\db\Migration;

/**
 * Handles the creation for table `genus`.
 */
class m161121_142009_create_genus_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('genus', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ], $this->db->driverName === 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB' : null);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('genus');
    }
}
