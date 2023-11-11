<!-- Модальное окно  ModalAuth -->
<div role="dialog" class="modal fade" id="modalAuth" tabindex="-1" aria-labelledby="modalAuth" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="">Авторизация</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
        </div>
        <div class="modal-body">
            @include('auth.login')
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        </div>
        </div>
    </div>
</div>

<script>

    var modalAuth = new bootstrap.Modal(document.getElementById('modalAuth'), {
        keyboard: false
    })

    // ModalAuth.show()
</script>