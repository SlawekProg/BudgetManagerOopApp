<div class="modal fade" id="add<?= $elementId ?>CategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-4">Dodaj kategorię</p>
                <div>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">❌</button>
                </div>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="new<?= $elementId ?>Category" class="form-label">Wpisz nazwę kategorii</label>
                    <input type="text" style="color:white !important;" name="new_name" class="form-control" id="new<?= $elementId ?>Category">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> ❌ Anuluj</button>
                <button type="submit" name="action" value="add<?= $elementId ?>" class="btn btn-success"> <img src="/assets/icons/ok.png" alt="okIcon" style="width:30px; height:30px;"> Zapisz</button>
            </div>
        </div>
    </div>
</div>