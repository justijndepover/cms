<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.support.index');
    }

    public function phpinfo()
    {
        ob_start();
        phpinfo();
        $phpinfo = ob_get_contents();
        ob_end_clean();

        $phpinfo = preg_replace( '%^.*<body>(.*)</body>.*$%ms','$1',$phpinfo);
        return view('admin.support.phpinfo', compact('phpinfo'));
    }
}
