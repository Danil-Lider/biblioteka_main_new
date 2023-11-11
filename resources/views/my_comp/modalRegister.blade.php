<!-- Модальное окно  ModalAuth -->
<div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Авторизация</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
        </div>
        <div class="modal-body">
            @include('auth.register')
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        </div>
        </div>
    </div>
</div>

<script>

    var modalRegister = new bootstrap.Modal(document.getElementById('modalRegister'), {
        keyboard: false
    })

    // ModalAuth.show()
</script>