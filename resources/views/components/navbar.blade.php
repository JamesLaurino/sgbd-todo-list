<nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
    <div class="mr-auto">
        <a class="navbar-brand ml-3 text-white" href="#"></a>
    </div>

    <!-- Titre centré -->
    <div class="d-flex justify-content-center w-100 ml-5 text-white">
        <span class="h3 mr-3">Ma todo liste</span>
        <span class="fas fa-book mt-2" style="font-size: 1.5rem;"></span>
    </div>

    @auth
        <div class="my-2 my-lg-0 mr-5">
            <a href="/dashboard" class="text-white">Dashbord</a>
        </div>
    @endauth
</nav>
