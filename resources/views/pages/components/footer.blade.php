<footer class="bg-black" style="-webkit-font-smoothing: antialiased;">
  {{-- <img src="images/logo.png" class="h-20 mx-auto pt-8" alt=""> --}}
  <div class="flex flex-col md:flex-row container mx-auto px-6 text-white justify-between  pt-16">
      <div>
          <img src="{{ asset('images/logo.png') }}" class="h-16" alt="">
          <p class="font-cormorant py-1 mt-1 text-[1rem]  max-w-md">
Gardenia Secret carefully selects beauty products to introduce you to new Moroccan artisanal products. Our goal is to help you feel beautiful and confident while exploring the magic of beauty and the culture of Morocco.
Our Concept
          </p>
          <div class="flex items-center my-2 gap-2">
            <a href="https://www.facebook.com/gardeniasecretb/" target="_blank" class=" bg-[#e9b5a8] px-3.5 py-2 border cursor-pointer  border-none rounded-full transition-all">
              <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="https://www.instagram.com/gardenia.secret/" target="_blank" class="px-3 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://www.youtube.com/@Gardenia.Secret" target="_blank" class="px-2.5 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
              <i class="fa-brands fa-youtube"></i>
            </a>
            <a href="https://www.tiktok.com/@gardenia.secret" target="_blank" class="px-3 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
              <i class="fa-brands fa-tiktok"></i>
            </a>
            <a href="https://www.pinterest.fr/gardeniasecret/" target="_blank" class="px-3 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
              <i class="fa-brands fa-pinterest-p"></i>
            </a>
          </div>
      </div>
      <div class="mt-5 md:mt-0">
          <h4 class="uppercase text-xl font-Lato">Concept</h4>
          <p class="font-cormorant py-1 mt-1 "><a href="#">Our Concept</a></p>
          {{-- <p class="font-cormorant py-1 "><a href="#">Activer une carte cadeau</a></p> --}}
          <p class="font-cormorant py-1 "><a href="{{ Route('mag.index') }}">Magazine</a></p>
          {{-- <p class="font-cormorant py-1 "><a href="#">E-boutique</a></p> --}}
          <p class="font-cormorant py-1 "><a href="{{ route('contact.index') }}">Contact Us</a></p>
        </div>
      <div class="lg:mr-24 mt-5 md:mt-0">
        <h4 class="uppercase text-xl font-Lato">Support</h4>
        <p class="font-cormorant py-1 mt-1  "><a href="#">Order Tracking</a></p>
        <p class="font-cormorant py-1 "><a href="#">Customer Services</a></p>
        <p class="font-cormorant py-1 "><a href="#">Delivery and Returns</a></p>
        <p class="font-cormorant py-1 "><a href="{{ Route('faq.index') }}">Frequently Asked Questions</a></p>
        <p class="font-cormorant py-1 "><a href="#">Site Map</a></p>
      </div>
  </div>
  <div class="nav-footer py-3 text-white border-t mt-12 border-[#5f5f5f]">
    <div class="container md:px-56 px-6 mx-auto py-3 flex flex-col md:flex-row md:justify-around text-sm  ">
      <a href="{{ asset('pdf/cgv.pdf') }}" class="uppercase font-Lato text-xs">Terms and Conditions</a>
      <a href="#" class="uppercase font-Lato text-xs">LEGAL NOTICE</a>
      <a href="{{ asset('pdf/politique de confidentilité.pdf') }}" class="uppercase font-Lato text-xs">PRIVACY POLICY</a>
      
      </a>

    </div>
  </div>

    <div class="container px-6 mx-auto py-3 flex justify-around text-sm text-white">
      <p>&copy; {{ date('Y',strtotime(now())) }} Gardenai Secret. tous droits réservés </p>
    </div>

</footer>