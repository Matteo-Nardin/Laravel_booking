<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('posts');

        // S6L4_Laravel/esercizio/app/Http/Controllers:
        // return Author::with('books')->paginate(5);
        // return view('books', ['books' => Book::get()]); // passo i dati alla view
        // return Category::with('books')->paginate(5);

        // doppio join
        // return view('project', ['project' => Project::with('activities')->with('user')->get()]);


        //filtro per id
        //S6L3_Laravel/app-laravel-3/app/Http/Controllers/PostController.php


        //S6L3_Laravel/esercizio-3/app/Http/Controllers/LibroController.php
        // $books = Libro::orderBy('id');
        // return view('books', ['books' => $books->get()]);

        //-----------------------------------------
        //mostro solo i progetti dell'utente loggato
        //$projects = Project::with('projectTasks')->where('user_id', '=', Auth::user()->id) ->get();
        //$projects = Project::with('projectTasks')->get(); //join con la tabella task utilizzando il metodo 'projectTasks' del modell Project
        //return view('/project' , ['projectList' => $projects]); //nel blade richiamo l'etichetta 'projectList'

        //return auth::user(); //utente loggato
        //return Reservation::get(); //API
        return Reservation::with('reservationUser')->with('reservationActivities')->get(); //API
        //return User::with('userReservation')->get(); //API
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservation_Form', ['user' => User::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $newData = [
            'begin' => $request->name,
            'end' => $request->description,
            'user_id' => Auth::user()->id,
            //'activity_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        Project::create($newData);
        // 'index' è il riferimento al metodo
        return redirect()->action([ProjectController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        if(Auth::id()){
            $user_role=Auth()->user()->user_role;
            if($user_role == 'user'){
                //prenota con solo valore in pending o annullarlo
            }else if($user_role == 'admin'){
                //prenota ma scegliendo se accettare respingere cancellare
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
