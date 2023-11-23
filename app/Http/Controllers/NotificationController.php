<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function getNotificationsForEnrollments($enrollments)
    {
        $notifications = [];

        foreach ($enrollments as $enrollment) {
            $notifications = array_merge($notifications, $this->getNotifications($enrollment->id)->toArray());
        }

        return $notifications;
    }

    public function getTotalUnreadNotifications($enrollments)
    {
        $unreadNotifications = 0;
        foreach ($enrollments as $enrollment) {
            $unreadNotifications += $this->getUnreadNotifications($enrollment->id);
        }

        return $unreadNotifications;
    }

    public function getNotifications($enrollmentId)
    {
        return Notification::where('enrollment_id', $enrollmentId)
            ->where('is_Seen', 0)
            ->get();
    }

    public function getUnreadNotifications($enrollmentId)
    {
        return Notification::where('enrollment_id', $enrollmentId)->where('is_Seen', 0)->count();
    }

    public function NotificationSeen(Request $request)
    {
        $notificationId = $request->input('notificationId');
        $notification = Notification::find($notificationId);

        if ($notification) {
            $notification->is_Seen = 1;
            $notification->save();
            return response()->json([
                'success' => true,
            ]);
        }

        return response()->json([
            'success' => false,
        ]);
    }
}
