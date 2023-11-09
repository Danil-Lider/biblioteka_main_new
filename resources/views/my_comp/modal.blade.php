<!-- Модальное окно -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Заголовок модального окна</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
        </div>
        <div class="modal-body">
            <!-- TEST  -->
            <div class="name"></div>
            <div class="author"></div>
            <div class="id"></div>
            <div class="genre"></div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            <button type="button" class="btn btn-primary">Сохранить изменения</button>
        </div>
        </div>
    </div>
</div>

<script>
    var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
        keyboard: false
    })
</script>