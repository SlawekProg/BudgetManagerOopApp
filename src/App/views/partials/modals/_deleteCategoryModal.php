<div class="modal fade" id="delete<?= $elementId ?>CategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-4">Usuń kategorię</p>
                <div>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">❌</button>
                </div>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="delete<?= $elementId ?>Category" class="form-label">Czy napewno chcesz usunąć kategorie ?</label>
                    <input type="text" name="delete_name" style="color:white !important;" class="form-control" id="delete<?= $elementId ?>Category" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> ❌ Anuluj</button>
                <button type="submit" name="action" value="delete<?= $elementId ?>" class="btn btn-primary"> <img src="/assets/icons/ok.png" alt="okIcon" style="width:30px; height:30px;"> Usuń</button>
            </div>
        </div>
    </div>
</div>