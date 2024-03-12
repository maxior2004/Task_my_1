<?php
$products = get_all_product();

echo '<table class="table" id="all_products">
  <thead>
    <tr>
      <th scope="col">SKU</th>
      <th scope="col">Наименование</th>
    </tr>
  </thead>
    <tbody>';
foreach ($products as $id => $product){
    echo template_one_product($product);
}
echo '</tbody>
</table>';