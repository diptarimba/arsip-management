@extends('layouts.master')

@section('title', 'Penghargaan Pegawai')

@section('header')

@endsection

@section('body')
<x-layoutContent
    Heading="Penghargaan Pegawai"
    mainTitle="Pengadaan Pegawai"
    subTitle="Penghargaan Pegawai"
>
    <x-card.card>
        <x-slot name="body">
            <form id="form"
            action="{{ request()->routeIs('award.create') ? route('award.store'): route('award.edit', @$award->id) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <x-forms.put-method />
            <x-forms.date required="" label="Tanggal" name="date" :value="@$award->date" />
            <x-forms.input required="" label="Nama File" name="name" :value="@$award->name" />
            <x-forms.input required="" label="Kode" name="code" :value="@$award->code" />
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
