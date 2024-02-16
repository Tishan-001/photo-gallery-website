<?php 

Class Load_images
{

	public function get_images($find = '')
	{

		// Create a new Database instance
		$DB = new Database();
		$limit = 16; // Set the maximum number of images to retrieve per page
		$page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Determine the current page number based on the query parameter 'page'
		$page_number = $page_number < 1 ? 1 : $page_number; // Ensure the page number is at least 1

		$offset = ($page_number - 1) * $limit; // Calculate the offset for the SQL query based on the current page

		if($find == ''){
			// If no search term is provided, select all images from the database, ordered by their ID in descending order
			$query = "select * from images order by id desc limit $limit offset $offset";
			return $DB->read($query);
		}else{
            		// If a search term is provided, escape it for security, then query for images with titles matching the search term
			$find = esc($find);
			$query = "select * from images where title like '%$find%' order by id desc limit $limit offset $offset";
			return $DB->read($query);
		}
	}

    	// Method to retrieve the total number of images in the database
	public function get_total()
	{
        // Create a new Database instance
		$DB = new Database();
		$query = "select * from images";
		return count($DB->read($query)); // Return the count of all images found
	}
	
    	// Method to increment the view count of a single image and retrieve its details
	public function get_single_image($url_address)
	{
        	// Create a new Database instance
		$DB = new Database();
		$query = "update images set views = views + 1 where url_address = :url limit 1"; // Increment the views count for the image with the specified URL address
		$arr['url'] = $url_address; // Bind the URL address to the query parameter
		$DB->write($query,$arr); // Execute the update query

		$query = "select * from images where url_address = :url limit 1"; // Query to retrieve the details of the image with the specified URL address
		$arr['url'] = $url_address; // Re-bind the URL address for the select query
		$data = $DB->read($query,$arr); // Execute the select query
		return $data[0]; // Return the first (and only) image found
	}

}