<div class="card-header d-flex justify-content-between">
    <div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
            <i class="fa fa-plus"></i> Qo'shish
        </button>
    </div>
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Talaba yaratish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('students.store')}}" id="form">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="group_id" class="form-control" id="group_id" value="{{ $group }}">
                            <div class="form-group">
                                <label for="firstname">Ism:</label>
                                <input type="text" name="firstname" class="form-control" id="firstname" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Familiya:</label>
                                <input type="text" name="lastname" class="form-control" id="lastname" required>
                            </div>
                            <div class="form-group">
                                <label for="passport">Passport:</label>
                                <input type="text" name="passport" class="form-control" id="passport" required>
                            </div>
                            <div class="form-group">
                                <label for="birth_date">Tug'ilgan sana:</label>
                                <input type="date" name="birth_date" class="form-control" id="birth_date" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
