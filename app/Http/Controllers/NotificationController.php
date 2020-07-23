<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications;

        return response()->json([
            'success' => true,
            'data' => $notifications
        ]);
    }

    public function show($id)
    {
        $notification = auth()->user()->notifications()->find($id);

        if (!$notification) {
            return response()->json([
                'success' => false,
                'message' => 'Notification with id ' . $id . ' not found'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $notification->toArray()
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|min:1'
        ]);

        $notification = new Notification();
        $notification->message = $request->message;

        if (auth()->user()->notifications()->save($notification)) {
            return response()->json([
                'success' => true,
                'data' => $notification->toArray()
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Notification could not be added'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $notification = auth()->user()->notifications()->find($id);

        if (!$notification) {
            return response()->json([
                'success' => false,
                'message' => 'Notification with id ' . $id . ' not found'
            ], 400);
        }

        $updated = $notification->fill($request->all())->save();

        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Notification could not be updated'
            ], 500);
    }

    public function destroy($id)
    {
        $notification = auth()->user()->notifications()->find($id);

        if (!$notification) {
            return response()->json([
                'success' => false,
                'message' => 'Notification with id ' . $id . ' not found'
            ], 400);
        }

        if ($notification->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Notification could not be deleted'
            ], 500);
        }
    }
}
