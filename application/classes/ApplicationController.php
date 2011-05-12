<?php
class ApplicationController extends MoorActionController
{
	protected $data = array();
	
	protected function afterAction()
	{
		render($this->data);
	}
}
