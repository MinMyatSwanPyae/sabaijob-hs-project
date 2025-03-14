<x-site-layout>

<!-- The Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-b-2 border-gray-100">
                <h5 class="modal-title text-lg leading-6 font-medium text-gray-900" id="applyModalLabel">Apply for {{ $vacancy->title }}</h5>
                <button type="button" class="close text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('applications.store') }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
                    <div class="form-group mb-4">
                        <label for="cover_letter" class="block text-sm font-medium text-gray-700">Cover Letter:</label>
                        <textarea class="form-control resize-none rounded-md shadow-sm mt-1 block w-full" id="cover_letter" name="cover_letter" rows="4" required placeholder="Your cover letter here..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-t-2 border-gray-100 pt-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit Application</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Back to Vacancies button -->
<a href="{{ url('/vacancies') }}" class="mt-2 inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back to Vacancies</a>



</x-site-layout>



