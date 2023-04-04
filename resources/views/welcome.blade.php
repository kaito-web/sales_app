@include('sales/header1')
@include('sales/boot')

<body>
    <div class="container mx-auto">
        <div class="py-12"></div>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/a.jpg') }}" class="d-block w-100" alt="a">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/b.jpg') }}" class="d-block w-100" alt="b">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/c.jpg') }}" class="d-block w-100" alt="c">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Link Button -->
        <div class="text-center my-10">
            <a href="/login" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                ログイン
            </a>
        </div>
    </div>
    <div class="py-12"></div>
</body>
@include('sales/footer1')
