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
 * Logout - filter that prevents user that is not logged in from logging out.
 * @version 1.0
 * @author Mia Vucinic
 */
class Logout implements FilterInterface
{
    /**
     * Function that executes before logging out.
     * @param RequestInterface $request
     * @param $arguments
     * @return RedirectResponse|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->get('isLoggedIn')) {
            return redirect()->to('/');
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