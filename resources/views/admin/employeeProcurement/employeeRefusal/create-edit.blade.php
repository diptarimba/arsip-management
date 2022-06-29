@extends('layouts.master')

@section('title', 'Penolakan Pegawai')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Penolakan Pegawai" mainTitle="Pengadaan Pegawai" subTitle="Penolakan Pegawai" half="1">
        <x-card.card>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('refusal.create') ? route('refusal.store') : route('refusal.update', @$refusal->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    <x-forms.date required="" label="Tanggal" name="date" :value="@\Carbon\Carbon::parse($refusal->date)->format('Y-m-d')" />
                    <x-forms.input required="" label="Nama File" name="name" :value="@$refusal->name" />
                    <x-forms.input required="" label="Kode" name="code" :value="@$refusal->code" />
                    @if (request()->routeIs('*.edit'))
                        <div class="mb-2">
                            <span class="form-label">File Tersedia : </span><br />
                            <a href="{{ $refusal->file }}" class="mb-2 btn btn-outline-success">Download File</a><br/>
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
