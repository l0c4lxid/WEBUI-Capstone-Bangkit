<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (!$session->get('logged_in')) {
            return redirect()->to('login');
        }

        $role = $session->get('role');
        $uri = $request->uri->getSegment(1); // Get the first segment of the URI

        // Check if the user role is allowed to access the URI
        if ($role == 1 && $uri === 'jurnalis') {
            return redirect()->to('admin/dashboard');
        } elseif ($role == 2 && $uri === 'admin') {
            return redirect()->to('jurnalis/dashboard');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after request is processed
    }
}
