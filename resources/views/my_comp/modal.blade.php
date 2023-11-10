<!-- Модальное окно -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Бронирование книг</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
        </div>
        <div class="modal-body">
            <!-- TEST  -->
            <div class="flex">Наименование книги: <div class="name"></div></div>
            {{-- <div class="flex">Автор книги: <div class="author"></div></div>
            <div class="flex">Жанры: <div class="genre"></div></div> --}}

            <div class="mt-2">
                <label for="time_to_bron">Дата бронирования:</label>
                <input type="date" id="time_to_bron" name="trip-start" value="{{ date("Y-m-d"); }}" min="{{ date("Y-m-d"); }}" max="" />
                <p>Бронирование на 1 день</p>
            </div>
            


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            <button type="button" class="btn btn-primary">Забронировать</button>
        </div>
        </div>
    </div>
</div>

<script>
    var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
        keyboard: false
    })
</script>
<style>
    .flex {
        display: flex;
    }
</style>