<div class="title-container">	
    <div class="logo"><a href="<?php echo config('app.url');?>">Marco Ocean 的潛水足跡</a></div>	
</div><!--END OF title-container-->

<nav class="navbar navbar-default container">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php foreach ($menu as $element):?>
                <li class="<?php if ($element['focus']) echo 'active';?>"><a href="<?php echo $element['link'];?>"><?php echo $element['title'];?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</nav>