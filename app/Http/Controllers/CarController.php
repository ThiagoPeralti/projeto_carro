<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;

use App\Models\User;

class CarController extends Controller
{
    public function index(){

        $search = request('search');

        if($search) {

            $cars = Car::where([
                ['modelo', 'like', '%'.$search.'%']
            ])->get();

        }else {
            $cars = Car::all();
        }

        return view('welcome', ['cars' => $cars, 'search' => $search]);
    }

    public function create(){
        return view('cars.create');
    }

    public function store(Request $request){
        
        $car = new Car;

        $car->marca = $request->marca;
        $car->modelo = $request->modelo;
        $car->ano = $request->ano;
        $car->valor = $request->valor;

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/car'), $imageName);

            $car->image = $imageName;

        } 

        $user = auth()->user();

        $car->save();

        return redirect('/')->with('msg', 'Carro adicionado com sucesso!');
    }

    public function show($id){
        $car = Car::findOrFail($id);

        $user = auth()->user();

        $hasUserJoined = false;

        if($user){
            $userCars = $user->eventsAsParticipant->toArray();

            foreach($userCars as $userCar){
                if($userCar["id"] == $id){
                    $hasUserJoined = true;
                }
            }
        }

        $carOwner = User::where('id', $car->user_id)->first()->toArray();

        return view('cars.show', ['car' => $car, 'carOwner' => $carOwner, 'hasUserJoined' => $hasUserJoined]);
    }

    public function destroy($id){
        Car::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Carro excluído com sucesso');
    }

    public function edit($id){

        $user = auth()->user();

        $car = Car::findOrFail($id);

        return view('cars.edit', ['car' => $car]);
    }

    public function update(Request $request){

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/cars'), $imageName);

            $data['image'] = $imageName;

        }

        Car::findOrFail($request->id)->update($data);

        return redirect('/')->with('msg', 'Carro editado com sucesso');
    }
}