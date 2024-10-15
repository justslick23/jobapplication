@extends('layouts.app')

@section('content')
<div class="container-scroller">
    @include('layouts.sidebar')

    <div class="container-fluid page-body-wrapper">
        @include('layouts.navbar')

        <div class="main-panel">
            <div class="content-wrapper">
                <h2 class="mb-4">Apply for {{ $job->title }}</h2>
                
                <!-- Display success or error messages -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                
                <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" class="form-sample">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job->id }}">

                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title">Experience</h4>
                            <button type="button" id="add-experience" class="btn btn-secondary mb-2">Add Experience</button>
                            <div id="experience-fields">
                                @foreach (old('experiences', []) as $index => $experience)
                                    <div class="experience-field mb-3">
                                        <input type="text" name="experiences[{{ $index }}][job_title]" class="form-control" placeholder="Job Title" value="{{ old("experiences.$index.job_title") }}" required>
                                        @error("experiences.$index.job_title")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <input type="text" name="experiences[{{ $index }}][company_name]" class="form-control mt-2" placeholder="Company Name" value="{{ old("experiences.$index.company_name") }}" required>
                                        @error("experiences.$index.company_name")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <textarea name="experiences[{{ $index }}][description]" class="form-control mt-2" placeholder="Description">{{ old("experiences.$index.description") }}</textarea>
                                        @error("experiences.$index.description")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        
                                        <label class="mt-2">Start Date</label>
                                        <input type="date" name="experiences[{{ $index }}][start_date]" class="form-control" value="{{ old("experiences.$index.start_date") }}" required>
                                        @error("experiences.$index.start_date")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label class="mt-2">End Date</label>
                                        <input type="date" name="experiences[{{ $index }}][end_date]" class="form-control" value="{{ old("experiences.$index.end_date") }}">
                                        @error("experiences.$index.end_date")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title">Education</h4>
                            <button type="button" id="add-education" class="btn btn-secondary mb-2">Add Education</button>
                            <div id="education-fields">
                                @foreach (old('educations', []) as $index => $education)
                                    <div class="education-field mb-3">
                                        <input type="text" name="educations[{{ $index }}][degree]" class="form-control" placeholder="Degree" value="{{ old("educations.$index.degree") }}" required>
                                        @error("educations.$index.degree")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <input type="text" name="educations[{{ $index }}][institution]" class="form-control mt-2" placeholder="Institution" value="{{ old("educations.$index.institution") }}" required>
                                        @error("educations.$index.institution")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        
                                        <label class="mt-2">Graduation Date</label>
                                        <input type="date" name="educations[{{ $index }}][graduation_date]" class="form-control mt-2" value="{{ old("educations.$index.graduation_date") }}">
                                        @error("educations.$index.graduation_date")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="cover_letter_file">Upload Cover Letter (PDF, DOC, DOCX)</label>
                                <input type="file" class="form-control" id="cover_letter_file" name="cover_letter_file" accept=".pdf,.doc,.docx">
                                @error('cover_letter_file')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="educational_transcript">Educational Transcript (PDF, DOC, DOCX)</label>
                                <input type="file" class="form-control" id="educational_transcript" name="educational_transcript" accept=".pdf,.doc,.docx">
                            </div>

                            <div class="form-group">
                                <label for="id_proof">ID Proof (PDF, DOC, DOCX)</label>
                                <input type="file" class="form-control" id="id_proof" name="id_proof" accept=".pdf,.doc,.docx">
                            </div>

                            <div class="form-group">
                                <label for="resume">Resume (PDF, DOC, DOCX)</label>
                                <input type="file" class="form-control" id="resume" name="resume" accept=".pdf,.doc,.docx">
                                @error('resume')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Application</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let experienceIndex = {{ count(old('experiences', [])) }};
    let educationIndex = {{ count(old('educations', [])) }};

    document.getElementById('add-experience').addEventListener('click', function() {
        const experienceFields = document.getElementById('experience-fields');
        const newExperience = `
            <div class="experience-field mb-3">
                <input type="text" name="experiences[${experienceIndex}][job_title]" class="form-control" placeholder="Job Title" required>
                <input type="text" name="experiences[${experienceIndex}][company_name]" class="form-control mt-2" placeholder="Company Name" required>
                <textarea name="experiences[${experienceIndex}][description]" class="form-control mt-2" placeholder="Description"></textarea>
                
                <label class="mt-2">Start Date</label>
                <input type="date" name="experiences[${experienceIndex}][start_date]" class="form-control" required>
                
                <label class="mt-2">End Date</label>
                <input type="date" name="experiences[${experienceIndex}][end_date]" class="form-control">
            </div>`;
        experienceFields.insertAdjacentHTML('beforeend', newExperience);
        experienceIndex++;
    });

    document.getElementById('add-education').addEventListener('click', function() {
        const educationFields = document.getElementById('education-fields');
        const newEducation = `
            <div class="education-field mb-3">
                <input type="text" name="educations[${educationIndex}][degree]" class="form-control" placeholder="Degree" required>
                <input type="text" name="educations[${educationIndex}][institution]" class="form-control mt-2" placeholder="Institution" required>
                
                <label class="mt-2">Graduation Date</label>
                <input type="date" name="educations[${educationIndex}][graduation_date]" class="form-control mt-2">
            </div>`;
        educationFields.insertAdjacentHTML('beforeend', newEducation);
        educationIndex++;
    });
</script>
@endsection
