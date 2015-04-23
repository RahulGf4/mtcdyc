<?php
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */ 
	
	public $metaDescription;
	public $metaKeywords;

	public function getMetaDescription() {
		if(!$this->metaDescription)
		return Yii::app()->settings->getValue('meta_description'); //return default description
		return $this->metaDescription;
	}

	public function getMetaKeywords() {
		if(!$this->metaKeywords)
		return Yii::app()->settings->getValue('meta_keywords'); //return default keywords
		return $this->metaKeywords;
	}
	public function actions()
	{
	return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$user = Yii::app()->session['churchDetails'];
		if($user['id']){
			$this->redirect('register', array());
		}else{
			$this->redirect('login');
		}
	}
	

		public function actionRegister()
	{
		$user = Yii::app()->session['churchDetails'];
		 $users = Yii::app()->db->createCommand("SELECT * FROM users where cid ='".$user['id']."'")->queryRow();
		 $transport = Yii::app()->db->createCommand("SELECT * FROM transport where cid ='".$user['id']."'")->queryRow();
		 $participants = Yii::app()->db->createCommand("SELECT pName FROM participants where cid ='".$user['id']."'")->queryRow();
		 $dataJson = json_decode($participants['pName']);

		$participants = array();
		$j=0;
		while ( $j< count($dataJson)/5) {
			for ($i=0; $i <5 ; $i++) { 
				$participants[$j][$i]=$dataJson[$i+$j*5]->value;
			}
				$j++;
		}
		$this->render('register', array('users'=>$users,'transport'=>$transport,'participants'=>$participants));
	}

		public function actionChurchRegister()
	{
		$email =$_GET['email'];
		$subject='Registered for DYC 2015';
		$pass=$this->generateRandomString(6);
		 $sql = "SELECT * FROM chruch_list where email ='".$_GET['email']."'";
		 $dataReader =  Yii::app()->db->createCommand($sql)->queryRow();
		 if(isset($dataReader['id'])){
		 	echo 1;exit();
		 }else{

		 	 $updateSql = "INSERT INTO chruch_list (email,church_name,pass) VALUES('".$_GET['email']."','".$_GET['parish']."','".$pass."')";
			 $updateSqlExec = Yii::app()->db->createCommand($updateSql)->execute();
			$sql = "SELECT * FROM chruch_list where email ='".$_GET['email']."'";
			$dataReader =  Yii::app()->db->createCommand($sql)->queryRow();
			 Yii::app()->db->createCommand("INSERT INTO users (cid) VALUES('".$dataReader['id']."')")->execute();
			 Yii::app()->db->createCommand("INSERT INTO transport (cid) VALUES('".$dataReader['id']."')")->execute();
			 Yii::app()->db->createCommand("INSERT INTO participants (cid) VALUES('".$dataReader['id']."')")->execute();
			 if($updateSqlExec){
			 	 
				 $content="Hi,<br/><br/>
				 Click <a href='http://www.mtcdyc.com/admin/login'>here</a> to login by using below crendentials,<br/><br/>
				 username - ".$email."<br/>
				 password - ".$pass."
				 <br/><br/>Thanks,<br/>Admin";
				 $from='mtcdyc@gmail.com';
				 $this->sendMail($_GET['email'],$from, $content,$subject);
			 }
			
			 echo 2;exit();

		 }
        }
        public function generateRandomString($length = 10) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}
     	public function actionRegisterDetails()
	{
		$user = Yii::app()->session['churchDetails'];
			if($user['id']){
					$data = json_decode($_POST['datastring']);
					$insertUsers = "UPDATE users SET cid='".$user['id']."',vicarName='".$data[0]->value."',vicarNo='".$data[1]->value."',
					vicarEmail='".$data[2]->value."',youthName='".$data[3]->value."',youthNo='".$data[4]->value."',youthEmail='".$data[5]->value."' WHERE cid ='".$user['id']."'";

					$insertTransport = "UPDATE transport SET arrivalType='".$data[6]->value."',arrivalPlace='".$data[7]->value."',
					arrivalTime='".$data[8]->value."',departType='".$data[9]->value."',departPlace='".$data[10]->value."',
					departTime='".$data[11]->value."',visitorName='".$data[12]->value."',visitorNo='".$data[13]->value."',
					visitorFamily='".$data[14]->value."',noChilds='".$data[15]->value."',noAdults='".$data[16]->value."' WHERE cid ='".$user['id']."'";
				 	$insertUsersCmd = Yii::app()->db->createCommand($insertUsers)->execute();
				    $insertTransportCmd = Yii::app()->db->createCommand($insertTransport)->execute();
			}else{
				echo 1;
			}
			exit;
        }   

        	public function actionPartDetails()
	{
		$user = Yii::app()->session['churchDetails'];

			if($user['id']){
					$data = json_decode($_POST['datastring']);
					$insertUsers = "UPDATE participants SET pName ='".$_POST['datastring']."' WHERE cid ='".$user['id']."'";
				 	$insertUsersCmd = Yii::app()->db->createCommand($insertUsers)->execute();
			}else{
				echo 1;
			}
			exit;
        }   
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		 
		$login =0;
		// if it is ajax validation request
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			$sql = "SELECT * FROM chruch_list where email ='".$_POST['username']."' and pass='".$_POST['password']."'";
			$dataReader =  Yii::app()->db->createCommand($sql)->queryRow();
			// validate user input and redirect to the previous page if valid
			if(isset($dataReader['id'])){
				Yii::app()->session['churchDetails'] = $dataReader;
				$this->redirect(Yii::app()->user->returnUrl);
			}else{
				$login =1;
			}
		}
		// display the login form
		$this->render('login',array('login' => $login));
	}
	
	public function sendMail($to='viduthalai.m@gmail.com', $from='mtcdyc@gmail.com', $content='',$subject='Hi'){
		// Swift Mailer Library
		// Mail Transport$to = "somebody@example.com";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		$headers .= "From:" .$from. "\r\n";
		mail($to,$subject,$content,$headers);	exit();
		
		$message = new YiiMailMessage;
	        $message->subject = $subject;
	        $message->setBody($content, 'text/html');                
	        $message->addTo($to);
	        $message->from = $from;   
	        $sent= Yii::app()->mail->send($message);      
	        if($sent){
	        	return true;
	        }
		
			}

	public function actionLogout()
	{
		unset(Yii::app()->session['churchDetails']);
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}