<h1>Товары</h1>

<div>
    <ul>
        <?php foreach ($arrayInView as $item):?>
    <p>

    <h1> <a href="/site/view/<?=$item->id?>"><?php echo $item->title ?></a></h1>
    </p>

    <h2> <p><?php echo $item->description ?></p></h2>
<?php endforeach ?>


</ul>
</div>