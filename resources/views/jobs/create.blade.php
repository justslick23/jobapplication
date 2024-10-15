@extends('layouts.app')

@section('content')
<div class="container-scroller">
    @include('layouts.sidebar')

    <div class="container-fluid page-body-wrapper">
        @include('layouts.navbar')

        <div class="main-panel">
            <div class="content-wrapper">
                <h2>Create Job Post</h2>
                <form action="{{ route('jobs.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Job Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Job Description</label>
                        <div id="editor" class="quill-editor" style="height: 300px;"></div>
                        <input type="hidden" name="description" id="description"> 
                    </div>
                    <div class="form-group">
                        <label for="department_id">Department</label>
                        <select class="form-control" id="department_id" name="department_id" required>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
    <label for="job_type">Job Type</label>
    <select class="form-control" id="job_type" name="job_type" required>
        <option value="" disabled selected>Select Job Type</option>
        <option value="full_time">Full Time</option>
        <option value="part_time">Part Time</option>
        <option value="contract">Contract</option>
        <option value="internship">Internship</option>
        <option value="temporary">Temporary</option>
    </select>
</div>

<div class="form-group">
    <label for="education">Education Requirement</label>
    <select class="form-control" id="education" name="education" required>
        <option value="">Select Education Requirement</option>
        <option value="High School Diploma">High School Diploma</option>
        <option value="Associate's Degree">Associate's Degree</option>
        <option value="Bachelor's Degree">Bachelor's Degree</option>
        <option value="Master's Degree">Master's Degree</option>
        <option value="PhD">PhD</option>
        <option value="Other">Other</option>
    </select>
</div>

<div class="form-group">
    <label for="experience">Experience Requirement</label>
    <select class="form-control" id="experience" name="experience" required>
        <option value="">Select Experience Requirement</option>
        <option value="Entry Level">Entry Level</option>
        <option value="1-2 Years">1-2 Years</option>
        <option value="3-5 Years">3-5 Years</option>
        <option value="5+ Years">5+ Years</option>
        <option value="Other">Other</option>
    </select>
</div>

<div class="form-group">
    <label for="skills">Skills (comma-separated)</label>
    <input type="text" class="form-control" id="skills" name="skills" placeholder="e.g. PHP, JavaScript, Laravel" onkeyup="updateBadges()">
    <small class="form-text text-muted">Enter skills separated by commas.</small>
    <div id="skills-badges" class="mt-2"></div>
    <input type="hidden" name="skills" id="skills-input">
</div>



                                <div class="form-group">
                <label for="application_deadline">Application Deadline</label>
                <input type="datetime-local" class="form-control" id="application_deadline" name="application_deadline" required>
            </div>


                    <div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status" required>
        <option value="open">Open</option>
        <option value="closed">Closed</option>
    </select>
</div>

                    <button type="submit" class="btn btn-primary">Create Job Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include Quill CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<script>
    // Initialize Quill editor
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                ['link', 'image'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'header': [1, 2, false] }]
            ]
        }
    });

    // Update hidden input when the content changes
    quill.on('text-change', function() {
        document.getElementById('description').value = quill.root.innerHTML;
    });
</script>


<script>
    function updateBadges() {
        const input = document.getElementById('skills');
        const badgesContainer = document.getElementById('skills-badges');
        const skillsInput = document.getElementById('skills-input');

        // Clear the current badges
        badgesContainer.innerHTML = '';

        // Get skills from input and split them by comma
        const skills = input.value.split(',').map(skill => skill.trim()).filter(skill => skill);

        // Create badges for each skill
        skills.forEach(skill => {
            const badge = document.createElement('span');
            badge.className = 'badge badge-info mr-2';
            badge.textContent = skill;

            // Remove badge on click
            badge.onclick = function() {
                const updatedSkills = skills.filter(s => s !== skill);
                input.value = updatedSkills.join(', ');
                updateBadges();
            };

            badgesContainer.appendChild(badge);
        });

        // Update hidden input for form submission
        skillsInput.value = skills.join(',');
    }
</script>

@endsection
