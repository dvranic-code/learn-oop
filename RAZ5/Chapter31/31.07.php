function get_category_name($catid) {
   // query database for the name for a category id
   $conn = db_connect();
   $query = “select catname from categories
             where catid = ‘”.$conn->real_escape_string($catid).”’”;
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_cats = @$result->num_rows;
   if ($num_cats == 0) {
     return false;
   }
   $row = $result->fetch_object();
   return $row->catname;
}
