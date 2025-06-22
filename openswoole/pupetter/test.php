<?php

OpenSwoole\Coroutine::run(function(){
	for($i = 0; $i < 1; $i++) {
		Go(function() use($i){
			shell_exec('node ex.js');	
		});
	}	
});
