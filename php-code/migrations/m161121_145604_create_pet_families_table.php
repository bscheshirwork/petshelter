<?php

use yii\db\Migration;

/**
 * Handles the creation for table `pet_families`.
 */
class m161121_145604_create_pet_families_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('pet_families', [
            'id' => $this->primaryKey(),
            'petId' => $this->integer(),
            'userId' => $this->integer(),
            'dateAdoption' => $this->date(),
        ], $this->db->driverName === 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB' : null);
        $this->addForeignKey('fk_pet_families_2_pets', 'pet_families', 'petId', 'pets', 'id');
        $this->addForeignKey('fk_pet_families_2_users', 'pet_families', 'userId', 'users', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_pet_families_2_pets', 'pet_families');
        $this->dropForeignKey('fk_pet_families_2_users', 'pet_families');
        $this->dropTable('pet_families');
    }
}
