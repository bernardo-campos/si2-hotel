<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Room;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoomRequest;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return view('admin.rooms.index', [
            'rooms' => Room::all()
        ]);
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(StoreRoomRequest $request)
    {
        $room = Room::create( $request->validated() );

        return redirect()->route('admin.rooms.index')->with('success', 'Habitación creada');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', [
            'room' => $room
        ]);
    }

    public function update(StoreRoomRequest $request, Room $room)
    {
        $room->fill( $request->validated() );

        $room->save();

        return redirect()->route('admin.rooms.index')->with('success', 'Habitación actualizada');
    }
}
