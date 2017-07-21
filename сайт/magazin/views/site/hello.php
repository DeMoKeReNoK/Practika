<h1>Товары</h1>

<div>
    <ul>
        <?php foreach ($arrayInView as $item):?>
        <p>
            <a href="/site/view/<?=$item->id?>"><?php echo $item->title ?></a>
        </p>
        <?php endforeach ?>
    </ul>
</div>