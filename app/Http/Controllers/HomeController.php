<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\RouteCategory;
use App\Models\TravelRoute;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = RouteCategory::query()
            ->where('is_active', true)
            ->where('is_favorite', true)
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

        $popularRoutes = TravelRoute::query()
            ->where('is_active', true)
            ->where('is_favorite', true)
            ->latest()
            ->limit(8)
            ->get();

        $popupAnnouncement = Announcement::forGlobalPopup()->first();

        return view('home', compact('categories', 'popularRoutes', 'popupAnnouncement'));
    }
}
