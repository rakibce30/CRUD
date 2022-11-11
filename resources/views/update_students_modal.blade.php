<div class="modal fade" id="UpdateStudentModal" tabindex="-1" aria-labelledby="addModalLebel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="UpdateMyForm">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLebel">Update Students</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="update_id" hidden class="update_id">
                <div class="form-group mb-3">
                    <label for="">Name</label>
                    <input type="text" name="update_name" class="form-control update_name">
                    <span class="text-danger name_err"></span>
                </div>
                <div class="form-group mb-3">
                    <label for="">Roll</label>
                    <input type="text" name="update_roll" class="form-control update_roll">
                    <span class="text-danger roll_err"></span>
                </div>
                <div class="form-group mb-3">
                    <label for="">Course</label>
                    <input type="text" name="update_course" class="form-control update_course">
                    <span class="text-danger course_err"></span>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary close btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary btn-sm update_student">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>