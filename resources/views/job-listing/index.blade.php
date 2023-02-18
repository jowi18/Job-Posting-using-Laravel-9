
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<x-layout> 

@include('partials._hero')
@include('partials._search')

<div
class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>
@unless (count($listing) == 0)
    
@foreach ($listing as $list )
    
<x-job-list :list="$list" />

@endforeach

</div>

@else
    <p class="text-laravel font-bold">No Listing Found</p>

@endunless

<div class="mt-6 p-4">
    {{ $listing->links('pagination::bootstrap-5') }}
</div>


</x-layout>

