<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bootstrapmade.com/content/demo/NiceAdmin/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Jun 2025 04:55:42 GMT -->

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Phong thủy đại cát</title>
    <meta name="robots" content="noindex, nofollow">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
 

 

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assetsadmin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsadmin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsadmin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsadmin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assetsadmin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/assetsadmin/css/toastr.min.css') }}" rel="stylesheet">
 

</head>

<body>

    <!-- ======= Header ======= -->
    @include('admin.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('admin.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('contentadmin')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    {{-- @include('admin.footer') --}}
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="{{ asset('assetsadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assetsadmin/js/main.js') }}"></script>
    <!-- Toastr JS -->
    <script src="{{ asset('/assetsadmin/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/assetsadmin/js/toastr.min.js') }}"></script>

    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
    </script>
    <script src="{{ asset('/assetsadmin/js/style.js') }}"></script>
    
    <script src="{{ asset('/source/tinymce/tinymce.min.js') }}"></script>
    
    <script type="text/javascript">
        tinymce.init({
            selector: '#tyni',
            plugins: 'advlist autolink lists link charmap preview anchor table image',
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help | table | link image | blocks fontfamily fontsize',
            images_upload_url: "/upload-image",
            relative_urls: false,
            document_base_url: "{{ url('/') }}",
            automatic_uploads: true,
            setup: function(editor) {
                editor.on('NodeChange', function(event) {
                    const currentImages = Array.from(editor.getDoc().querySelectorAll('img')).map(img =>
                        img.src);

                    if (!editor.oldImages) editor.oldImages = currentImages;

                    const removedImages = editor.oldImages.filter(img => !currentImages.includes(img));
                    editor.oldImages = currentImages;

                    removedImages.forEach(imageUrl => {
                        fetch('/delete-image', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    image: imageUrl
                                })
                            })
                            .then(response => response.json())
                            .then(data => console.log(data.message))
                            .catch(error => console.error('Lỗi khi xóa ảnh:', error));
                    });
                });
            }
        })




     
    </script>
    
    @stack('scripts')
</body>



</html>
