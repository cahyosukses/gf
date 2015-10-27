<?php

class faucet extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->load->view( 'faucet' );
    }
	
	function action() {
		$action = (isset($_POST['action'])) ? $_POST['action'] : '';
		unset($_POST['action']);
		
		if ($action == 'collect') {
			$faucet = $this->faucet_model->get_by_id($_POST);
			
			$param_update['id'] = $faucet['id'];
			$param_update['active_time'] = AddDate($this->config->item('date_time_format'), ($faucet['delay_time'] + 5).' Minutes');
			$result = $this->faucet_model->update($param_update);
		}
		
		echo json_encode($result);
	}
}
