<div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="AddMyForm">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control name">
                    <span class="text-danger name_err"></span>
                </div>
                <div class="form-group mb-3">
                    <label for="">Roll</label>
                    <input type="text" name="roll" class="form-control roll">
                    <span class="text-danger roll_err"></span>
                </div>
                <div class="form-group mb-3">
                    <label for="">Course</label>
                    <input type="text" name="course" class="form-control course">
                    <span class="text-danger course_err"></span>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary close btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary btn-sm add_student">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>