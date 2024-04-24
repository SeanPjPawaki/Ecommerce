<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filterable Table with Colspans (Tabulator)</title>
  <link rel="stylesheet" href="https://unpkg.com/tabulator/dist/css/tabulator.min.css">
  <style>
    #exampleTable {
      height: 400px;
      border: 1px solid #ddd;
    }
  </style>
</head>
<body>
  <div id="table-container">
    <input type="text" id="filter-text" placeholder="Filter by Name, City, or Country">
    <div id="exampleTable"></div>
  </div>

  <script src="https://unpkg.com/tabulator/dist/js/tabulator.min.js"></script>
  <script>
  var table = new Tabulator("#exampleTable", {
    // Data for the table
    data: [
      { id: 1, name: "Alice", age: 25, city: "London", country: "UK" },
      { id: 2, name: "Bob", age: 30, city: "Paris", country: "France", colspan: 2 },
      { id: 3, name: "Charlie", age: 28, city: "Berlin", country: Germany },
    ],
    // Define columns
    columns: [
      { title: "ID", field: "id", width: 50 },
      { title: "Name", field: "name" },
      { title: "Age", field: "age" },
      { title: "City", field: "city" },
      { title: "Country", field: "country", width: 150 },
    ],
    // Filtering function (optional)
    filterFunc: function(data) {
      var filterValue = $("#filter-text").val();
      return data.name.toLowerCase().indexOf(filterValue.toLowerCase()) !== -1 ||
             data.city.toLowerCase().indexOf(filterValue.toLowerCase()) !== -1 ||
             data.country.toLowerCase().indexOf(filterValue.toLowerCase()) !== -1;
    },
  });

  // Example filtering (replace with your filtering mechanism)
  $("#filter-text").on("keyup", function() {
    table.setFilter([
      { field: "name", type: "like", value: $(this).val() },
      { field: "city", type: "like", value: $(this).val() },
      { field: "country", type: "like", value: $(this).val() },
    ]);
  });
  </script>
</body>
</html>