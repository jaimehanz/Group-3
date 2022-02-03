<?=isset($message) ? $message: "";?>

<?php 
    #test to see values
    #print_r($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Builder</title>
    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css"
            href="<?php echo base_url('assets/css/header_style.css'); ?>">
    
    <link rel="stylesheet" type="text/css"
            href="<?php echo base_url('assets/css/profile.css'); ?>">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">PC BUILDER - Profile</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle mx-3" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-search"></i></button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                <input class="form-control bg-dark" type="text" placeholder="Search" aria-label="Search">
                                <li><a class="dropdown-item" href="#">Pre-Built PC</a></li>
                                <li><a class="dropdown-item" href="#">Motherboard</a></li>
                                <li><a class="dropdown-item" href="#">Processor</a></li>
                                <li><a class="dropdown-item" href="#">Video Card</a></li>
                                <li><a class="dropdown-item" href="#">HDD</a></li>
                                <li><a class="dropdown-item" href="#">SSD</a></li>
                                <li><a class="dropdown-item" href="#">Case</a></li>
                                <li><a class="dropdown-item" href="#">Monitor</a></li>
                                <li><a class="dropdown-item" href="#">Sound Card</a></li>
                                <li><a class="dropdown-item" href="#">Speakers</a></li>
                            </ul>
                        </div>
                        <a href="<?php echo base_url()."home"?>" class="nav-item nav-link mx-4"><i class="bi bi-house"></i></a>
                        <a href="<?php echo base_url()."cart"?>" class="nav-item nav-link mx-4"><i class="bi bi-cart-plus"></i></a>
                        <a href="<?php echo base_url()."orders"?>" class="nav-item nav-link mx-4"><i class="bi bi-bell"></i></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>