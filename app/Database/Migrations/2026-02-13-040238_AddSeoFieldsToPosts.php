<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSeoFieldsToPosts extends Migration
{
    public function up()
    {
        $fields = [
            'meta_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'meta_description' => [
                'type' => 'TEXT', // Descripción larga para Google
                'null' => true,
            ],
            'keywords' => [
                'type'       => 'VARCHAR',
                'constraint' => '255', // Palabras clave separadas por coma
                'null'       => true,
            ],
        ];
        $this->forge->addColumn('posts', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('posts', ['meta_title', 'meta_description', 'keywords']);
    }
}
