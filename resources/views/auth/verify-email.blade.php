<x-main title="{{config('app.name')}} | Verify Email">

    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h2 class="card-title text-center">Email Verification</h2>
                <p class="card-text">
                    Thank you for registering! To complete the registration, please check your inbox and confirm your email.
                </p>
                <p class="card-text pb-3">
                    If you haven't received the verification email, you can click the button below to request another one.
                </p>
                <form action="/email/verification-notification" method="POST" class="mb-4">
                    @csrf
                    <button class="btn btn-primary w-100" type="submit"><span class="small">Resend Verification Email</span></button>
                </form>
        
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success small py-2">
                        A new email verification link has been emailed to you!
                    </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
</x-main>