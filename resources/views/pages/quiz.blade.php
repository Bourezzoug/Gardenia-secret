@extends('layouts.frontend')
@section('content')

@include('pages.components.header')
<form id="signUpForm" class="p-12  rounded-2xl bg-white mx-auto  mb-20" action="{{ Route('quiz.store') }}" method="POST">
    @csrf
    <!-- start step indicators -->
    <p class="text-md leading-tight text-center mt-2 mb-5 font-Lato">Parlez-nous de vous pour nous aider à personnaliser votre abonnement à Gardenia Box</p>
    <div class="form-header flex gap-3 mb-4 text-xs text-center">
        <span class="stepIndicator flex-1 pb-8 relative"></span>
        <span class="stepIndicator flex-1 pb-8 relative"></span>
        <span class="stepIndicator flex-1 pb-8 relative"></span>
        <span class="stepIndicator flex-1 pb-8 relative"></span>
        <span class="stepIndicator flex-1 pb-8 relative"></span>
        <span class="stepIndicator flex-1 pb-8 relative"></span> 


    </div>
    <!-- end step indicators -->

    <!-- step one -->
    <div class="step">
        <p class="text-3xl leading-tight text-center mt-16 mb-5 font-Lato font-medium">Comment décririez-vous votre teint de peau ?</p>

        <div class="flex justify-around gap-5 items-center my-20">
            <div>
                <input type="radio" id="clair" name="teint_peau" value="clair" class="hidden">
                <label for="clair" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#f9e5d9]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">clair</p>
                </label>
            </div>

            <div>
                <input type="radio" id="léger" name="teint_peau" value="léger" class="hidden">
                <label for="léger" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#efd2cc]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">léger</p>
                </label>
            </div>

            <div>
                <input type="radio" id="moyen" name="teint_peau" value="moyen" class="hidden">
                <label for="moyen" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#dfab80]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">moyen</p>
                </label>
            </div>

            <div>
                <input type="radio" id="bronzé_olive" name="teint_peau" value="bronzé_olive" class="hidden">
                <label for="bronzé_olive" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#b67349]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">bronzé/olive</p>
                </label>
            </div>

            <div>
                <input type="radio" id="foncé" name="teint_peau" value="foncé" class="hidden">
                <label for="foncé" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#64331f]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">foncé</p>
                </label>
            </div>

            <div>
                <input type="radio" id="profond" name="teint_peau" value="profond" class="hidden">
                <label for="profond" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#452c28]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">profond</p>
                </label>
            </div>

        </div>

    </div>

    <!-- step two -->
    <div class="step">

        <p class="text-3xl leading-tight text-center mt-16 mb-5 font-Lato font-medium">Quelle est la couleur de vos yeux ?</p>
        <div class="flex justify-around gap-5 items-center my-20 flex-wrap">
            <div>
                <input type="radio" id="marron" name="eyes_color" value="marron" class="hidden">
                <label for="marron" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#5a220d]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">marron</p>
                </label>
            </div>
            <div>
                <input type="radio" id="noisette" name="eyes_color" value="noisette" class="hidden">
                <label for="noisette" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#a77147]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">noisette</p>
                </label>
            </div>
            <div>
                <input type="radio" id="bleu" name="eyes_color" value="bleu" class="hidden">
                <label for="bleu" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#5d7391]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">bleu</p>
                </label>
            </div>
            <div>
                <input type="radio" id="vert" name="eyes_color" value="vert" class="hidden">
                <label for="vert" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#6d8352]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">vert</p>
                </label>
            </div>
            <div>
                <input type="radio" id="ambre" name="eyes_color" value="ambre" class="hidden">
                <label for="ambre" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#9a491a]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">ambre</p>
                </label>
            </div>
            <div>
                <input type="radio" id="gris" name="eyes_color" value="gris" class="hidden">
                <label for="gris" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#818087]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">gris</p>
                </label>
            </div>
            <div>
                <input type="radio" id="violet" name="eyes_color" value="violet" class="hidden">
                <label for="violet" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#625a93]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">violet</p>
                </label>
            </div>
            <div>
                <input type="radio" id="autre" name="eyes_color" value="autre" class="hidden">
                <label for="autre" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#c5ae3c]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">autre</p>
                </label>
            </div>

        </div>
    </div>

    <!-- step three -->
    <div class="step">
        <p class="text-3xl leading-tight text-center mt-16 mb-5 font-Lato font-medium">De quelle couleur est votre cheveux?</p>

        <div class="flex justify-around gap-5 items-center my-20 flex-wrap">
            <div>
                <input type="radio" id="noir" name="hair_color" value="noir" class="hidden">
                <label for="noir" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-black">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">noir</p>
                </label>
            </div>

            <div>
                <input type="radio" id="brun_foncé" name="hair_color" value="brun_foncé" class="hidden">
                <label for="brun_foncé" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#361912]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">brun foncé</p>
                </label>
            </div>

            <div>
                <input type="radio" id="brun_clair" name="hair_color" value="brun_clair" class="hidden">
                <label for="brun_clair" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#7c5537]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">brun clair</p>
                </label>
            </div>

            <div>
                <input type="radio" id="blond" name="hair_color" value="blond" class="hidden">
                <label for="blond" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#d7b986]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">blond</p>
                </label>
            </div>

            <div>
                <input type="radio" id="rouge" name="hair_color" value="rouge" class="hidden">
                <label for="rouge" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#853b3a]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">rouge</p>
                </label>
            </div>

            <div>
                <input type="radio" id="gris" name="hair_color" value="gris" class="hidden">
                <label for="gris" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#818087]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">gris</p>
                </label>
            </div>

            <div>
                <input type="radio" id="blanc" name="hair_color" value="blanc" class="hidden">
                <label for="blanc" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#e2e2e2]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">blanc</p>
                </label>
            </div>

            <div>
                <input type="radio" id="autre" name="hair_color" value="autre" class="hidden">
                <label for="autre" class="radio-button">
                    <div class="h-20 w-20 rounded-full bg-[#865992]">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">autre</p>
                </label>
            </div>

        </div>
    </div>
    <div class="step">
        <p class="text-3xl leading-tight text-center mt-16 mb-5 font-Lato font-medium">Quel est votre type de peau ?</p>

        <div class="flex justify-center gap-10 items-center my-20 flex-wrap">


            <div>
                <input type="radio" id="dry" name="type_peau" value="dry" class="hidden">
                <label for="dry" class="radio-button">
                    <div class="h-20 w-20 rounded-full " style="background-image: url(https://chicbeautybox.com/img/skins/Skin-Dry.webp);background-position:center;background-size:cover;">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">SECHE</p>
                </label>
            </div>
            <div>
                <input type="radio" id="oily" name="type_peau" value="oily" class="hidden">
                <label for="oily" class="radio-button">
                    <div class="h-20 w-20 rounded-full " style="background-image: url(https://chicbeautybox.com/img/skins/Skin-Oily.webp);background-position:center;background-size:cover;">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">GRASSE</p>
                </label>
            </div>
            <div>
                <input type="radio" id="both" name="type_peau" value="both" class="hidden">
                <label for="both" class="radio-button">
                    <div class="h-20 w-20 rounded-full " style="background-image: url(https://chicbeautybox.com/img/skins/Skin-Combination.webp);background-position:center;background-size:cover;">
                        <span class="button-text inline-block"></span>
                    </div>
                    <p class="text-sm uppercase font-Lato text-center pt-2">LES DEUX</p>
                </label>
            </div>

        </div>
    </div>


    <div class="step">
        <p class="text-3xl leading-tight text-center my-16 font-Lato font-medium">Quel est votre style de maquillage ?</p>
        <div class="flex gap-5 items-start border-b borde-gray-200 my-5 pb-10">
            <input type="radio" name="style_maquillage" value="Naturel" id="Naturel" class="mt-2 h-5 w-5">
            <label for="Naturel">
                <span class="block mb-2 text-xl font-Lato">Naturel</span>
                <span class="block">Je préfère un look naturel.</span>
            </label>
        </div>

        <div class="flex gap-5 items-start border-b borde-gray-200 my-5 pb-10">
            <input type="radio" name="style_maquillage" value="Classique" id="Classique" class="mt-2 h-5 w-5">
            <label for="Classique">
                <span class="block mb-2 text-xl font-Lato">Classique</span>
                <span class="block">J'opte généralement pour un style traditionnel.</span>
            </label>
        </div>

        <div class="flex gap-5 items-start border-b borde-gray-200 my-5 pb-10">
            <input type="radio" name="style_maquillage" value="Tendance" id="Tendance" class="mt-2 h-5 w-5">
            <label for="Tendance">
                <span class="block mb-2 text-xl font-Lato">Tendance</span>
                <span class="block">Je suis à la pointe des tendances.</span>
            </label>
        </div>
        <div class="flex gap-5 items-start  my-5 pb-10">
            <input type="radio" name="style_maquillage" id="Aventurier" class="mt-2 h-5 w-5">
            <label for="Aventurier">
                <span class="block mb-2 text-xl font-Lato">Aventurier</span>
                <span class="block">J'aime essayer de nouvelles choses.</span>
            </label>
        </div>

    </div>



    <!-- start previous / next buttons -->
    <div class="form-footer flex gap-3 justify-around ">
        <button type="button" id="prevBtn" class="focus:outline-none border border-gray-300 py-2 px-5 rounded-lg shadow-sm text-center text-gray-700 bg-white hover:bg-gray-100 text-lg w-1/4" onclick="nextPrev(-1)">Previous</button>
        <button type="button" id="nextBtn" class=" border border-transparent focus:outline-none p-3 rounded-md text-center text-white bg-main-color text-lg w-1/4" onclick="nextPrev(1)">Next</button>
    </div>
    <!-- end previous / next buttons -->
</form>
    @include('pages.components.footer')
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab
    
        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("step");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }
    
        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("step");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("signUpForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }
    
        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("step");
            y = x[currentTab].getElementsByTagName("input");
    
            // Check if at least one radio button is selected
            var radioSelected = false;
            for (i = 0; i < y.length; i++) {
                if (y[i].type == "radio" && y[i].checked) {
                    radioSelected = true;
                    break;
                }
            }
    
            if (!radioSelected) {
                valid = false;
            }
    
            // Rest of your validation logic...
    
            return valid; // return the valid status
        }
    
        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("stepIndicator");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
    
@endsection
