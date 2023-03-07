<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class isLoggedIn implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $supportLocale = $request->config->supportedLocales;
        $segment = $request->uri->getSegments();
        $isUriLocale = in_array($segment[0], $supportLocale);
        $isStopUri = in_array($segment[2], config('Settings')->stopAuthFilter);

        if ($isUriLocale && $segment[1] == 'admin') {
            if (!$isStopUri) {
                if (!session()->isLogin) {
                    return redirect()->to(route_to('admin_login'));
                }
            }
        }
        if($isUriLocale && $segment[1] == 'admin')
        {
            if($isStopUri)
            {
                if(session()->isLogin)
                {
                    return redirect()->to(route_to('admin_dashboard'));
                }
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}