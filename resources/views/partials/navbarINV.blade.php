<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid px-5">
    <a class="navbar-brand" href="/dashboard/{{ $dash_data['email'] }}/investor"><img src="{{ URL::asset("Images/Burung Only.png") }}" alt="Logo Mycica" style="width:30px;" class="d-inline-block align-text-top"> MyCica</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/katalog/investasi/inv/{{ $dash_data['email'] }}">Investasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/katalog/detailBurung/{{ $dash_data['email'] }}">Katalog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Pemberitahuan</a>
            </li>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="/profil/Investor/{{ $dash_data['email'] }}" style="text-decoration: none;color:black">Profil</a>
            </li>
            </ul>
        </div>
    </div>
</nav>