@extends('layouts.master')

@section('title', 'Promosi dan Mutasi Pegawai')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Promosi dan Mutasi Pegawai" mainTitle="Pengadaan Pegawai"
        subTitle="Promosi dan Mutasi Pegawai" half="1">
        <x-card.card>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('promotion_transfer.create') ? route('promotion_transfer.store') : route('promotion_transfer.update', @$promotionTransfer->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    <x-forms.date required="" label="Tanggal" name="date" :value="@\Carbon\Carbon::parse($promotionTransfer->date)->format('Y-m-d')" />
                    <x-forms.input required="" label="Nama File" name="name" :value="@$promotionTransfer->name" />
                    <x-forms.input required="" label="Kode" name="code" :value="@$promotionTransfer->code" />
                    @if (request()->routeIs('*.edit'))
                        <div class="mb-2">
                            <span class="form-label">File Tersedia : </span><br />
                            <a href="{{ $promotionTransfer->file }}" class="mb-2 btn btn-outline-success">Download
                                File</a><br/>
                            <span class="form-label mt-1">Action Update : </span><br />
                            <x-forms.file label="Update File" name="file" />
                        </div>
                    @else
                        <x-forms.file label="Tambahkan File" name="file" />
                    @endif
                </form>
                <button form="form" class="btn btn-outline-primary btn-pill">Submit</button>
                <x-action.cancel />
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')

@endsection
