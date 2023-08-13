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

        return view('foods.index', compact('foods', 'selectedDate'));
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
