<?php 
	/*Connect to mysql server*/ 
	define("DB_SERVER","localhost");
	define("DB_USER","root");
	define("DB_PASSWORD","");
	define("DB_DATABASE","cv_management");
        $link = mysqli_connect('localhost', 'root', '', 'cv_management');
	
	/*Check link to the mysql server*/ 
	if(!$link){ 
		die('Failed to connect to server: ' . @mysql_error());
	} 
	else{
		/*Select database*/ 
        $db = mysqli_select_db($link,'cv_management');
		if(!'cv_management'){
			die("Unable to select database"); 
		}
		else{
			$count=0;
			if ($_POST['login-submit'] == 'Login'){ 
			//Collect POST values 
				$username = $_POST['username']; 
				$password = $_POST['password']; 
				if($username && $password){ 
					//$password = hash('sha512',$password);
				
					//Create query (if you have a Logins table the you can select login id and password from there)
					$query="SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
					//Execute query 
                $result=mysqli_query($link,$query);	
					
					//Check whether the query was successful or not 
					while ($row = mysqli_fetch_assoc($result)){ 
						if($row['username']==$username && $row['password']==$password)
							$count=1;
					}
					
					
				}
				else{ 
					//Login failed 
					//include('incorrectpassword.php'); 
					//header('location: passwordincorrect'); 
					//exit(); 
				} 
			} 
			
			//if query was successful it should fetch 1 matching record from the table. 
			//if( $count == 1){ 
			
				//Login successful set session variables and redirect to main page. 
				session_start(); 
				$_SESSION['IS_ADMIN'] = 1;
				$_SESSION['IS_AUTHENTICATED'] = 1;
				echo 'authenticated';
				$query="SELECT aid FROM admins WHERE admins.username = '$username'";
                $result=mysqli_query($link,$query);	
				$mid = mysqli_fetch_assoc($result);
				$query1="SELECT * FROM admins WHERE admins.username = '$username' && admins.password = '$password'";
                $result1=mysqli_query($link,$query1);	
				$row1 = mysqli_fetch_assoc($result1);
				
				session_regenerate_id();
				
				$_SESSION['sess_user_id'] = $row1['aid'];
				$_SESSION['sess_username'] = $row1['username'];
				session_write_close();
				header('location: adminprofile.php');
				/*echo $_SESSION['sess_userrole'];
				session_write_close();
				
				
				if( !$_SESSION['sess_userrole'] == 'admin'){
					
					header('location: studentprofileedit.php');
				
				echo $_SESSION['sess_userrole'];
				}else{
				header('Location: adminprofile.php');
				
				}*/
              
			/*} 
			else{ 
				//Login failed 
				include('incorrectpassword.php'); 
				header('location: passwordincorrect'); 
				exit(); 
			} */
			
		} 
		
	}	
	

?>
