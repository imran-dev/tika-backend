<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--            {{ __('Divisions') }}--}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(Session::get('message'))
                        <div style="background: green; padding: 5px; color: white">
                            {{Session::get('message')}}
                        </div>
                    @endif

                    <table class="w-full border-r border-b">
                        <tr>
                            <th class="border-l border-t px-2 py-1 sm:text-left">ID</th>
                            <th class="border-l border-t px-2 py-1 sm:text-left">Name</th>
                            <th class="border-l border-t px-2 py-1 text-center" colspan="2">Action</th>
                        </tr>
                        @foreach($divisions as $division)
                            <tr>
                                <td class="border-l border-t px-2 py-1 sm:text-left">{{$division->id}}</td>
                                <td class="border-l border-t px-2 py-1 sm:text-left">
                                    @if($division->enabled == 0) <del> @endif
                                        {{$division->name}}
                                    @if($division->enabled == 0) </del> @endif
                                </td>
                                <td class="border-l border-t px-2 py-1 text-center" width="50">
                                    <a href="{{route('divisions.edit', $division->id)}}" class="text-red-600">Edit</a>
                                </td>
                                <td class="border-l border-t px-2 py-1 text-center" width="50">
                                    <form action="{{route('division-enable-disable', $division->id)}}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit">{{$division->enabled == 0 ? 'Restore' : 'Archive'}}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="mb-4"></div>
                    {{ $divisions->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
