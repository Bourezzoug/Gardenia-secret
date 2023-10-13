<div class="top-0 left-0 fixed">
    <aside class="relative bg-black h-screen w-64 hidden sm:block shadow-xl overflow-y-auto">
        <div class="p-6">
            <img src="https://gardeniasecret.com/images/logo.png" alt="">
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{ Route('dashboard') }}" class="flex items-center  py-4 text-white pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="{{ Route('product.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100  py-4 pl-6 nav-item">
                <i class="fa-solid fa-store mr-3"></i>
                Produits
            </a>
            <a href="{{ Route('category.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fa-solid fa-tags mr-3"></i>
                Categories
            </a>
            <a href="{{ Route('blog.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fa-regular fa-newspaper mr-3"></i>
                Articles
            </a>
            <a href="{{ Route('inscrit.index') }}" class="flex items-center  opacity-75 text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fa-solid fa-users mr-3"></i>
                Inscrits
            </a>
            <a href="{{ Route('box.index') }}" class="flex items-center  opacity-75 text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fa-solid fa-gift mr-4"></i>
                Box
            </a>
            <a href="{{ Route('client.index') }}" class="flex items-center  opacity-75 text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fa-solid fa-user-tie mr-4"></i>
                Clients
            </a>
            <a href="{{ Route('campagne.index') }}" class="flex items-center  opacity-75 text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fa-solid fa-bullhorn mr-4"></i>
                Campagnes
            </a>
            <a href="{{ Route('banniere.index') }}" class="flex items-center  opacity-75 text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fa-regular fa-images mr-4"></i>
                Bannières
            </a>
            <a href="{{ Route('order.index') }}" class="flex items-center  opacity-75 text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fa-solid fa-cart-shopping mr-4"></i>
                Orders
            </a>
        </nav>
    </aside>
</div>