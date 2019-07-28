<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%response}}`.
 */
class m190719_113827_create_response_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%response}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'phone' => $this->integer(),
            'salary' => $this->integer(),
            'vacancy_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-vacancy_id',
            'response',
            'vacancy_id'
        );

        $this->addForeignKey(
            'fk-vacancy_id',
            'response',
            'vacancy_id',
            'vacancies',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%response}}');
    }
}
