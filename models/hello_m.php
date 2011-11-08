<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Message model
 *
 * @author Prajwol Shrestha - Semicolon Developers 
 * @package PyroCMS
 * @subpackage Hello_message module
 * @category Modules
 *
 */
class Hello_m extends MY_Model {
    /**
     * Return an array of groups
     *
     * @access public
     * @param array $params Optional parameters
     * @return array
     */

    public function get_all() {
        $this->db->get('hellos');
        return parent::get_all();

    }

    /**
     * Add a group
     *
     * @access public
     * @param array $input The data to insert
     * @return array
     */
    public function insert($input = array()) {
        return parent::insert(array(
                'name'			=> $input['name'],
                'message'	=> $input['message']
        ));
    }

//	/**
//	 * Update a group
//	 *
//	 * @access public
//	 * @param int $id The ID of the role
//	 * @param array $input The data to update
//	 * @return array
//	 */
    public function update($id = 0, $input = array()) {
        return parent::update($id, array(
                'name'			=> $input['name'],
                'message'	=> $input['message']
        ));
    }
//
//	/**
//	 * Delete a group
//	 *
//	 * @access public
//	 * @param int $id The ID of the group to delete
//	 * @return
//	 */
    public function delete($id = 0) {
        $this->db->where('id', $id);
        $this->db->delete('hellos');
    }
 // to display messages in frontend
	protected $_table = 'hellos';

	function get()
	{
		$this->db->select('name,message');
        	return $this->db->get('hellos')->result();
//                $query = $this->db->get('hellos')->result();
//                return $query;
	}

}