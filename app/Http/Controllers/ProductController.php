<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5Yjk5ODkwZi00NjE0LTQ4NmItYTMyYi02MTBiNTA2ZDNiN2QiLCJqdGkiOiIzYjJlNTc1ZDUwZDk0YzdjYmY4MTdkNzY0MzA5NWE4NzIyZmZmNzUzYzlmODY4ZjYxODZkMGJkMjk0OTc3NWFkYzE2NjllNDgwYThhMjA5ZCIsImlhdCI6MTcxMDgzNzM5Mi42ODk4MTUsIm5iZiI6MTcxMDgzNzM5Mi42ODk4MTksImV4cCI6MTcxMjEzMzM5Mi42ODA2NzgsInN1YiI6IjExIiwic2NvcGVzIjpbInByb2R1Y3RzLXJlYWQiXX0.vZQS52a7nC10ErnJ4WHMtYKVQBHbtBmKw7lzY7jDpwmEx-QL-o3FUw7f63wu_MeuIS_7NQml8K3MbcRBDyfTw23k9JzBPOe3cMxROlqRkVrD00HA9HCtUKxfg-ms6BVxRTNWq6zvXyde2S2mjZmzbRUIYXMk1N7-PWCXf-vGIsF88BFi91w7XtCQUNOhbJGBlZKj-DGtGXT5aIzRQbn1eEUaqJH1DtfT4405KOLEsKWS357WKMyEE6-ZMYbGT-1pgpylBjDD3rFke-2Ce_6CjZ0meMSqkJhfNZGL7jTH9yy2vBjkKcyK20otW215uPH67IW7WHzZftfSKVAxZ0OXYL2MGPnbMUqwNnJu5PbYXc-IVHfjk4ZcTQ-qrh2f21B1v_7MmjhsuSBRHN3v3krfLw811V7J5EF5CgEy6nUf9voupbTP_LcEgh_dvv57Ce81q8PThmF_LVaWgXzlqqz1zoIU705xY7CAzakVlz3eeof1AhJdGE_wwfGIGWceOAdQu9ufFz6ACxU3-iV50-5OWOFJJmJjCIj95hk9FP7C63nW1mOoO10utXEecuCZdSvcwFzlTBZrmE4wVaahFFp17V0qUDbyx_XDvy0QfHoTlynEtZFu9hY_GQuPodW9heucgmjJYqXmrJUZLocHdC-6apRoYnKa6v7T73s2XeGsqf0";

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $access_token,
        ])->get('http://wallserver.dyndns.info:86/api/products1');

        $products = $response->json(); // ดึงข้อมูล JSON มาใส่ในตัวแปร $products

        return view('product', ['products' => $products]);
    }
}
