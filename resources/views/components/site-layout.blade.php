<!doctype html>
 <html>
 <head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
 </head>

 <body>
    <div class="bg-pink-500 text-black">
        <div class="max-w-7xl m-auto flex justify-between items-center h-20">
            <div class="font-bold text-lg">Sabai Job</div>
            <ul class="flex gap-x-6">
                <li><a href="/vacancies">Vacancies</a></li>
                <li><a href="/companies"> Companies </a></li>
                <li>My Application</li>
                <li>Contact us</li>
            </ul>
            <div>Login</div>
        </div>
    </div>

    <div class="max-w-7xl m-auto mt-8 mb-16">
        {{$slot}}
    </div>

    <div class="bg-pink-500 text-black">
        <div class="max-w-7xl h-10">
            <div>Our great footer</div>
        </div>
    </div>


</body>
</html>