@extends('layouts.master')

@section('header')

@endsection

@section('body')
<x-layoutContent>
    <x-card.card>
        <x-slot name="header">
            <x-card.card-title text="Pengembangan Kompetensi Pegawai"/>
        </x-slot>
        <x-slot name="body">
            <form id="form"
            action="{{ request()->routeIs('competency_development.create') ? route('competency_development.store'): route('competency_development.edit', @$admin->id) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <x-forms.put-method />
            <x-forms.date required="" label="Tanggal" name="date" :value="@$admin->date" />
            <x-forms.input required="" label="Nama File" name="name" :value="@$admin->name" />
            <x-forms.input required="" label="Kode" name="code" :value="@$admin->code" />
            <x-forms.file label="File" name="file" />
        </form>
        <button form="form" class="btn btn-primary btn-pill">Submit</button>
        <x-action.cancel />
        </x-slot>
    </x-card.card>
</x-layoutContent>
@endsection

@section('footer')

@endsection
