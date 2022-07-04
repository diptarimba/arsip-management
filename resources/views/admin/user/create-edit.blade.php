@extends('layouts.master')

@section('title', 'Mengelola User')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Mengelola User" mainTitle="Mengelola User" subTitle="Mengelola User" half="1">
        <x-card.card>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('user.create') ? route('user.store') : route('user.update', @$user->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    <x-forms.input required="" label="Full Name" name="name" :value="@$user->name" />
                    <x-forms.input required="" label="Username" name="username" :value="@$user->name" />
                    <x-forms.input required="" label="Email" name="email" :value="@$user->name" />
                    <x-forms.text password label="password" name="password" :value="@$user->code" />
                    <x-forms.select name="role" label="User Role" :items="@$role" :value="@$userRole"/>
                </form>
                <button form="form" class="btn btn-outline-primary btn-pill">Submit</button>
                <x-action.cancel />
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')

@endsection
