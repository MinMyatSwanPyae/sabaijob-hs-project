<!doctype html>
 <html>
 <head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
 </head>

    <x-header/>

    <div class="max-w-7xl m-auto mt-8 mb-16">
        {{$slot}}
    </div>

    <x-footer/>


</body>
</html>