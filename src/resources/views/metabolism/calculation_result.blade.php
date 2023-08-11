@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">基礎代謝計算結果</div>

                <div class="card-body">
                    <p>あなたの基礎代謝は {{ $metabolism }} Kcalです。</p>
                    <p>活動量を考慮した1日の総消費カロリーは {{ $totalCalories }} Kcalです。</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
