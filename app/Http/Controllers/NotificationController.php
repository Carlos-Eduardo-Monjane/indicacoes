<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $note = Notification::all()->sortByDesc('id');
        return view('contas.notificationlist')->with(['notes' => $note, 'msg' => '']);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

    }


    public function show(Notification $notification)
    {
        //
    }


    public function edit(Notification $notification)
    {
        //
    }

    public function update(Request $request, Notification $notification)
    {
        //
    }


    public function destroy(Notification $notification)
    {
        //
    }

    public function changenote(Request $request)
    {
        $note = Notification::where(['id' => $request['id']])->first();




        try{
            if ($note->estado == '0') {
                $note->estado = '1';
                $note->save();

            } else {
                $note->estado = '0';
                $note->save();

            }
            return redirect('notelist')->with('msg', 'success');

        }
        catch(Exception $ex){
            return redirect('notelist')->with('msg', 'error');
        }


    }

}
