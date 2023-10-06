<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90 p-4">
                 <div class="card-body">
                     <h4> Send OTP </h4> 
                     <br/>
                     <form id="otpform">
                          <input id="email" placeholder="User Email" class="form-control" type="email"/>
                          <br/>
                     </form>
                     
                     <button type="button" onclick="SubmitOtp()" class="btn w-100 btn-primary">Next</button>
                     <hr/>
                 </div>

            </div>
        </div>
    </div>
</div>
<script>
   async function SubmitOtp(){
    let email= document.getElementById('email').value;
    if(email.length===0){
        
        alert ("Email Required!!");
    }
     else{
             let URL="/SendOtp";
             let data={
             email:email
            }
          let res= await axios.post(URL,data);
          if(res.status===200 && res.data['email']===email){
           
                  alert (res.data['Status']);
                  sessionStorage.setItem('email',email);
                  setTimeout(function(){
                  window.location.href='/verifyOtp'}, 5);
                  document.getElementById('otpform').reset();
                  }
          else{
                  alert (res.data['message']);
                  document.getElementById('otpform').reset();
                  setTimeout(function(){
                  window.location.href='/userLogin'}, 5);
                  document.getElementById('otpform').reset();
                  }
         }
   }



</script>