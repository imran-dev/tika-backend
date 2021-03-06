<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories') }}
            </h2>
            <div class="min-w-full">
                <a href="{{route('categories.create')}}" class="p-2 bg-gray-800 text-white">Create</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Session::get('message'))
                        <div style="background: green; padding: 5px; color: white; margin-bottom: 5px;">
                            {{Session::get('message')}}
                        </div>
                    @endif

                    <table class="w-full border-r border-b">
                        <tr>
                            <th class="border-l border-t px-2 py-1 sm:text-left">ID</th>
                            <th class="border-l border-t px-2 py-1 sm:text-left">Name</th>
                            <th class="border-l border-t px-2 py-1 text-center">Min Age</th>
                            <th class="border-l border-t px-2 py-1 text-center">Action</th>
                        </tr>
                        @foreach($categories as $category)
                            <tr>
                                <td class="border-l border-t px-2 py-1 sm:text-left">{{$category->id}}</td>
                                <td class="border-l border-t px-2 py-1 sm:text-left">{{$category->name}}</td>
                                <td class="border-l border-t px-2 py-1 text-center">{{$category->min_age}}</td>
                                <td class="border-l border-t px-2 py-1 text-center">
                                    <a href="{{route('categories.edit', $category->id)}}" class="text-red-600">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="mb-4"></div>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
