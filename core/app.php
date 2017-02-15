<?php

class app
{
  public  $settings;
  protected $phrases = [];
  protected $controller  = 'home';
  protected $method = 'index';
  protected $prams = array();
  protected $base = 0;
  protected $tempmethod = '';
  protected $tempcont = '';
  protected $isdash = 0;

  function __construct() {
    $this->getphrases();
    $url = $this->parseUrl();
    if(strcasecmp($url[0], 'dashboard')===0) {
      $this->isdash = 1;
      array_shift($url);
    }
    if(empty($url)) {
      $this->method = 'index';
      $this->controller = 'home';
      $this->controller = new $this->controller;
    } else if(file_exists('controllers/' . $url[0] . '.php')) {
      $this->controller = new $url[0];
      $this->tmpcont = $url[0];
      unset($url[0]);
      if($this->controller instanceof dashboard && $this->isdash === 1) {
        if(isset($url[1])) {
          if(method_exists($this->controller, $url[1])) {
            if(!call_user_func([$this->controller,'islogged'])) {
              $GLOBALS['tmp_controller'] = $this->tmpcont;
              $GLOBALS['tmp_method'] = $url[1];
              $this->method = 'login';
            } else {
              $this->method = $url[1];
              $this->tempmethod = $url[1];
              unset($url[1]);
            }
          } else {
            header('Location:' . $GLOBALS['LOCAL_ROOT'] . 'error/index/');
          }
        } else {
          header('Location:' . $GLOBALS['ADMIN_ROOT'] . $this->tmpcont . '//index/');
        }
      } else if(!$this->controller instanceof dashboard && $this->isdash === 0) {
        if(isset($url[1])) {
          $this->method = $url[1];
          $this->tempmethod = $url[1];
          unset($url[1]);
        } else {
          $this->method = 'index';
        }
      }
      else {
        $this->controller = new error();
        $this->method = 'index';
      }
    } else {
      header('Location:' . $GLOBALS['LOCAL_ROOT'] . 'error/index/');
    }
    $this->prams = $url ? array_values($url) : [] ;
    $this->prams = implode('',$this->prams);
    call_user_func([$this->controller,$this->method],$this->prams);
  }

  public function getphrases() {
    $settings = DB::getInstance()->retrive("*","settings")->getresults();
    foreach ($settings[0] as $key => $value) {
      $_SESSION[$key] = $value;
    }
  }

  public function parseUrl() {
    if(isset($_GET['url'])) {
      return $url = explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
    }
  }
}

?>