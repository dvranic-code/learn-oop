function calculate_items($cart) {
  // sum total items in shopping cart
  $items = 0;
  if(is_array($cart)) {
    foreach($cart as $isbn => $qty) {
      $items += $qty;
    }
  }
  return $items;
}
