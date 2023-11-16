<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
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

    public function getBarChartData()
    {
        $positions = ['Frontend', 'Backend', 'Cybersecurity'];

        $data = [
            'labels' => $positions,
            'datasets' => [
                [
                    'label' => 'Number of enrollees',
                    'data' => $this->getEnrolledUsers($positions),
                    'backgroundColor' => '#33FF57',
                    'borderWidth' => 1
                ]
            ]
        ];

        return response()->json($data);
    }

    private function getEnrolledUsers($positions)
    {
        $enrolleesCount = [];

        foreach ($positions as $position) {
            $enrolleesCount[] = Enrollment::whereHas('offered.position', function ($query) use ($position) {
                $query->where('position', $position);
            })->count();
        }

        return $enrolleesCount;
    }
}
