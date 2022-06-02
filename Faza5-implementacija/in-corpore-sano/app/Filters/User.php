<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Filters;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

/**
 * Admin - filter that prevents user that is not registered user from executing user controllers' methods.
 * @version 1.0
 * @author Mia Vucinic
 */
class User implements FilterInterface
{
    /**
     * Function that executes before user controllers' methods.
     * @param RequestInterface $request
     * @param $arguments
     * @return RedirectResponse|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        } else if(session()->get('role') != 'user') {
            return redirect()->to(session()->get('role'));
        }
    }

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param $arguments
     * @return mixed|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}