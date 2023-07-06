<?php

namespace App\Http\Controllers;
use Spatie\Sitemap\Sitemap;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    
    function index(){
        $sitemap = Sitemap::create();

        // Get all registered routes
        $routes = Route::getRoutes();

        // Iterate over the routes and add them to the sitemap
        foreach ($routes as $route) {
            $sitemap->add(url($route->uri()), now(), '0.5', 'monthly');
        }

        // Generate the sitemap XML
        $xmlContent = $sitemap->render();
        $sitemap->writeToFile(public_path('sitemap.xml'));
        // Create a response with XML content type and return it
        return Response($xmlContent, 200, [
            'Content-Type' => 'text/xml'
        ]);
    }
}
