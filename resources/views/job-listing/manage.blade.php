<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<x-layout> 

@include('partials._hero')

<form>
    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
        <div class="absolute top-4 left-3">
            <i
                class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
            ></i>
        </div>
        <input
            type="text"
            name="search"
            class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
            placeholder="Search Laravel Gigs..."
        />
        <div class="absolute top-2 right-2">
            <button
                type="submit"
                class="h-10 w-20 text-white rounded-lg bg-laravel hover:bg-blue-600"
            >
                Search
            </button>
        </div>
    </div>
</form>


<div class="bg-gray-50 border border-gray-200 p-10 rounded">
    <header>
        <h1
            class="text-3xl text-center font-bold my-6 uppercase"
        >
            Manage Post
        </h1>
    </header>  


        

    <table class="w-full table-auto rounded-sm">
        <tbody>
            @unless ($listings->isEmpty())
            @foreach ($listings as $list)
            <tr class="border-gray-300">
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >   
                    <a href="/joblist/show/{{ $list->id }}">
                        {{ $list->title }}
                    </a>
                </td>

                <td
                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
            >   
                <a href="{{ $list->website }}">
                    {{ $list->company }}
                </a>
            </td>
                
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
              
               
                    <a
                        href="/joblist/edit/{{ $list->id }}"
                        class="text-blue-400 px-6 py-2 rounded-xl"
                        ><i
                            class="fa-solid fa-pen-to-square"
                        ></i>
                        Edit</a
                    >
                </form>
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <form action="/joblist/destroy/{{ $list->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">
                            <i
                                class="fa-solid fa-trash-can"
                            ></i>
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
           

           
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <p class="text-center">No Jobs Found</p>
                </td>
            </tr>
           
            @endunless
        </tbody>
    </table>
</div>


</x-layout>
