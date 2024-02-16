<?php 

Class Home extends Controller
{

	public function index()
	{
		$data['page_title'] = "Home";
		$this->view("catalog/index",$data);
	}

}