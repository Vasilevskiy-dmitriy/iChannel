<?php
	namespace core;
	
	class Controller
	{
		public $layout = 'default';
		
		public  function render($view, $data = []) {
			return new Page($this->layout, $this->title=NULL, $view, $data);
		}
	}
