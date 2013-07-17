<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require_once APPPATH.'/libraries/AR_class.php';

class User extends AR_class{
    function __construct() {
        parent::__construct();
        $this->table = 'users';
    }
	
}