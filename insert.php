<?php
    include 'db.php';
    
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $name=$_POST['name'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $category=$_POST['category'];
        $image_name=$_FILES['image']['name'];

        $sql=$conn->prepare('insert into menu(name,description,price,category,image) values(?,?,?,?,?)');
        $sql->bind_param('ssiss',$name,$description,$price,$category,$image_name);
        move_uploaded_file($_FILES['image']['tmp_name'],"uploads/$image_name");
        if($sql->execute()){
            header('Location:show.php');
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
             <nav
                class="navbar navbar-expand-sm navbar-light bg-light"
             >
                <div class="container">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="home.php" aria-current="page"
                                    >Home
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="insert.php">Add Menu Item</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="show.php">View Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pdf.php">Export data</a>
                            </li>
                        </ul>
                        <form class="d-flex my-2 my-lg-0" action="logout.php">
        
                            <button
                                class="btn btn-outline-success my-2 my-sm-0"
                                type="submit"
                            >
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
             </nav>
        </header>
        <main>
            <div
                class="container col-5 mt-5"
            >
                <form action="" method="POST" enctype="multi-part/form-data">
                    <div class="card">
                        <div class="card-header text-center">Add Menu Item!</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder="name"
                                />
                            </div>

                            <div class="mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="description"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder="description"
                                />
                            </div>

                            <div class="mb-3">
                                <input
                                    type="number"
                                    class="form-control"
                                    name="price"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder="price"
                                />
                            </div>

                            <div class="mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="category"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder="category"
                                />
                            </div>

                            <div class="mb-3">
                                <input
                                    type="file"
                                    class="form-control"
                                    name="image"
                                    id=""
                                    placeholder=""
                                    aria-describedby="fileHelpId"
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
                            <p>Enjoy tasty food!</p>
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
