<?php

namespace App\Http\Controllers;

use App\Models\User;

class ChartController extends Controller
{
    public function getPieChartData()
    {
        $instructorCount = User::where('user_role', 'instructor')->count();
        $userCount = User::where('user_role', 'user')->count();

        $data = [
            'labels' => ['Instructors', 'Users'],
            'datasets' => [
                [
                    'data' => [$instructorCount, $userCount],
                    'backgroundColor' => ['#333', '#33FF57'],
                ],
            ],
        ];

        return response()->json($data);
    }
}
