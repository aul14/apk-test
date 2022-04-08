<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Api_Keys extends CI_Migration
{

    public function up()
    {
        ## TABLE: API KEYS 
        $this->dbforge->add_field(array(
            'id' => array(
                'type'  => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'api_key' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'controller' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'date_created' => array(
                'type' => 'DATE',
                'null' => TRUE
            ),
            'date_modified' => array(
                'type' => 'DATE',
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('api_keys');
    }

    public function down()
    {
        $this->dbforge->drop_table('api_keys');
    }
}
