@extends('layouts.master')

@section('title', 'Promosi dan Mutasi Pegawai')

@section('header')

@endsection

@section('body')
<x-layoutContent
    Heading="Promosi dan Mutasi Pegawai"
    mainTitle="Pengadaan Pegawai"
    subTitle="Promosi dan Mutasi Pegawai"
>
    <x-card.card>
        <x-slot name="body">
            <form id="form"
            action="{{ request()->routeIs('promotion_transfer.create') ? route('promotion_transfer.store'): route('promotion_transfer.edit', @$promotionTransfer->id) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <x-forms.put-method />
            <x-forms.date required="" label="Tanggal" name="date" :value="@$promotionTransfer->date" />
            <x-forms.input required="" label="Nama File" name="name" :value="@$promotionTransfer->name" />
            <x-forms.input required="" label="Kode" name="code" :value="@$promotionTransfer->code" />
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
