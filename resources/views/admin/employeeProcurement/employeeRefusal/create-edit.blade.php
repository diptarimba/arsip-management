@extends('layouts.master')

@section('title', 'Penolakan Pegawai')

@section('header')

@endsection

@section('body')
<x-layoutContent
    Heading="Penolakan Pegawai"
    mainTitle="Pengadaan Pegawai"
    subTitle="Penolakan Pegawai"
>
    <x-card.card>
        <x-slot name="body">
            <form id="form"
            action="{{ request()->routeIs('refusal.create') ? route('refusal.store'): route('refusal.edit', @$refusal->id) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <x-forms.put-method />
            <x-forms.date required="" label="Tanggal" name="date" :value="@$refusal->date" />
            <x-forms.input required="" label="Nama File" name="name" :value="@$refusal->name" />
            <x-forms.input required="" label="Kode" name="code" :value="@$refusal->code" />
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
