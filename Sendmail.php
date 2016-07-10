<?php
class Controller_Sendmail extends Controller
{
  public function action_index()
     {
		require 'PHPMailerAutoload.php';

		$mail = new PHPMailer;
		$mail->isSMTP();                                     
		$mail->Host = 'smtp.gmail.com'; 
		$mail->SMTPAuth = true;                               
		$mail->Username = 'sanchikatest1@gmail.com';                
		$mail->Password = 'lanterngreen';                           
		$mail->SMTPSecure = 'tls';                          
		$mail->Port = 587;                                  
		$mail->From = 'sanchikatest1@gmail.com';
		$mail->FromName = 'Sanchika';
	  
		$view = View::factory('send_view');
		$this->response->body($view);

		if (isset($_POST["to"])) { $mail->addAddress($_POST['to'], 'Sanchika'); } else return ; 
		if (isset($_POST["subject"])) { $mail->Subject=$this->request->post('subject'); } else return; 
		if (isset($_POST["body"])) {  $mail->Body=$this->request->post('body'); } else return; 

		if(!$mail->send()) 
		{
			$message= 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
		} else 
		{
			$message= 'Message has been sent';
			$this->response->body($view);
		}
		$view_status= View::factory('send_view1')->set('message',$message); 
		$this->response->body($view_status);

	  }
}
