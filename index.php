<?php
//  array of team names 
$teams =["MARRUECOS", "CROACIA", "BELGICA", "CANADA"];
//  array that will hold various statistics for each team
$class = array();
foreach ($teams as $team) {
  $class[$team] = array( "PTS." => 0,"PAR." => 0,"GAN." => 0,"EMP." => 0,"PER." => 0,"G.F." => 0,"G.C." => 0, "+/-" => 0);
}
$scores = array();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($_POST as $key => $value) {
    $scores[$key] = $value;
  }
  for ($i = 0; $i < 12; $i += 2) {
    // i>(i+1)
    if ( array_values($scores)[$i] > array_values($scores)[$i + 1]) {
      // team gagne
      // similar_text returns the number of matching characters between two strings, expressed as a percentage
      similar_text("$teams[0]", array_keys($scores)[$i], $mo);
      similar_text("$teams[1]", array_keys($scores)[$i], $cr);
      similar_text("$teams[2]", array_keys($scores)[$i], $be);
      similar_text("$teams[3]", array_keys($scores)[$i], $ca);
      $largest = $mo;
      $largest = max($mo, $cr, $be, $ca);
      if ($largest == $mo){
        $class["$teams[0]"]['PTS.'] += 3;
        $class["$teams[0]"]['PAR.'] += 1;
        $class["$teams[0]"]['GAN.'] += 1;
        $class["$teams[0]"]['EMP.'] += 0;
        $class["$teams[0]"]['PER.'] += 0;
        $class["$teams[0]"]['G.F.'] += (int) array_values($scores)[$i];
        $class["$teams[0]"]['G.C.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[0]"]['+/-'] = $class["$teams[0]"]['G.F.'] - $class["$teams[0]"]['G.C.'];
      } elseif ($largest == $cr) {
        $class["$teams[1]"]['PTS.'] += 3;
        $class["$teams[1]"]['PAR.'] += 1;
        $class["$teams[1]"]['GAN.'] += 1;
        $class["$teams[1]"]['EMP.'] += 0;
        $class["$teams[1]"]['PER.'] += 0;
        $class["$teams[1]"]['G.F.'] += (int) array_values($scores)[$i];
        $class["$teams[1]"]['G.C.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[1]"]['+/-'] = $class["$teams[1]"]['G.F.'] - $class["$teams[1]"]['G.C.'];
      } elseif ($largest == $be) {
        $class["$teams[2]"]['PTS.'] += 3;
        $class["$teams[2]"]['PAR.'] += 1;
        $class["$teams[2]"]['GAN.'] += 1;
        $class["$teams[2]"]['EMP.'] += 0;
        $class["$teams[2]"]['PER.'] += 0;
        $class["$teams[2]"]['G.F.'] += (int) array_values($scores)[$i];
        $class["$teams[2]"]['G.C.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[2]"]['+/-'] = $class["$teams[2]"]['G.F.'] - $class["$teams[2]"]['G.C.'];
      } elseif ($largest == $ca) {
        $class["$teams[3]"]['PTS.'] += 3;
        $class["$teams[3]"]['PAR.'] += 1;
        $class["$teams[3]"]['GAN.'] += 1;
        $class["$teams[3]"]['EMP.'] += 0;
        $class["$teams[3]"]['PER.'] += 0;
        $class["$teams[3]"]['G.F.'] += (int) array_values($scores)[$i];
        $class["$teams[3]"]['G.C.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[3]"]['+/-'] = $class["$teams[3]"]['G.F.'] - $class["$teams[3]"]['G.C.'];
      }
      // team lost
      similar_text("$teams[0]", array_keys($scores)[$i + 1], $mo);
      similar_text("$teams[1]", array_keys($scores)[$i + 1], $cr);
      similar_text("$teams[2]", array_keys($scores)[$i + 1], $be);
      similar_text("$teams[3]", array_keys($scores)[$i + 1], $ca);
      $largest = $mo;
      $largest = max($mo, $cr, $be, $ca);
      if ($largest == $mo) {
        $class["$teams[0]"]['PER.'] += 1;
        $class["$teams[0]"]['PAR.'] += 1;
        $class["$teams[0]"]['G.F.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[0]"]['G.C.'] += (int) array_values($scores)[$i];
        $class["$teams[0]"]['+/-'] = $class["$teams[0]"]['G.F.'] - $class["$teams[0]"]['G.C.'];
      } elseif ($largest == $cr) {
        $class["$teams[1]"]['PER.'] += 1;
        $class["$teams[1]"]['PAR.'] += 1;
        $class["$teams[1]"]['G.F.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[1]"]['G.C.'] += (int) array_values($scores)[$i];
        $class["$teams[1]"]['+/-'] = $class["$teams[1]"]['G.F.'] - $class["$teams[1]"]['G.C.'];
      } elseif ($largest == $be) {
        $class["$teams[2]"]['PER.'] += 1;
        $class["$teams[2]"]['PAR.'] += 1;
        $class["$teams[2]"]['G.F.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[2]"]['G.C.'] += (int) array_values($scores)[$i];
        $class["$teams[2]"]['+/-'] = $class["$teams[2]"]['G.F.'] - $class["$teams[2]"]['G.C.'];
      } elseif ($largest == $ca) {
        $class["$teams[3]"]['PER.'] += 1;
        $class["$teams[3]"]['PAR.'] += 1;
        $class["$teams[3]"]['G.F.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[3]"]['G.C.'] += (int) array_values($scores)[$i];
        $class["$teams[3]"]['+/-'] = $class["$teams[3]"]['G.F.'] - $class["$teams[3]"]['G.C.'];
      }
    } elseif (array_values($scores)[$i] < array_values($scores)[$i + 1]) {
      similar_text("$teams[0]", array_keys($scores)[$i + 1], $mo);
      similar_text("$teams[1]", array_keys($scores)[$i + 1], $cr);
      similar_text("$teams[2]", array_keys($scores)[$i + 1], $be);
      similar_text("$teams[3]", array_keys($scores)[$i + 1], $ca);
      $largest = $mo;
      $largest = max($mo, $cr, $be, $ca);
      if ($largest == $mo) {
        $class["$teams[0]"]['PTS.'] += 3;
        $class["$teams[0]"]['PAR.'] += 1;
        $class["$teams[0]"]['GAN.'] += 1;
        $class["$teams[0]"]['EMP.'] += 0;
        $class["$teams[0]"]['PER.'] += 0;
        $class["$teams[0]"]['G.F.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[0]"]['G.C.'] += (int) array_values($scores)[$i];
        $class["$teams[0]"]['+/-'] = $class["$teams[0]"]['G.F.'] - $class["$teams[0]"]['G.C.'];
      } elseif ($largest == $cr) {
        $class["$teams[1]"]['PTS.'] += 3;
        $class["$teams[1]"]['PAR.'] += 1;
        $class["$teams[1]"]['GAN.'] += 1;
        $class["$teams[1]"]['EMP.'] += 0;
        $class["$teams[1]"]['PER.'] += 0;
        $class["$teams[1]"]['G.F.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[1]"]['G.C.'] += (int) array_values($scores)[$i];
        $class["$teams[1]"]['+/-'] = $class["$teams[1]"]['G.F.'] - $class["$teams[1]"]['G.C.'];
      } elseif ($largest == $be) {
        $class["$teams[2]"]['PTS.'] += 3;
        $class["$teams[2]"]['PAR.'] += 1;
        $class["$teams[2]"]['GAN.'] += 1;
        $class["$teams[2]"]['EMP.'] += 0;
        $class["$teams[2]"]['PER.'] += 0;
        $class["$teams[2]"]['G.F.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[2]"]['G.C.'] += (int) array_values($scores)[$i];
        $class["$teams[2]"]['+/-'] = $class["$teams[2]"]['G.F.'] - $class["$teams[2]"]['G.C.'];
      } elseif ($largest == $ca) {
        $class["$teams[3]"]['PTS.'] += 3;
        $class["$teams[3]"]['PAR.'] += 1;
        $class["$teams[3]"]['GAN.'] += 1;
        $class["$teams[3]"]['EMP.'] += 0;
        $class["$teams[3]"]['PER.'] += 0;
        $class["$teams[3]"]['G.F.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[3]"]['G.C.'] += (int) array_values($scores)[$i];
        $class["$teams[3]"]['+/-'] = $class["$teams[3]"]['G.F.'] - $class["$teams[3]"]['G.C.'];
      }
      // equalizing
      similar_text("$teams[0]", array_keys($scores)[$i], $mo);
      similar_text("$teams[1]", array_keys($scores)[$i], $cr);
      similar_text("$teams[2]", array_keys($scores)[$i], $be);
      similar_text("$teams[3]", array_keys($scores)[$i], $ca);
      $largest = $mo;
      $largest = max($mo, $cr, $be, $ca);
      if ($largest == $mo) {
        $class["$teams[0]"]['PER.'] += 1;
        $class["$teams[0]"]['PAR.'] += 1;
        $class["$teams[0]"]['G.F.'] += (int) array_values($scores)[$i];
        $class["$teams[0]"]['G.C.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[0]"]['+/-'] = $class["$teams[0]"]['G.F.'] - $class["$teams[0]"]['G.C.'];
      } elseif ($largest == $cr) {
        $class["$teams[1]"]['PER.'] += 1;
        $class["$teams[1]"]['G.F.'] += (int) array_values($scores)[$i];
        $class["$teams[1]"]['G.C.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[1]"]['+/-'] = $class["$teams[1]"]['G.F.'] - $class["$teams[1]"]['G.C.'];
      } elseif ($largest == $be) {
        $class["$teams[2]"]['PER.'] += 1;
        $class["$teams[2]"]['PAR.'] += 1;
        $class["$teams[2]"]['G.F.'] += (int) array_values($scores)[$i];
        $class["$teams[2]"]['G.C.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[2]"]['+/-'] = $class["$teams[2]"]['G.F.'] - $class["$teams[2]"]['G.C.'];
      } elseif ($largest == $ca) {
        $class["$teams[3]"]['PER.'] += 1;
        $class["$teams[3]"]['PAR.'] += 1;
        $class["$teams[3]"]['G.F.'] += (int) array_values($scores)[$i];
        $class["$teams[3]"]['G.C.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[3]"]['+/-'] = $class["$teams[3]"]['G.F.'] - $class["$teams[3]"]['G.C.'];
      }
    } elseif (array_values($scores)[$i] == array_values($scores)[$i + 1]) {
      similar_text("$teams[0]", array_keys($scores)[$i], $mo);
      similar_text("$teams[1]", array_keys($scores)[$i], $cr);
      similar_text("$teams[2]", array_keys($scores)[$i], $be);
      similar_text("$teams[3]", array_keys($scores)[$i], $ca);
      $largest = $mo;
      $largest = max($mo, $cr, $be, $ca);
      if ($largest == $mo) {
        $class["$teams[0]"]['PTS.'] += 1;
        $class["$teams[0]"]['PAR.'] += 1;
        $class["$teams[0]"]['GAN.'] += 0;
        $class["$teams[0]"]['EMP.'] += 1;
        $class["$teams[0]"]['PER.'] += 0;
        $class["$teams[0]"]['G.F.'] += (int) array_values($scores)[$i];
        $class["$teams[0]"]['G.C.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[0]"]['+/-'] = $class["$teams[0]"]['G.F.'] - $class["$teams[0]"]['G.C.'];
      } elseif ($largest == $cr) {
        $class["$teams[1]"]['PTS.'] += 1;
        $class["$teams[1]"]['PAR.'] += 1;
        $class["$teams[1]"]['GAN.'] += 0;
        $class["$teams[1]"]['EMP.'] += 1;
        $class["$teams[1]"]['PER.'] += 0;
        $class["$teams[1]"]['G.F.'] += (int) array_values($scores)[$i];
        $class["$teams[1]"]['G.C.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[1]"]['+/-'] = $class["$teams[1]"]['G.F.'] - $class["$teams[1]"]['G.C.'];
      } elseif ($largest == $be) {
        $class["$teams[2]"]['PTS.'] += 1;
        $class["$teams[2]"]['PAR.'] += 1;
        $class["$teams[2]"]['GAN.'] += 0;
        $class["$teams[2]"]['EMP.'] += 1;
        $class["$teams[2]"]['PER.'] += 0;
        $class["$teams[2]"]['G.F.'] += (int) array_values($scores)[$i];
        $class["$teams[2]"]['G.C.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[2]"]['+/-'] = $class["$teams[2]"]['G.F.'] - $class["$teams[2]"]['G.C.'];
      } elseif ($largest == $ca) {
        $class["$teams[3]"]['PTS.'] += 1;
        $class["$teams[3]"]['PAR.'] += 1;
        $class["$teams[3]"]['GAN.'] += 0;
        $class["$teams[3]"]['EMP.'] += 1;
        $class["$teams[3]"]['PER.'] += 0;
        $class["$teams[3]"]['G.F.'] += (int) array_values($scores)[$i];
        $class["$teams[3]"]['G.C.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[3]"]['+/-'] = $class["$teams[3]"]['G.F.'] - $class["$teams[3]"]['G.C.'];
      }
      similar_text("$teams[0]", array_keys($scores)[$i + 1], $mo);
      similar_text("$teams[1]", array_keys($scores)[$i + 1], $cr);
      similar_text("$teams[2]", array_keys($scores)[$i + 1], $be);
      similar_text("$teams[3]", array_keys($scores)[$i + 1], $ca);
      $largest = $mo;
      $largest = max($mo, $cr, $be, $ca);
      if ($largest == $mo) {
        $class["$teams[0]"]['PTS.'] += 1;
        $class["$teams[0]"]['PAR.'] += 1;
        $class["$teams[0]"]['GAN.'] += 0;
        $class["$teams[0]"]['EMP.'] += 1;
        $class["$teams[0]"]['PER.'] += 0;
        $class["$teams[0]"]['G.F.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[0]"]['G.C.'] += (int) array_values($scores)[$i];
        $class["$teams[0]"]['+/-'] = $class["$teams[0]"]['G.F.'] - $class["$teams[0]"]['G.C.'];;
      } elseif ($largest == $cr) {
        $class["$teams[1]"]['PTS.'] += 1;
        $class["$teams[1]"]['PAR.'] += 1;
        $class["$teams[1]"]['GAN.'] += 0;
        $class["$teams[1]"]['EMP.'] += 1;
        $class["$teams[1]"]['PER.'] += 0;
        $class["$teams[1]"]['G.F.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[1]"]['G.C.'] += (int) array_values($scores)[$i];
        $class["$teams[1]"]['+/-'] = $class["$teams[1]"]['G.F.'] - $class["$teams[1]"]['G.C.'];
      } elseif ($largest == $be) {
        $class["$teams[2]"]['PTS.'] += 1;
        $class["$teams[2]"]['PAR.'] += 1;
        $class["$teams[2]"]['GAN.'] += 0;
        $class["$teams[2]"]['EMP.'] += 1;
        $class["$teams[2]"]['PER.'] += 0;
        $class["$teams[2]"]['G.F.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[2]"]['G.C.'] += (int) array_values($scores)[$i];
        $class["$teams[2]"]['+/-'] = $class["$teams[2]"]['G.F.'] - $class["$teams[2]"]['G.C.'];
      } elseif ($largest == $ca) {
        $class["$teams[3]"]['PTS.'] += 1;
        $class["$teams[3]"]['PAR.'] += 1;
        $class["$teams[3]"]['GAN.'] += 0;
        $class["$teams[3]"]['EMP.'] += 1;
        $class["$teams[3]"]['PER.'] += 0;
        $class["$teams[3]"]['G.F.'] += (int) array_values($scores)[$i + 1];
        $class["$teams[3]"]['G.C.'] += (int) array_values($scores)[$i];
        $class["$teams[3]"]['+/-'] = $class["$teams[3]"]['G.F.'] - $class["$teams[3]"]['G.C.'];
      }
    }
  }
  // sort
  for ($i = 0; $i < 3; $i++) {
    uasort($class, function ($a, $b) {
      if ($a['PTS.'] == $b['PTS.']) {
        if ($a['G.F.'] == $b['G.F.']) {
          return $b['+/-'] - $a['+/-'];
        }
        return $b['G.F.'] - $a['G.F.'];
      }
      return $b['PTS.'] - $a['PTS.'];
    });          
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"defer></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body> 
<form method="post" action="">
    <table class="table">
  <thead>
    <tr>
       <th scope="col">23 NOV 11:00H</th>
        <th scope="col" class=" bg-light text-dark">FINALIZADO</th>
        <th scope="col">PARTIDO 9</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="w-25"><img src="image/maroc.png" alt="maroc"><p>MARRUECOS</p></td>
     <td class="w-25  me-5"><div class="input-group  w-50" >
                    <input type="number" class="form-control "  name="MARRUECOS1" >
                    <span class="input-group-text">:</span>
                    <input type="number" class="form-control"  name="CROACIA1">
                  </div></td>
      <td class="w-25"><img src="image/croatia.png" alt="croatia"><p>CROACIA</p></td> 
    </tr>
    <tr>
                <td>23 NOV 20:00H</th>
                <td class=" bg-light text-dark">FINALIZADO</th>
                <td>PARTIDO 12</th>
              </tr>
    <tr>
      <td><img src="image/belgique.png" alt="belgique"><p>BELGICA</p></td> 
      <td class="w-25"><div class="input-group  w-50" >
                    <input type="number" class="form-control"  name="BELGICA1" >
                    <span class="input-group-text">:</span>
                    <input type="number" class="form-control"  name="CANADA1">
                  </div></td>
      <td><img src="image/canada.png" alt="canada"><P>CANADA</P></td>
    </tr>
    <tr>
       <td>27 NOV 14:00H</td>
        <td class=" bg-light text-dark">FINALIZADO</th>
        <td>PARTIDO 26</th>
              </tr>
    <tr>
      <td><img src="image/belgique.png" alt="belgique"><p>BELGICA</p></td> 
      <td class="w-25"><div class="input-group  w-50" >
                    <input type="number" class="form-control"  name="BELGICA2" >
                    <span class="input-group-text">:</span>
                    <input type="number" class="form-control"  name="MARRUECOS2">
                  </div></td>
      <td><img src="image/maroc.png" alt="maroc"><p>MARRUECOS</p></td>
    </tr>
    <tr>
                <td>27 NOV 14:00H</th>
                <td class=" bg-light text-dark">FINALIZADO</th>
                <td>PARTIDO 26</th>
              </tr>
    <tr>
      <td><img src="image/croatia.png" alt="croatia"><p>CROACIA</p></td> 
      <td class="w-25"><div class="input-group  w-50" >
                    <input type="number" class="form-control"  name="CROACIA2" >
                    <span class="input-group-text">:</span>
                    <input type="number" class="form-control"  name="CANADA2">
                  </div></td>
      <td><img src="image/canada.png" alt="canada"><P>CANADA</P></td>
    </tr> 
    <tr>
                <td>27 NOV 14:00H</th>
                <td class=" bg-light text-dark">FINALIZADO</th>
                <td>PARTIDO 26</th>
              </tr>
     <tr>
      <td><img src="image/croatia.png" alt="croatia"><p>CROACIA</p></td> 
      <td class="w-25"><div class="input-group  w-50" >
                    <input type="number" class="form-control"  name="CROACIA3" >
                    <span class="input-group-text">:</span>
                    <input type="number" class="form-control"  name="BELGICA3">
                  </div></td>
      <td><img src="image/belgique.png" alt="belgique"><p>BELGICA</p></td> 
    </tr>
    <tr>
                <td>27 NOV 14:00H</th>
                <td class=" bg-light text-dark">FINALIZADO</th>
                <td>PARTIDO 26</th>
              </tr>
     <tr>
      <td><img src="image/canada.png" alt="canada"><P>CANADA</P></td>
      <td class="w-25"><div class="input-group  w-50" >
                    <input type="number" class="form-control"  name="CANADA3" >
                    <span class="input-group-text">:</span>
                    <input type="number" class="form-control"  name="MARRUECOS3">
                  </div></td>
      <td><img src="image/maroc.png" alt="maroc"><p>MARRUECOS</p></td>
    </tr>
  </tbody>
</table>
<button type="submit" class="btn btn-outline-secondary">simuler</button>
</form>
   <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">selección</th>
      <th scope="col">PTS.</th>
      <th scope="col">PAR.</th>
      <th scope="col">GAN.</th>
      <th scope="col">EMP.</th>
      <th scope="col">PER.</th>
      <th scope="col">G.F.</th>
      <th scope="col">G.C.</th>
      <th scope="col">+/-</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $countries = array(
        "$teams[0]" => 'image/maroc.png',
        "$teams[1]" => 'image/croatia.png',
        "$teams[2]" =>'image/belgique.png' ,
        "$teams[3]" => 'image/canada.png'
      );
      $i = 1;
      foreach ($class as $key => $value) {
        echo "<tr><th scope='row'>$i.</th>";
        echo "<td><img class='img-responsive' src='{$countries[$key]}' alt=''>$key</td>";
        foreach ($value as $cell) {
          echo "<td>$cell</td>";
        }
        echo "</tr>";
        $i++;
      }
      echo '</tbody></table>';
      ?>
  </tbody>
</table>
</body>
</html>