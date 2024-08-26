<x-app-layout>
    <x-slot name="header" class="d-flex d-block">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Amount') }}
            </h2>
        </div>


        <div><a href="{{ route('amounts.create') }}" class="btn btn-primary mb-3">Add New Amount</a></div>

    </x-slot>

    @if($amounts->count() > 0)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Currency</th>
                                    <th>Exchange Rate</th>
                                    <th>Converted Value</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($amounts as $amount)
                                    <tr>
                                        <td>{{ $amount->amount }}</td>
                                        <td>{{ $amount->currency }}</td>
                                        <td>{{ config('currenies')[$amount->currency] ?? 'N/A' }}</td>
                                        <td>
                                            @if (isset(config('currenies')[$amount->currency]))
                                                {{ $amount->amount * config('currenies')[$amount->currency] }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('amounts.edit', $amount->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('amounts.destroy', $amount->id) }}" method="POST"
                                                style="display:inline-block;">
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
                        {{ __('NO Data') }}
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
