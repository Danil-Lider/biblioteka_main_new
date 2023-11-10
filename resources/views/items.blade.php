@extends('layouts.main')

@section('content')
   
@include('my_comp.modal')

<div class="container">
    <div class='row'>
        <div class="col-md-3 mt-4">
            @include('my_comp.form_filter')
        </div>
        <div class='col-md-9'>

            <div class="row"> 

                @foreach ($items as $item)

                    <div class="col-sm-4">
                        <div class="card mt-4" style="width: 18rem;">
                        <img src="images/main.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">   {{ $item->name }}</h5>
                            <p class="card-text">
                                
                                AUTHOR:    {{ $item->author->name }}
                            
                                <br>

                                GENRE:   

                                @foreach ($item->genres as $genre) 

                                    {{ $genre->name }},

                                @endforeach
                            
                        
                            </p>
                            <button type="button" class="btn btn-primary item" data-id='{{ $item->id}}' id='item'>
                                Забронировать
                            </button>
                        </div>
                        </div>
                    </div>

                @endforeach
            
            </div>

        </div>
    </div>
</div>

<script>

    function checkItem(id) {
        return $.ajax({
            url: "/items/check/" + id,
            type:"GET",
            data:{"_token": "{{ csrf_token() }}"}
        });
    }

    function changeInModalItem(modal_id,json){
        
        $('#'+ modal_id + ' .author').text(json.author)
        // $('#'+ modal_id + ' .id').text(json.id)
        $('#'+ modal_id + ' .genre').text(json.genre)
        $('#'+ modal_id + ' .name').text(json.name)

    }
    
    function show_error_modal(modal_id,error){
        $('#'+ modal_id + ' .modal-body').text(error);
    }

    $('.item').on('click', function(event){

        var id = $(this).data('id');
        var response = checkItem(id)

        response.done(function (data) {
            
            let json = JSON.parse(data);

            // Случай ошибки
            if(!json.id){
                show_error_modal('myModal', json.error)
                myModal.show()
            }else{
                changeInModalItem('myModal', json)
                myModal.show()
            }

        })

    })


</script>

@endsection