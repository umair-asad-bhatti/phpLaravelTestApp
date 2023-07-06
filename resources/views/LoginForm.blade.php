@include("common.Header")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Login</h3>
                        <form method="post" action="/handleLogin">
                            @csrf
                            @method("POST")
                            <div class="form-floating mb-3">

                                <input placeholder="example@gmail.com" type="email" id="floatingInput" class="form-control" name="email">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">

                                <input placeholder="****" type="password" id="floatingInput" class="form-control" name="password">
                                <label for="floatingInput">Password</label>
                            </div>
                            <input class="btn btn-light" type="submit" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include("common.Footer")
