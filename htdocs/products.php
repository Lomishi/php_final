

<div class="articulo">
                      <input type="hidden" id="id" value="<?php echo $item['id'];  ?>">
                       <div class="imagen"><img src="img/<?php echo $item['imagen'];  ?>" /></div>
                       <div class="titulo"><?php echo $item['nombre'];  ?></div>
                       <div class="precio"><?php echo $item['precio'];  ?> €</div>
                       <input type="hidden" value ="<?php echo $item['tipo'];  ?> ">
                    <div class="botones">
                    
                    
                    <a class="eo" href="http://localhost/planetas.php?id=<?php echo $item['id']; $d=$item['id'];?>&idadd=2">agregar al carrito</a>
                    
                  
                  
                  
                  </div>
                    </div>