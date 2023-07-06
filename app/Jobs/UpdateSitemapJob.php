<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Spatie\Sitemap\Sitemap;
use Illuminate\Http\Response;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Route;



class UpdateSitemapJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
   
    public function handle()
    {
        
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
