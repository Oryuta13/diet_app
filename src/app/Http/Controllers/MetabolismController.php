<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metabolism;
use Auth;
use Illuminate\Support\Facades\View;

class MetabolismController extends Controller
{
    public function showMetabolismForm()
    {
        return view('metabolism.form');
    }

    public function calculateMetabolism(Request $request)
    {
        $user = Auth::user();

        $gender = $request->input('gender');
        $weight = $request->input('weight');
        $height = $request->input('height');
        $age = $request->input('age');
        $activityLevel = $request->input('activity_level');

        if ($gender == 'male') {
            $metabolism = 66.47 + ($weight * 13.75) + ($height * 5.0) - ($age * 6.76);
        } else {
            $metabolism = 665.1 + ($weight * 9.56) + ($height * 1.85) - ($age * 4.68);
        }

        $totalCalories = $metabolism * $activityLevel;

        // metabolismデータの保存または更新
        $metabolismData = Metabolism::updateOrCreate(
            ['user_id' => $user->id],
            [
                'height' => $height,
                'weight' => $weight,
                'gender' => $gender,
                'age' => $age,
                'active_level' => $activityLevel,
                'metabolism' => $totalCalories
            ]
        );

        // 計算結果をビューに渡して表示するビューを返す
        return View::make('metabolism.calculation_result', [
            'metabolism' => $metabolism,
            'totalCalories' => $totalCalories,
        ]);
    }

    public function showCalculationResult($metabolism, $totalCalories)
    {
        return view('metabolism.calculation_result', [
            'metabolism' => $metabolism, // 計算結果の値（$metabolism)をセット
            'totalCalories' => $totalCalories, // 総消費カロリーの値をセット
        ]);
    }
}
