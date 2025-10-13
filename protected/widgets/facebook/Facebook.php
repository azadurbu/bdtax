<?php
/**
 * class Facebook
 * @author Igor Ivanović 
 */
class Facebook extends CWidget{

    public $appId;
    public $status = true;
    public $cookie = true;
    public $xfbml  = true;
    public $oauth  = true;
    public $version  = "v3.1";
    public $userSession;
    public $facebookButtonTitle = "Facebook Connect";
    public $fbLoginButtonId     = "fb_login_button_id";
    public $logoutButtonId      = "your_logout_button_id";
    public $facebookLoginUrl    = "facebook/login";
    public $facebookPermissions = "public_profile,email";
    
	
    /**
    * Run Widget
    */
    public function run()
    {
        $this->facebookLoginUrl     = Yii::app()->createAbsoluteUrl($this->facebookLoginUrl,array(),'https');
        $this->userSession          = Yii::app()->session->sessionID;
        $this->renderJavascript();
        $this->render('login');
    }
    
    
    /**
    * Render necessary facebook  javascript
    */
    private function renderJavascript()
    {
$script=<<<EOL
        window.fbAsyncInit = function() {
            FB.init({   appId: '{$this->appId}', 
                        status: {$this->status}, 
                        cookie: {$this->cookie},
                        xfbml: {$this->xfbml}, 
                        oauth: {$this->oauth},
                        version: '{$this->version}', 
            });

            function updateButton(response) {

                var b = document.getElementById("{$this->fbLoginButtonId}");
               
                    b.onclick = function(){
                        FB.login(function(response) {
                            
                                    if(response.authResponse) {
                                        // console.log('Welcome!  Fetching your information.... ');
                                            FB.api('/me?fields=id,first_name,last_name,email', function(user) {
                                                // console.log('Good to see you, ' + user.first_name + ' ' + user.last_name  + ' ' + user.id + ' ' + user.email + '.');
                                                $.ajax({
                                                    type : 'get',
                                                    url  : '{$this->facebookLoginUrl}',
                                                    data : ( { 
                                                        name     :   user.first_name, 
                                                        surname  :   user.last_name,
                                                        username :   user.username,
                                                        id       :   user.id, 
                                                        email    :   user.email, 
                                                        session  :   "{$this->userSession}" 
                                                    } ),
                                                    dataType : 'json',
                                                    success : function( data ){
                                                        if( data.error == 0){
                                                            window.location.href = data.redirect;
                                                        }else{
                                                            alert( data.error );                                                            
                                                            FB.logout();
                                                        }
                                                    }
                                                });

                                            });    
                                    }
                                    // else{
                                    //     console.log('User cancelled login or did not fully authorize.');
                                    // }
                        }, {scope: '{$this->facebookPermissions}'});    
                    }
                
            }
                        
            FB.getLoginStatus(updateButton);
            FB.Event.subscribe('auth.statusChange', updateButton);	

            var c = document.getElementById("{$this->logoutButtonId}");
            if(c){
                c.onclick = function(){
                    FB.logout();
                }
            }
        };
           
        // (function(d){var e,id = "fb-root";if( d.getElementById(id) == null ){e = d.createElement("div");e.id=id;d.body.appendChild(e);}}(document));
        // (function(d){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];if (d.getElementById(id)) {return;} js = d.createElement('script'); js.id = id; js.async = true; js.src = "//connect.facebook.net/en_US/all.js"; ref.parentNode.insertBefore(js, ref); }(document));

        (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "https://connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
EOL;

        Yii::app()->clientScript->registerScript('facebook-connect',$script,  CClientScript::POS_END );
    }
}
