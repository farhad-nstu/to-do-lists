<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('item.tasks.store') }}" method="POST">
                @csrf 
                <input type="hidden" name="item_id" id="item_id" value="{{ $item->id }}">
                <input type="hidden" name="task_id" id="task_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="task_name" name="task_name" class="form-control" placeholder="Ex: Make Payment Within Today" required>
                    <select name="status" id="status" class="form-control" required>
                        <option value="">---------</option>
                        <option value="1">Completed</option>
                        <option value="2">Not Completed</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
