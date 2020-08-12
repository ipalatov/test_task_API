<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CarsController extends Controller
{
    public $cars;

    //

    public function __construct()
    {
        $this->cars = Cars::getCarInstance();
    }

    public function index(Request $request)
    {
        $response = $this->cars->getIndex($request);
        return $response;
    }

    public function show($id)
    {
        $response = $this->cars->getOne($id);
        return $response;
    }

    public function store(Request $request)
    {
        $response = $this->cars->addCar($request);
        return $response;
    }

    public function update(Request $request, $id)
    {
        $response = $this->cars->updateCar($request, $id);
        return $response;
    }

    public function destroy($id)
    {
        $response = $this->cars->deleteCar($id);
        return $response;
    }

    public function listClientCars($client_id)
    {
        $response = $this->cars->getClientCars($client_id);
        return $response;
    }

    public function listParkedCars(Request $request)
    {
        $response = $this->cars->getParkedCars($request);
        return $response;
    }
}
