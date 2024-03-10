
    <section class="consultation_form py-5">
        <div class="container">
            @if(session()->has('success'))
            <div class="row">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>{{Session::get('success')}}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <h2>Consultation Meeting</h2>
                </div>
                <form class="row mt-4" action="{{ route('consultation-post') }}" method="POST">
                    @csrf
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label fw-bold">Phone number</label>
                            <input type="tel" name="phone" class="form-control" id="tel" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="company" class="form-label fw-bold">Company name</label>
                            <input type="company" name="company" class="form-control" id="company" required>
                        </div>
                        <div class="mb-3">
                            <label for="need" class="form-label fw-bold">What do you need?</label>
                            <select class="form-select form-select-md mb-3" name="service_id" id="need" required>
                                <option selected>Select our service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label fw-bold">Set meeting
                                schedule
                            </label>
                            <input type="datetime-local" class="form-control" name="schedule" id="date" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Describe your issue</label>
                            <textarea type="description" class="form-control" id="description" name="description" rows="6" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Set meeting</button>
                    </div>
                </form>
            </div>
        </div>
    </section>