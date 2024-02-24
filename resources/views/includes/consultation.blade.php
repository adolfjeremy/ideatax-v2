
    <section class="consultation_form py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Consultation Meeting</h2>
                </div>
                <form class="row mt-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label fw-bold">Phone number</label>
                            <input type="tel" class="form-control" id="tel">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="company" class="form-label fw-bold">Company name</label>
                            <input type="company" class="form-control" id="company">
                        </div>
                        <div class="mb-3">
                            <label for="need" class="form-label fw-bold">What do you need?</label>
                            <select class="form-select form-select-md mb-3" name="need" id="need">
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
                            <input type="datetime-local" class="form-control" id="date">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Describe your issue</label>
                            <textarea type="description" class="form-control" id="description" rows="6"></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Set meeting</button>
                    </div>
                </form>
            </div>
        </div>
    </section>