@extends('layouts.master')

@section('title', 'Formasi Pegawai')

@section('header')

@endsection

@section('body')
<x-layoutContent
    Heading="Formasi Pegawai"
    mainTitle="Pengadaan Pegawai"
    subTitle="Formasi Pegawai"
>
    <x-card.card>
        <x-slot name="body">
            <form id="form"
            action="{{ request()->routeIs('formation.create') ? route('formation.store'): route('formation.edit', @$formation->id) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <x-forms.put-method />
            <x-forms.date required="" label="Tanggal" name="date" :value="@$formation->date" />
            <x-forms.input required="" label="Nama File" name="name" :value="@$formation->name" />
            <x-forms.input required="" label="Kode" name="code" :value="@$formation->code" />
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
