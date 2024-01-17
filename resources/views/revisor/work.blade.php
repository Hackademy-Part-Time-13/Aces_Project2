<x-main>

    <div class="container">
        <div class="row">
            <div class="col-6 mt-5">
                <h1>Work with us!</h1>
                <p>Welcome to our "Join Us" page! We're currently seeking a diligent and detail-oriented Ad Reviewer to join our team. </p>
                <p>If you have a keen eye for accuracy and a passion for maintaining high-quality content, we'd love to hear from you. Review and ensure the integrity of our site's advertisements, contributing to a seamless user experience. </p>
                <p>Ready to be a crucial part of our team? Click below. </p>
                <p>Join us in shaping a reliable and trustworthy online environment.</p>
                <form action="{{route('work.mail')}}" method="POST">
                    @csrf
                    <input type="text" class="d-none" name="email" value={{auth()->user()->email}}>
                    <button class="btn btn-primary" type="submit">Invia richiesta</button>
                </form>
               
            </div>
        </div>
    </div>



</x-main>