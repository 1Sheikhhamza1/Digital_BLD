<?php

namespace App\Http\Controllers\Frontend;

// use App\Http\Controllers\Controller;
use App\Services\HomeService;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    public function __construct(HomeService $service)
    {
        $pages = $service->getPages();
        $footerPages = $service->getFooterPages();
        $homePageContent = $service->homePageContent();
        $contactPage = $service->contactPage();
        
        view()->share([
            'pages' => $pages,
            'footerPages' => $footerPages,
            'homePageContent' => $homePageContent,
            'contactPage' => $contactPage,
        ]);
    }
}
