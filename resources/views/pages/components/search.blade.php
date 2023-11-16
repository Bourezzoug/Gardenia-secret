<form action="{{ Route('search.index') }}" method="GET" id="search-container" class="fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-90 z-[999] hidden">

    <div class="relative w-8/12  left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2">
        <input type="text" name="query" id="" placeholder="Search..." class="w-full  p-3 bg-transparent border-r-0 border-l-0 border-t-0 border-b-4 border-white text-white placeholder-white text-3xl focus:border-white" style="box-shadow: none;outline:none">
        <i class="fa-solid fa-magnifying-glass absolute right-0 top-1/2 -translate-y-1/2 text-white text-2xl"></i>
    </div>

    <button class="close-search-container">
        <i class="fa-solid fa-xmark absolute top-3 right-12 text-3xl text-white"></i>
    </button>
</form>
<script>
    document.querySelectorAll('.search-content').forEach(element => {
        element.addEventListener('click', () => {
            document.getElementById('search-container').classList.remove('hidden');
        });
    });
    document.querySelector('.close-search-container').addEventListener('click',() => {
        document.getElementById('search-container').classList.add('hidden');
    })
</script>
