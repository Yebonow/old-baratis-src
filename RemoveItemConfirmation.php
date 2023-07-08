<?php
  $id = (int)$_GET['item'];
  
 
  ?>
<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
  
  $stmt = $dbh->prepare("SELECT * FROM ownedItems WHERE id = :iid AND ownedBy = :uid");
  $stmt->bindParam(":iid", $id);
  $stmt->bindParam(":uid", $user->getInfo("id"));
  $stmt->execute();
  
  $stmt2 = $dbh->prepare("SELECT * FROM catalog WHERE id = :iid");
  $stmt2->bindParam(":iid", $id);
  $stmt2->execute();
  
  $item = $stmt2->fetchAll(PDO::FETCH_ASSOC);
  
      ?>
    <title>Baratis - Purchase Confirmation</title>
    <script>
      $("body").on('mouseover', 'a', function (e) {
    var $link = $(this),
        href = $link.attr('href') || $link.data("href");

    $link.off('click.chrome');
    $link.on('click.chrome', function () {
        window.location.href = href;
    })
    .attr('data-href', href)
    .css({ cursor: 'pointer' })
    .removeAttr('href');
});
      
      function BJS_BUYITEM() {
        window.location.href = 'https://www.baratis.tk/api/removeItem?item=<?php echo $id; ?>';
        }
      
      function BJS_CLOSEWIN() {
        javascript:window.close();
        }
      
      </script>
   </head>
  <style>
    main-header-middle{text-align:center;font-weight:bold;font-size:1.3em;display:block;margin-top:20px;}.option-footer{position:absolute;bottom:0;background:#cacaca;display:block;width:790px;padding:5px}purchase-option:hover{cursor:pointer}img{margin-top:20px;padding:5px;border:1px solid #5a5a5a;border-radius:4px;}}
    </style>
  <body>
        <?php
      if($stmt->rowCount() == '1') {
        die('<main-header-middle>You already own this item</main-header-middle>');
        }
        ?>
        <main-header-middle>Are you sure you want to remove <?php echo $item[0]['itemName']; ?> from your inventory?</main-header-middle>
        <center><br>
          <img src="<?php echo $item[0]['itemThumbnail']; ?>" alt="<?php echo $item[0]['itemName']; ?>" title="Item Thumbnail" width="500" height="333">
          </center>
       <!-- <div class="option-footer">!-->
    <center class="margin-top-20">
        <purchase-option onclick="BJS_BUYITEM();" class="margin-right-5"><button class="button button-red">Remove</button></purchase-option><purchase-option onclick="BJS_CLOSEWIN();" class="margin-left-5"><button class="button button-grey">Cancel</button></purchase-option>
      </center>
          <!-- </div> !-->
    </body>
  </html>