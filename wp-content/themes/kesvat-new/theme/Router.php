<?php
namespace Theme;

use Theme\Lib\HTTP;
use Theme\Lib\Input;

class Router {

    protected $input;
    protected $controller;

    public function __construct() {
        $this->_loadWP();

        $this->input = new Input();
        $this->controller = new Controller();
        $this->dispatcher($this->_convertDash($this->input->get('action')));
    }

    protected function dispatcher($action) {
        if(!$action)
            return $this->notFound();

        $method = "action$action";
        if(method_exists($this->controller, $method)) {
            return $this->controller->$method();
        }

        return $this->notFound();
    }

    protected function notFound() {
        $http = new HTTP();
        $http->responseCode(404);

        wp_send_json_error(array(
            'message' => __('Action Not found.')
        ));
    }

    protected function _convertDash($str) {
        return ucfirst(str_replace(' ', '', ucwords(str_replace('-', ' ', $str))));
    }

    private function _loadWP() {
        define('WP_USE_THEMES', false);
        require_once('../../../../wp-load.php');
    }
}

new Router();