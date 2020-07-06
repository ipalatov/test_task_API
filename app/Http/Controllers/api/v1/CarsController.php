<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CarsController extends Controller
{

    //

    protected const RULES_STORE = [
        'brand' => 'string|required|max:20',
        'model' => 'string|required|max:30',
        'color' => 'string|required|max:30',
        'client_id' => 'integer|required',
        'state_number' => 'string|required|unique:cars|max:30',
        'status' => 'required|in:0,1',
    ];

    protected const MESSAGES = [
        'state_number.unique' => 'This state car number already exists'
    ];

    protected const CAR_NOT_FOUND = ['id' => ['Car not found']];
    protected const CLIENT_NOT_FOUND = ['client_id' => ['Client not found']];


    public function index(Request $request)
    {
        $pageSize = (int)$request->get('pageSize', 10);
        $page = (int)$request->get('page', 1);
        $offset = ($page - 1) * $pageSize;
        $result = DB::table('cars')->select('*')->limit($pageSize)->offset($offset)->get();
        return response($result, 200);
    }

    public function show($id)
    {
        if (!DB::table('cars')->find($id)) {
            return response()->json(self::CAR_NOT_FOUND, 404);
        }
        $result = DB::table('cars')->select('*')->where('id', '=', $id)->get();
        return response($result, 200);
    }

    public function store(Request $request)
    {

        $rules = self::RULES_STORE;
        $messages = self::MESSAGES;

        $validator = \Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return response()->json($validator->errors(), 400);
        }

        $json = $request->all();

        if (!DB::table('clients')->find($json['client_id'])) {
            return response()->json(self::CLIENT_NOT_FOUND, 404);
        }

        DB::table('cars')->insert(
            [
                "brand" => $json['brand'],
                "model" => $json['model'],
                "color" => $json['color'],
                "state_number" => $json['state_number'],
                "client_id" => $json['client_id'],
                "status" => $json['status'],
                "created_at" => now(),
                "updated_at" => now()
            ]
        );

        return response(null, 201);
    }

    public function update(Request $request, $id)
    {
        if (!DB::table('cars')->find($id)) {
            return response()->json(self::CAR_NOT_FOUND, 404);
        }
        $json = $request->all();

        $rules = self::RULES_STORE;
        $rules['state_number'] = 'string|required|unique:cars,state_number,' . $id . '|max:30';
        $messages = self::MESSAGES;

        $validator = \Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return response()->json($validator->errors(), 400);
        }

        if (!DB::table('clients')->find($json['client_id'])) {
            return response()->json(self::CLIENT_NOT_FOUND, 404);
        }

        DB::table('cars')->where('id', '=', $id)->update(
            [
                "brand" => $json['brand'],
                "model" => $json['model'],
                "color" => $json['color'],
                "state_number" => $json['state_number'],
                "client_id" => $json['client_id'],
                "status" => $json['status'],
                "updated_at" => now()
            ]
        );
        return response(null, 200);
    }

    public function destroy($id)
    {
        if (!DB::table('cars')->find($id)) {
            return response()->json(self::CAR_NOT_FOUND, 404);
        }

        DB::table('cars')->where('id', '=', $id)->delete();
        return response(null, 204);
    }

    public function listClientCars($client_id)
    {
        if (!DB::table('clients')->find($client_id)) {
            return response()->json(self::CLIENT_NOT_FOUND, 404);
        }
        $result = DB::table('cars')->select('*')->where('client_id', '=', $client_id)
            ->orderBy('updated_at', 'desc')->get();
        return response($result, 200);
    }

    public function listParkedCars(Request $request)
    {
        $pageSize = (int)$request->get('pageSize', 10);
        $page = (int)$request->get('page', 1);
        $offset = ($page - 1) * $pageSize;
        $result = DB::table('cars')->select('*')->where('status', '=', 1)
            ->orderBy('updated_at', 'desc')->limit($pageSize)->offset($offset)->get();
        return response($result, 200);
    }


}
