<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Tourism;
use Exception;
use Illuminate\Http\Request;

class TourismController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tourism::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "tourism_place_name" => "required",
                "address" => "required",
                "ticket_price"  => "required",
                "open_time" => "required",
                "latitude" => "required",
                "longitude" => "required"
            ]);

            $tourism = Tourism::create([
                "tourism_place_name" => $request->tourism_place_name,
                "address" => $request->address,
                "ticket_price" => $request->ticket_price,
                "open_time" => $request->open_time,
                "latitude" => $request->latitude,
                "longitude" => $request->longitude,
            ]);

            $data = Tourism::where('id', '=', $tourism->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } 
            else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tourism::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                "tourism_place_name" => "required",
                "address" => "required",
                "ticket_price"  => "required",
                "open_time"  => "required",
                "latitude" => "required",
                "longitude" => "required"
            ]);

            $tourism = Tourism::findOrFail($id);

            $tourism->update([
                "tourism_place_name" => $request->tourism_place_name,
                "address" => $request->address,
                "ticket_price" => $request->ticket_price,
                "open_time" => $request->open_time,
                "latitude" => $request->latitude,
                "longitude" => $request->longitude,
            ]);


            $data = Tourism::where('id', '=', $tourism->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tourism = Tourism::findOrFail($id);

            $data = $tourism->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Destory data');
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
