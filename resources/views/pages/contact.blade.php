@extends('layouts.frontend')
@section('content')
<div class="fixed inset-0 bg-black opacity-80 z-[9999] header-overlay  hidden" id="header-overlay"></div>

@include('pages.components.headerTest')
<div class="container p-6 mx-auto">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-12">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900">Contact <span class="border-b-4 border-r-4 border-second-color p-2 pb-1">Us</span></h2>
    </div>
    <form action="{{ Route('contact.send') }}" method="POST" id="contactForm" class="gap-5  my-10 ">
        @csrf
        <div class="mx-auto" style="max-width:900px">
            <div >
            <div class="py-5 xl:mr-6 ml-3 pb-2 ">
                <x-label for="email"  value="{{ __('Your email') }}"/>
                <x-input name="email" id="titre" type="text" class="mt-1 block w-full  input-field"/>
                <x-input-error for="email" class="mt-2 input-error"/>
            </div> 
            <div class="py-5 xl:mr-6 ml-3 pb-2  flex items-center space-between space-x-5">

                <div class="w-full">
                    <x-label for="firstName"  value="{{ __('First name') }}"/>
                    <x-input name="firstName" id="firstName" type="text" class="mt-1 block w-full  input-field"/>
                    <x-input-error for="firstName" class="mt-2 input-error"/>
                </div> 
                <div class="w-full">
                    <x-label for="lastName"  value="{{ __('Last name') }}"/>
                    <x-input name="lastName" id="lastName" type="text" class="mt-1 block w-full  input-field"/>
                    <x-input-error for="lastName" class="mt-2 input-error"/>
                </div> 
            </div>


            <div class="py-5 xl:mr-6 ml-3 pb-2  flex items-center space-between space-x-5">
                <div class="w-full">
                    <x-label for="city"  value="{{ __('City') }}"/>
                    <x-input name="city" id="titre" type="text" class="mt-1 block w-full  input-field"/>
                    <x-input-error for="city" class="mt-2 input-error"/>
                </div> 

                <div class="w-full">
                    <x-label for="country"  value="{{ __('Country') }}"/>
                    <x-select name="country"  class="input-field mt-1">
                        <option value="" readonly="true" hidden="true" selected>{{ __('Country') }}</option>
                        <option value="United state">United states</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Spain">Spain</option>
                    </x-select>
                    <x-input-error for="country" class="mt-2 input-error"/>
                </div> 
            </div>

            <div class="py-5 xl:mr-6 ml-3 pb-2 ">
                <x-label for="options"  value="{{ __('Your options') }}"/>
                <x-select name="options"  class="input-field mt-1">
                    <option value="" readonly="true" hidden="true" selected>{{ __('options') }}</option>
                    <option value="Customer Service">Customer Service</option>
                    <option value="Partnerships">Partnerships</option>
                    <option value="Collaborations and Influencers">Collaborations and Influencers</option>
                    <option value="Technical Issues">Technical Issues</option>
                    <option value="Suggestions and Feedback">Suggestions and Feedback</option>
                    <option value="Press Inquiries">Press Inquiries</option>
                    <option value="Returns and Refunds">Returns and Refunds</option>
                    <option value="General Inquiries">General Inquiries</option>
                    <option value="Unsubscribe from the Newsletter">Unsubscribe from the Newsletter</option>
                </x-select>
                <x-input-error for="options" class="mt-2 input-error"/>
            </div>
            <div class="py-5 xl:mr-6 ml-3 pb-2 ">
                <x-label for="emailMessage"  value="{{ __('Your Message') }}"/>
                <textarea id="emailMessage"  name="emailMessage" rows="4" class="input-field block p-2.5 text-sm text-gray-900 bg-white rounded-lg border border-gray-300 w-full  focus:border-gray-300 active:border-gray-300 outline-none " style="box-shadow: 0px 0px 0px" placeholder="Message..."></textarea>
                <x-input-error for="emailMessage" class="mt-2 input-error"/>
            </div>
            
            <p class="py-2 xl:mr-6 ml-3 pb-2 text-gray-500">By submitting this form you agree to our <a href="" class="text-blue-600">terms and conditions</a> and our <a href="" class="text-blue-600">privacy policy</a> which explains how we may collect, use and disclose your personal information including to third parties.</p>
            <div class="my-6 ">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
            </div>
            <button class="py-2 px-3 mt-2 rounded-lg xl:mr-6 ml-3  bg-[#e9b5a8] text-white">Submit</button>
            </div>
            
        </div>
    </form>
</div>
@include('pages.components.footer')
{{-- <script>
    var contactForm = document.getElementById('contactForm');
var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

contactForm.addEventListener('submit', function(e) {
e.preventDefault();
var formData = new FormData(contactForm);

var xhr = new XMLHttpRequest();
xhr.open(contactForm.method, contactForm.action);
xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
xhr.onreadystatechange = function() {
//   if (xhr.readyState === XMLHttpRequest.DONE) {
// if (xhr.status === 422) { 
  
//   }
else if (xhr.status === 200) {
  // if (this.responseText == 'exists') {
    document.getElementById('pop-up').remove();
        Toastify({
          text: 'Thanks for your message, We will contact you ASAP',
          duration: 3000, 
          gravity: 'top', 
          position: 'center', 
          backgroundColor: '#af8d6a', 
          stopOnFocus: true, 
        }).showToast();
      } else {
        handleSuccess();
      // }
    }
//   }
};
xhr.send(formData);
});

</script> --}}
@endsection