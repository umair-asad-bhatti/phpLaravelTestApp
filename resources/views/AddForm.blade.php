@include('common.Header')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title mb-4">Add Record</h3>
                    <form method="post" action="/records">
                        @csrf
                        @method('POST')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="username" value="{{ old(' name') }}">
                            <label for="name">Name:</label>
                            <span class="text-danger">
                                @error('name')
                                    {{ @$message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <select name="gender" id="gender" class="form-select"
                                aria-label="Default select example">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <span class="text-danger">
                                @error('gender')
                                    {{ @$message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input value="{{ old('email') }}" placeholder="example@gmail.com" type="email"
                                id="email" class="form-control" name="email">
                            <label for="email">Email</label>
                            <span class="text-danger">
                                @error('email')
                                    {{ @$message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input value="{{ old(' city') }}" placeholder="eg:Lahore" type="text" id="city"
                                class="form-control" name="city">
                            <label for="city">City</label>
                            <span class="text-danger">
                                @error('city')
                                    {{ @$message }}
                                @enderror
                            </span>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Add Data">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-4 justify-content-center">
        <div class="col-12">

            @include('partials.LastFiveRecords')
        </div>
    </div>
</div>

@include('common.Footer')
