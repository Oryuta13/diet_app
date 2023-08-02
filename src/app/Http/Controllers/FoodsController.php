<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\foods;

class FoodsController extends Controller
{
    public function index(){
        $foods = Foods::all();
        return view('foods.index', ['foods' => $foods]);
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
}
