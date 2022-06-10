<?php

namespace App\Database\Migrations;

use App\Models\User;
use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'login' => [
                'type' => 'varchar',
                'constraint' => 20,
                'null' => false,
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => 32,
                'null' => false,
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('user');

        $userModel = new User();
        $this->db->table('user')->insert([
            'login' => 'test',
            'password' => $userModel->encodePass('test'),
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
