<div class="top-0 left-0 fixed">
    <aside class="relative bg-black h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <img src="https://gardeniasecret.com/images/logo.png" alt="">
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{ Route('client.dashboard') }}" class="flex items-center  py-4 text-white pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="{{ Route('profile.show') }}" class="flex items-center  opacity-75 text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fa-solid fa-user mr-3"></i>
                Profile
            </a>
        </nav>
    </aside>
</div>