<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::user()->id)->where('returned', 0)->get();

        $resbooks = [];

        foreach ($reservations as $reservation)
        {
            $bookId = $reservation->book_id;

            $book = Book::find($bookId);

            $resbooks[] = [
                'reservation' => $reservation,
                'book' => $book,
            ];
        }

        return view('books.reserved', compact('resbooks'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request, Book $book)
    {

        $reservation = Reservation::where('user_id', Auth::user()->id)
                                      ->where('book_id', $book->id)
                                      ->where('returned', 0)
                                      ->first();
        
        if($reservation) {
            return back()->withErrors(['error_reservation' => 'You already have a reservation for this book']);
        }
        
        Reservation::create([
            'user_id' => Auth::user()->id,
            'book_id' => $book->id,
             'reservation_date' => $request->input('reservation_date')
        ]);

        //     Reservation::create($request->validated());
        return redirect()->route('reservation.index');
    }

    /**
     * Display the specified resource
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
        $reservation->update(['returned' => 1]);   
        return redirect()->route('reservation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservation.index');
    }
}
