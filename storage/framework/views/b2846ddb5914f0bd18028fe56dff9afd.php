<?php $__env->startSection('container'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Product List</h1>
  <!-- <form action="/product/showAll">
    <?php echo csrf_field(); ?> -->
    <button class="btn btn-primary" id="showData">Show Products</button>
  <!-- </form> -->
</div>
<div class="table-responsive">
  <table class="table table-striped table-sm" id="table-products">
    <thead>
      <tr>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Brand</th>
        <th scope="col">Stock</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="productDetailModalLabel">Product Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
    </div>
    </div>
</div>

<script type="text/javascript">
  // console.log("yes");
  // let showDataButton = document.getElementById('showData').addEventListener("click", getData);
  const showDataButton = document.querySelector('#showData');
  
  showDataButton.addEventListener('click', function(){
    // const inputKeyword = document.querySelector('.input-keyword');
    fetch('https://dummyjson.com/products')
    .then(response => {
      if (response.ok) {
        return response.json();
      } else{
        return Promise.reject({
          status: response.status
        })
      }
    })
    .then(response => {
        console.log(response);
        
        const products = response.products;
        let rows = '';
        products.forEach(m => rows += showRows(m));
        const rowContainer = document.querySelector('#table-products tbody');
        rowContainer.innerHTML = rows;

        // ketika tombol detail di-klik
        const modalDetailButton = document.querySelectorAll('.modal-detail-button');
        modalDetailButton.forEach(btn => {
            btn.addEventListener('click', function(){
                // console.log(this);
                const id = this.dataset.id;
                // console.log(id);
                fetch('https://dummyjson.com/products/'+ id)
                    .then(response => response.json())
                    .then(m => {
                        console.log();
                        const productDetail = showProductDetail(m);
                        // $('.modal-body').html(movieDetail);
                        const modalBody = document.querySelector('.modal-body');
                        modalBody.innerHTML = productDetail;
                    });
            });
        });

        // var tableRef = document.getElementById('table-products').getElementsByTagName('tbody')[0];

        // // Insert a row at the end of table
        // var newRow = tableRef.insertRow();

        // // Insert a cell at the end of the row
        // // var newCell = newRow.insertCell();

        // // Append a text node to the cell
        // // var newText = document.createTextNode('new row');
        // newRow.appendChild(rows);

        // var newRow = tableRef.insertRow(tableRef.rows.length);
        // newRow.innerHTML = rows;

        // // ketika tombol detail di-klik
        // const modalDetailButton = document.querySelectorAll('.modal-detail-button');
        // modalDetailButton.forEach(btn => {
        //     btn.addEventListener('click', function(){
        //         // console.log(this);
        //         const imdbid = this.dataset.imdbid;
        //         // console.log(imdbid);
        //         fetch('https://www.omdbapi.com/?apikey=593c2fd6&i='+ imdbid)
        //             .then(response => response.json())
        //             .then(m => {
        //                 const productDetail = showproductDetail(m);
        //                 // $('.modal-body').html(productDetail);
        //                 const modalBody = document.querySelector('.modal-body');
        //                 modalBody.innerHTML = productDetail;
        //             });
        //     });
        // });
    })
    .catch((err) => {
      if (err.status == 404) {
        console.log('Data tidak ditemukan!');
      }
    });


  });

  function showRows(m) {
    return `
      <tr>
          <td><img src="${m.images[0]}" class="img-thumb" /></td>
          <td>${m.title}</td>
          <td>${m.category}</td>
          <td>${m.brand}</td>
          <td>${m.stock}</td>
          <td>${m.price} USD</td>
          <td>
            <a href="#" class="btn btn-primary modal-detail-button" data-id="${m.id}" data-bs-toggle="modal" data-bs-target="#productDetailModal">View</a>
          </td>
      </tr>`;
  }

  function showProductDetail(m){
    return  `
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <img src="${m.thumbnail}" alt="" class="img-fluid">
                </div>
                <div class="col-md">
                    <ul class="list-group">
                        <li class="list-group-item"><h4>${m.title}</h4></li>
                        <li class="list-group-item"><strong>Brand: </strong> ${m.brand}</li>
                        <li class="list-group-item"><strong>Category:</strong> ${m.category}</li>
                        <li class="list-group-item"><strong>Description:</strong> ${m.description}</li>
                        <li class="list-group-item"><strong>Stock:</strong> ${m.stock}</li>
                        <li class="list-group-item"><strong>Price:</strong> $ ${m.price}</li>
                    </ul>
                </div>
            </div>
            
        </div>
    `;
  }
  // function getData() {
  //   fetch('https://dummyjson.com/products')
  //     // .then(hasil => console.log(hasil));
  //     .then((response) => {
  //       if (response.ok) {
  //         return response.json();
  //       } else{
  //         return Promise.reject({
  //           status: response.status
  //         })
  //       }
  //     })
  //     .then((json) => console.log(json))
  //     .catch((err) => {
  //       if (err.status == 404) {
  //         console.log('Data tidak ditemukan!');
  //       }
  //     })
  //   // .then(hasil => hasil.json())
  //   // .then(console.log);
  // }
  
</script>

<!-- <script>
  $(document).ready(function() {
    // let showDataButton = $('#showData');
    // $('#showData').click(function() {
    //   console.log('sds ');
    // });
    $('#showData').on('click', function(){
        $.ajax({
            url: 'https://dummyjson.com/products',
            success: results => {
                console.log(results)
                // const products = results.Search;
                // // console.log(products);
                // let cards = '';
                // products.forEach( m => {
                //     cards += showRows(m);
                // });
                // $('.product-container').html(cards);
        
                // // ketika tombol detail di-klik
                // $('.modal-detail-button').on('click', function(){
                //     // console.log($(this).data('imdbid'));
                //     $.ajax({
                //         url: 'https://www.omdbapi.com/?apikey=593c2fd6&i='+$(this).data('imdbid'),
                //         success: m => {
                //             const productDetail = showproductDetail(m);
                //             $('.modal-body').html(productDetail);
        
                //         }
                //     })
                // });
            },
            error: (e) => {
                console.log(e.responseText);
            }
        });
    });
  });
</script> -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/_online_test/mega-canal/resources/views/product.blade.php ENDPATH**/ ?>