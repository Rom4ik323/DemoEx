<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Функция, которая возращает страницу с заявками пользователя
    public function index()
    {
        $tickets = DB::table('tickets')
        ->where('user_id', '=', Auth::user()->id)
        ->get(); 
        return view('tickets.tickets', ['tickets'=>$tickets]);
    }

    //Функция, которая возращает страницу администратора
    public function admin()
    {
        return view('admin.index', ['tickets'=>Ticket::all()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Функция, которая возращает страницу создания заказа
    public function create()
    {
        return view('tickets.create', ['products'=>Product::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Функция, которая проводит валидацию данных и записывает заказ в бд
    public function store(Request $request)
    {

        $validated = $request->validate([
            'qty'      => 'required',
            'address'  => 'required',
        ]);

        Ticket::create([
            'name'    =>Auth::user()->name,
            'user_id' =>Auth::user()->id,
            'email'   =>Auth::user()->email,
            'product' =>$request->product,
            'qty'     =>$request->qty,
            'address' =>$request->address,
            'status'  =>"Новая",
        ]);
    
        return redirect('/tickets')->with('success', 'Заявка создана, с вами скоро свяжутся!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */

    //Функция, которая обновляет статус заказа
    public function update(Request $request, Ticket $ticket)
    {
        if ($ticket->status == "Новая") {
            $ticket->status = $request->status;
            $ticket->save();
            return redirect('/admin')->with('success', 'Статус изменен!');
        } else {
            return back()->withErrors([
                'email' => 'Можно менять заявки только со статусом новая!',
            ]);
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
