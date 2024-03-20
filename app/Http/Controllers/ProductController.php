<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5YjliNDZjNS0wNGM0LTQ5MTEtYjNhMi1lODQxNDI3MDg4OTEiLCJqdGkiOiIxMzBiZTNmMTQwYWFlODM5ZDEyOTk2NmY3YjkzMDYxOTdlMzE1NTZkYjAxZjY4MzdkOGIzMTRmYzBjYmYwZmQ5NzMyNzU2N2UzZjEwOTVhNSIsImlhdCI6MTcxMDkxMjIyNi4zNjY3NjMsIm5iZiI6MTcxMDkxMjIyNi4zNjY3NjcsImV4cCI6MTcxMjIwODIyNi4zNTgwODcsInN1YiI6IjEzIiwic2NvcGVzIjpbInRzaGlydC1hY2Nlc3MiXX0.YRtUo_a0OnYBFXjw32Z3f0IR7DqSmeO1S74tpbXLVz70KjiHwx5FISeJ6aRShoJCe23TEDyPzVUkeDBxdTiIW5LaayntaysgmkpCLMPB7y_S8Hxj3EP9JwN1RLosjMdqfEEo7DXy8wtZsvOm6e3nq0AHJoiPymfILj3JtxsW8Khm7goZidsQnQ_ctMkRpmPsEArv8oPFKTv5CeyMEOHlhXHQvkShLfbi2ZYnBKkopDqRR2LmS6fsuAGVPQpVOBNAx2mut1eBePJ3FjhOIXEQ-pZCEuDYm6_HCzp5lDx3QsbEsulL1Rj8cjs8xOfnLTkgfDvRbJoAgKN4ZrtKdM2LXyt22tiZdd0ttvHeWj1py3B6A-Sf49CYCIS3Xb7xOqH5jEVasNQp9VEZQPYZLQoOeXtM_MFJoRPbbuoIEBlxML72x7kgL-PTzA9FHOyYt7m86a9Wf0X8tLbMIRYQ9lJVSx4D91nuhq2m2YMR7nGIDf1guTE7rFA8KTi28lY4KT4y5NFXW-ZJWrH4wuRhagIFemAMuhTUHinpICGuDHe5n1OUUQr1eWc79E9-pNd8yjatRVWnO2dElfkYCAJJZKc79jAwm9NAuDB8fPtYRIBT8a_ZxGvUq39UIucJRvRTIELMG5toPL0r2eOUkASDZ3KdSDvkCPIi3TTLHxh2jS1nSzU";

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $access_token,
        ])->get('http://wallserver.dyndns.info:86/api/products1');

        $products = $response->json(); // ดึงข้อมูล JSON มาใส่ในตัวแปร $products

        return view('product', ['products' => $products]);

    }
}
