<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Maqola;
use App\Models\Project;
use App\Models\Stipendiya;
use App\Models\User;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $users = User::where('role','student')->get();
        $user_array = [];
        foreach ($users as $user) {
            $user_array[$user->id]['id'] = $user->id;
            $user_array[$user->id]['first_name'] = $user->first_name;
            $user_array[$user->id]['last_name'] = $user->last_name;
            $user_array[$user->id]['group'] = $user->group->name;
            $user_array[$user->id]['maqola'] = Maqola::where('user_id', $user->id)->count();
            $user_array[$user->id]['project'] = Project::where('user_id', $user->id)->count();
            $user_array[$user->id]['stipendiya'] = Stipendiya::where('user_id', $user->id)->count();
            $user_array[$user->id]['certificate'] = Certificate::where('user_id', $user->id)->count();
            $user_array[$user->id]['count'] = $user_array[$user->id]['maqola']+ $user_array[$user->id]['project'] + $user_array[$user->id]['stipendiya'] + $user_array[$user->id]['certificate'];
        }
        usort($user_array, function ($a, $b) {
            return $a['count'] <= $b['count'];
        });
        return view('admin.leaderboard', compact('user_array'));
    }
}
