<h1>Полная информация о товаре</h1>
<form id="cart-form" method="GET">
<h3 name="title"><?php echo $one->title ?></h3>
<h4 name="description"><?php echo $one->description ?></h4>
<h5 name="price">Цена:<?php echo $one->price?> р.</h5>
    <a href="/site/cart?product_id=<?php echo $one->id?>" button type="submit" class="btn btn-primary" name="btn">Купить</button></a>
</form>























