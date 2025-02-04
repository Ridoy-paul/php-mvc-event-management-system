<?php
namespace Services;

class Router
{
    private $urlController = null;
    private $urlAction = null;
    private $urlParams = array();
    
    public function __construct(){
        
        // Verify if url isset
        if(isset($_GET['url'])) {
            // Split URL in parts
            $url = trim($_GET['url'], '/'); 
            $url = filter_var($url, FILTER_SANITIZE_URL); // Filter the url from characters foreign to a url
            $url = explode('/', $url); // Create array with: controller/action/params
            
            // controller, action e parameters
            $this->urlController = isset($url[0]) ? $url[0] : null; // Create $this->urlController with $url[0]
            $this->urlAction = isset($url[1]) ? $url[1] : null; // Create $this->urlAction with $url[1]            
            unset($url[0], $url[1]);// Clear $url[0] and $url[1]
            $this->urlParams = array_values($url); // Create $this->urlParams with array_values($url)            
        }
        
        // If the controller is not passed by the URL, then the controller customers will be assumed as default, with the action index
        if (!isset($this->urlController)) {
            $ctrl = new \App\Controllers\FrontController;
            $ctrl->index();
        }
        elseif($this->urlController == 'auth'){                  				                    

            if(!isset($this->urlAction) || $this->urlAction == 'login'){
                $ctrl = new \App\Controllers\AuthController;
                $ctrl->login();
            }
            elseif ($this->urlAction == 'login-submit'){	
                $ctrl = new \App\Controllers\AuthController;
                $ctrl->loginSubmit();
            }
            elseif ($this->urlAction == 'register'){	
                $ctrl = new \App\Controllers\AuthController;
                $ctrl->register();
                
            }
            elseif ($this->urlAction == 'register-store'){	
                $ctrl = new \App\Controllers\AuthController;
                $ctrl->registrationStore();
            }
            elseif ($this->urlAction == 'dashboard'){	
                $ctrl = new \App\Controllers\AuthController;
                $ctrl->dashboard();
            }
            elseif ($this->urlAction == 'forgot-password'){	
                $ctrl = new \App\Controllers\AuthController;
                $ctrl->forgotPassword();
            }
            elseif ($this->urlAction == 'forgot-password-send-link'){	
                $ctrl = new \App\Controllers\AuthController;
                $ctrl->forgotPasswordSendLink();
            }
            elseif ($this->urlAction == 'user-list'){	
                $ctrl = new \App\Controllers\AuthController;
                $ctrl->userList();
            }
            elseif ($this->urlAction == 'logout'){	
                $ctrl = new \App\Controllers\AuthController;
                $ctrl->logout();
            }
            else{
                $error = new \Services\ErrorController();
                $error->index();				
            }
        }
        elseif($this->urlController == 'event'){
                             				                    
            if(!isset($this->urlAction) || $this->urlAction == 'list'){
                $ctrl = new \App\Controllers\EventController;
                $ctrl->list();
            }
            elseif ($this->urlAction == 'create'){	
                $ctrl = new \App\Controllers\EventController;
                $ctrl->create();
            }
            elseif ($this->urlAction == 'save'){	
                $ctrl = new \App\Controllers\EventController;
                $ctrl->eventSave();
            }
            elseif ($this->urlAction == 'download-attendee-list-csv'){	
                $ctrl = new \App\Controllers\EventController;
                $ctrl->event_download_attendee_list_csv(...$this->urlParams);
            }
            elseif ($this->urlAction == 'edit' || $this->urlAction == 'delete'){	
                $controller = new \App\Controllers\EventController;
                $this->urlController = new $controller();				
                $this->urlController->{$this->urlAction}(...$this->urlParams);
            }
            elseif ($this->urlAction == 'event-details'){	
                $controller = new \App\Controllers\FrontController;
                $this->urlController = new $controller();				
                $this->urlController->eventDetails(...$this->urlParams);
            }
            else{
                $error = new \Services\ErrorController();
                $error->index();				
            }
        }
        elseif($this->urlController == 'event-registration'){

            if(!isset($this->urlAction) || $this->urlAction == 'store'){
                $ctrl = new \App\Controllers\EventRegistrationController;
                $ctrl->eventRegistrationStore();
            }
            else{
                $error = new \Services\ErrorController();
                $error->index();				
            }
        }
        elseif($this->urlController == 'report'){

            if($this->urlAction == 'attendee-list'){	
                $ctrl = new \App\Controllers\ReportController;
                $ctrl->event_attendee_list_datatable();
            }
            else{
                $error = new \Services\ErrorController();
                $error->index();				
            }
        }
        else{
            $error = new \Services\ErrorController();
            $error->index();				
        }
    }		   
}
