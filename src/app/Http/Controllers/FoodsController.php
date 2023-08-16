<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\foods;

class FoodsController extends Controller
{
    public function index(Request $request)
    {
        $selectedDate = $request->input('date') ?? now()->format('Y-m-d');
        $loggedInUserId = Auth::id();
        $foods = Foods::where('user_id', $loggedInUserId)->whereDate('created_at', $selectedDate)->get();

        // タンパク質、脂質、炭水化物、カロリーの合計値を計算
        $totalProtein = $foods->sum('protein');
        $totalFat = $foods->sum('fat');
        $totalCarbo = $foods->sum('carbo');
        $totalKcal= $foods->sum('kcal');

        // ビューにデータを渡す
        dd($totalProtein);
        return view('foods.index', [
            'foods' => $foods,
            'selectedDate' => $selectedDate,
            'totalProtein' =>$totalProtein,
            'totalFat' => $totalFat,
            'totalCarbo' => $totalCarbo,
            'totalKcal' => $totalKcal,
        ]);
    }

    public function create(){
        return view('foods.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'protein' => 'required|numeric',
            'fat' => 'required|numeric',
            'carbo' => 'required|numeric',
            'kcal' => 'required|numeric',
        ]);

        // ログインしているユーザーのIDを取得
        $loggedInUserId = Auth::id();

        // ユーザーIDを追加して保存するデータを作成
        $data['user_id'] = $loggedInUserId;

        $newFoods = Foods::create($data);

        return redirect(route('foods.index'));
    }

    public function edit(Foods $food){
        return view('foods.edit', ['food' => $food]);
    }

    public function update(Foods $food, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'protein' => 'required|numeric',
            'fat' => 'required|numeric',
            'carbo' => 'required|numeric',
            'kcal' => 'required|numeric',
        ]);

        $food->update($data);

        return redirect(route('foods.index'))->with('success', 'Food Updated Successfully');

    }

    public function destroy(Foods $food){
        $food->delete();
        return redirect(route('foods.index'))->with('success', 'Food Deleted Successfully');
    }
}
