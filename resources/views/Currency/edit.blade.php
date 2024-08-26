<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Currency') }}
        </h2>
    </x-slot>

  {{-- {{  dd($rate)}} --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <form action="{{ route('currency.update', $key) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="currency" class="form-label">Currency Code</label>
                            <input type="text" class="form-control" id="currency" name="currency"
                                value="{{ $key }}" disabled>
                        </div>
                        
                        <div class="mb-3">
                            <label for="rate" class="form-label">Exchange Rate</label>
                            <input type="number" step="0.01" class="form-control" id="rate" name="rate" value="{{  $rate }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Currency</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
