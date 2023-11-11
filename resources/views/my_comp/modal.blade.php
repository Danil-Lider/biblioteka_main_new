<!-- Модальное окно Reserve -->
<div class="modal fade" id="ModalReserve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id='formReserve' method="POST" action="/catalog/create">
        @csrf
        <input id="item_id" value="" type="hidden" name='item_id'>
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Бронирование книг</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                
                <div class="item">
                    <div class="flex">Наименование книги: <div class="name"></div></div>
                    {{-- <div class="flex">Автор книги: <div class="author"></div></div>
                    <div class="flex">Жанры: <div class="genre"></div></div> --}}
                    <div class="mt-2">
                        <label for="time_to_bron">Дата бронирования:</label>
                        <input type="date" id="time_to_bron" name="reserve_day" value="{{ date("Y-m-d"); }}" min="{{ date("Y-m-d"); }}" max="" />
                        <p>Бронирование на 1 день</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary ButtonReserve">Забронировать</button>
            </div>
            </div>
        </div>
    </form>
</div>



<!-- Модальное окно  ModalSuccess -->
<div class="modal fade" id="ModalSuccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Бронирование книг</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
        </div>
        <div class="modal-body">
            <div class="success"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        </div>
        </div>
    </div>
</div>


<!-- Модальное окно  ModalError -->
<div class="modal fade" id="ModalError" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Бронирование книг</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
        </div>
        <div class="modal-body">
            <div class="error"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        </div>
        </div>
    </div>
</div>


<script>

    function show_error_modal(error){
        $ModalError.find('.error').text(error);
        ModalError.show()
        ModalReserve.hide()
        ModalSuccess.hide()
    }


    var ModalReserve = new bootstrap.Modal(document.getElementById('ModalReserve'), {
        keyboard: false
    })

    var ModalSuccess = new bootstrap.Modal(document.getElementById('ModalSuccess'), {
        keyboard: false
    })

    var ModalError = new bootstrap.Modal(document.getElementById('ModalError'), {
        keyboard: false
    })



    let $formReserve =  $("#formReserve");

    let $ModalReserve = $('#ModalReserve');
    let $ModalSuccess = $('#ModalSuccess');
    let $ModalError = $('#ModalError');

    $formReserve.submit(function (event) {

        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: $formReserve.attr("action"),
            data: $formReserve.serialize(), 
            success: function(response) {

                let json = JSON.parse(response);

                // Случай ошибки
                if(json.error){
                    show_error_modal(json.error)
                }else{
                    ModalReserve.hide()
                    ModalSuccess.show()
                    $ModalSuccess.find('.success').html(json.success)
                }


            },
        });

    });

    
</script>
<style>
    .flex {
        display: flex;
    }
</style>