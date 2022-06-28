@extends('layouts.master')

@section('title', 'Penerimaan Pegawai')

@section('header')

@endsection

@section('body')
<x-layoutContent
    Heading="Penerimaan Pegawai"
    mainTitle="Pengadaan Pegawai"
    subTitle="Penerimaan Pegawai"
>
    <x-card.card>
        <x-slot name="body">
            <form id="form"
            action="{{ request()->routeIs('reception.create') ? route('reception.store'): route('reception.edit', @$reception->id) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <x-forms.put-method />
            <x-forms.date required="" label="Tanggal" name="date" :value="@$reception->date" />
            <x-forms.input required="" label="Nama File" name="name" :value="@$reception->name" />
            <x-forms.input required="" label="Kode" name="code" :value="@$reception->code" />
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
