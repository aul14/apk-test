<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Users extends CI_Migration
{

    public function up()
    {
        ## TABLE: tbl_group
        $this->dbforge->add_field(array(
            'id_group' => array(
                'type'  => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_group' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'keterangan' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'create_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'create_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'change_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'change_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id_group', TRUE);
        $this->dbforge->create_table('tbl_group');
        $this->db->insert_batch('tbl_group', [
            [
                // 'id_group' => '1',
                'nama_group' => 'administrator',
                'keterangan' => 'administrator'
            ],
            [

                'nama_group' => 'user',
                'keterangan' => 'user'
            ]
        ]);

        ## TABLE: tbl_login
        $this->dbforge->add_field(array(
            'id_login' => array(
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'id_group' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE
            ),
            'id_akses' => array(
                'type' => 'BIGINT',
                'null' => TRUE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 120,
                'null' => TRUE
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => FALSE
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE
            ),
            'user_status' => array(
                'type' => 'TINYINT',
                'null' => TRUE
            ),
            'create_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 120,
                'null' => TRUE
            ),
            'create_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'change_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'change_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'last_access' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id_login', TRUE);
        $this->dbforge->create_table('tbl_login');
        $this->db->insert_batch('tbl_login', [
            [
                // 'id_login' => '1',
                'id_group' => '1',
                'id_akses' => '1',
                'username' => 'admin',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'user_status' => '3'
            ]
        ]);


        ## TABLE: tbl_module
        $this->dbforge->add_field(array(
            'id_module' => array(
                'type'  => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_module' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => TRUE
            ),
            'url' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => TRUE
            ),
            'logo' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => TRUE
            ),
            'submodule' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => TRUE
            ),
            'urutan' => array(
                'type' => 'INT',
                'null' => FALSE
            ),
            'create_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'create_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'change_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'change_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id_module', TRUE);
        $this->dbforge->create_table('tbl_module');
        $this->db->insert_batch('tbl_module', [
            [
                // 'id_module' => '1',
                'nama_module' => 'Dashboard',
                'url' => 'dashboard',
                'logo' => 'fa-desktop',
                'submodule' => 'Tidak',
                'urutan' => '1'
            ],
            [
                // 'id_module' => '2',
                'nama_module' => 'System Setting',
                'url' => 'user',
                'logo' => 'fa-cogs',
                'submodule' => 'Ya',
                'urutan' => '100'
            ]
        ]);

        ## TABLE: tbl_role
        $this->dbforge->add_field(array(
            'id_role' => array(
                'type'  => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'id_group' => array(
                'type' => 'BIGINT',
                'null' => FALSE
            ),
            'id_module' => array(
                'type' => 'BIGINT',
                'null' => FALSE
            ),
            'id_submodule' => array(
                'type' => 'BIGINT',
                'null' => FALSE
            ),
            'view_module' => array(
                'type' => 'TINYINT',
                'null' => TRUE
            ),
            'c' => array(
                'type' => 'TINYINT',
                'null' => TRUE
            ),
            'r' => array(
                'type' => 'TINYINT',
                'null' => TRUE
            ),
            'u' => array(
                'type' => 'TINYINT',
                'null' => TRUE
            ),
            'd' => array(
                'type' => 'TINYINT',
                'null' => TRUE
            ),
            'create_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'create_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'change_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'change_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));

        $this->dbforge->add_key('id_role', TRUE);
        $this->dbforge->create_table('tbl_role');
        $this->db->insert_batch('tbl_role', [
            [
                'id_group'      => '1',
                'id_module'     => '1',
                'id_submodule'  => '1',
                'view_module'   => '1',
                'c' => '1',
                'r' => '1',
                'u' => '1',
                'd' => '1',
            ],
            [
                'id_group'      => '1',
                'id_module'     => '2',
                'id_submodule'  => '2',
                'view_module'   => '1',
                'c' => '1',
                'r' => '1',
                'u' => '1',
                'd' => '1',
            ],
            [
                'id_group'      => '1',
                'id_module'     => '2',
                'id_submodule'  => '3',
                'view_module'   => '1',
                'c' => '1',
                'r' => '1',
                'u' => '1',
                'd' => '1',
            ],
            [
                'id_group'      => '1',
                'id_module'     => '2',
                'id_submodule'  => '4',
                'view_module'   => '1',
                'c' => '1',
                'r' => '1',
                'u' => '1',
                'd' => '1',
            ],
            [
                'id_group'      => '1',
                'id_module'     => '2',
                'id_submodule'  => '5',
                'view_module'   => '1',
                'c' => '1',
                'r' => '1',
                'u' => '1',
                'd' => '1',
            ]
        ]);

        ## TABLE: tbl_submodule
        $this->dbforge->add_field(array(
            'id_submodule' => array(
                'type'  => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'id_module' => array(
                'type' => 'BIGINT',
                'null' => FALSE
            ),
            'nama_submodule' => array(
                'type' => 'VARCHAR',
                'constraint'    => 200,
                'null' => TRUE
            ),
            'url_sub' => array(
                'type' => 'VARCHAR',
                'constraint'    => 200,
                'null' => TRUE
            ),
            'jenis_form' => array(
                'type' => 'VARCHAR',
                'constraint'    => 200,
                'null' => TRUE
            ),
            'urutan' => array(
                'type' => 'INT',
                'null' => TRUE
            ),
            'create_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'create_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'change_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'change_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id_submodule', TRUE);
        $this->dbforge->create_table('tbl_submodule');
        $this->db->insert_batch('tbl_submodule', [
            [
                'id_module'         => '1',
                'nama_submodule'    => 'Dashboard',
                'url_sub'           => 'dashboard',
                'jenis_form'        => 'Module',
                'urutan'            => '1'
            ],
            [
                'id_module'         => '2',
                'nama_submodule'    => 'User Login',
                'url_sub'           => 'userlogin',
                'jenis_form'        => 'Input',
                'urutan'            => '1'
            ],
            [
                'id_module'         => '2',
                'nama_submodule'    => 'User Group',
                'url_sub'           => 'group',
                'jenis_form'        => 'Input',
                'urutan'            => '2'
            ],
            [
                'id_module'         => '2',
                'nama_submodule'    => 'Module',
                'url_sub'           => 'module',
                'jenis_form'        => 'Input',
                'urutan'            => '3'
            ],
            [
                'id_module'         => '2',
                'nama_submodule'    => 'Submodule',
                'url_sub'           => 'submodule',
                'jenis_form'        => 'Input',
                'urutan'            => '4'
            ]
        ]);

        ## TABLE: tbl_userakses
        $this->dbforge->add_field(array(
            'id_akses' => array(
                'type'  => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_akses' => array(
                'type' => 'VARCHAR',
                'constraint'    => 50,
                'null' => FALSE
            ),
            'keterangan' => array(
                'type' => 'VARCHAR',
                'constraint'    => 50,
                'null' => TRUE
            ),
            'create_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'create_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'change_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'change_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));

        $this->dbforge->add_key('id_akses', TRUE);
        $this->dbforge->create_table('tbl_userakses');
        $this->db->insert_batch('tbl_userakses', [
            [
                'nama_akses'    => 'super admin',
                'keterangan'    => 'super admin'
            ]
        ]);
    }

    public function down()
    {
        $this->dbforge->drop_table('tbl_group');
        $this->dbforge->drop_table('tbl_login');
        $this->dbforge->drop_table('tbl_module');
        $this->dbforge->drop_table('tbl_role');
        $this->dbforge->drop_table('tbl_submodule');
        $this->dbforge->drop_table('tbl_userakses');
    }
}
