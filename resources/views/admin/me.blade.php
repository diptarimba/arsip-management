@extends('layouts.master')

@section('title', 'Profil Saya')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Profil Saya" mainTitle="Profil" subTitle="Profil Saya" half="1">
        <x-card.card>
            <x-slot name="body">
                <form id="form"
                    action="{{ route('me.update', @$user->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.input required="" label="Username" name="username" :value="@$user->username" />
                    <x-forms.input required="" label="Nama" name="name" :value="@$user->name" />
                    <x-forms.input required="" label="Email" name="email" :value="@$user->email" />
                    <x-forms.text password required="" label="Password" name="password" :value="@$user->s" />
                </form>
                <button form="form" class="btn btn-outline-primary btn-pill">Update</button>
                <x-action.cancel />
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')

@endsection
