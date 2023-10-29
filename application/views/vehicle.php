  
    <main>
        <div class="container"> 
            <div class="title-box">
                <h1>Veiculos</h1>
            </div> 
                               
            <div class="vehicles">
                <div class="vehicles-header toolbar">                                            
                    <a href='<?= site_url('index.php/vehicle/store') ?>' class="btn ">
                        <i class="bi bi-plus-circle"></i>
                        Nova
                    </a> 
                    <form class="form-inline">
                        <input class="form-control mr-sm-2 d-none" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn my-sm-0" type="submit">
                        <i class="bi bi-search"></i>
                        </button>
                    </form>                   
                </div>
                <div class="vehiclesList-main">
                    <ul class="vehicles-list">
                        <?php foreach($vehiclesList as $vehicle): ?>    
                        <li class="vehicles-item">
                            <div class="item-main"> 
                                <span class="vehicle-customer-name"> <?= $vehicle['name'] ?> </span>
                                <span class="vehicle-licence-plate"> <?= $vehicle['license_plate'] ?> </span>
                                <span class="vehicle-model">  <?= $vehicle['model_vehicles_fk'] ?> </span>
                                <span class="vehicle-brand"> <?= $vehicle['brand'] ?> </span>
                            </div>
                            <div class="item-footer">
                                <a  href="<?= site_url('index.php/vehicle/edit/'.$vehicle['license_plate']) ?>" class="btn edit-button">
                                    <i class="bi bi-pencil-square"></i>
                                    Editar
                                </a>
                                <a  href="<?= site_url('index.php/vehicle/delete/'.$vehicle['license_plate']) ?>" class="btn delete-button">
                                    <i class="bi bi-trash3"></i>
                                    Excluir
                                </a>
                            </div>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>
 