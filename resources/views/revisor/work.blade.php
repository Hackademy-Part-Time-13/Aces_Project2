<x-main>
    <div class="row mt-3 align-items-center">
        <h1 class="text-primary text-center mb-5">Join us!</h1>
        <div class="col-12 col-md-7 text-center text-lg-start">
            <p>Welcome to our "Join Us" page! We're currently seeking a diligent and detail-oriented Ad Reviewer to join our team. If you have a keen eye for accuracy and a passion for maintaining high-quality content, we'd love to hear from you. Review and ensure the integrity of our site's advertisements, contributing to a seamless user experience. Join us in shaping a reliable and trustworthy online environment.</p>
            <p class="text-primary fst-italic">Ready to be a crucial part of our team?</p>
        </div>
        <div class="col-12 col-md-5">
            <form action="{{route('work.mail')}}" method="POST">
                @csrf
                {{-- <input type="text" class="d-none" name="email" value={{auth()->user()->email}}> --}}
                <button class="btn btn-primary w-75 d-block mx-auto" type="submit">Apply now</button>
            </form>
        </div>
                
    </div>
</x-main>