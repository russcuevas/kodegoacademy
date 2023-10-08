@include('components._Header')
@include('components._Navbar')

    <section class="about" id="about">
        <div class="container">
            <div class="row">
            <h1 class="title text-center" style="color: #9fef00">About Us</h1>
            <div class="col-lg-6 text-left">
                <p class="text-white">KodeGo gives individuals,
                businesses and universities the tools they need to
                continuously improve their programming skills.
                KodeGo gives individuals,
                businesses and universities the tools they need to
                continuously improve their programming skills.</p>
                <p class="text-white">KodeGo gives individuals,
                businesses and universities the tools they need to
                continuously improve their programming skills.
                KodeGo gives individuals,
                businesses and universities the tools they need to
                continuously improve their programming skills.</p>
            </div>

            <div class="col-lg-6 text-center">
                <img src="{{ asset('page/images/navlogo.png') }}" alt="Logo" class="img-fluid flip" id="autoFlipImage">
            </div>

            </div>
        </div>

        <div class="container">
            <div class="row mt-4">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="text-white p-4">
                        <h2 class="text-white"><img class="container-image" src="{{ asset('page/images/networking.png') }}" alt=""></h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="text-white p-4">
                            <h2 class="text-white"><img class="container-image" src="{{ asset('page/images/security.png') }}" alt=""></h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="text-white p-4">
                            <h2 class="text-white"><img class="container-image" src="{{ asset('page/images/programming.jpg') }}" alt=""></h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="text-white p-4">
                        <h2 class="text-white"><img class="container-image" src="{{ asset('page/images/sampleimage.png') }}" alt=""></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('components._Footer')