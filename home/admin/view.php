<?php

 include 'config.php';
if(isset($_POST['displaySend'])){
  $sql = "select * from `book`";
  $result = mysqli_query($con,$sql);
 
  $data = array();
  $count = 1;
  while($row = mysqli_fetch_assoc($result)){
    $data[] = array(
      'id' => $count,
      'bname' =>$row['b_name'],
      'description' =>$row['description'],
      'keyword' =>$row['keyword'],
      'price' =>$row['price'],
      'image' => '<img src="'.$row['image'].'" width="100">',
      'author' =>$row['author'],
      'publisher' =>$row['publisher'],
      'p_date' =>$row['p_date'],
      'action' => '<button type="button" class="btn btn-sm btn-success btn-sm rounded-circle" onclick="Getdetails('.$row['b_id'].')"><i class="fa-solid fa-pen-to-square"></i></button>
                   <button type="button" class="btn btn-sm btn-danger btn-sm rounded-circle" onclick="deleteBook('.$row['b_id'].')"><i class="fa-solid fa-trash"></i></button>'
    );
    $count++;
  }
  $json_data = json_encode($data);

  // Print the JSON data to be used by the DataTables library
  echo "<script>$(document).ready( function () {
          $('#book-table').DataTable({
            'data': ".$json_data.",
            'columns': [
              {'data': 'id'},
              {'data': 'bname'},
              {'data': 'description'},
              {'data': 'keyword'},
              {'data': 'price'},
              {'data': 'image'},
              {'data': 'author'},
              {'data': 'publisher'},
              {'data': 'p_date'},
              {'data': 'action'} 
             
            ]
          });
        });
        </script>";
        echo '<table id="book-table" class="table-striped table-bordered  table-dark" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Keyword</th>
            <th>Price</th>
            <th>Image</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Publish-Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>';
      $count++;
}
   


?>




<?php
//categories view details
if(isset($_POST['displayCategory'])){
  $sql = "SELECT * FROM categories";
  $result = mysqli_query($con, $sql);

  // Create a data array to hold the retrieved categories
  $data = array();
  $count = 1;
  while($row = mysqli_fetch_assoc($result)){
    $data[] = array(
      'id' => $count,
      'category' => $row['categories'],
      'action' => '<button type="button" class="btn btn-sm btn-success btn-sm rounded-circle" onclick="GetCategory('.$row['c_id'].')"><i class="fa-solid fa-pen-to-square"></i></button>
                   <button type="button" class="btn btn-sm btn-danger btn-sm rounded-circle" onclick="deleteCategory('.$row['c_id'].')"><i class="fa-solid fa-trash"></i></button>'
    );
    $count++;
  }

  // Convert the data array to JSON format
  $json_data = json_encode($data);

  // Print the JSON data to be used by the DataTables library
  echo "<script>$(document).ready( function () {
          $('#category-table').DataTable({
            'data': ".$json_data.",
            'columns': [
              {'data': 'id'},
              {'data': 'category'},
              {'data': 'action'}
            ]
          });
        });
        </script>";

  // Display the table HTML code
  echo '<table id="category-table" class="table-striped table-bordered  table-dark" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>';
      $count++;
}

?>