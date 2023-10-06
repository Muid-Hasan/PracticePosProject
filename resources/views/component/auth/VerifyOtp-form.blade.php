<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90 p-4">
                <div class="card-body">
                    <h4> Verify OTP </h4>
                    <br />
                    <form id="verifyotp">
                        <input id="verifYOtp" placeholder="Enter Your Four Digit OTP" class="form-control" type="text" />
                        <br />
                    </form>
                    <button type="button" onclick="verifyOtp()" class="btn w-100 btn-primary">Next</button>
                    <hr />
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    async function verifyOtp() {
        let otp = document.getElementById('verifYOtp').value;
        if (otp.length !== 4) {
            alert("Wrong or Emplty OTP");
        } else {

            let URL = '/verifyToken';
            let data = {
                otp: otp,
                email: sessionStorage.getItem('email')
            }
            let res = await axios.post(URL, data);

            if (res.status === 200) {
                alert(res.data['Messsage']);

                setTimeout(function() {
                    window.location.href = '/resetPassword'
                }, 5);
                document.getElementById('verifyotp').reset();
                sessionStorage.clear();
            } else {
                alert(res.data['status']);
                document.getElementById('verifyotp').reset();

            }
        }

    }
</script>
