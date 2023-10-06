<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90 p-4">
                 <div class="card-body">
                     <h4> Login Page </h4> 
                     <br/>
                      <form id="loginForm">
                        <input id="email" placeholder="User Email" class="form-control" type="email"/>
                        <br/>
                        <input id="password" placeholder="User Password" class="form-control" type="Password"/>
                        <br/>
                      </form>   
                    <button type="button" onclick="SubmitLogin()" class="btn w-100 btn-primary">SignIn</button>
                     <hr/>
                     <div class="float-end mt-3">
                          <span>
                            <a class="text-center ms-3 h6" href="{{ url('/userRegistration') }}">Sign Up</a>
                            <span class="ms-1">|</span>
                            <a class="text-center ms-3 h6" href="{{ url('/sendOtp') }}">Forget Password</a>
                          </span>
                        </div>
                
                      
                 </div>

            </div>
        </div>
    </div>
</div>

<script>
    async function SubmitLogin() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
     

    if (email.length === 0) {
        alert ("Email is Required");
    } else if (password.length === 0) {
        alert ("Password is Required");
    } else {
        try{
              let res = await axios.post('/UserLogin', { email: email, password: password });
              console.log(res);

               if (res.status === 200 && res.data['status'] === 'Success') {
               window.location.href = "/dashBoard";  
               document.getElementById('loginForm').reset();
                      } 

                else{
            
                      
                        alert (res.data['message']);
                               
                     }
             }         
        catch{
                  
                    alert("Something Wrong during Login");
        
          } 
    }
}
    

</script>