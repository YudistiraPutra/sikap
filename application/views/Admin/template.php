<?php

if(isset($header)) :
	$this->load->view($header);
endif;

// if(isset($navbar)) :
// 	$this->load->view($navbar);
// endif;

if(isset($sidebar)) :
	$this->load->view($sidebar);
endif;

$this->load->view($content);

if(isset($footer)) :
	$this->load->view($footer);
endif;