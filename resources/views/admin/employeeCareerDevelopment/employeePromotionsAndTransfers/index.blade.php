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
        <x-slot name="header">
            @if(Auth::check())
            <x-card.card-title-create url="{{route('promotion_transfer.create')}}" />
            @endif
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
        ajax: "{{ route('promotion_transfer.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, sortable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'code', name: 'code'},
            {data: 'date', name: 'date'},
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
