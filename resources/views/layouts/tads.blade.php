<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>{{ config('app.name') }} - @yield('title', 'Meu APP')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style type="text/css">
            <!-- 
                body {
                    background-color: #CCC;
                }

                main {
                    min-height: 400px;
                    margin-top: 10px;
                    margin-bottom: 10px;
                }

                main, footer {
                    text-align: center;
                }

                @yield('custom-style')
            -->
        </style>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li>
                        <a href="/">Home</a>
                    </li>  
                </ul>  
            </nav>
        </header>
        <main class="main">
            @yield('main')
        </main>
        <footer>
            powered by TADS / SA
        </footer>
    </body>
</html>