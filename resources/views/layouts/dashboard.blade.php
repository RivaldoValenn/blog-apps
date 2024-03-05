    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $title }}</title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@phosphor-icons/web"></script>
        <!-- Nucleo Icons -->
        <!-- Popper -->
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <!-- Main Styling -->
        <script src="https://unpkg.com/@phosphor-icons/web"></script>
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

    <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
        <!-- sidenav  -->
        @include('partials.sidenav')
        <!-- end sidenav -->

        <main class="main-content flex justify-center items-center">
            <div class="container mx-auto">
                @yield('content')
            </div>
        </main>

        <!-- main script file  -->

        <script>
            function previewImage() {
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        title.addEventListener('change', function(){
            fetch('/dashboard/posts/check-slug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        })
        </script>
        <script src="https://kit.fontawesome.com/f3fb908589.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    </body>

    </html>
