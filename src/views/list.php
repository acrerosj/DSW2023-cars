<table>
  <thead>
    <tr>
      <th>id</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Color</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($listCars as $car) { ?>
    <tr>
      <td>
        <a href="index.php?id=<?=$car->id?>"><?=$car->id?></a>
      </td>
      <td><?=$car->make?></td>
      <td><?=$car->model?></td>
      <td style="background-color: <?=$car->color?>"><?=$car->color?></td>
      <td>
        <a href="index.php?id=<?=$car->id?>&action=delete">Eliminar</a>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>