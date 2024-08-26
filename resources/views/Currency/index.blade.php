<x-app-layout>

  


    <x-slot name="header" class="d-flex d-block">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Currency') }}
            </h2>
        </div>
        <div><a href="{{ route('currency.create') }}" class="btn btn-primary mb-3">Add New Currency</a></div>
        
    </x-slot>
    @if(count($currencies) > 0)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Currency</th>
                                <th>Exchange Rate</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($currencies as $key=>$item)
                        <tr>
                            <td> {{ $key }} </th>
                            <td> {{ $item }} </th>
                            <td>
                                    <a href="{{ route('currency.edit', $key) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('currency.destroy', $key) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("NO Data") }}
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>