<?php
class welcome extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->load->view( 'index' );
    }
	
	function ajax() {
		$Param = $_POST;
		$Action = (isset($_POST['Action'])) ? $_POST['Action'] : '';
		
		if ($Action == 'ModifyCityTime') {
			$Param['city_time'] = $this->City_model->GetTime($Param['city_time']);
			$this->City_model->Update($Param);
		} else if ($Action == 'UpdateCity') {
			$this->City_model->Update($Param);
		} else if ($Action == 'update_troop') {
			$city = $this->City_model->GetByID(array( 'city_id' => $_POST['city_id'] ));
			$this->User_model->Update(array( 'user_id' => $city['user_id'], 'user_troop' => $_POST['user_troop'] ));
		}
		else if ($Action == 'UpdateTable') {
			$this->City_model->Truncate();
			$array_file = file($this->config->item('base_path') . '/json.txt');
			foreach ($array_file as $raw) {
				$record = (array)json_decode(trim($raw));
				if ($record['table'] == 'user') {
					$this->User_model->Update($record);
				} else if ($record['table'] == 'city') {
					$record['city_id'] = 0;
					$this->City_model->Update($record);
				}
			}
		}
		else if ($Action == 'CommitChange') {
			$String = '';
			
			// update user
			$ArrayUser = $this->User_model->GetArray(array('limit' => 1000));
			foreach ($ArrayUser as $User) {
				$param['table'] = 'user';
				$param['user_id'] = $User['user_id'];
				$param['user_power'] = $User['user_power'];
				$param['user_troop'] = $User['user_troop'];
				$String .= json_encode($param) . "\n";
			}
			
			// update city
			$ArrayCity = $this->City_model->GetArray(array('limit' => 1000));
			foreach ($ArrayCity as $City) {
				// delete mail & password
				if (isset($City['user_email'])) {
					unset($City['user_email']);
				}
				if (isset($City['user_pass'])) {
					unset($City['user_pass']);
				}
				
				$City['table'] = 'city';
				$String .= json_encode($City) . "\n";
			}
			Write($this->config->item('base_path') . '/json.txt', $String);
		}
	}
}