<?php


Class User
{
    	// Method for handling the login process
	public function login($POST)
	{
        	// Initialize or clear any existing error message in the session
		$_SESSION['error'] = "";
  
        	// Proceed with login if there are no errors
		if($_SESSION['error'] == "")
		{
            		// Prepare the data array with escaped values for security
 			$arr['email'] = esc($POST['email']);
 			$arr['password'] = esc($POST['password']);
			
            
			$DB = new Database();
            		// Prepare the SQL query to find the user in the database
			$query = "select * from users where email = :email && password = :password limit 1";
            		// Execute the query and store the result
			$data = $DB->read($query,$arr);

            		// Check if the result is an array indicating a successful match
			if(is_array($data)){

                		// Get the first (and should be only) user's data
				$data = $data[0];
				 
                		// Set session variables for user details
				$_SESSION['user_url'] = $data->url_address;
				$_SESSION['user_email'] = $data->email;
                		// Redirect the user to the photos page
				header("Location: ". ROOT . "photos");
				die; // Stop script execution
			}
		}
	}

    	// Method for handling the signup process
	public function signup($POST)
	{
        	// Initialize or clear any existing error message in the session
		$_SESSION['error'] = "";
  
        	// Proceed with signup if there are no errors
		if($_SESSION['error'] == "")
		{
            		// Prepare the data array with escaped values and additional required information
 			$arr['email'] = esc($POST['email']);
 			$arr['password'] = esc($POST['password']);
 			$arr['date'] = date("Y-m-d H:i:s"); // Current date
 			$arr['url_address'] = get_random_string_max(60); // Generate a unique URL address
 			$arr['image'] = ""; // Default image path (empty in this case)

            		// Instantiate a new Database object
			$DB = new Database();
            		// Prepare the SQL query to insert the new user into the database
			$query = "insert into users (email,password,image,url_address,date) values (:email,:password,:image,:url_address,:date)";
            		// Execute the query
			$DB->write($query,$arr);

            		// Redirect the user to the login page
			header("Location: ". ROOT . "login");
			die;
		}
	}

    	// Method for retrieving a single user's data based on their URL address
	public function get_single_user($url_address)
	{
        	// Instantiate a new Database object
		$DB = new Database();
        	// Prepare the SQL query to find the user by their URL address
		$query = "select * from users where url_address = :url limit 1";
		$arr['url'] = $url_address;
        
		$data = $DB->read($query,$arr);
		return $data[0];
	}

    	// Method to check if a user is currently logged in
	public function is_looged_in()
	{
        	// Check if the session contains user details
		if(isset($_SESSION['user_url']) && isset($_SESSION['user_email'])){
			return true;
		}
 
 		return false; 
	}
}
