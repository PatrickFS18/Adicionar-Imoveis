<!DOCTYPE html>
<html>

<head>
    <title>Register Page</title>
    <!-- Adicione o link para o Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        .gradient-custom-3 {
            /* fallback for old browsers */
            background: #84fab0;
        
            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));
        
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
        }
        
        .gradient-custom-4 {
            /* fallback for old browsers */
            background: #84fab0;
        
            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
        
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
        }
    </style>
</head>

<body>
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form>
                                    <div class="form-outline mb-4">
                                        <input id="emailInput" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="form-control form-control-lg"
                                            value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" />
                                        <label class="form-label" for="emailInput" >Your Email</label>
                                        <span class="invalid-feedback" role="alert" id="emailError">
                                        <strong></strong>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input id="passwordInput" name="password" required autocomplete="new-password" type="password"
                                            class="form-control form-control-lg" />
                                                                        <span class="invalid-feedback" role="alert" id="passwordError">
                                <strong></strong>
                            </span>
                                        <label class="form-label" for="passwordInput">Password</label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body"
                                            name="register">Register</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
