<?php


namespace DarkPowerWeb\Controller;


use DarkPowerWeb\Core\ViewInterface;
use DarkPowerWeb\Model\ViewModel\UserLoginViewModel;

class UserController
{
    private $view;

    /**
     * UserController constructor.
     * @param $view
     */
    public function __construct(ViewInterface $view)
    {
        $this->view = $view;
    }

    public function login($id, $name) {
        $viewModel = new UserLoginViewModel($id, $name);
        $this->view->render($viewModel);
    }
    /*
    public function login($id, $name, ViewInterface $view) {
        //echo 'Login function hire';
        // $view->render();
        //$view->render(null, 'user/newlogin.php');
        $viewModel = new UserLoginViewModel($id, $name);
        $view->render($viewModel);
    }
    */

}