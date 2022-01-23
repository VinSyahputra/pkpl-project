<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbSipur extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id_ruangan'	=>	['type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
			'nama_ruangan'	=>	['type' => 'VARCHAR', 'constraint' => 255],
			'created_at'	=>	['type' => 'DATETIME', 'null' => true],
			'updated_at'	=>	['type' => 'DATETIME', 'null' => true],
		]);

		$this->forge->addKey('id_ruangan');
		$this->forge->createTable('tb_ruangan');

		$this->forge->addField([
			'id_user'		=>	['type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
			'nip'			=>	['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
			'nama'			=>	['type' => 'VARCHAR', 'constraint' => 255],
			'username'		=>	['type' => 'VARCHAR', 'constraint' => 12],
			'password'		=>	['type' => 'VARCHAR', 'constraint' => 255],
			'level'			=>	['type' => 'SMALLINT', 'constraint' => 1],
			'created_at'	=>	['type' => 'DATETIME', 'null' => true],
			'updated_at'	=>	['type' => 'DATETIME', 'null' => true],
		]);

		$this->forge->addKey('id_user');
		$this->forge->createTable('tb_user');

		$this->forge->addField([
			'id'			=>	['type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
			'id_ruangan'	=>	['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
			'id_user'		=>	['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
			'tanggal'		=>	['type' => 'DATE', 'null' => true],
			'waktu_mulai'	=>	['type' => 'VARCHAR', 'constraint' => 255],
			'waktu_berakhir' =>	['type' => 'VARCHAR', 'constraint' => 255],
			'unit'			=>	['type' => 'VARCHAR', 'constraint' => 255],
			'acara'			=>	['type' => 'VARCHAR', 'constraint' => 255],
			'kontak'		=>	['type' => 'VARCHAR', 'constraint' => 15],
			'keterangan'	=>	['type'	=>	'VARCHAR', 'constraint' => 255],
			'created_at'	=>	['type' => 'DATETIME', 'null' => true],
			'updated_at'	=>	['type' => 'DATETIME', 'null' => true],
		]);

		$this->forge->addKey('id');
		$this->forge->addForeignKey('id_ruangan', 'tb_ruangan', 'id_ruangan', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_user', 'tb_user', 'id_user', 'CASCADE', 'CASCADE');
		$this->forge->createTable('tb_data');
	}

	public function down()
	{
		//
	}
}
