<div class="table-data">
    {{-- <table class="table">
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
            @foreach ($search_data as $key=> $item)
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
    </table> --}}
</div>
