	<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<style type="text/css">

	.sideBar, nav{
		display: none;
	}
</style>
        <div  ng-controller="loginController" class="row">
            <div class="col-md-5 col-md-offset-5">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                         <form role="form" method="post" action="login" ng-submit="login.submit(loginform)"  name="loginform">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" ng-model="username" name="username" required ng-minlength="3" 
                                     placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password"  ng-model="password" name="password" required ng-minlength="3"
                                     value="">
                                </div>
                                <?php if($login == 1){ ?>
                                 <span name="errorMsg" class="errorMsg"  ng-model="errorMsg" >
                                 Please enter valid email and password</span>
                             <?php   } ?>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                 <input type="submit"  id="submitButton" class="btn btn-lg btn-success btn-block" value="Register" > 
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <style type="text/css">
    .errorMsg{
        display: inline-block;
        margin: 10px 0 0 0;
        color: red; 
    }
    </style>
<script type="text/javascript">
app.controller('loginController',function($scope,  $http){
         
            $scope.login = {
                submit: function(form) {
                    console.log(form);
                     if(form.$valid){
                        $scope.errorMsg='';
                         $http.get("login?user="+$scope.username+"&pass="+$scope.password)
                            .success(function(data) {
                                if(data == 1){
                                    $scope.errorMsg = $scope.email +    " is already registered, Please try different.";
                                    console.log($scope.errorMsg);
                                }else{
                                    alert('You have successfully registered');
                                }
                            }).error(function(data, status) {
                              
                            });
                    }
                }
    }
        /*      
        Here you can handle controller for specific route as well.
        */
    });
   
</script>