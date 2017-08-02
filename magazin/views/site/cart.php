<h1>Товары котрые вы хотите приобрести</h1>


<?php
$total = 0;
$kol=0;

foreach ($cart as $product): $total+=$product->price;?>
    <h2><?php echo $product->title; ?>  <?php echo $product->price;?>   <h3> Количество: <?php echo count($product->id)  ?></h3> </h2>
    <a href="/site/cart?remove_id=<?php echo $product->id?>"   button type="submit" class="btn btn-success" name="btn">Удалить</button></a>
<?php endforeach ?>
<br>
<br>
<a href="/site/orders" button type="submit" class="btn btn-primary">Оформить заказ</button></a>
<h2>Количество товара: <?php echo count($cart);?></h2>
<h2>Общая цена:  <?php echo $total?></h2>

<?php var_dump($cart) ?>
