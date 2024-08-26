<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Amount') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <form action="{{ route('amounts.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="currency" class="form-label">Currency</label>
                            <select id="currency" name="currency" class="form-control" required>
                                @foreach(config('currenies') as $currency => $rate)
                                    <option value="{{ $currency }}">{{ $currency }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Amount</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
