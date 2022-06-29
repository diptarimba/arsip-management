@extends('layouts.master')

@section('title', 'Dashboard')

@section('header')

@endsection

@section('body')
<x-layoutDashboard>
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
                <span class="h4">Statistik Arsip</span>
            </div>
        </div>
    </div>
    <x-card.card-statistic text="Penghargaan" value="{{$award}}"/>
    <x-card.card-statistic text="Kompetensi dan Pengembangan" value="{{$competencyDevelopment}}"/>
    <x-card.card-statistic text="Promosi dan Mutasi" value="{{$promotionTransfer}}"/>
    <x-card.card-statistic text="Penetapan" value="{{$appointment}}"/>
    <x-card.card-statistic text="Formasi" value="{{$formation}}"/>
    <x-card.card-statistic text="Penolakan" value="{{$refusal}}"/>
    <x-card.card-statistic text="Penerimaan" value="{{$reception}}"/>
</x-layoutDashboard>
@endsection

@section('footer')

@endsection
