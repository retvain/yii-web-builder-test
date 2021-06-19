<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 */
class m210619_101016_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'text' => $this->text(),
            'published_at' => $this->boolean()->notnull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-comments-user_id}}',
            '{{%comments}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-comments-user_id}}',
            '{{%comments}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-comments-user_id}}',
            '{{%comments}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-comments-user_id}}',
            '{{%comments}}'
        );

        $this->dropTable('{{%comments}}');
    }
}
