<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    //
    public $clients;

    public function __construct()
    {
        $this->clients = Clients::getClientInstance();
    }

    public function index(Request $request)
    {
        $response = $this->clients->getIndex($request);
        return $response;
    }

    public function show($id)
    {
        $response = $this->clients->getOne($id);
        return $response;
    }

    public function store(Request $request)
    {
        $response = $this->clients->addClient($request);
        return $response;
    }

    public function update(Request $request, $id)
    {
        $response = $this->clients->updateClient($request, $id);
        return $response;
    }

    public function destroy($id)
    {
        $response = $this->clients->deleteClient($id);
        return $response;
    }
}
