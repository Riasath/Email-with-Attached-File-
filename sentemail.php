<?php
	session_start();
	$mypassword = "";
 	$sender = $_POST['email'];
	$Subject = $_POST['Subject'];
	$body = $_POST['body'];
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
	$new_size = $file_size/1024;  
	$new_file_name = strtolower($file);
	$final_file=str_replace(' ','-',$new_file_name);
	move_uploaded_file($file_loc,$folder.$final_file);
	$path_of_uploaded_file = $folder . $final_file;
	
	
	
	

	require_once 'mailer/class.phpmailer.php';
	$mail = new PHPMailer();
	
	$message ="<html><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'><body>";
	$message .= "<div class='container'><header><div class='page-header'><center><h2>'";
	$message .= $Subject;
	$message .= "</h2></center></div></header><section><div class='jumbotron'><p>'";
	$message .= $body;
	$message .= "</p></div></section><footer><div class='page-header'><h6 >This system Developed By : Shuvro Hosain  <small>BETA 1.00 TESTING</small></h6></div></footer></div></body></html>";


	
			try
			{
				$mail->IsSMTP(); 
				$mail->isHTML(true);
				$mail->SMTPDebug  = 0;                     
				$mail->SMTPAuth   = true;                  
				$mail->SMTPSecure = "ssl";                 
				$mail->Host       = "smtp.gmail.com";      
				$mail->Port       = 465;             
				$mail->AddAddress($sender);
				$mail->Username   ="shuvrohosain@gmail.com";  
				$mail->Password   =$mypassword;            
				$mail->SetFrom("shuvrohosain@gmail.com","Shuvro");
				$mail->AddReplyTo("shuvrohosain@gmail.com","Shuvro");
				$mail->Subject    = $Subject;
				$mail->Body 	  = $message;
				$mail->AltBody    = $message;
				$file_to_attach = $path_of_uploaded_file;
				$mail->AddAttachment( $file_to_attach , $final_file );
				if($mail->Send())
				{
					
					
					$_SESSION["IdValidation"] = "Your Email is successfully send to $sender ";
					header('Location: '.'index.php');
					
				}
			}
			catch(phpmailerException $trr)
			{
				$msg = $trr->errorMessage();
				$_SESSION["IdValidation"] = "Email Fail To send, Cause $msg ";
					header('Location: '.'index.php');
			}

?>




