    <!-- plugins:js -->
    <script src="{{ asset('/admindash/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('/admindash/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('/admindash/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{ asset('/admindash/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{ asset('/admindash/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('/admindash/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('/admindash/assets/js/off-canvas.js')}}"></script>
    <script src="{{ asset('/admindash/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('/admindash/assets/js/misc.js')}}"></script>
    <script src="{{ asset('/admindash/assets/js/settings.js')}}"></script>
    <script src="{{ asset('/admindash/assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('/admindash/assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->

    {{-- <script type="text/javascript">
        // Fungsi untuk menampilkan konfirmasi sebelum menghapus item
        function confirmation(ev) {
            ev.preventDefault();  // Mencegah tindakan default dari elemen yang dipicu (misalnya, pengalihan halaman)

            var urlToRedirect = ev.currentTarget.getAttribute('href');
            // Mengambil URL dari atribut 'href' pada elemen yang memicu fungsi (biasanya tombol/link)
            console.log(urlToRedirect);
            // Menampilkan URL yang diambil di konsol browser (untuk debugging)

            swal({
                // Menampilkan pesan konfirmasi menggunakan SweetAlert
                title: "Are You Sure You Want To Delete This?", // Judul dari dialog konfirmasi
                text: "This delete will be permanent!", // Pesan yang menjelaskan bahwa penghapusan akan bersifat permanen
                icon: "warning", // Ikon yang ditampilkan dalam dialog konfirmasi
                buttons: true, // Menampilkan tombol konfirmasi dan pembatalan
                dangerMode: true, // Menandakan bahwa tindakan ini berbahaya (merah)
            })
            .then((willDelete) => {
                // Menangani hasil dari dialog konfirmasi
                if (willDelete) {
                    window.location.href = urlToRedirect;
                    // Jika pengguna mengonfirmasi (klik "OK"), arahkan ke URL yang diambil dari atribut 'href'
                }
            });
        }
    </script> --}}
    <script type="text/javascript">
    function confirmation(event) {
        event.preventDefault(); // Mencegah pengiriman form langsung

        swal({
            title: "Are you sure?",
            text: "This delete will be permanent!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                event.target.closest("form").submit(); // Kirim form setelah konfirmasi
            }
        });
    }
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
