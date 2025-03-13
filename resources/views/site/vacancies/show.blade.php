<x-site-layout>


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applyModal">
    Apply Now
  </button>
  
  <!-- The Modal -->
  <div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="applyModalLabel">Apply for {{ $vacancy->title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('applications.store') }}">
          @csrf
          <div class="modal-body">
            <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
            <div class="form-group">
              <label for="cover_letter">Cover Letter:</label>
              <textarea class="form-control" id="cover_letter" name="cover_letter" rows="4" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit Application</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
    
        <a href="{{ url('/vacancies') }}" class="btn btn-secondary">Back to Vacancies</a>
    
    

</x-site-layout>



