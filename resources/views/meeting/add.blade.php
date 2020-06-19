<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('form/css/form.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
            <h2>University Meetings</h2>
    </div>

    <div class="row">
        <form id="regForm" method="post" action="/meetings">
        @csrf
        <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <h2>Subject Info</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="name">Subject Name:</label>
                    <input placeholder="Subject Name" name="subject_name" value="{{ old('subject_name')}}"
                           class="form-control">
                    <small class="text-danger">{{ $errors->first('subject_name') }}</small>
                </div>
                <div class="form-group">
                    <label for="hours">Credit Hours:</label>
                    <input placeholder="Credit Hours" name="credit_hours" id="credit_hours"
                           value="{{ old('credit_hours')}}" class="form-control">
                    <small class="text-danger">{{ $errors->first('credit_hours') }}</small>
                </div>
            </div>
            <div class="tab">
                <h2>Faculties:</h2>
                <div class="form-group">
                    <label for="teacher">Teacher Name</label>
                    <select name="teacher_id" class="form-control">
                        <option value="">Select Teacher</option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>{{$teacher->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Faculty">Department</label>
                    <select name="department_id" id="department" class="form-control">
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{$department->id}}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="tab">
                <h2>Meeting</h2>
                <div class="form-group mb-5">
                    <label for="meeting">Meeting</label>
                    <input class="form-control" placeholder="Meeting" value="{{old('meeting_title')}}" name="meeting_title">
                </div>
                <div class="form-group mt-5">
                    <textarea class="form-control" name="agenda" placeholder="Agenda">{{old('agenda')}}</textarea>
                </div>

            </div>

            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>

        </form>
    </div>
</div>
</body>
<script src="{{ URL::asset('form/js/form.js')}}"></script>


</html>
