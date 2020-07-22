<?php

class m200720_095959_create_user_table extends CDbMigration
{

    public function up()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `user` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `password` varchar(255) NOT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
        Yii::app()->db->createCommand($sql)->execute();
    }
 
    public function down()
    {
        $sql = "DROP TABLE user";
        Yii::app()->db->createCommand($sql)->execute();
    }	
	
	
	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}