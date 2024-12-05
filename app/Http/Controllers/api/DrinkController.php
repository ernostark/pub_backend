<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drink;
use App\Http\Resources\Drink as DrinkResource;
use App\Http\Controllers\Api\ResponseController;

class DrinkController extends ResponseController
{
    public function getDrinks() {

        $drinks = Drink::with( "type", "package")->get();
        return response( DrinkResource::collection( $drinks ));

    }

    public function getDrink( Request $request ) {

        $drink = Drink::where( "drink", $request["drink"] )->first();
        return response( new DrinkResource( $drink ));

    }

    public function newDrink( Request $request ) {

        $drink = new Drink();
        $drink->drink = $request["drink"];
        $drink->amount = $request["amount"];
        $drink->type_id = $request["type_id"];
        $drink->package_id = $request["package_id"];

        $drink->save();

        return $drink;

    }

    public function updateDrink( Request $request ) {

        $drink = $this->getDrink( $request );

        $drink->drink = $request["drink"];
        $drink->amount = $request["amount"];
        $drink->type_id = $request["type_id"];
        $drink->package_id = $request["package_id"];

        $drink->update();

        return $drink;

    }

    public function destroyDrink( Request $request ) {

        $drink = $this->getDrink( $request );

        $drink->delete();

        return $drink;

    }
}
