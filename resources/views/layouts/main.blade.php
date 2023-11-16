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
        </script>


    </head>
    <body class="font-sans antialiased">
        @include('my_comp.modalAuth')
        @include('my_comp.modalRegister')
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('catalog.index') }}">Библиотека</a>

                    @if(Auth::check())

                        <a class="navbar-brand" href="{{ route('orders') }}">Мои бронирования</a>
                        <div class='navbar-brand'>Имя пользователя: {{ Auth::user()->name }}</div>
                        <a class="navbar-brand" href="{{ route('profile.edit') }}">Профиль</a>
                        <form class="navbar-brand" id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link" type="submit">
                                Выйти  
                            </button>
                        </form>
                    @else
                        <a class="navbar-brand modal-open-register" href="{{ route('register') }}">Регистрация</a>
                        <a class="navbar-brand modal-open-auth" href="{{ route('login') }}">Авторизация</a>
                    @endif 
                </div>
            </nav>
            
            <div id="app">
                
                <index-component></index-component>

                
                <div><router-link to='/'>Home</router-link></div>
                <div><router-link to="/items">Items</router-link></div>
                

            </div>
          
            <!-- Page Content -->
            <main>

                @yield('content')
                
            </main>
        </div>
    
    <script>

        $('.modal-open-auth').on('click', function(e){
            e.preventDefault()
            modalAuth.show()
        })

        $('.modal-open-register').on('click', function(e){
            e.preventDefault()
            modalRegister.show()
        })

        // $('.modalAuth')

        console.log( $( "form [type=password]" ).attr("placeholder", "Минимум 8 символов !"))

        // $( ".modalAuth form" ).on( "submit", function( event ) {

        //     // if ( $( "input" ).first().val() === "correct" ) {
        //     //     $( "span" ).text( "Validated..." ).show();
        //     // return;
        //     // }

        //     return false;

            
        //     $( "span" ).text( "Not valid!" ).show().fadeOut( 1000 );
        //     event.preventDefault();
        // } );

    </script>

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