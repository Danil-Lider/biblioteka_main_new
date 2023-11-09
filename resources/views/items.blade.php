@extends('layouts.app')

@section('content')
   
    @include('my_comp.modal')


    <div class='container'>
        <div class='row'>

            @foreach ($items as $item)


                <div class="col-sm-3">
                    <div class="card mt-2" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">   {{ $item->name }}</h5>
                        <p class="card-text">AUTHOR:    {{ $item->author->name }} <br> GENRE:    {{ $item->genre }} </p>
                        <button type="button" class="btn btn-primary item" data-id='{{ $item->id}}' id='item'>
                            {{ $item->name }}
                        </button>
                    </div>
                    </div>
                </div>

            @endforeach
        
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
            $('#'+ modal_id + ' .id').text(json.id)
            $('#'+ modal_id + ' .genre').text(json.genre)
            $('#'+ modal_id + ' .name').text(json.name)

        }
        

        $('.item').on('click', function(event){

            var id = $(this).data('id');
            var response = checkItem(id)

            response.done(function (data) {
                
                let json = JSON.parse(data);

                changeInModalItem('myModal', json)
                myModal.show()
            })

        })


    </script>

@endsection