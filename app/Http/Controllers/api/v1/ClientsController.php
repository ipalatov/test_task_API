<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Null_;

class ClientsController extends Controller
{
    //
    protected const CLIENT_NOT_FOUND = ['id' => ['Client not found']];


    protected const RULES_STORE = [
        'FIO' => 'string|required|min:3|max:100',
        'gender' => 'required|in:m,f',
        'phone' => 'string|required|unique:clients|max:20',
        'address' => 'max:255'
    ];

    protected const MESSAGES = [
        'FIO.string' => 'Name field must be a string',
        'FIO.required' => 'Name is required',
        'FIO.min' => 'Name must be at least 3 characters',
        'FIO.max' => 'Name may not be greater than 100 characters.',
        'phone.unique' => 'This phone number already exists',
    ];

    public function index(Request $request)
    {
        $pageSize = (int)$request->get('pageSize', 10);
        $page = (int)$request->get('page', 1);
        $offset = ($page - 1) * $pageSize;
        $result = DB::table('clients')->select('*')->limit($pageSize)->offset($offset)->get();
        return response($result, 200);
    }

    public function show($id)
    {
        if (!DB::table('clients')->find($id)) {
            return response()->json(self::CLIENT_NOT_FOUND, 404);
        }
        $result = DB::table('clients')->select('*')->where('id', '=', $id)->get();
        return response($result, 200);
    }

    public function store(Request $request)
    {

        $rules = self::RULES_STORE;
        $messages = self::MESSAGES;

        $validator = \Validator::make($request->all(), $rules, $messages);
//
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return response()->json($validator->errors(), 400);
        }

//
        $json = $request->all();


        DB::table('clients')->insert(
            [
                "FIO" => $json['FIO'],
                "gender" => $json['gender'],
                "phone" => $json['phone'],
                "address" => $json['address'],
                "created_at" => now(),
                "updated_at" => now()
            ]
        );

        return response(null, 201);
    }

    public function update(Request $request, $id)
    {
        if (!DB::table('clients')->find($id)) {
            return response()->json(self::CLIENT_NOT_FOUND, 404);
        }

        $rules = self::RULES_STORE;
        $rules['phone'] = 'string|required|unique:clients,phone,' . $id . '|max:20';

        $messages = self::MESSAGES;

        $validator = \Validator::make($request->all(), $rules, $messages);
//
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return response()->json($validator->errors(), 400);
        }


        $json = $request->all();
        DB::table('clients')->where('id', '=', $id)->update(
            [
                "FIO" => $json['FIO'],
                "gender" => $json['gender'],
                "phone" => $json['phone'],
                "address" => $json['address'],
                "updated_at" => now()
            ]
        );
        return response(null, 200);
    }

    public function destroy($id)
    {
        if (!DB::table('clients')->find($id)) {
            return response(null, 404);
        }
        DB::table('clients')->where('id', '=', $id)->delete();
        return response(null, 204);
    }


}
