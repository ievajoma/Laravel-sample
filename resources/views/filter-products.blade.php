<!doctype html>
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
<div class="grid grid-cols-[12rem_1fr_1fr] gap-4">

    {{-- sidebar with checkboxes for each category --}}
    <div class="bg-blue-500 p-4">
        <h3 class="text-xl font-semibold mb-3">Izvēlies kategorijas:</h3>
        @foreach ($categories as $category)
            <label>
                <input type="checkbox" name="categories[]" value="{{ $category['id'] }}" class="category-checkbox">
                {{ $category['name'] }}
            </label><br>
        @endforeach
    </div>

    {{-- a list of selected products --}}
    <div class="bg-slate-400 p-4">
        <h2 class="text-2xl font-bold mb-4">Atlasītie produkti:</h2>
        <div id="product-list"></div>
    </div>

    {{-- a list of all products --}}
    <div class="bg-slate-400 p-4">
        <h2 class="text-2xl font-bold mb-4">Visu produktu saraksts:</h2>
        @foreach ($categories as $category)
            <h3 class="text-xl font-semibold mt-3">{{ $category['name'] }}</h3>
            <ul class="list-disc pl-6">
                @foreach ($products as $product)
                    @if ($product['category_id'] == $category['id'])
                        <li>{{ $product['name'] }}</li>
                    @endif
                @endforeach
            </ul>
        @endforeach
    </div>
</div>

<script>
    const products = @json($products);
    const categories = @json($categories);

    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.category-checkbox');
        const productList = document.querySelector('#product-list');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function (){
                productList.innerHTML = "";

                const selectedCategories = Array.from(checkboxes)
                    .filter((cb) => cb.checked)
                    .map((cb) => parseInt(cb.value));

                categories.forEach(category => {
                    if (selectedCategories.includes(category.id)) {
                        const categoryHeading = document.createElement('h3');
                        categoryHeading.textContent = category.name;
                        categoryHeading.classList.add("text-xl", "font-semibold", "mt-3");
                        productList.appendChild(categoryHeading);

                        const ul = document.createElement('ul');
                        const filteredProducts = products.filter(product => product.category_id === category.id);

                        filteredProducts.forEach(product => {
                            const li = document.createElement('li');
                            li.textContent = product.name;
                            ul.classList.add("list-disc", "pl-6");
                            ul.appendChild(li);
                        });

                        if (filteredProducts.length > 0) {
                            productList.appendChild(ul);
                        } else {
                            const noProductsMsg = document.createElement('li');
                            noProductsMsg.textContent = 'Nav produktu šajā kategorijā';
                            ul.appendChild(noProductsMsg);
                            productList.appendChild(ul);
                        }
                    }
                });
            });
        });
    });
</script>
</body>
</html>
