<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Api_Limit extends CI_Migration
{

    public function up()
    {
        ## TABLE: API LIMIT 
        $this->dbforge->add_field(array(
            'id' => array(
                'type'  => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'BIGINT',
                'null' => TRUE
            ),
            'id_login' => array(
                'type' => 'BIGINT',
                'null' => TRUE
            ),
            'uri' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'class' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'method' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'time' => array(
                'type' => 'TEXT',
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('api_limit');
    }

    public function down()
    {
        $this->dbforge->drop_table('api_limit');
    }
}
