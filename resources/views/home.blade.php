

 @extends('app')
@section('content1')


<div class="auth-bg-basic d-flex align-items-center min-vh-100">
    {{-- <div class="bg-overlay bg-light"></div> --}}
    <div class="container">
        <div class="d-flex flex-column min-vh-100 py-5 px-3">

            <div class="row justify-content-center my-auto">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-transparent shadow-none border-0">
                        <div class="card-body">
                            <div class="text-center text-muted mb-2">
                                <div class="pb-3">

                                    <p class="text-muted font-size-15 w-75 mx-auto mt-3 mb-0">اهلاً بعودتك مرة اخرى </p>
                                </div>                            <div class="py-3 text-center">
                                <img src="{{asset('images/logo.png')}}" alt="" height="100">

                                </div>
                                <div class="text-center mt-4 pt-2">

                                    <h4>
                                        !!هل تسمح باستقبال الاشعارات
                                         </h4>
                                    <div class="mt-4">
                                        {{-- <a href="index.html" class="btn btn-primary w-100">Back to Dashboard</a> --}}
                                        <center>
                                            <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()" class="btn btn-primary w-100">Allow for Notification</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->


        </div>
    </div>
    <!-- end container fluid -->
</div>

<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>

    // Check if the alert has been shown before
    if (localStorage.getItem('alertShown') === 'true') {
        $('.alert').hide(); // Hide the alert
    } else {
        localStorage.setItem('alertShown', 'true'); // Set the flag to indicate the alert has been shown
    }

    var firebaseConfig = {
        apiKey: "AIzaSyClhwAm6gpPCA_xe0eyKyijkgmfSbHJnVY",
    authDomain: "push-notification-2e4e5.firebaseapp.com",
    projectId: "push-notification-2e4e5",
    storageBucket: "push-notification-2e4e5.appspot.com",
    messagingSenderId: "846675127181",
    appId: "1:846675127181:web:305614ea214975db03ebc4",
    measurementId: "G-H7JT7ZZ2F2"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
            messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route("save-token") }}',
                    type: 'POST',
                    data: {
                        token: token
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token saved successfully.');
                    },
                    error: function (err) {
                        console.log('User Chat Token Error'+ err);
                    },
                });

            }).catch(function (err) {
                console.log('User Chat Token Error'+ err);
            });
     }

    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });

</script>
@endsection
