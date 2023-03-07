<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RaporServer extends Migration
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

                'baslik' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => false,
                ],

                'aciklama' => [
                    'type' => 'Text',
                    'constraint' => 255,
                    'null' => false,
                ],

                'sql' => [
                    'type' => 'text',
                    'null' => false,
                ],

                'form_adi' => [
                    'type' => 'text',
                    'null' => false,
                ],

            ]
        );

        $this->forge->addKey('id',true);
        $this->forge->createTable('raporserver');

    }

    public function down()
    {
        //
    }
}
