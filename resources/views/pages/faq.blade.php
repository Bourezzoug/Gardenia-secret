@extends('layouts.frontend')
{{-- @section('title', 'Gardenia Secret - ' . $category->name)
@section('meta_description',  $category->name) --}}
@section('content')

@include('pages.components.headerTest')

<section class="bg-white ">
    <div class="container max-w-4xl px-6 py-10 mx-auto">
        <h1 class="text-2xl font-semibold text-center text-gray-800 lg:text-3xl ">Frequently asked questions</h1>
        @forelse ($faq as $index => $faqItem)
        <div class="mt-12 space-y-8">
            <div class="border-2 border-gray-100 rounded-lg ">
                <button class="flex items-center justify-between w-full p-8" onclick="toggleAccordion('accordion{{ $index }}', 'accordionIcon{{ $index }}')">
                    <h1 class="font-semibold text-gray-700">{{ $faqItem->question }}</h1>
                    <span id="accordionIcon{{ $index }}" class="text-white bg-gray-500 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" /></svg>
                    </span>
                </button>
    
                <div id="accordion{{ $index }}" class="accordion-content" style="max-height:0;overflow:hidden;transition:max-height .3s ease-out">
                    <hr class="border-gray-200 ">
                    <p class="p-8 text-sm text-gray-500 ">
                        {{ $faqItem->answer }}
                    </p>
                </div>
            </div>
        </div>
    @empty
        <!-- Handle the case where there are no FAQs -->
    @endforelse
    
    <script>
        function toggleAccordion(accordionId, iconId) {
            const accordionContent = document.getElementById(accordionId);
            const isClosed = accordionContent.style.maxHeight === '' || accordionContent.style.maxHeight === '0px';
    
            accordionContent.style.maxHeight = isClosed ? accordionContent.scrollHeight + "px" : "0";
    
            // Change the icon based on accordion state
            const accordionIcon = document.getElementById(iconId);
    
            // Clear previous content
            accordionIcon.innerHTML = '';
    
            // Add the appropriate SVG icon
            if (isClosed) {
                const svgOpen = document.createElement('span');
                svgOpen.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>';
                accordionIcon.classList.add('bg-blue-500')
                accordionIcon.classList.remove('bg-gray-500')
                accordionIcon.appendChild(svgOpen);
            } else {
                const svgClosed = document.createElement('span');
                svgClosed.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" /></svg>';
                accordionIcon.classList.remove('bg-blue-500')
                accordionIcon.classList.add('bg-gray-500')
                accordionIcon.appendChild(svgClosed);
            }
        }
    </script>
    


        </div>
    </div>
</section>

@include('pages.components.popup')
@include('pages.components.top')

@include('pages.components.footer')

@endsection