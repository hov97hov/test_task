<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Inertia\Inertia;
use Inertia\Response;

class CarModelItemController extends Controller
{
    /**
     * @param $id
     * @return Response
     */
    public function carModelPage($id): Response
    {
        $modelCars = CarModel::where('id', $id)->with('attachments')->first();

        return Inertia::render('CarModelItem')->with([
            'modelCars' => $modelCars
        ]);
    }
}
