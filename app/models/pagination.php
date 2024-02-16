<?php

Class Pagination
{
	// Store the URL parameters
	private $URL = "";

	// Constructor to initialize the URL parameter
	public function __construct()
	{
		$this->URL = $_GET;
	}

	// Method to retrieve the current page number from the URL parameters
	public function current_page_number()
	{
		$page = isset($this->URL['page']) ? (int)$this->URL['page'] : 1;
		return $page;
	}

	// Method to generate a link with the specified page number
	public function generate_link($number)
	{
		// Retrieve the 'url' parameter from the URL parameters, if available
		$url = isset($this->URL['url']) ? $this->URL['url'] : "";
		
		$num = 0;
		foreach ($this->URL as $key => $value) {
			# code...
			$num++;
			// If this is the first parameter, start building the URL with a '?'
			if($num == 1)
			{
 				$url .= "?";
 				if($key != "url")
				{
 					$url .= $key . "=" . $value;
					
				}
				continue;
			}

			// Skip adding the 'url' parameter
			if($key == "url")
			{
				continue;
			}

			// If the parameter is 'page', replace its value with the specified page number
			if($key == "page")
			{
				$url .= "&" . $key . "=" . $number;
				continue;
			}
  
			// For other parameters, append them to the URL
			$url .= "&" . $key . "=" . $value;
		}

		if(!strstr($url, "page=")){
			return ROOT . $url . "page=" . $number;
		}
		return ROOT . $url;
	}

}