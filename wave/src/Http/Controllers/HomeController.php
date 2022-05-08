<?php

namespace Wave\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends \App\Http\Controllers\Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (setting('auth.dashboard_redirect', true) != "null") {
            if (!\Auth::guest()) {
                return redirect('dashboard');
            }
        }

        $seo = [

            'title'         => setting('site.title', 'sellerfulfilment'),
            'description'   => setting('site.description', 'Amazon Seller Automation'),
            'image'         => url('/og_image.png'),
            'type'          => 'website'

        ];
        /* changed to new landing page blade */
        return view('theme::landingpage/landing-home', compact('seo'));
    }

    public function landingBlog()
    {
        return view('theme::landingpage/landing-blog');
    }
    public function landingBlogDetail()
    {
        return view('theme::landingpage/landing-blog-detail');
    }
    public function landingPrivacyPolicy()
    {
        return view('theme::landingpage/landing-privacy-policy');
    }
    public function landingTermsOfServices()
    {
        return view('theme::landingpage/landing-terms-of-services');
    }
}
