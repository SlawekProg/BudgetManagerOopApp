<div class="modal fade" id="edit<?= $elementId ?>CategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-4">Edytuj kategorię</p>
                <div>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">❌</button>
                </div>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="edit<?= $elementId ?>Category" class="form-label">Zmień nazwę kategorii</label>
                    <input type="text" style="color:white !important;" name="edit_name" class="form-control" id="edit<?= $elementId ?>Category">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> ❌ Anuluj</button>
                <button type="submit" name="action" value="edit<?= $elementId ?>" class="btn btn-primary"> <img src="/assets/icons/ok.png" alt="okIcon" style="width:30px; height:30px;"> Zapisz zmiany</button>
            </div>
        </div>
    </div>
</div>