<script src="{{ asset('jquery/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/popover.min.js') }}"></script>
<script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('sweetAlert/sweetalert.min.js') }}"></script>
<script src="{{ asset('DataTables/dataTables.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('#dompet').DataTable({
        "oLanguage": {
            "sLengthMenu": "_MENU_ /Halaman"
        },
        "language": {
            "info": "Melihat _START_ s/d _END_ dari _TOTAL_ data",
            "infoEmpty":      "0 Data Terdeteksi",
            "infoFiltered": "(Menyaring dari _MAX_ total data)",
            "emptyTable": "Tidak ada Data untuk Ditampilkan",
            "search": "",
            "searchPlaceholder": "Cari",
            "paginate": {
                "previous": "Sebelum",
                "next": "Lanjut"
            },
            "zeroRecords":    "Tidak ada data yang cocok ditemukan",
        }
    });
} );
</script>
@include('layouts.sweet-alert-notification')
