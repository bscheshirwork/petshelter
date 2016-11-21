<?php

use yii\db\Migration;

/**
 * Handles the creation for table `pets`.
 */
class m161121_145307_create_pets_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('pets', [
            'id' => $this->primaryKey(),
            'genusId' => $this->integer(),
            'name' => $this->integer(),
        ], $this->db->driverName === 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB' : null);
        $this->addForeignKey('fk_pets_2_genus', 'pets', 'genusId', 'genus', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_pets_2_genus', 'pets');
        $this->dropTable('pets');
    }
}
