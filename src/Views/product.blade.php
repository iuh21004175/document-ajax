@extends('layouts.app')

@section('content')
   <div class="d-flex justify-content-center mt-5" style="min-height: 400px">
       <table class="table w-75" id="table-product">
           <thead class="table-dark">
                <th>STT</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
           </thead>
           <tbody>

           </tbody>
       </table>
   </div>
   <div class="d-flex justify-content-center">

       <ul class="pagination pagination-sm" id="list-page">
           <li class="page-item active" aria-current="page">
               <button type="button"  class="page-link">1</button>
           </li>
            @for($i = 2; $i<=ceil($count_product/7); $i++)
               <li class="page-item"><button type="button" class="page-link" href="#">{{$i}}</button></li>
            @endfor
       </ul>
   </div>
@endsection
@section('script')
    <script>
        const element_tbody = document.querySelector('#table-product tbody')
        const element_btn_page = document.querySelectorAll('#list-page button')
        let btn_chose = document.querySelector('#list-page .page-item.active')

        function render_row(number_page) {
            const data_req = {
                'route': 'product',
                'data': JSON.stringify({'page': number_page,'step': 7})
            };

            const params = new URLSearchParams(data_req).toString();
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const data_res = JSON.parse(this.responseText);
                    element_tbody.innerHTML = ""
                    data_res.data.forEach(function (value, index){
                        const row = document.createElement('tr');

                        const cellIndex = document.createElement('td');
                        cellIndex.textContent = parseInt(value.id);
                        row.appendChild(cellIndex);

                        const cellName = document.createElement('td');
                        cellName.textContent = value.name;
                        row.appendChild(cellName);

                        const cellDescription = document.createElement('td');
                        cellDescription.textContent = value.description;
                        row.appendChild(cellDescription);

                        const cellPrice = document.createElement('td');
                        cellPrice.textContent = value.price;
                        row.appendChild(cellPrice);

                        const cellQuantity = document.createElement('td');
                        cellQuantity.textContent = value.quantity;
                        row.appendChild(cellQuantity);

                        element_tbody.appendChild(row);
                    })
                }
            };
            xhttp.open("GET", "index_api.php?" + params, true);
            xhttp.send();
        }
        render_row(1);
        element_btn_page.forEach(function (element, index){
            element.onclick = function (e){
                btn_chose = document.querySelector('#list-page .page-item.active')
                btn_chose.classList.remove('active')
                btn_chose.removeAttribute('aria-current')
                element.parentElement.classList.add('active')
                element.parentElement.setAttribute('aria-current', 'page')
                render_row(element.textContent)
            }
        })

        // const url = new URL('https://example.com/login');
        // url.searchParams.append('username', username);
        // url.searchParams.append('password', password);
        //
        // fetch(url, {
        //     method: 'GET',
        //     headers: {
        //         'Content-Type': 'application/json'
        //     }
        // })
        //     .then(response => response.json())
        //     .then(data => {
        //         console.log(data);
        //         if (data.success) {
        //             alert('Login successful!');
        //             // Redirect or perform other actions after successful login
        //         } else {
        //             alert('Login failed: ' + data.message);
        //         }
        //     })
        //     .catch((error) => {
        //         console.error('Error:', error);
        //     });
    </script>
@endsection
