@extends('layouts.app')

@section('content')
        <div class="flex flex-col text-center py-10">
          <h1 class="font-rampart text-3xl sm:text-5xl">食事管理で</h1>
          <h2 class="font-rampart text-3xl sm:text-5xl">理想の身体になろう</h2>
        </div>
        <div class="flex items-center justify-center">
          <img class="max-w-full h-auto" src="/imgs/diet_img2.jpg" alt="Diet画像">
        </div>
        <div class="flex items-center justify-center">
          <a
          href="{{ route('register') }}"
          class="px-6 py-3 bg-blue-600 rounded-md text-white hover:bg-blue-800 cursor-pointer transition-all duration-300 w-max">今すぐ始める</a>
        </div>
@endsection