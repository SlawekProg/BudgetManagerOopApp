<div class="modal fade" id="deleteAccountModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-4">Usuń konto</p>
                <div>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">❌</button>
                </div>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="deleteAccount" class="form-label">Wpisz hasło aby usunąć konto.</label>
                    <input type="password" name="password" style="color:white !important;" class="form-control" id="deleteAccount">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> ❌ Anuluj</button>
                <button type="submit" name="action" value="deleteAccount" class="btn btn-primary"> <img src="/assets/icons/ok.png" alt="okIcon" style="width:30px; height:30px;"> Usuń konto</button>
            </div>
        </div>
    </div>
</div>