<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <script>
            // rename myToken as you like
            window.myToken =  <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>


            $('.modal-open-auth').on('click', function(e){
                e.preventDefault()
                modalAuth.show()
            })

            $('.modal-open-register').on('click', function(e){
                e.preventDefault()
                modalRegister.show()
            })

        

            $( "form [type=password]" ).attr("placeholder", "Минимум 8 символов !")

 

        </script>


    </head>
    <body class="font-sans antialiased">
        @include('my_comp.modalAuth')
        @include('my_comp.modalRegister')

        <div>

       

            <div id="app">

            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <div class="container">

                    <router-link  class="navbar-brand" to='/'>Домой</router-link>
                    <router-link class="navbar-brand"  to="/items">Каталог</router-link>  
                   


                    @if(Auth::check())

                        <router-link class="navbar-brand" to="/orders">Мои бронирования</router-link>
                        <div class='navbar-brand'>Имя пользователя: {{ Auth::user()->name }}</div>
                      
                        <form class="navbar-brand" id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link" type="submit">
                                Выйти  
                            </button>
                        </form>
                    @else
                        <router-link class="navbar-brand"  to="/register">Регистрация</router-link>  
                        <router-link class="navbar-brand"  to="/auth">Авторизация</router-link>  
                    @endif 
                </div>
            </nav>
            
           
        
            <main>

           
              

                    <index-component></index-component>

          

              @if('/profile' ==  $_SERVER['REQUEST_URI'])

                

              @endif
                
            </main>



        </div>
    </div>
    
  

<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 300px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  display: block;
  margin-top: 1rem;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter-active,
.modal-leave-active {
  transition: opacity 0.5s ease;
}

.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}
</style>

    </body>
</html>