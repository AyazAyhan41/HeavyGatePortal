<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Arackayit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kayit_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'kayit_tip' => [
                'type' => 'VARCHAR'
            ]
        ]);

    }

    public function down()
    {
        //
    }
}
