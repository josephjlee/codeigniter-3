<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_templater {

	private $CI;

	public function __construct(){
		$this->CI =& get_instance();
	}

	/*Frontend Templater*/
	public function frontend($view, $data = array()){
		$e_data = array();
		$t_data = $this->CI->web_global->default_data();
		$m_data = array_merge($t_data, $data);
		$this->CI->parser->parse('common/header', $m_data);
		$this->CI->parser->parse($view, $m_data);
		$this->CI->parser->parse('common/footer', $m_data);
	}

	/*Backend Templater*/
	public function backend($view, $data = array()){

		$e_data = array();
		$t_data = $this->CI->web_global->default_data();
		$m_data = array_merge($t_data, $data);

		$this->CI->parser->parse('admin/inc/header', $m_data);
		if ($view != 'admin/index') { $this->CI->parser->parse('admin/inc/frame', $m_data); }
		$this->CI->parser->parse($view, $m_data);
		$this->CI->parser->parse('admin/inc/footer', $m_data);
	}
}
