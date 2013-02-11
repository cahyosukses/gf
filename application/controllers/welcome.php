<?php

/*
 * Copyright 2011 by ORCA, Jl. Taman Sulfat 7 No 4, Malang, ID
 * All rights reserved
 * 
 * Written By: Herry
 */

/**
 * User controllers
 *
 * @author Herry
 */
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
		}
	}
}

