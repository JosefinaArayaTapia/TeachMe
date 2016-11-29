<?php
/**
 * Created by IntelliJ IDEA.
 * User: Josefina
 * Date: 08-10-16
 * Time: 21:05
 */

namespace teachme\Http\Controllers;


class TicketsController extends Controller
{

    public function latest()
    {

        return view('tickets/list');
    }

    public function details()
    {
        return view('tickets/details ');


    }
    public function closed(){

        return view('tickets/list');

    }
    public function open(){

        return view('tickets/list');

    }

}