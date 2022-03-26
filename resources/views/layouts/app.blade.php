<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('partials.head')

<body>
    <div id="app">
        @include('partials.navbar')

        <!-- class="py-4" --->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <hr>
    @include('partials.footer')

    <!-- Ajax -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>


</html>
