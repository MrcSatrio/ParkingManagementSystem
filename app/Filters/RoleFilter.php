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
        if (!$session->get('npm')) {
            return redirect()->to('/');
        } else {
            $role = $session->get('id_role');
            if ($role == 1 && strpos($request->uri->getPath(), 'admin') === false) {
                return redirect()->to('/admin/index');
            } elseif ($role == 2 && strpos($request->uri->getPath(), 'keuangan') === false) {
                return redirect()->to('/keuangan/index');
            } elseif ($role == 3 && strpos($request->uri->getPath(), 'operator') === false) {
                return redirect()->to('/operator/index');
            } elseif ($role == 3 && strpos($request->uri->getPath(), 'user') === false) {
                return redirect()->to('/user/index');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
