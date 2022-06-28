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
        <x-slot name="header">
            <x-card.card-title-create url="{{route('appointment.create')}}" />
        </x-slot>
        <x-slot name="body">
            <table class="table table-striped datatables-target-exec">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Date</th>
                    <th>Action</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </x-slot>
    </x-card.card>
</x-layoutContent>
@endsection

@section('footer')
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script>
    $(document).ready(() => {
        var table = $('.datatables-target-exec').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('appointment.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'user.name', name: 'user.name'},
            {data: 'user.email', name: 'user.email'},
            {data: 'user.phone_number', name: 'user.phone_number'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });
    })
</script>
@endsection
