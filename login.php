<?php
    include 'db.php';
    
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql=$conn->prepare('select password,userid from user where email=?');
        $sql->bind_param('s',$email);
        $sql->execute();
        $sql->store_result();
        $sql->bind_result($dbpassword,$dbuserid);


        if($sql->fetch() && password_verify($password,$dbpassword)){
            $_SESSION['id']=$dbuserid;
            header('Location:home.php');
        }
        else{
            echo '<div
                class="alert alert-primary alert-dismissible fade show"
                role="alert"
            >
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            
                <strong>Holy Hello!</strong> Invalid Credentials!
            </div>';
            
        }

        

    }
?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div
                class="container col-5 mt-5"
            >
                <form action="" method="POST">
                    <div class="card">
                        <div class="card-header text-center">Register with Us!</div>
                        <div class="card-body">

                            <div class="mb-3">
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder="email"
                                />
                            </div>

                            <div class="mb-3">
                                <input
                                    type="password"
                                    class="form-control"
                                    name="password"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder="password"
                                />
                            </div>


                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Submit
                            </button>
                            
                        </div>
                        <div class="card-footer text-body-secondary text-center">
                            <a href="register.php">New User!Register here!</a>
                        </div>
                    </div>
                    
                    
                </form>
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
