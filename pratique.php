<?php

$word = 'jean';

	if(preg_match('@^(\d)@', $word)){
	
		echo "match";
	}
	else {
		echo 'not_match';
	}


?> 
