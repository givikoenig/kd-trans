<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Facades\Admin;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
                ->row('<h1 
                class="text-center"
                style="font-weight: 100;
                text-transform: uppercase;"
                >
                KD-Trans Admin Panel
                </h1>');
    }
}
