<?php

	function statusAvailable($status) {
		if ($status ==  App\Libs\Configs\StatusConfig::CONST_AVAILABLE) {
			return true;
		} 
		return false;
	}

	function statusDisable($status) {
		if ($status ==  App\Libs\Configs\StatusConfig::CONST_DISABLE) {
			return true;
		} 
		return false;
	}