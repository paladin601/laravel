<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="modal_delete"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_delete">{{ trans('index.deleterecord') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    {{ trans('index.deleterecord.question') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('index.cancel') }}</button>
                <button type="button" class="btn btn-primary btn-delete" id="0" onclick="delRegister(this)" >{{ trans('index.erase') }}</button>
            </div>
        </div>
    </div>
</div>