<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <!-- Modal -->
    @include('add_students_modal')
    @include('update_students_modal')

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Studenst Data
                            <a href="#" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#AddStudentModal">Add Students</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-outline col-md-4 mb-3">
                            <input type="search" id="searchForm" class="form-control rounded-3" placeholder="Search ...." aria-label="Search" />
                        </div>
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Roll</th>
                                <th scope="col">Course</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $key=> $item)
                                   <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->roll}}</td>
                                    <td>{{$item->course}}</td>
                                    <td>
                                        <a href="#" 
                                        class="btn btn-success btn-sm edit_student_form" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#UpdateStudentModal"
                                        data-id="{{$item->id}}"
                                        data-name="{{$item->name}}"
                                        data-roll="{{$item->roll}}"
                                        data-course="{{$item->course}}"
                                        >Edit</a>

                                        <a href="#" 
                                        class="btn btn-danger btn-sm delete_student" 
                                        data-id="{{$item->id}}"
                                        >Delete</a>
                                    </td>
                                </tr> 
                                @endforeach
                              
                            </tbody>
                        </table>
                        {{$students->links()}}                               
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function (){

            // Students Add ---------------------------------
            $(document).on('click', '.add_student', function (e) {
                e.preventDefault();

                var data = {
                    'name': $('.name').val(),
                    'roll': $('.roll').val(),
                    'course': $('.course').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/students",
                    data: data,
                    datatype: "json",
                    success: function (res){
                       if((res.status == 'success')){
                            $('#AddStudentModal').modal('hide');
                            $('#AddMyForm')[0].reset();
                            $('.table').load(location.href+' .table');
                            Command: toastr["success"]("Student added", "Success")
                                    toastr.options = {
                                    "closeButton": false,
                                    "debug": true,
                                    "newestOnTop": false,
                                    "progressBar": false,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                    }
                       }
                    },
                    error: function(err){
                        let error = err.responseJSON;
                        $.each(error.errors, function(key, val){
                            $('span.'+key+'_err').text(val[0]);
                        });
                    }
                })
            }); 

            // Modal Close reset data ------------------------------
            $(document).on('click', '.close', function (e) {
                e.preventDefault();
                $("#AddMyForm").trigger('reset');
            });


            // Students Edit page data show ----------------------------------
            $(document).on('click', '.edit_student_form', function(){
                let id =   $(this).data('id');
                let name =   $(this).data('name');
                let roll =   $(this).data('roll');
                let course =   $(this).data('course');
                // console.log(id);
                $('.update_id').val(id);
                $('.update_name').val(name);
                $('.update_roll').val(roll);
                $('.update_course').val(course);
            });

            // Students update -----------------------------
            $(document).on('click', '.update_student', function (e) {
                e.preventDefault();

                var data = {
                    'update_id': $('.update_id').val(),
                    'update_name': $('.update_name').val(),
                    'update_roll': $('.update_roll').val(),
                    'update_course': $('.update_course').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{route('student.update')}}",
                    data: data,
                    datatype: "json",
                    success: function (res){
                       if((res.status == 'success')){
                            $('#UpdateStudentModal').modal('hide');
                            $('#UpdateMyForm')[0].reset();
                            $('.table').load(location.href+' .table');
                            Command: toastr["success"]("Student updated!", "Success")
                                    toastr.options = {
                                    "closeButton": false,
                                    "debug": true,
                                    "newestOnTop": false,
                                    "progressBar": false,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                    }
                       }
                    },
                    error: function(err){
                        let error = err.responseJSON;
                        $.each(error.errors, function(key, val){
                            $('span.'+key+'_err').text(val[0]);
                        });
                    }
                }); 
            }); 

            // Student delete --------------------------------
            $(document).on('click', '.delete_student', function (e) {
                e.preventDefault();

                let student_id = $(this).data('id');
                // console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                if(confirm('Are you sure to delete Student??')){
                    $.ajax({
                        type: "POST",
                        url: "{{route('student.delete')}}",
                        data: {student_id:student_id},
                        datatype: "json",
                        success: function (res){
                            if((res.status == 'success')){
                                    $('.table').load(location.href+' .table');
                                    Command: toastr["success"]("Student deleted!", "Success")
                                    toastr.options = {
                                    "closeButton": false,
                                    "debug": true,
                                    "newestOnTop": false,
                                    "progressBar": false,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                    }
                            }
                        }
                    });
                }
                 
            }); 

            // Search data -------------------------
            $(document).on('keyup', function(e){
                e.preventDefault();

                let search_keyword = $('#searchForm').val();

                $.ajax({
                    type: "GET",
                    url: "{{route('student.search')}}",
                    data: {search_keyword:search_keyword},
                    dataType: "json",
                    
                    success: function (response) {
                        $('.table-data').html(response);
                        console.log(response);
                    }
                });
                
            })
        });
    </script>
    
 
</x-app-layout>
