<?php

namespace core;

use lib\Db;

class  Model {

	protected $db;
	
	public function __construct() {
		
		$this->db= new Db;
		
		
	}
	     
	
}
