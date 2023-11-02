  
    <main>
        <div class="container">
            <div class="title-box">
                <h1>Estoque de peças</h1>
            </div> 
                                          
            <div class="inventory">
                <div class="inventory-header toolbar">                                            
                    <a href='<?= site_url('index.php/inventory/store') ?>' class="btn ">
                        <i class="bi bi-plus-circle"></i>
                         Nova
                    </a> 
                    <form class="form-inline">
                        <input class="form-control mr-sm-2 d-none" type="search" placeholder="Search" aria-label="Search">
                        <a class="btn my-sm-0" type="submit">
                            <i class="bi bi-search"></i>
                        </a>
                    </form>                   
                </div>
                <div class="inventory-main">
                    <?php  if(count($partsList) > 0): ?>
                    <ul class="parts-list container-fluid">
                        <?php foreach($partsList as $part): ?>    
                        <li class="parts-item">
                            <div class="item-main">
                                <div>
                                    <?php if(!empty($part['image_address'])): ?>
                                        <img class="img-fluid" src="<?= site_url('assets/images/'). $part['image_address']  ?>" alt="<?= $part['name'] ?>">
                                    <?php endif ?>
                                </div>
                                <div>
                                    <div class="part-reference"> 
                                            <strong>Ref: </strong> <?= $part['reference_number'] ?> 
                                    </div>
                                    <div class="part-name"> <strong>Name: </strong> <?= $part['name'] ?> </div>
                                    <div class="part-brand"> <strong>Marca </strong> <?= $part['brand'] ?> </div>
                                    <div class="part-quantity">  <strong>Quantidade </strong> <?= $part['quantity'] ?> </div>
                                </div>
                            </div>
                            <div class="item-footer">
                                <a  href="<?= site_url('index.php/inventory/edit/'.$part['reference_number']) ?>" class="btn edit-button">
                                    <i class="bi bi-pencil-square"></i>
                                    Editar
                                </a>
                                <a  href="<?= site_url('index.php/inventory/destroy/'.$part['reference_number']) ?>" class="btn destroy-button">
                                    <i class="bi bi-trash3"></i>
                                    Excluir
                                </a>
                            </div>
                        </li>
                        <?php endforeach ?>
                    </ul>
                    <?php  else: ?>                         
                        <p class="h6" >Nenhuma peça cadastrada</p>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </main>
 