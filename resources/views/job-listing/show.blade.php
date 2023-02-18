<x-layout>


<a href="/" class="inline-block text-black ml-4 mb-4"
><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
<x-card class="pt-10">
    <div
        class="flex flex-col items-center justify-center text-center"
    >
        <img
            class="w-48 mr-6 mb-6"
            src="{{ $singleList->logo ? asset('storage/' . $singleList->logo) : asset('images/no-logo1.png') }}"
            alt=""
        />

        <h3 class="text-2xl mb-2">{{ $singleList->title }}</h3>
        <div class="text-xl font-bold mb-4">{{ $singleList->company }}</div>

          <x-listing-tags :tagCsv="$singleList->tags" />


        <div class="text-lg my-4">
            <i class="fa-solid fa-location-dot"></i> {{ $singleList->location }}
        </div>
        <div class="border border-gray-200 w-full mb-6"></div>
        <div>
            <h3 class="text-3xl font-bold mb-4">
                Job Description
            </h3>
            <div class="text-lg space-y-6">
                <p>
                    {{ $singleList->description }}
                </p>
              

                <a
                    href="{{ $singleList->email }}"
                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                    ><i class="fa-solid fa-envelope"></i>
                    Contact Employer</a
                >

                <a
                    href="{{ $singleList->website }}"
                    target="_blank"
                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                    ><i class="fa-solid fa-globe"></i> Visit Website</a
                >
            </div>
        </div>
    </div>
</x-card>
<!--ASASDAD 
<x-card class="mt-4 p-2 flex space-x-6">
    <a href="/joblist/edit/ ">
        <i class="fa solid fa-pencil"></i> Edit </a>

        <form action="/joblist/destroy/" method="POST">
          
            <button
            type="submit"
            class="text-red-600" 
        ><i class="fa-solid fa-trash"></i>
            Remove
        </button>
        </form>
    
</x-card>
</div>

-->

</x-layout>
