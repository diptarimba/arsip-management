@extends('layouts.master')

@section('title', 'Penghargaan Pegawai')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Penghargaan Pegawai" mainTitle="Pengadaan Pegawai" subTitle="Penghargaan Pegawai" half="1">
        <x-card.card>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('award.create') ? route('award.store') : route('award.update', @$award->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    <x-forms.date required="" label="Tanggal" name="date" :value="@\Carbon\Carbon::parse($award->date)->format('Y-m-d')" />
                    <x-forms.input required="" label="Nama File" name="name" :value="@$award->name" />
                    <x-forms.input required="" label="Kode" name="code" :value="@$award->code" />
                    @if (request()->routeIs('*.edit'))
                        <div class="mb-2">
                            <span class="form-label">File Tersedia : </span><br />
                            <a href="{{ $award->file }}" class="mb-2 btn btn-outline-success">Download File</a><br/>
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
