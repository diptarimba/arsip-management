@extends('layouts.master')

@section('title', 'Pengembangan Kompetensi Pegawai')

@section('header')

@endsection

@section('body')
<x-layoutContent
    Heading="Pengembangan Kompetensi Pegawai"
    mainTitle="Pengadaan Pegawai"
    subTitle="Pengembangan Kompetensi Pegawai"
>
    <x-card.card>
        <x-slot name="body">
            <form id="form"
            action="{{ request()->routeIs('competency_development.create') ? route('competency_development.store'): route('competency_development.edit', @$competencyDevelopment->id) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <x-forms.put-method />
            <x-forms.date required="" label="Tanggal" name="date" :value="@$competencyDevelopment->date" />
            <x-forms.input required="" label="Nama File" name="name" :value="@$competencyDevelopment->name" />
            <x-forms.input required="" label="Kode" name="code" :value="@$competencyDevelopment->code" />
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
