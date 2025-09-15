@extends('layouts.index')

@section('title', 'Barcode')
@section('page', 'Barcode')

@section('content')
    <div class="card">
        <div class="card-header bg-black color-palette">
            <h3 class="card-title">Barcode</h3>
        </div>
        <div class="card-body">
            <div class="d-grid gap-3 text-center">
                <div class="p-2 bg-light border d-inline-block"> {!! DNS1D::getBarcodeHTML($url, 'C128', 2, 60) !!}</div>
                <a href="{{ route('barcode.download') }}" type="button" class="mt-2 btn btn-success btn-block btn-flat">
                    <i class="fa fa-download pr-1"></i>Download
                </a>
            </div>
        </div>
    </div>
@endsection
