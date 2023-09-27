@extends('layouts.frontend')
@section('content')
<div class="bg-black w-full text-white font-cormorant italic text-md">
    <div class="container mx-auto px-6 md:h-8 flex  justify-between md:items-center">
        <div>
            <span>
                <i class="fa-solid fa-envelope mr-2"></i>
                contact@gardeniasecret.ma
            </span>
        </div>

        <div>
            <span>
                <i class="fa-solid fa-user mr-2"></i>
            </span>
            <a href="#" class="hover:underline">Login</a>
        </div>
    </div>
</div>
@include('pages.components.header')
    <form id="signUpForm" class="p-12  rounded-2xl bg-white mx-auto  mb-20" action="#!">
        <!-- start step indicators -->
        <p class="text-md leading-tight text-center mt-8 mb-5 font-Lato">Parlez-nous de vous pour nous aider à personnaliser votre abonnement à Gardenia Box</p>
        <div class="form-header flex gap-3 mb-4 text-xs text-center">
            <span class="stepIndicator flex-1 pb-8 relative"></span>
            <span class="stepIndicator flex-1 pb-8 relative"></span>
            <span class="stepIndicator flex-1 pb-8 relative"></span>
            <span class="stepIndicator flex-1 pb-8 relative"></span>
            <span class="stepIndicator flex-1 pb-8 relative"></span>
            <span class="stepIndicator flex-1 pb-8 relative"></span>
            {{-- <span class="stepIndicator flex-1 pb-8 relative"></span> --}}

        </div>
        <!-- end step indicators -->
    
        <!-- step one -->
        <div class="step">
            <p class="text-3xl leading-tight text-center mt-16 mb-5 font-Lato font-medium">Comment décririez-vous votre teint de peau ?</p>

            <div class="flex justify-around gap-5 items-center my-20">
                <div>
                    <input type="radio" id="clair" name="color" value="clair" hidden>
                    <label for="clair" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#f9e5d9]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">clair</p>
                    </label>
                </div>

                <div>
                    <input type="radio" id="léger" name="color" value="léger" hidden>
                    <label for="léger" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#efd2cc]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">léger</p>
                    </label>
                </div>

                <div>
                    <input type="radio" id="moyen" name="color" value="moyen" hidden>
                    <label for="moyen" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#dfab80]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">moyen</p>
                    </label>
                </div>

                <div>
                    <input type="radio" id="bronzé_olive" name="color" value="bronzé_olive" hidden>
                    <label for="bronzé_olive" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#b67349]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">bronzé/olive</p>
                    </label>
                </div>

                <div>
                    <input type="radio" id="foncé" name="color" value="foncé" hidden>
                    <label for="foncé" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#64331f]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">foncé</p>
                    </label>
                </div>

                <div>
                    <input type="radio" id="profond" name="color" value="profond" hidden>
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
                    <input type="radio" id="marron" name="color" value="marron" hidden>
                    <label for="marron" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#5a220d]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">marron</p>
                    </label>
                </div>
                <div>
                    <input type="radio" id="noisette" name="color" value="noisette" hidden>
                    <label for="noisette" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#a77147]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">noisette</p>
                    </label>
                </div>
                <div>
                    <input type="radio" id="bleu" name="color" value="bleu" hidden>
                    <label for="bleu" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#5d7391]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">bleu</p>
                    </label>
                </div>
                <div>
                    <input type="radio" id="vert" name="color" value="vert" hidden>
                    <label for="vert" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#6d8352]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">vert</p>
                    </label>
                </div>
                <div>
                    <input type="radio" id="ambre" name="color" value="ambre" hidden>
                    <label for="ambre" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#9a491a]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">ambre</p>
                    </label>
                </div>
                <div>
                    <input type="radio" id="gris" name="color" value="gris" hidden>
                    <label for="gris" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#818087]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">gris</p>
                    </label>
                </div>
                <div>
                    <input type="radio" id="violet" name="color" value="violet" hidden>
                    <label for="violet" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#625a93]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">violet</p>
                    </label>
                </div>
                <div>
                    <input type="radio" id="autre" name="color" value="autre" hidden>
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
                    <input type="radio" id="noir" name="color" value="noir" hidden>
                    <label for="noir" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-black">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">noir</p>
                    </label>
                </div>

                <div>
                    <input type="radio" id="brun_foncé" name="color" value="brun_foncé" hidden>
                    <label for="brun_foncé" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#361912]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">brun foncé</p>
                    </label>
                </div>

                <div>
                    <input type="radio" id="brun_clair" name="color" value="brun_clair" hidden>
                    <label for="brun_clair" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#7c5537]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">brun clair</p>
                    </label>
                </div>

                <div>
                    <input type="radio" id="blond" name="color" value="blond" hidden>
                    <label for="blond" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#d7b986]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">blond</p>
                    </label>
                </div>

                <div>
                    <input type="radio" id="rouge" name="color" value="rouge" hidden>
                    <label for="rouge" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#853b3a]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">rouge</p>
                    </label>
                </div>

                <div>
                    <input type="radio" id="gris" name="color" value="gris" hidden>
                    <label for="gris" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#818087]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">gris</p>
                    </label>
                </div>

                <div>
                    <input type="radio" id="blanc" name="color" value="blanc" hidden>
                    <label for="blanc" class="radio-button">
                        <div class="h-20 w-20 rounded-full bg-[#e2e2e2]">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">blanc</p>
                    </label>
                </div>

                <div>
                    <input type="radio" id="autre" name="color" value="autre" hidden>
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
                    <input type="radio" id="dry" name="color" value="dry" hidden>
                    <label for="dry" class="radio-button">
                        <div class="h-20 w-20 rounded-full " style="background-image: url(https://chicbeautybox.com/img/skins/Skin-Dry.webp);background-position:center;background-size:cover;">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">SECHE</p>
                    </label>
                </div>
                <div>
                    <input type="radio" id="oily" name="color" value="oily" hidden>
                    <label for="oily" class="radio-button">
                        <div class="h-20 w-20 rounded-full " style="background-image: url(https://chicbeautybox.com/img/skins/Skin-Oily.webp);background-position:center;background-size:cover;">
                            <span class="button-text inline-block"></span>
                        </div>
                        <p class="text-sm uppercase font-Lato text-center pt-2">GRASSE</p>
                    </label>
                </div>
                <div>
                    <input type="radio" id="both" name="color" value="both" hidden>
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
                <input type="radio" name="style" id="Naturel" class="mt-2 h-5 w-5">
                <label for="Naturel">
                    <span class="block mb-2 text-xl font-Lato">Naturel</span>
                    <span class="block">Je préfère un look naturel.</span>
                </label>
            </div>

            <div class="flex gap-5 items-start border-b borde-gray-200 my-5 pb-10">
                <input type="radio" name="style" id="Classique" class="mt-2 h-5 w-5">
                <label for="Classique">
                    <span class="block mb-2 text-xl font-Lato">Classique</span>
                    <span class="block">J'opte généralement pour un style traditionnel.</span>
                </label>
            </div>

            <div class="flex gap-5 items-start border-b borde-gray-200 my-5 pb-10">
                <input type="radio" name="style" id="Tendance" class="mt-2 h-5 w-5">
                <label for="Tendance">
                    <span class="block mb-2 text-xl font-Lato">Tendance</span>
                    <span class="block">Je suis à la pointe des tendances.</span>
                </label>
            </div>
            <div class="flex gap-5 items-start  my-5 pb-10">
                <input type="radio" name="style" id="Aventurier" class="mt-2 h-5 w-5">
                <label for="Aventurier">
                    <span class="block mb-2 text-xl font-Lato">Aventurier</span>
                    <span class="block">J'aime essayer de nouvelles choses.</span>
                </label>
            </div>

        </div>

        <div class="step">
            {{-- <p class="text-3xl leading-tight text-center my-16 font-Lato font-medium">Which of these beauty tools would you most like to receive?</p> --}}
            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-1">
                    <div >
                        <input type="text" placeholder="First Name" name="first_name" 
                               class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                  </div>
                </div>
                <div class="col-span-1">
                    <div >
                        <input type="email" placeholder="Last Name" name="last_name" 
                               class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                  </div>
                </div>
                <div class="col-span-2">
                    <div >
                        <input type="email" placeholder="Email Address" name="email" 
                               class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                  </div>
                </div>
                <div class="col-span-2">
                    <div>
                        <input type="password" placeholder="Password" name="password" 
                               class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                  </div>
                </div>
                <div class="col-span-2">
                    <div class="mb-6">
                        <input type="checkbox" placeholder="Password" name="password" id="privacy"/>
                        <label for="privacy" class="ml-2">By clicking "Register", you agree to our Terms of Service, and Privacy & Cookie Policy.
                            This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service also apply.</label>
                  </div>
                </div>
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

@endsection
