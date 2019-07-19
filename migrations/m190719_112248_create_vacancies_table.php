<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vacancies}}`.
 */
class m190719_112248_create_vacancies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vacancies}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'date' => $this->date(),
            'city' => $this->string(),
            'company' => $this->string(),
            'salary' => $this->integer(),
            'description' => $this->text(),
            'image' => $this->string(),
            'response_id' => $this->integer(),
            'status' => $this->integer(),
            'category_id' => $this->integer(),
            'user_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vacancies}}');
    }
}
