<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IsPermission implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $segment = $request->uri->getSegments();

        if (session()->isLogin && isset($segment[2])) {
            $segment[3] = isset($segment[3]) ? '_' . $segment[3] : '';
            $segment[4] = isset($segment[4]) ? '_' . $segment[4] : '';
            $segment[5] = isset($segment[5]) ? '_' . $segment[5] : '';
            $segment[6] = isset($segment[6]) ? '_' . $segment[6] : '';
            $segment[7] = isset($segment[7]) ? '_' . $segment[7] : '';
            $permit = $segment[2] . $segment[3] . $segment[4] . $segment[5]. $segment[6]. $segment[7];

            if (session('userData.group') != DEFAULT_ADMIN_GROUP) {
                if (array_key_exists($permit, config('settings')->permissions)) {
                    if (!in_array($permit, session()->permissions)) {
                        return redirect()->to(route_to('admin_permissions_error'));
                    }
                }
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}