@extends('layouts.master')

@section('title', 'Pengembangan Kompetensi Pegawai')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Pengembangan Kompetensi Pegawai" mainTitle="Pengadaan Pegawai"
        subTitle="Pengembangan Kompetensi Pegawai" half="1">
        <x-card.card>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('competency_development.create') ? route('competency_development.store') : route('competency_development.update', @$competencyDevelopment->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    <x-forms.date required="" label="Tanggal" name="date" :value="@\Carbon\Carbon::parse($competencyDevelopment->date)->format('Y-m-d')" />
                    <x-forms.input required="" label="Nama File" name="name" :value="@$competencyDevelopment->name" />
                    <x-forms.input required="" label="Kode" name="code" :value="@$competencyDevelopment->code" />
                    @if (request()->routeIs('*.edit'))
                        <div class="mb-2">
                            <span class="form-label">File Tersedia : </span><br />
                            <a href="{{ $competencyDevelopment->file }}" class="mb-2 btn btn-outline-success">Download
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
