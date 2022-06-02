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
 * Guest - filter that prevents user that is logged in from accessing log in and register page.
 * @version 1.0
 * @author Mia Vucinic
 */
class Guest implements FilterInterface
{
    /**
     * Function that executes before guest controller's methods.
     * @param RequestInterface $request
     * @param $arguments
     * @return RedirectResponse|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('isLoggedIn')) {
            return redirect()->to(session()->get('role'));
        }
    }

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param $arguments
     * @return void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}