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

        $this->seo()->setTitle('HomePageblabla');

        return view('theme::landingpage2/home');
    }

    public function faq()
    {
        return view('theme::landingpage2/faq');
    }

    public function contactUs()
    {
        return view('theme::landingpage2/contact-us');
    }
    public function about()
    {
        return view('theme::landingpage2/about');
    }
    public function pricing()
    {
        return view('theme::landingpage2/pricing');
    }
    public function landingPrivacyPolicy()
    {
        return view('theme::landingpage2/privacy-policy');
    }
    public function landingTermsOfServices()
    {
        return view('theme::landingpage2/terms');
    }
}
