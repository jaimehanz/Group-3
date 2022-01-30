   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Builder</title>
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Front-End/admin/style.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <!-- Header Start -->
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">PC BUILDER - Admin Panel</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle mx-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">User</button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="manageuser">Manage USer</a></li>
                                <li><a class="dropdown-item" href="createuser">Create User</a></li>
                                
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle mx-3" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">Supplier</button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item" href="supplier">Manage Supplier</a></li>
                                <li><a class="dropdown-item" href="createsupplier">Create Supplier</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle mx-3" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">Category</button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton3">
                                <li><a class="dropdown-item" href="category">Manage Category</a></li>
                                <li><a class="dropdown-item" href="createcategory">Create Category</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle mx-3" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">Items</button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton4">
                                <li><a class="dropdown-item" href="manageitems">Manage Items</a></li>
                                <li><a class="dropdown-item" href="createitems">Create Items</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle mx-3" type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-expanded="false">Orders</button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton5">
                                <li><a class="dropdown-item" href="#">All Order</a></li>
                            </ul>
                        </div>
                        <a href="#" class="nav-item nav-link mx-4">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header End -->

    <main>
    <!-- Dashboard Start -->
        <div class="cards row m-5">
            <div class="col-lg-3 col-md-6 my-2">
                <div class="card-single bg-dark bg-opacity-50 px-4 py-2">
                    <div>
                        <h1>21</h1>
                        <span>User/s</span>
                    </div>
                    <div>
                        <i class="bi bi-person"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 my-2">
                <div class="card-single bg-dark bg-opacity-50 px-4 py-2">
                    <div>
                        <h1>2</h1>
                        <span>Supplier/s</span>
                    </div>
                    <div>
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>  
            <div class="col-lg-3 col-md-6 my-2">
                <div class="card-single bg-dark bg-opacity-50 px-4 py-2">
                    <div>
                        <h1>3</h1>
                        <span>Items</span>
                    </div>
                    <div>
                        <i class="bi bi-bag-plus"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 my-2">
                <div class="card-single bg-dark bg-opacity-50 px-4 py-2">
                    <div>
                        <h1>4</h1>
                        <span>Total Order/s</span>
                    </div>
                    <div>
                        <i class="bi bi-cart-check"></i>
                    </div>
                </div>
            </div>    
            <div class="col-lg-3 col-md-6 my-2">
                <div class="card-single bg-dark bg-opacity-50 px-4 py-2">
                    <div>
                        <h1>5</h1>
                        <span>Category</span>
                    </div>
                    <div>
                        <i class="bi bi-collection"></i>
                    </div>
                </div>
            </div>    
            <div class="col-lg-3 col-md-6 my-2">
                <div class="card-single bg-dark bg-opacity-50 px-4 py-2">
                    <div>
                        <h1>3</h1>
                        <span>Pending Order</span>
                    </div>
                    <div>
                        <i class="bi bi-ui-checks-grid"></i>
                    </div>
                </div>
            </div>    
            <div class="col-lg-3 col-md-6 my-2">
                <div class="card-single bg-dark bg-opacity-50 px-4 py-2">
                    <div>
                        <h1>6</h1>
                        <span>Delivered Order/s</span>
                    </div>
                    <div>
                        <i class="bi bi-truck"></i>
                    </div>
                </div>
            </div>    
            <div class="col-lg-3 col-md-6 my-2">
                <div class="card-single bg-dark bg-opacity-50 px-4 py-2">
                    <div>
                        <h1>7</h1>
                        <span>Rejected Orders</span>
                    </div>
                    <div>
                        <i class="bi bi-bag-x"></i>
                    </div>
                </div>
            </div>     
        </div>
    <!-- Dashboard End -->


    <!-- table Start -->
        <div class="row m-5">
            <div class="col-lg-6">
                <div>
                    <h3 class="text-center">Supplier Report</h3>
                    <table class="table text-center bg-dark bg-opacity-50">
                        <thead>
                            <th>ID Number</th>
                            <th>Supplier Name</th>
                            <th>Total Sales</th>    
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Juan dela Cruz</td>
                                <td>6,738</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Gwyneth Chua</td>
                                <td>3,789</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <h3 class="text-center">Items Report</h3>
                    <table class="table text-center bg-dark bg-opacity-50">
                        <thead>
                            <th>ID Number</th>
                            <th>Item Name</th>
                            <th>Ordered Count</th>    
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Gigabyte Aorus X570 Xtreme</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>GeForce GTX 1660 SUPER Graphics Card | NVIDIA</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Table End -->
    </main>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
    



