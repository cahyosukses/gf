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
		} else if ($Action == 'UpdateTable') {
			$ArrayCity = file($this->config->item('base_path') . '/Godfather.txt');
			
			if (count($ArrayCity) > 10) {
				$this->City_model->Truncate();
				foreach ($ArrayCity as $City) {
					if (empty($City)) {
						continue;
					}
					
					$City = (array)json_decode(trim($City));
					$City['city_id'] = 0;
					$this->City_model->Update($City);
				}
			}
		} else if ($Action == 'CommitChange') {
			$String = '';
			$ArrayCity = $this->City_model->GetArray(array('limit' => 1000));
			foreach ($ArrayCity as $City) {
				$String .= json_encode($City) . "\n";
			}
			Write($this->config->item('base_path') . '/Godfather.txt', $String);
		}
	}
}