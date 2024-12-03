<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Acl
{
    protected $CI;
    protected $access_list;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->access_list = array();
    }

    public function allow($roles, $controller, $method)
    {
        if (!is_array($roles)) {
            $roles = array($roles);
        }
    
        $this->access_list[] = array(
            'type'       => $roles,
            'controller' => $controller,
            'method'     => $method
        );
    }

    public function check_access()
    {
        $role       = $this->CI->session->type;
        $controller = $this->CI->router->class;
        $method     = $this->CI->router->method;

        foreach ($this->access_list as $access) {
            if (in_array($role, $access['type']) && $controller == $access['controller'] && in_array($method, $access['method'])) {
                return true;
            }
        }

        show_error('You do not have access to this page.');
        return false;
    }

}