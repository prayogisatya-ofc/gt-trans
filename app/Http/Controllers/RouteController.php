<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\PaymentMethod;
use App\Models\RouteCategory;
use App\Models\SiteSetting;
use App\Models\SocialLink;
use App\Models\TravelRoute;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        $category = $request->get('category');

        $categories = RouteCategory::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $routes = TravelRoute::query()
            ->with(['category', 'cityA', 'cityB'])
            ->where('is_active', true)
            ->when($category, fn ($qq) => $qq->where('route_category_id', $category))
            ->when($q, function ($qq) use ($q) {
                $qq->whereHas('cityA', fn ($c) => $c->where('name', 'like', "%$q%"))
                   ->orWhereHas('cityB', fn ($c) => $c->where('name', 'like', "%$q%"));
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('routes.index', compact('routes', 'categories'));
    }

    public function show(string $slug)
    {
        $route = TravelRoute::query()
            ->with(['category', 'cityA', 'cityB'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // CMS global info
        $routeInfo = [
            'important_note' => SiteSetting::getByKey('route_important_note'),
            'booking_guide' => SiteSetting::getByKey('route_booking_guide'),
            'cancellation_policy' => SiteSetting::getByKey('route_cancellation_policy'),
        ];

        $paymentMethods = PaymentMethod::active()->get();
        $vehicles = Vehicle::query()->where('is_active', true)->orderBy('seat_count')->get();
        $popup = Announcement::forRouteDetailPopup()->first();
        $socialLinks = SocialLink::active()->get();
        $adminWhatsapp = SiteSetting::getByKey('admin_whatsapp');

        // Arah pilihan user (berangkat dari cityA atau cityB)
        $directionOptions = [
            [
                'from' => $route->cityA->id,
                'to' => $route->cityB->id,
                'label' => $route->cityA->name . ' → ' . $route->cityB->name,
            ],
            [
                'from' => $route->cityB->id,
                'to' => $route->cityA->id,
                'label' => $route->cityB->name . ' → ' . $route->cityA->name,
            ],
        ];

        return view('routes.show', compact(
            'route',
            'routeInfo',
            'paymentMethods',
            'vehicles',
            'popup',
            'socialLinks',
            'adminWhatsapp',
            'directionOptions',
        ));
    }
}
