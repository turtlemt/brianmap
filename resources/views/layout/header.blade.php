<div class="title-container">	
    <div class="logo"><a href="<?php echo config('app.url');?>">Marco Ocean 的潛水足跡</a></div>	
</div><!--END OF title-container-->

<nav class="navbar navbar-default container">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php foreach ($menu as $element):?>
                    <?php if (!isset($element['subtitle'])):?>
                    <li class="<?php if ($element['focus']) echo 'active';?>"><a href="<?php echo $element['link'];?>"><?php echo $element['title'];?></a></li>
                    <?php else:?>
                        <li class="dropdown <?php if ($element['focus']) echo 'active';?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $element['title'];?><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php foreach ($element['subtitle'] as $subtitle):?>
                                <li><a href="<?php echo $subtitle['link'];?>"><?php echo $subtitle['title'];?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                    <?php endif;?>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</nav>