<style>


</style>

<h1>ตรวจสอบสต็อกสินค้า</h1>







<div class=" button-group filters-button-group">
    <button class="button is-checked" data-filter="*">ALL</button>
    <?php $sql = "SELECT * FROM category" ;
          $query = mysqli_query($conn , $sql ) ; 
          while($result = mysqli_fetch_array($query , MYSQLI_BOTH)){ ?>
    <button class="button" data-filter=".<?php echo $result['c_id'] ; ?>"><?php echo $result['c_name'] ; ?></button>
    <?php  } ?>
</div>





<div class="grid">
        <?php $sql_p = "SELECT * FROM product" ;
          $query_p = mysqli_query($conn , $sql_p ) ; 
          while($result_p = mysqli_fetch_array($query_p , MYSQLI_BOTH)){ ?>
    <div class="element-item transition <?php echo $result_p['p_cat_id'] ; ?> " data-category="transition">
        <h3 class="name"><?php echo $result_p['p_name'] ; ?></h3>
        <!-- รูป -->
        <img class="img-fluid" class="img-fluid" src="img/<?php echo $result_p['p_img'] ; ?>">
        <!-- จำนวน -->
        <p class="number">80</p> 
    </div>
    <?php  } ?>
</div>


<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>

<script>
// external js: isotope.pkgd.js

// init Isotope
var $grid = $('.grid').isotope({
    itemSelector: '.element-item',
    layoutMode: 'fitRows'
});
// filter functions
var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function() {
        var number = $(this).find('.number').text();
        return parseInt(number, 10) > 50;
    },
    // show if name ends with -ium
    ium: function() {
        var name = $(this).find('.name').text();
        return name.match(/ium$/);
    }
};
// bind filter button click
$('.filters-button-group').on('click', 'button', function() {
    var filterValue = $(this).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[filterValue] || filterValue;
    $grid.isotope({
        filter: filterValue
    });
});
// change is-checked class on buttons
$('.button-group').each(function(i, buttonGroup) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on('click', 'button', function() {
        $buttonGroup.find('.is-checked').removeClass('is-checked');
        $(this).addClass('is-checked');
    });
});
</script>