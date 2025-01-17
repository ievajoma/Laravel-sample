<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Products</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>

    <div class="absolute inset-y-5 left-2 w-48 rounded-lg bg-zinc-700">
        <form id="filterForm">
            @foreach($products as $category => $product)
                <div class="flex items-center ps-3">
                    <input id="{{$category}}" type="checkbox" name="options[]" value="{{$product}}" class="cursor-pointer">
                    <label for="{{$category}}" class="cursor-pointer w-full py-3 ms-2 text-sm font-medium text-gray-300">{{$category}}</label>
                </div>
            @endforeach
            <button type="submit" class="block mx-auto w-40 border border-gray-400 rounded-lg py-4 text-base font-bold text-blue-400">Parādīt izvēlētos</button>
        </form>
    </div>
    <!-- end sidebar with checkboxes -->

    <div class="absolute inset-y-5 right-5 left-60 max-w-fit text-3xl font-semibold text-left mt-5" id="result"></div>

    <script>
        $(document).ready(function () {
            $('#filterForm').on('submit', function (e) {
                e.preventDefault();

                const selectedOptions = [];
                $('input[name="options[]"]:checked').each(function () {
                    selectedOptions.push($(this).val());
                });

                const resultDiv = $('#result');
                resultDiv.empty();

                if (selectedOptions.length > 0) {
                    const ul = $('<ul></ul>');
                    selectedOptions.forEach(function (option) {
                        ul.append(`<li>${option}</li>`);
                    });
                    resultDiv.append(ul);
                } else {
                    resultDiv.text("Nav izvēlētu produktu kategoriju");
                }
            });
        });
    </script>
</body>
</html>
