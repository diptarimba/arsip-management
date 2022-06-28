@extends('layouts.master')

@section('title', 'Penetapan Pegawai')

@section('header')

@endsection

@section('body')
<x-layoutContent
    Heading="Penetapan Pegawai"
    mainTitle="Pengadaan Pegawai"
    subTitle="Penetapan Pegawai"
>
    <x-card.card>
        <x-slot name="body">
            <form id="form"
            action="{{ request()->routeIs('appointment.create') ? route('appointment.store'): route('appointment.edit', @$appointment->id) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <x-forms.put-method />
            <x-forms.date required="" label="Tanggal" name="date" :value="@$appointment->date" />
            <x-forms.input required="" label="Nama File" name="name" :value="@$appointment->name" />
            <x-forms.input required="" label="Kode" name="code" :value="@$appointment->code" />
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
