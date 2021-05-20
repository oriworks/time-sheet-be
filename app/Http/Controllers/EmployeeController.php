<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\WorkdayResource;
use App\Http\Resources\WorkplaceResource;
use App\Models\User;
use App\Models\Workday;
use App\Models\Workplace;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function me()
    {
        $user = auth()->user();
        if ($user instanceof User) {
            return response()->json(new UserResource($user));
        }
    }

    public function workdays($year, $month)
    {
        $firstDay = \Carbon\Carbon::create($year, $month)->firstOfMonth()->startOfWeek();
        $lastDay = \Carbon\Carbon::create($year, $month)->lastOfMonth()->endOfWeek();

        $workdays = Workday::whereDate('day', '>=', $firstDay)
            ->whereDate('day', '<=', $lastDay)
            ->get();

        return response()->json([
            'today' => \Carbon\Carbon::now(),
            'first_day' =>  $firstDay,
            'last_day' =>  $lastDay,
            'workdays' => WorkdayResource::collection($workdays)
        ]);
    }

    public function workplaces()
    {
        return response()->json(WorkplaceResource::collection(Workplace::all()));
    }
}
