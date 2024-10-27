<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Inquiry;
use App\Mail\CarBooking;
use Illuminate\Support\Facades\Mail;


class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd("Sdfs");
        $user = (object)[
            'name' => 'Saqib',
            'phone' => '03003194690',
        ];

        // // Send email to the user
        // Mail::to('customer@example.com')->send(new CarBooking($user, 'user','paid'));
        // // Send email to the admin
        // Mail::to('admin@example.com')->send(new CarBooking($user, 'admin','paid'));

        // $this->sendWhatsAppMessage($user);
    }

    private function sendWhatsAppMessage($user)
    {
        // Create the WhatsApp message link
        $message = urlencode("Hi {$user->name}, your inquiry has been sent successfully!");
        $phone = urlencode($user->phone); // User's phone number

        // WhatsApp URL
        $whatsappUrl = "https://wa.me/{$phone}?text={$message}";

        // Output the link (or you can use it as needed)
        echo "WhatsApp message link: <a href='{$whatsappUrl}' target='_blank'>Send WhatsApp Message</a>";
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->payment == 1) {
            Stripe::setApiKey('sk_test_51OmC8HArvCxUsgFQ95QRFQ3WRLPDJaFgDE2UxNGhIhWjb6H8E4Ocznx6ZsrdW70RDDfZClyf8szzhMOjvWP5t2Db00krvcyWTl');

            // Create a checkout session
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'cark Booking',
                        ],
                        'unit_amount' => $request->price * 100,
                    ],
                    'quantity' => 1,
                ]],
                'customer_email' => $request->email,
                'mode' => 'payment',
                'success_url' => url('http://82.112.253.130/booking-receved?name=' . $request->name .
                    '&last_name=' . $request->last_name .
                    '&email=' . $request->email .
                    '&phone=' . $request->phone .
                    '&image=' . $request->image .
                    '&title=' . $request->title .
                    '&price=' . $request->price),
                'cancel_url' => url('/'),
            ]);
            Inquiry::create([
                'name'      => $request->name,
                'last_name' => $request->last_name,
                'email'     => $request->email,
                'time'      => $request->time,
                'date'      => $request->date,
                'car_id'    => $request->vehicle_id,
                'message'   => $request->message,
                'phone'     => $request->phone,
                'location1'       => $request->location1,
                'location2'       => $request->location2,
                'location1Coords' => json_encode($request->location1Coords),
                'location2Coords' => json_encode($request->location2Coords),
            ]);

            Mail::to($request->email)->send(new CarBooking($request, 'user', 'paid'));
            Mail::to('admin@example.com')->send(new CarBooking($request, 'admin', 'paid'));
            return response()->json(['sessionId' => $session->id]);
        } else {
            Inquiry::create([
                'name'      => $request->name,
                'last_name' => $request->last_name,
                'email'     => $request->email,
                'time'      => $request->time,
                'date'      => $request->date,
                'car_id'    => $request->vehicle_id,
                'message'   => $request->message,
                'phone'     => $request->phone,
                'location1'       => $request->location1,
                'location2'       => $request->location2,
                'location1Coords' => json_encode($request->location1Coords),
                'location2Coords' => json_encode($request->location2Coords),
            ]);

            Mail::to($request->email)->send(new CarBooking($request, 'user', 'unpaid'));
            Mail::to('admin@example.com')->send(new CarBooking($request, 'admin', 'unpaid'));
            return response()->json(200);
        }
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
