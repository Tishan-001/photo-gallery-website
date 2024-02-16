<?php 

Class Upload_file
{
	// Method to handle the upload process, accepting POST and FILES arrays as parameters
	public function upload($POST,$FILES)
	{

		$_SESSION['error'] = "";

		$allowed[] = 'image/jpeg';

		// Check if a file was uploaded without errors
		if($FILES['file']['name'] != "" && $FILES['file']['error'] == 0)
		{

			// Check if the file's MIME type is in the list of allowed types
			if(in_array($FILES['file']['type'], $allowed))
			{

			}else{

				// If the file type is not allowed, set an error message
				$_SESSION['error'] = "Only Jpegs are allowed!";
			}
		}

		// Proceed with the upload if there are no errors
		if($_SESSION['error'] == "")
		{

			// Set the folder where files will be uploaded
			$folder = "uploads/";
			// Create the folder if it doesn't already exist
			if(!file_exists($folder))
			{
				mkdir($folder,0777,true);
			}

			// Define the destination path for the uploaded file
			$destination = $folder . $FILES['file']['name'];

			// Move the uploaded file from the temporary location to the destination
			move_uploaded_file($FILES['file']['tmp_name'], $destination);

			// Prepare an array with the file's metadata, escaping necessary data for security
			$arr['title'] = esc($POST['title']);
			$arr['price'] = esc($POST['price']);
			$arr['description'] = esc($POST['description']);
			$arr['date'] = date("Y-m-d H:i:s");
			$arr['userid'] = 1;
			$arr['image'] = $destination;
			$arr['views'] = 0;
			$arr['url_address'] = get_random_string_max(60);

			// Create a new Database instance
			$DB = new Database();

			// Prepare the SQL query to insert the file's metadata into the database
			$query = "INSERT INTO images (title, userid, date, image, views, url_address, price, description) VALUES (:title, :userid, :date, :image, :views, :url_address, :price, :description)";
			$DB->write($query,$arr);

			header("Location: ". ROOT . "photos");
			die;
			
		}

	}
}