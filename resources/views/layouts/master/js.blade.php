<script src="{{ asset('jquery/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/popover.min.js') }}"></script>
<script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('sweetAlert/sweetalert.min.js') }}"></script>
<script src="{{ asset('DataTables/dataTables.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

<script>
$(document).ready(function() {
    $('.dompet').DataTable({
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

// Membuat fungsi agar form hanya bisa diinputkan angka saja
function isInputNumber(event) {
        var char = String.fromCharCode(event.which);
        if (!(/[0-9]/).test(char)) {
            event.preventDefault();
        }
}

// Buat Format Tanggal sesuai yang di inginkan
$( function() {
    $( ".datepicker" ).datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        showAnim: "slideDown"
    });
});

// fungsi tutup pesan error otomatis
setTimeout(function() {
    $('.message').toggle('hide')
}, 4000);

</script>
@include('layouts.sweet-alert-notification')
