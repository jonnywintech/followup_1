<div class="container pt-5">
    <h4 class="text-center"> data from json</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Product name</th>
                <th scope="col">Quantity in stock</th>
                <th scope="col">Price per item</th>
                <th scope="col">Date Time submited</th>
                <th scope="col">Total value number</th>
            </tr>
        </thead>
        <tbody class="table_body">

        </tbody>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table_body = document.querySelector('.table_body');

            fetch('/api/data')
                .then((res) => res.json())
                .then(json => {
                    data = JSON.parse(json);

                    let rows = '';
                    data.forEach(item => {
                        rows += `
                <tr>
                    <td>${item.item_name}</td>
                    <td>${item.item_quantity}</td>
                    <td>${item.price_per_item}</td>
                    <td>${item.update_date}</td>
                    <td>${parseInt(item.item_quantity) * parseInt(item.price_per_item)}</td>
                </tr>
            `;
                    });

                    table_body.innerHTML = rows;
                })
                .catch(err => console.error('Error fetching data:', err));
        });
    </script>
</div>
