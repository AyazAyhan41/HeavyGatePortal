<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Telefon extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true
                ],



                'first_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => false,
                ],

                'sur_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => false,
                ],

                'phone' => [
                    'type' => 'VARCHAR',
                    'constraint' => 5,
                    'null' => false,
                    'unique' => true
                ],

                'status' => [
                    'type' => 'ENUM',
                    'constraint' => ['ACTIVE','PASSIVE'],
                    'default' => 'PASSIVE'
                ],

                'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
                'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                'deleted_at' => [
                    'type' => 'DATETIME',
                    'null' => true
                ]
            ]
        );
        $this->forge->addKey('id',true);
        $this->forge->createTable('telefon');
    }

    public function down()
    {
        $this->forge->dropTable('telefon');
    }
}
