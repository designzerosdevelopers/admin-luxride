<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $settings = Setting::get(["key", "value", "display_name", "note"]);

        $stripeSettings = [];
        $paypalSettings = [];
        $mailSettings = [];

        foreach ($settings as $setting) {
            switch ($setting->key) {
                case 'STRIPE_SECRET':
                    $stripeSettings[] = $setting;
                    break;
                case 'PAYPAL_KEY':
                case 'PAYPAL_SECRET':
                case 'PAYPAL_MODE':
                    $paypalSettings[] = $setting;
                    break;
                case 'MAIL_MAILER':
                case 'MAIL_HOST':
                case 'MAIL_PORT':
                case 'MAIL_USERNAME':
                case 'MAIL_APP_PASSWORD':
                case 'MAIL_ENCRYPTION':
                case 'MAIL_FROM_ADDRESS':
                case 'MAIL_FROM_NAME':
                    $mailSettings[] = $setting;
                    break;
            }
        }

        return view("adminside.settings.index", [
            'stripeSettings' => $stripeSettings,
            'paypalSettings' => $paypalSettings,
            'mailSettings' => $mailSettings,
        ]);
    }
       
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
            $updateData = [
                'STRIPE_SECRET' => $request->STRIPE_SECRET,
                'PAYPAL_MODE' => $request->PAYPAL_MODE,
                'PAYPAL_KEY' => $request->PAYPAL_KEY,
                'PAYPAL_SECRET' => $request->PAYPAL_SECRET,
                'MAIL_MAILER' => $request->MAIL_MAILER,
                'MAIL_HOST' => $request->MAIL_HOST,
                'MAIL_PORT' => $request->MAIL_PORT,
                'MAIL_USERNAME' => $request->MAIL_USERNAME,
                'MAIL_APP_PASSWORD' => $request->MAIL_APP_PASSWORD,
                'MAIL_ENCRYPTION' => $request->MAIL_ENCRYPTION,
                'MAIL_FROM_ADDRESS' => $request->MAIL_FROM_ADDRESS,
                'MAIL_FROM_NAME' => $request->MAIL_FROM_NAME,
            ];
    
            foreach ($updateData as $key => $value) {
                Setting::where('key', $key)->update(['value' => $value]);
            }
            return redirect()->back()->with('message', 'Settings updated successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
