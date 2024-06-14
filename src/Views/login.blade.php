@extends('layouts.app')

@section('content')
   <div class="row justify-content-center align-items-center" style="min-height: 700px">
       <div class="modal-content border p-2" style="width: 400px; height: 300px">
           <div class="modal-header justify-content-center">
              <h4>LOGIN</h4>
           </div>
           <form action="" method="post" id="form-login">
           <div class="modal-body mb-3">
               <span class="text-danger my-2 d-block" id="message-error" style="font-size: 12px">&nbsp;</span>
               <label class="form-label" for="username">Username</label>
               <input type="text" class="form-control" id="txt-username" name="txt-username">
               <label class="form-label" for="password">Password</label>
               <input type="password" class="form-control" id="txt-password" name="txt-password">

           </div>
           <div class="modal-footer">
               <input type="submit" id="btn-login" name="btn-login" class="btn btn-primary" value="Login">
           </div>
           </form>
       </div>
   </div>
@endsection
@section('script')
    <script>
        const element_form = document.getElementById('form-login')
        const element_submit = document.getElementById('btn-login')

        element_submit.onclick = function (e){
            e.preventDefault();

            const element_username = document.getElementById('txt-username')
            const element_password = document.getElementById('txt-password')
            const element_message = document.getElementById('message-error')

            const data_req = {
                'route': 'login',
                'data' : {
                    'username': element_username.value,
                    'password': element_password.value
                }
            }
            xhttp = new XMLHttpRequest()
            xhttp.onreadystatechange = function (){
                if (this.readyState == 4 && this.status == 200) {
                    const data_res = JSON.parse(this.responseText)
                    if(data_res.status === true){
                        window.location.href = "./home"
                    }
                    else{
                        element_message.innerHTML=data_res.message
                    }
                }
            }
            xhttp.open("POST", "index_api.php");
            xhttp.setRequestHeader("Content-type", "application/json");
            xhttp.send(JSON.stringify(data_req));
        }

        // fetch('https://example.com/login', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json'
        //     },
        //     body: JSON.stringify({ username: username, password: password })
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
