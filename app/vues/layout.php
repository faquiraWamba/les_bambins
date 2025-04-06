

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=BASE_URL?>/CSS/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface|Poppins">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <!-- Inclusion de Select2 (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Les Bambins</title>
</head>
<body class="body">
    
<?php if (isset($error)): ?>
   

    <!-- Ajout de SweetAlert2 pour afficher l'erreur sous forme de boîte de dialogue -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oups...',
            text: "<?= addslashes($error) ?>", 
            confirmButtonText: 'Réessayer',
            background: '#ffe5e5', 
            color: '#d9534f', 
            confirmButtonColor: '#d9534f', 
            timer: 3000, 
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
    </script>
<?php elseif (isset($success)): ?>
    <!-- Boîte de dialogue pour le succès -->
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Succès!',
            text: "<?= addslashes($success) ?>", 
            confirmButtonText: 'OK',
            background: '#d4edda', 
            color: '#155724', 
            confirmButtonColor: '#28a745', 
            timer: 3000, 
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
    </script>
<?php endif; ?>


        <?php include 'header.php'; ?>

        <main class='main'>
                
                <?php echo $content; ?>
        </main>

        <?php include 'footer.php'; ?>


        <script src="<?=BASE_URL?>/JS/register.js"></script>
        <script src="<?=BASE_URL?>/JS/Gestion_activite.js"></script>
        <script src="<?=BASE_URL?>/JS/openTab.js"></script>
        <script src="<?=BASE_URL?>/JS/Gestion_facture.js"></script>
        <script src="<?=BASE_URL?>/JS/search.js"></script>
        <script src="https://kit.fontawesome.com/a6f89b6701.js" crossorigin="anonymous"></script>
        
        
</body>
</html> 