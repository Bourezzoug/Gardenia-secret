@if($showPopup)
<div id="pop-up" class="fixed w-[650px]  bg-white bottom-5 left-10 z-50 pointer-events-none opacity-0 transition-opacity hidden md:block">
    <div class="grid h-full grid-cols-10">
        <div class="col-span-4">
            <img src="{{ asset('images/ig-04.jpeg') }}" class="h-full object-cover" alt="">
        </div>
        <form id="pop-newsletter" action="{{ Route('email.store') }}" method="POST" class="col-span-6 my-auto mx-auto p-2">
            @csrf
            <div class="flex flex-col concept-s mx-4 mt-8">
                <h2 class="text-sm sm:text-3xl pb-2 font-Lato mx-auto uppercase relative font-extralight">Newsletter</h2>
            <p class="text-[#838383] font-cormorant mx-auto text-sm">Sign up and receive all the beauty tips 
                <br> from the Gardenia Secret tribe.</p>

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
                    <select name="pays" id="paysSelect" class="rounded block p-3 pl-2 w-full text-base text-gray-900 bg-gray-50 border border-gray-300 font-cormorant outline-none" onchange="showVilleSelect()">
                        <option value="" readonly="true" hidden="true" selected>Choisir votre pays</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country['name'] }}">{{ $country['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="relative w-full" id="villeSelectContainer" style="display: none;">
                    <select name="ville" id="villeSelect" class="rounded block p-3 pl-2 w-full text-base text-gray-900 bg-gray-50 border border-gray-300 font-cormorant outline-none">
                        <option value="" readonly="true" hidden="true" selected>Choisir votre ville</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city['ville'] }}">{{ $city['ville'] }}</option>
                        @endforeach
                    </select>
                </div>
                
                <script>
                    function showVilleSelect() {
                        var paysSelect = document.getElementById('paysSelect');
                        var villeSelectContainer = document.getElementById('villeSelectContainer');
                
                        // Show the "ville" select only if the selected country is "Morocco"
                        villeSelectContainer.style.display = (paysSelect.value === 'Morocco') ? 'block' : 'none';
                    }
                </script>
                
                <div class="relative w-full ">
                    <button type="submit" class="py-3 px-5 w-full text-base text-center text-black  border cursor-pointer bg-second-color border-second-color  font-cormorant">S'abonner</button>
                </div>
            </div>

        </form>
    </div>
    <div id="close" class="absolute top-5 right-8 cursor-pointer">
        <img src="{{ asset('images/close.png') }}" class="w-8 h-8" alt="">
    </div>
</div>
<script>
    var newsLetterForm = document.getElementById('pop-newsletter');
var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

newsLetterForm.addEventListener('submit', function(e) {
e.preventDefault();
var formData = new FormData(newsLetterForm);

var xhr = new XMLHttpRequest();
xhr.open(newsLetterForm.method, newsLetterForm.action);
xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE) {
if (xhr.status === 422) { 
  var errorObj = JSON.parse(xhr.responseText);
  var errors = errorObj.errors || {};
  for (var field in errors) {
      var inputField = document.querySelector('[name="' + field + '"]');
      inputField.classList.add('is-invalid');
      var errorElement = inputField.nextElementSibling;
      errorElement.innerHTML = errors[field][0];
      errorElement.style.display = 'block';
  }

  var message = errorObj.message || "Error";
  if(message.includes('The email has already been taken.')) {
    Toastify({
          text: 'Email already used',
          duration: 3000, 
          gravity: 'top', 
          position: 'center', 
          backgroundColor: '#ef4444', 
          stopOnFocus: true, 
        }).showToast();
  }
  }
else if (xhr.status === 200) {
  // if (this.responseText == 'exists') {
        Toastify({
          text: 'Thank you for joining our mailing list.',
          duration: 3000, 
          gravity: 'top', 
          position: 'center', 
          backgroundColor: '#af8d6a', 
          stopOnFocus: true, 
        }).showToast();
        document.getElementById('pop-up').remove();
      } else {
        handleSuccess();
      // }
    }
  }
};
xhr.send(formData);
});
</script>
@endif