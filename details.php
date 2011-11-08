<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Hello extends Module {

    public $version = '1.0';

    public function info() {
        return array(
                'name' => array(
                        'en' => 'Hello',
                ),
                'description' => array(
                        'en' => 'Users can can leave a hello message!!',
                ),
                'frontend' => TRUE,
                'backend'  => TRUE,
                //  'menu'	  => 'users'
        );
    }

    public function install() {
        $this->dbforge->drop_table('hello');

        $message = "
			CREATE TABLE IF NOT EXISTS " . $this->db->dbprefix('hello') . " (
				`id` TINYINT NOT NULL AUTO_INCREMENT ,
				`name` VARCHAR( 25 ) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,
				`message` VARCHAR( 200 ) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,
				PRIMARY KEY ( `id` )
				) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_bin;
		";


        if($this->db->query($message) && $this->db->query($default_data)) {
            return TRUE;
        }
    }

    public function uninstall() {
        //it's a core module, lets keep it around
        return FALSE;
    }

    public function upgrade($old_version) {
        // Your Upgrade Logic
        return TRUE;
    }

    public function help() {
        // Return a string containing help info
        // You could include a file and return it here.
        return TRUE;
    }
}
/* End of file details.php */
