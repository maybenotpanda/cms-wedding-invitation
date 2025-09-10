@extends('layouts.index')

@section('title', 'Wedding Invited Guests')
@section('page', 'Invitation')
@include('partials.modal.add-guest')

@section('content')
    <div class="callout callout-danger">
        <h5><i class="fas fa-radiation"></i> Attention:</h5>
        Halo, boleh minta waktunya seumur hidup ga??
    </div>
    <div class="card">
        <div class="card-header bg-black color-palette">
            <h3 class="card-title">List Tamu Undangan</h3>
        </div>
        <div class="card-body">
            @include('partials.messages.guest')
            <a class="btn btn-app bg-warning" data-toggle="modal" data-target="#modal-add">
                <i class="fas fa-cat"></i><span>Add</span>
            </a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guests as $guest)
                        <tr>
                            <td>{{ $guest->name }}</td>
                            <td>{{ $guest->type ?? 'Basic' }}</td>
                            <td>
                                <div class="row" style="gap: 2px">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#update">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete">
                                        <i class="fas fa-trash" style="width: 14px;"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>#</th>
                    </tr>
                </tfoot>
            </table>
            <div class="mt-2">
                <div class="callout callout-info">
                    <h5><i class="fas fa-exclamation-triangle"></i> Keterangan:</h5>
                    <div class="col">
                        <div class="row">
                            <div class="col-1">
                                <i class="fas fa-cat"></i>
                            </div>
                            <span class="col">
                                : Menambahkan Data
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <i class="fas fas fa-cog"></i>
                            </div>
                            <span class="col">
                                : Merubah Data
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <i class="fas fa-trash"></i>
                            </div>
                            <span class="col">
                                : Meghapus Data
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
