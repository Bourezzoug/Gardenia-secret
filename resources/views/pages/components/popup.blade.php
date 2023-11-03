@if($showPopup)
<div id="pop-up" class="fixed w-[650px] h-[400px] bg-white bottom-5 left-10 z-50 pointer-events-none opacity-0 transition-opacity hidden md:block">
    <div class="grid h-full grid-cols-10">
        <div class="col-span-4">
            <img src="{{ asset('images/popup-image.jpeg') }}" class="h-full object-cover" alt="">
        </div>
        <form id="pop-newsletter" action="{{ Route('email.store') }}" method="POST" class="col-span-6 my-auto mx-auto">
            @csrf
            <div class="flex flex-col concept-s mx-4 mt-8">
                <h2 class="text-sm sm:text-3xl pb-2 font-Lato mx-auto uppercase relative font-extralight">Newsletter</h2>
            <p class="text-[#838383] font-cormorant mx-auto text-sm">Inscrivez-vous et recevez tous les conseils beauté <br> de la tribu Gardenia Secret</p>

            </div>
            <div class="items-center mx-4 space-y-4 max-w-screen-sm sm:flex pt-2 flex-col gap-2 sm:space-y-0">
                <div class="relative w-full">
                    <input class="rounded block p-3 pl-2 w-full text-base text-gray-900 bg-gray-50  border border-gray-300  font-cormorant  outline-none" placeholder="Nom Complet" type="text" name="nom_complet" id="nom_complet" required>
                </div>
                <div class="relative w-full">
                    <label for="email" class="hidden  text-sm font-medium text-gray-900">Email address</label>
                    <input class="rounded block p-3 pl-2 w-full text-base text-gray-900 bg-gray-50  border border-gray-300  font-cormorant  outline-none" placeholder="Address email" type="email" name="email" id="email" required>
                </div>
                <div class="relative w-full">
                    <select name="ville" id="" class="rounded block p-3 pl-2 w-full text-base text-gray-900 bg-gray-50  border border-gray-300  font-cormorant  outline-none">
                        <option value="" readonly="true" hidden="true"
                        selected>Choisir votre pays</option>
                        @foreach ($cities as $ville)
                        <option value="{{ $ville['name'] }}">{{ $ville['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="relative w-full">
                    <button type="submit" class="py-3 px-5 w-full text-base text-center text-black  border cursor-pointer bg-second-color border-second-color  font-cormorant">S'abonner</button>
                </div>
            </div>

        </form>
    </div>
    <div id="close" class="absolute top-5 right-8 cursor-pointer">
        <img src="{{ asset('images/close.png') }}" class="w-8 h-8" alt="">
    </div>
</div>
@endif