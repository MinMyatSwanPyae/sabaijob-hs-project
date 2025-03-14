<x-site-layout>

<!-- The Modal -->
<div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full">
        <div class="modal-header border-b px-6 py-4 flex justify-between items-center">
            <h5 class="text-xl font-semibold text-gray-900">Apply for {{ $vacancy->title }}</h5>
            <button type="button" class="text-gray-500 hover:text-gray-700 focus:outline-none" data-dismiss="modal">
                &times;
            </button>
        </div>
        
        <div class="modal-body px-6 py-4">
            <!-- Vacancy Information -->
            <div class="mb-4">
                <h2 class="text-lg font-bold text-gray-800">{{ $vacancy->title }}</h2>
                <p class="text-sm text-gray-600">{{ $vacancy->description }}</p>
            </div>

            <!-- Details -->
            <div class="grid grid-cols-1 gap-3 text-sm">
                <div class="flex justify-between">
                    <span class="font-medium text-gray-700">Location:</span>
                    <span class="text-gray-600">{{ $vacancy->location }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium text-gray-700">Closing Date:</span>
                    <span class="text-gray-600">{{ $vacancy->closing_date }}</span>
                </div>
            </div>

            <!-- Company Information -->
            <div class="mt-4 p-4 bg-gray-100 rounded-lg">
                <h3 class="text-md font-bold text-gray-800">Company Information</h3>
                <p class="text-sm text-gray-700">{{ $vacancy->company->name }}</p>
                <p class="text-xs text-gray-500">{{ $vacancy->company->address }}</p>
                <a href="{{ $vacancy->company->website }}" target="_blank" class="text-blue-500 text-sm underline">Visit Website</a>
            </div>

            <!-- Application Form -->
            <form method="POST" action="{{ route('applications.store') }}" class="mt-4">
                @csrf
                <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
                
                <div class="mb-4">
                    <label for="cover_letter" class="block text-sm font-medium text-gray-700">Cover Letter:</label>
                    <textarea class="form-control resize-none rounded-md shadow-sm mt-1 block w-full p-2 border border-gray-300" id="cover_letter" name="cover_letter" rows="4" required placeholder="Write your cover letter here..."></textarea>
                </div>

                <div class="modal-footer border-t pt-4 flex justify-end">
                    <button type="submit" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Submit Application</button>
                </div>
            </form>
        </div>
    </div>
</div>
g
<div class="text-center mt-4">
    <a href="{{ url('/vacancies') }}" class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to Vacancies</a>
</div>


</x-site-layout>



