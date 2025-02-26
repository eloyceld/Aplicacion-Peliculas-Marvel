<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La próxima película de Marvel</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #0a0e17;
      color: white;
      min-height: 100vh;
    }
    
    .poster-container {
      position: relative;
    }
    
    .poster {
      max-width: 300px;
      border-radius: 10px;
      transition: transform 0.3s;
    }
    
    .poster:hover {
      transform: scale(1.05);
    }
    
    .marvel-title {
      font-weight: 700;
      text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }
    
    .release-container {
      background-color: rgba(20, 30, 48, 0.8);
      border-radius: 10px;
    }
    
    .countdown-days {
      font-size: 2rem;
      font-weight: 700;
    }
    
    .release-date, .next-movie {
      color: #adb5bd;
    }
  </style>
</head>

<body class="d-flex align-items-center py-5">

<?php
  // Obtener datos de la API
  $apiUrl = 'https://whenisthenextmcufilm.com/api';
  $response = @file_get_contents($apiUrl);
  
  if ($response === false) {
    // Si no se puede acceder a la API, usar datos de ejemplo
    $data = [
      'title' => 'Daredevil: Born Again',
      'release_date' => '2025-03-04',
      'poster_url' => 'https://m.media-amazon.com/images/M/MV5BNGZlMjIyNGUtMjNkMS00ZDIyLThkZWMtMDliNzMyMDhmYTVjXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_.jpg',
      'following' => []
    ];
  } else {
    $data = json_decode($response, true);
  }
  
  // Calcular días hasta el estreno
  $releaseDate = new DateTime($data['release_date']);
  $today = new DateTime();
  $interval = $today->diff($releaseDate);
  $daysUntil = $interval->days;
  
  // Formatear la fecha para mostrar
  $formattedDate = date('d/m/Y', strtotime($data['release_date']));
  
  // Determinar la siguiente película (si existe)
  $nextMovieText = "No hay información disponible";
  
  if (isset($data['following']) && !empty($data['following'])) {
    $nextMovieText = '"' . $data['following'][0]['title'] . '"';
  }
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8 text-center">
      <h1 class="display-5 mb-5 marvel-title">¿Cuándo es la próxima película de Marvel?</h1>
      
      <div class="poster-container mb-4">
        <img src="<?= htmlspecialchars($data['poster_url']) ?>" alt="<?= htmlspecialchars($data['title']) ?>" class="poster img-fluid shadow">
      </div>
      
      <div class="release-container p-4 mb-4 shadow">
        <div class="countdown-days mb-3">
          <?= htmlspecialchars($data['title']) ?> se estrena en <?= $daysUntil ?> días!
        </div>
        
        <div class="release-date mb-2">
          Fecha de estreno: <?= $formattedDate ?>
        </div>
        
        <div class="next-movie">
          La siguiente es: <?= $nextMovieText ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS Bundle (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>