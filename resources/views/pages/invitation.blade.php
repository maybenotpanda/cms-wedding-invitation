@extends('layouts.index')

@section('title', 'Wedding Invited Guests')
@section('page', 'Invitation')

@include('partials.modal.add-guest')
@include('partials.modal.delete-guest')
@include('partials.modal.detail-guest')

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
                                    <button type="button" class="btn btn-success btn-sm"
                                        onclick="copyMessage('{{ $guest->name }}', '{{ $guest->slug }}')">
                                        <i class="fas fa-copy" style="width: 14px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-update" data-uuid="{{ $guest['id'] }}" data-name="{{ $guest['name'] }}" data-slug="{{ $guest['slug'] }}" data-type="{{ $guest['type'] }}" data-type="{{ $guest['type'] }}" data-isGift="{{ $guest['is_gift'] }}">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete" data-uuid="{{ $guest->id }}">
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

<script>
    // copy
    function copyMessage(name, slug) {
        const message = `
Assalamualaikum Wr. Wb.

Bismillahirrohmaanirrohiim

Kepada Yth.
Bapak/Ibu/Saudara/i

${name}
____________________________

Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, untuk menghadiri serta doa restu pada acara pernikahan kami:

👰🏻‍♀️ MW Putri Meilinia H. Purba
&
🤵🏻 Muhammad Fariz Dzuhreza

Berikut tautan untuk info lengkap undangan kami

🔗 https://mw-reza.duckxpanda.com/${slug}

Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.

Wassalamualaikum Wr. Wb.

Terima Kasih..

Hormat kami,
💍MW & Reza
`;
        navigator.clipboard.writeText(message).then(() => {
            alert('Pesan berhasil disalin untuk ' + name);
        }).catch(err => {
            alert('Gagal menyalin pesan: ' + err);
        });
    }
</script>
