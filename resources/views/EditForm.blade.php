@include("common.Header")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                            <h3 class="card-title mb-4">Edit Record</h3>
                            <form method="post" action="{{route("records.update",$user->id)}}">
                            @csrf
                            @method("PATCH")

                            <div class="form-floating mb-3">
                                <input value="{{$user->name}}" type="text" class="form-control" id="name" name="name" placeholder="username">
                                <label for="name">Name:</label>
                                <span class="text-danger">@error("name") {{$message}} @enderror</span>
                            </div>

                            <div class="mb-3">
                                <select  name="gender" id="gender" class="form-select" aria-label="Default select example">
                                    <option {{$user->gender=='male'?"selected":""}} value="male">Male</option>
                                    <option {{$user->gender=='female'?"selected":""}} value="female">Female</option>
                                </select>
                            </div>

                            <div class="form-floating mb-3">
                                <input value="{{$user->email}}"  placeholder="example@gmail.com" type="email" id="email" class="form-control" name="email">
                                <label for="email">Email</label>
                                <span class="text-danger">@error("email") {{$message}} @enderror</span>
                            </div>

                            <div class="form-floating mb-3">
                                <input value="{{$user->city}}" placeholder="eg:Lahore" type="text" id="city" class="form-control" name="city">
                                <label for="city">City</label>
                                <span class="text-danger">@error("city") {{$message}} @enderror</span>
                            </div>

                            <input class="btn btn-primary" type="submit" value="Edit Record">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @include('partials.LastFiveRecords')
            </div>
        </div>
    </div>
@include("common.Footer")
