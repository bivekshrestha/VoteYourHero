<div class="modal fade" id="heroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Hero</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" name="hero" enctype="multipart/form-data" id="hero_modal_form" action="{{ route('hero.store') }}">
                    @csrf

                    <input type="hidden" name="country_id" value="{{$country->id}}">

                    <div class="row mx-0">

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="required">First Name</label>
                                <input type="text" class="form-control  @error('first_name') is-invalid @enderror"
                                    id="first_name" name="first_name" placeholder="Enter hero's first name"
                                    value="{{ old('first_name') }}">

                                @error('first_name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" class="form-control  @error('middle_name') is-invalid @enderror"
                                    id="middle_name" name="middle_name" placeholder="Enter hero's middle name"
                                    value="{{ old('middle_name') }}">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="required">Last Name</label>
                                <input type="text" class="form-control  @error('last_name') is-invalid @enderror"
                                    id="last_name" name="last_name" placeholder="Enter hero's last name"
                                    value="{{ old('last_name') }}">

                                @error('last_name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="profession" class="required">Profession</label>
                                <input type="text" class="form-control  @error('profession') is-invalid @enderror"
                                    id="profession" name="profession" placeholder="Enter hero's profession"
                                    value="{{ old('profession') }}">

                                @error('profession')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="identity" class="required">Company/Category</label>
                                <input type="text" class="form-control  @error('identity') is-invalid @enderror"
                                    id="identity" name="identity" placeholder="Enter hero's identity"
                                    value="{{ old('identity') }}">

                                @error('identity')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="contribution" class="required">Contribution</label>
                                <textarea class="form-control  @error('contribution') is-invalid @enderror"
                                    id="contribution" name="contribution"
                                    placeholder="Why you choose this hero?">{{ old('contribution') }}</textarea>

                                @error('contribution')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="photo" class="required">Photo</label>
                                <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*">

                                @error('photo')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-12 text-right">
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary mr-2"
                                    data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
