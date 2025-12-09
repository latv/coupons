<?php

namespace Tet\Coupons\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class CouponController extends Controller
{
    private $client;
    private $apiUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = 'http://coupons:8000/api/coupons';
    }

    public function index()
    {
        $response = $this->client->get($this->apiUrl);
        $coupons = json_decode($response->getBody()->getContents(), true);

        return view('coupons::index', compact('coupons'));
    }

    public function show($id)
    {
        $response = $this->client->get($this->apiUrl . '/' . $id);
        $coupon = json_decode($response->getBody()->getContents(), true);

        return view('coupons::show', compact('coupon'));
    }

    public function createView()
    {
        return view('coupons::create_view');
    }

    public function store(Request $request)
    {
        $data = $request->only(['code', 'type', 'value', 'expires_at', 'max_uses', 'is_active']);
        
        $validator = Validator::make($data, [
            'code' => 'required|string|max:255',
            'type' => 'required|in:fixed,percentage',
            'value' => 'required|numeric|min:0',
            'expires_at' => 'nullable|date',
            'max_uses' => 'nullable|integer|min:1',
            'is_active' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['is_active'] = $request->has('is_active');

        $this->client->post($this->apiUrl, [
            'form_params' => $data
        ]);

        return redirect()->route('coupons.index');
    }

    public function editView($id)
    {
        $response = $this->client->get($this->apiUrl . '/' . $id);
        $coupon = json_decode($response->getBody()->getContents(), true);

        return view('coupons::edit_view', compact('coupon'));
    }

    public function update($id, Request $request)
    {
        $data = $request->only(['code', 'type', 'value', 'expires_at', 'max_uses', 'is_active']);

        $validator = Validator::make($data, [
            'code' => 'required|string|max:255',
            'type' => 'required|in:fixed,percentage',
            'value' => 'required|numeric|min:0',
            'expires_at' => 'nullable|date',
            'max_uses' => 'nullable|integer|min:1',
            'is_active' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['is_active'] = $request->has('is_active');

        $this->client->put($this->apiUrl . '/' . $id, [
            'form_params' => $data
        ]);

        return redirect()->route('coupons.show', ['id' => $id]);
    }

    public function destroy($id)
    {
        $this->client->delete($this->apiUrl . '/' . $id);
        return redirect()->route('coupons.index');
    }
}