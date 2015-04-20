<?php /* @var $this Controller */ ?>
<!doctype html>
<html>
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
        <link rel="icon"s type="image/png"   href="resource/images/favicon.ico">
        <!-- Bootstrap Core CSS -->
	    <link href="<?php echo Yii::app()->request->baseUrl; ?>/resource/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	    <!-- MetisMenu CSS -->
	    <link href="<?php echo Yii::app()->request->baseUrl; ?>/resource/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
	    <!-- Timeline CSS -->
	    <link href="<?php echo Yii::app()->request->baseUrl; ?>/resource/dist/css/timeline.css" rel="stylesheet">
	    <!-- Custom CSS -->
	    <link href="<?php echo Yii::app()->request->baseUrl; ?>/resource/dist/css/sb-admin-2.css" rel="stylesheet">
	    <!-- Custom Fonts -->
	    <link href="<?php echo Yii::app()->request->baseUrl; ?>/resource/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	       <!-- jQuery -->
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/resource/js/angular.min.js"></script>
     <script src="<?php echo Yii::app()->request->baseUrl; ?>/resource/js/angular-route.js">   </script>    

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/resource/bower_components/jquery/dist/jquery.min.js"></script>

	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
        <!-- Google Analytics Start -->
			<script type="text/javascript">
				
			</script>
			 <script type="text/javascript">
    var app=angular.module('mtcdyc',['ngRoute']);
		</script>
</head>
  <body >
        <div id="container" ng-app='mtcdyc' >
        
    <div id="wrapper">
    	<?php include 'header.php'; ?>
    <div class="col-md-2 sideBar">
    	<?php include 'sideBar.php'; ?>
          </div>
<div class="col-md-10"> 
	   		<?php echo $content; ?>    	
</div>

        </div>
	

     </div>
    
 
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/resource/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/resource/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/resource/dist/js/sb-admin-2.js"></script>
    
    </body>
</html>
