@extends('layouts.index')

@section('title', 'Messages')
@section('page', 'Messages')

@section('content')
    <div class="card">
        <div class="card-header bg-black color-palette">
            <h3 class="card-title">Pesan Tamu Undangan</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Pesan</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->message }}</td>
                            <td>{{ $message->guest->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Pesan</th>
                        <th>#</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
