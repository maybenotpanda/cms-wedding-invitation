<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Duck X Panda')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.sidebar')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('page', 'Not Found')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../../../../">Home</a></li>
                                <li class="breadcrumb-item active">@yield('page', 'Not Found')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
    </div>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        })

        document.getElementById('addRow').addEventListener('click', function() {
            var container = document.getElementById('form-container');
            var firstForm = container.querySelector('.single-form');
            var cloned = firstForm.cloneNode(true);

            cloned.querySelectorAll('input, select').forEach(function(el) {
                if (el.type === 'text') el.value = '';
                if (el.tagName === 'SELECT') el.selectedIndex = 0;
                if (el.type === 'radio') el.checked = false;
            });

            var removeBtn = cloned.querySelector('.removeRow');
            removeBtn.style.display = "block";
            removeBtn.addEventListener('click', handleRemove);

            var hr = document.createElement('hr');
            container.appendChild(hr);
            container.appendChild(cloned);

            updateRemoveButtons();
        });

        function handleRemove() {
            var container = document.getElementById('form-container');
            var forms = container.querySelectorAll('.single-form');

            if (forms.length > 1) {
                var form = this.closest('.single-form');

                if (form.previousElementSibling?.tagName === 'HR') {
                    form.previousElementSibling.remove();
                } else if (form.nextElementSibling?.tagName === 'HR') {
                    form.nextElementSibling.remove();
                }

                form.remove();
                updateRemoveButtons();
            }
        }

        function updateRemoveButtons() {
            var forms = document.querySelectorAll('#form-container .single-form');
            var buttons = document.querySelectorAll('#form-container .removeRow');

            buttons.forEach(btn => btn.style.display = "block");

            if (forms.length === 1) {
                buttons[0].style.display = "none";
            }
        }

        document.querySelectorAll('#form-container .removeRow').forEach(function(btn) {
            btn.addEventListener('click', handleRemove);
        });

        updateRemoveButtons();

        // delete guest
        $(document).ready(function() {
            $('#modal-delete').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var invitationId = button.data('uuid');
                var form = $('#deleteForm');
                form.attr('action', '/invitation/' + invitationId);
            });
            $('#modal-update').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var uuid = button.data('uuid')
                var name = button.data('name')
                var slug = button.data('slug')
                var type = button.data('type')


                $('#updateForm').attr('action', '/invitation?uuid=' + uuid);

                $('#updateForm #name').val(name);
                $('#updateForm #slug').val('www.mw-reza.duckxpanda.com/' + slug);
            });

            $('#modal-update').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var uuid = button.data('uuid');
                var name = button.data('name');
                var slug = button.data('slug');
                var type = button.data('type');
                var isGift = button.data('is_gift');
                var type = button.data('type');
                $('#updateForm select[name="type"]').val(type);
                $('#updateForm').attr('action', '/invitation/update/' + uuid);

                $('#updateForm #name').val(name);
                $('#updateForm #slug').val('www.mw-reza.duckxpanda.com/' + slug);
                $('#updateForm select[name="type"]').val(type);
            });
        });
    </script>
</body>

</html>
