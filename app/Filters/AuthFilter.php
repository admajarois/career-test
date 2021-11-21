<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    function before(RequestInterface $request, $arguments = null)
    {
        if (is_null(session()->get('logged_in'))) {
            return redirect()->to(base_url('login'));
        }
    }
    function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
